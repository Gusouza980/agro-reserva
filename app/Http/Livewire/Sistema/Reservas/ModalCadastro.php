<?php

namespace App\Http\Livewire\Sistema\Reservas;

use Livewire\Component;
use App\Models\Reserva;
use App\Models\ReservaFormasPagamento;
use App\Models\ReservaFormasPagamentoRegra;
use App\Classes\FuncoesPagamento;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Classes\Util;

class ModalCadastro extends Component
{
    public $show = false;
    public $op = "cadastro";
    public $reserva;
    public $fazenda;
    public $fazenda_selecionada;
    public $formas_pagamento;
    public $atualizacoes_intervalos;
    public $novo_intervalo;
    public $arquivo;
    public $regras;

    protected $listeners = ["carregaModalCadastroReserva", "carregaModalEdicaoReservas"];

    public function updatedShow(){
        if($this->show == false){
            $this->resetExcept("");
        }
    }

    public function carregaModalEdicaoReserva(Reserva $reserva){
        $this->reserva = $reserva;
        $this->show = true;
        $this->op = "edicao";
    }

    public function carregaModalCadastroReserva(){
        $this->reserva = new Reserva;
        $this->show = true;
        $this->op = "cadastro";
    }

    public function updatedReservaMaxParcelas(){
        $this->formas_pagamento[0] = [
            "minimo" => 1,
            "maximo" => $this->reserva->max_parcelas,
            "desconto" => 0,
            "parcelas" => []
        ];

        $this->atualizacoes_intervalos[0] = [
            "minimo" => 1,
            "maximo" => $this->reserva->max_parcelas,
            "desconto" => 0,
            "parcelas" => []
        ];
    }

    public function carregaModalCadastroReservas(){
        $this->reserva = new Reserva;
        $this->op = 'cadastro';
        $this->arquivo = null;
        $this->show = true;
    }

    public function carregaModalEdicaoReservas(Reserva $reserva){
        $this->reserva = $reserva;
        $this->fazenda_selecionada = $reserva->fazenda_id;
        $this->op = 'edicao';
        $this->arquivo = null;
        foreach($reserva->formas_pagamento->sortBy("minimo") as $forma_pagamento){
            $regras = [];
            foreach($forma_pagamento->regras->sortBy("posicao") as $regra){
                $regras[$regra->posicao] = [
                    "meses" => $regra->meses,
                    "parcelas" => $regra->parcelas,
                ];
            }
            
            $this->formas_pagamento[] = [
                "minimo" => $forma_pagamento->minimo,
                "maximo" => $forma_pagamento->maximo,
                "desconto" => $forma_pagamento->desconto,
                "parcelas" => $regras
            ];

            $this->atualizacoes_intervalos = $this->formas_pagamento;
        }
        $this->dispatchBrowserEvent("abreModalCadastroReserva");
    }

    public function adicionar_intervalo(){
        if(!FuncoesPagamento::validaAtualizacaoIntervalos($this->formas_pagamento, null, $this->novo_intervalo)){
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'O novo intervalo não pode sobrepor intervalos existentes!']);
        }else{
            $this->novo_intervalo["parcelas"] = [];
            array_push($this->formas_pagamento, $this->novo_intervalo);
            $this->atualizacoes_intervalos = $this->formas_pagamento;
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Intervalo adicionado com sucesso!']);
        }
    }

    public function atualizar_intervalo($key){
        if(!FuncoesPagamento::validaAtualizacaoIntervalos($this->formas_pagamento, $key, $this->atualizacoes_intervalos[$key])){
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'O intervalo não pode sobrepor intervalos existentes!']);
        }else{
            $this->formas_pagamento[$key]["minimo"] = $this->atualizacoes_intervalos[$key]["minimo"];
            $this->formas_pagamento[$key]["maximo"] = $this->atualizacoes_intervalos[$key]["maximo"];
            $this->formas_pagamento[$key]["desconto"] = $this->atualizacoes_intervalos[$key]["desconto"];
            $this->formas_pagamento[$key]["parcelas"] = [];
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Intervalo salvo com sucesso!']);
        }
    }

    public function adicionar_regra($key){
        if(!$this->regras || !isset($this->regras[$key]) || !isset($this->regras[$key]["meses"]) || !isset($this->regras[$key]["parcelas"])){
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'Por favor, preencha ambos os campos.']);
            return;
        }

        if(!FuncoesPagamento::validaParcelasRegras($this->formas_pagamento[$key], $this->regras[$key])){
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'A soma das parcelas das regras não pode ultrapassar o número mínimo de parcelas do intervalo.']);
            return;
        }

        $regra = [
            "meses" => $this->regras[$key]["meses"],
            "parcelas" => $this->regras[$key]["parcelas"]
        ];

        array_push($this->formas_pagamento[$key]["parcelas"], $regra);

        unset($this->regras[$key]);

        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Regra adicionada com sucesso!']);
    }

    public function remover_regra($key, $posicao){
        unset($this->formas_pagamento[$key]["parcelas"][$posicao]);
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Regra removida com sucesso!']);
    }

    public function render()
    {
        return view('livewire.sistema.reservas.modal-cadastro');
    }
}
