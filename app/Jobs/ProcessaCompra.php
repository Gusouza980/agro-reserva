<?php

namespace App\Jobs;

use App\Classes\Email;
use App\Models\Carrinho;
use App\Models\Cliente;
use App\Models\Lote;
use App\Models\Venda;
use App\Models\VendaParcela;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PDF;
use Throwable;

class ProcessaCompra implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $venda;
    protected $forma_pagamento;
    public function __construct($venda, $forma_pagamento)
    {
        $this->venda = $venda;
        $this->forma_pagamento = $forma_pagamento;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Lote::whereIn("id", $this->venda->carrinho->produtos()->with("produtable")->get()->pluck("produtable")->flatten()->pluck("id"))->update(["reservado" => true]);

        $cont_parcelas = 0;
        $data_parcela = date("Y-m-d");
        \Log::channel("vendas")->info("Gerando parcelas para a venda #" . $this->venda->id);

        if($this->forma_pagamento->regras->count() > 0){
            foreach($this->forma_pagamento->regras as $regra){
                for($i = 0; $i < $regra->meses; $i++){
                    for($j = 0; $j < $regra->parcelas; $j++){
                        $dias_mes = date("t", strtotime($data_parcela . " +" . $i . " Months"));
                        $intervalo_parcelas_mes = intval($dias_mes / $regra->parcelas); 
                        $data_parcela = date("Y-m-d", strtotime($data_parcela . " +" . $intervalo_parcelas_mes . " Days"));
                        $nova_parcela = new VendaParcela;
                        $nova_parcela->venda_id = $this->venda->id;
                        $nova_parcela->numero = $cont_parcelas + 1;
                        $nova_parcela->valor = $this->venda->valor_parcela;
                        $nova_parcela->vencimento = date("Y-m-d", strtotime($data_parcela));
                        $nova_parcela->save();
                        $cont_parcelas++;
                    }
                }
            }
        }

        if($cont_parcelas < $this->venda->parcelasparcelas){
            for($i = $cont_parcelas; $i < $this->venda->parcelasparcelas; $i++){
                $data_parcela = date("Y-m-d", strtotime($data_parcela . " +1 Month"));
                $nova_parcela = new VendaParcela;
                $nova_parcela->venda_id = $this->venda->id;
                $nova_parcela->numero = $i + 1;
                $nova_parcela->valor = $this->venda->valor_parcela;
                $nova_parcela->vencimento = date("Y-m-d", strtotime($data_parcela));
                $nova_parcela->save();
            }
        }

        \Log::channel("vendas")->info("Parcelas para a venda #" . $this->venda->id . " geradas com sucesso.");
        
        $this->venda->carrinho->aberto = false;
        $this->venda->carrinho->save();
        $this->venda->situacao = 4;
        $this->venda->save();

        \Log::channel("vendas")->info("Situação da venda #" . $this->venda->id . " alterada para 'Cocluído'.");


        \Log::channel("vendas")->info("Iniciando processo de envio de e-mail de confirmação da venda #" . $this->venda->id);

        $fazendas = [];
        foreach($this->venda->carrinho->produtos as $produto){
            $fazendas[$produto->produtable->fazenda_id][] = $produto;
        }
        $data = ["venda" => $this->venda, "fazendas" => $fazendas];
        // $cliente = $this->venda->cliente;
        $pdf = PDF::loadView('cliente.comprovante3', $data);
        $pdf->save(public_path() . "/comprovantes/".$this->venda->id.".pdf");
        $file = file_get_contents(env('APP_URL') .'/templates/emails/confirmar-compra.html');
        Email::enviar($file, "Confirmação de Compra", $this->venda->cliente->email, false, public_path() . "/comprovantes/" . $this->venda->id . ".pdf");
        \Log::channel("vendas")->info("E-mail de confirmação da venda #" . $this->venda->id . " enviado com sucesso.");
    }

    public function failed(Throwable $exception)
    {
        \Log::channel("vendas")->emergency("O processamento da venda #" . $this->venda->id . " não foi finalizado corretamente.");
        $this->venda->situacao = 5;
        $this->venda->save();
        $file = "O processamento da venda #" . $this->venda->id . " não foi finalizado corretamente.";
        Email::enviar($file, "Erro no processamento da compra", "gusouza980@gmail.com", false, null);
    }
}
