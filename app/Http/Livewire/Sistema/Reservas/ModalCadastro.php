<?php

namespace App\Http\Livewire\Sistema\Reservas;

use Livewire\Component;
use App\Models\Reserva;
use App\Models\ReservaFormasPagamento;
use App\Models\ReservaFormasPagamentoRegra;
use App\Classes\FuncoesPagamento;
use App\Classes\Util;
use Livewire\WithFileUploads;

class ModalCadastro extends Component
{
    use WithFileUploads;
    public $show = false;
    public $op = "cadastro";
    public $reserva;
    public $catalogo;
    public $fazenda;
    public $fazenda_selecionada;
    public $formas_pagamento;
    public $atualizacoes_intervalos;
    public $novo_intervalo;
    public $regras;

    protected $listeners = ["carregaModalCadastroReserva", "carregaModalEdicaoReserva", "resetaModalReservas"];

    protected $rules = [
        "reserva.inicio" => "",
        "reserva.fim" => "",
        "reserva.desconto" => "",
        "reserva.desconto_live_valor" => "",
        "reserva.multi_fazendas" => "",
        "reserva.ativo" => "",
        "reserva.mostrar_datas" => "",
        "reserva.raca_id" => "",
        "reserva.max_parcelas" => "",
        "reserva.modalidade" => "",
    ];

    public function updatedReservaMaxParcelas()
    {
        if ($this->reserva->desconto) {
            $this->formas_pagamento[0] = [
                "minimo" => 1,
                "maximo" => 1,
                "desconto" => ($this->reserva->desconto) ?? 0,
                "parcelas" => []
            ];

            $this->formas_pagamento[1] = [
                "minimo" => 2,
                "maximo" => $this->reserva->max_parcelas,
                "desconto" => 0,
                "parcelas" => []
            ];

            $this->atualizacoes_intervalos = $this->formas_pagamento;
        } else {
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
    }

    public function carregaModalCadastroReserva()
    {
        $this->resetaModalReservas();
        $this->reserva = new Reserva;
        $this->op = 'cadastro';
        $this->show = true;
    }

    public function carregaModalEdicaoReserva(Reserva $reserva)
    {
        $this->resetaModalReservas();
        $this->reserva = $reserva;
        $this->fazenda_selecionada = $reserva->fazenda_id;
        $this->op = 'edicao';
        foreach ($reserva->formas_pagamento->sortBy("minimo") as $forma_pagamento) {
            $regras = [];
            foreach ($forma_pagamento->regras->sortBy("posicao") as $regra) {
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
        $this->show = true;
    }

    public function adicionar_intervalo()
    {
        if (!FuncoesPagamento::validaAtualizacaoIntervalos($this->formas_pagamento, null, $this->novo_intervalo)) {
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'O novo intervalo não pode sobrepor intervalos existentes!']);
        } else {
            $this->novo_intervalo["parcelas"] = [];
            array_push($this->formas_pagamento, $this->novo_intervalo);
            $this->atualizacoes_intervalos = $this->formas_pagamento;
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Intervalo adicionado com sucesso!']);
        }
    }

    public function atualizar_intervalo($key)
    {
        if (!FuncoesPagamento::validaAtualizacaoIntervalos($this->formas_pagamento, $key, $this->atualizacoes_intervalos[$key])) {
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'O intervalo não pode sobrepor intervalos existentes!']);
        } else {
            $this->formas_pagamento[$key]["minimo"] = $this->atualizacoes_intervalos[$key]["minimo"];
            $this->formas_pagamento[$key]["maximo"] = $this->atualizacoes_intervalos[$key]["maximo"];
            $this->formas_pagamento[$key]["desconto"] = $this->atualizacoes_intervalos[$key]["desconto"];
            $this->formas_pagamento[$key]["parcelas"] = [];
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Intervalo salvo com sucesso!']);
        }
    }

    public function adicionar_regra($key)
    {
        if (!$this->regras || !isset($this->regras[$key]) || !isset($this->regras[$key]["meses"]) || !isset($this->regras[$key]["parcelas"])) {
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'Por favor, preencha ambos os campos.']);
            return;
        }

        if (!FuncoesPagamento::validaParcelasRegras($this->formas_pagamento[$key], $this->regras[$key])) {
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

    public function remover_regra($key, $posicao)
    {
        unset($this->formas_pagamento[$key]["parcelas"][$posicao]);
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Regra removida com sucesso!']);
    }

    public function resetaModalReservas()
    {
        $this->resetExcept();
    }

    public function mount($fazenda = null)
    {
        if ($fazenda) {
            $this->fazenda = $fazenda;
            $this->fazenda_selecionada = $fazenda;
        } else {
            $this->fazenda = null;
        }
    }

    public function salvar()
    {
        if (!FuncoesPagamento::verificaFormasPagamento($this->formas_pagamento, $this->reserva->max_parcelas)) {
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'A soma das parcelas das regras não pode ultrapassar o número mínimo de parcelas do intervalo.']);
            return;
        }

        if ($this->op == 'cadastro') {
            $this->reserva->fazenda_id = $this->fazenda_selecionada;
            $this->reserva->aberto = false;
            $this->reserva->preco_disponivel = false;
            $this->reserva->compra_disponivel = false;
        }

        if ($this->reserva->raca_id == -1) {
            $this->reserva->raca_id = null;
        }

        $this->reserva->save();

        ReservaFormasPagamento::where("reserva_id", $this->reserva->id)->delete();

        foreach ($this->formas_pagamento as $forma_pagamento) {
            $nova_forma = new ReservaFormasPagamento;
            $nova_forma->reserva_id = $this->reserva->id;
            $nova_forma->minimo = $forma_pagamento["minimo"];
            $nova_forma->maximo = $forma_pagamento["maximo"];
            $nova_forma->desconto = $forma_pagamento["desconto"];
            $nova_forma->save();

            foreach ($forma_pagamento["parcelas"] as $key => $regra) {
                $nova_regra = new ReservaFormasPagamentoRegra;
                $nova_regra->reserva_formas_pagamento_id = $nova_forma->id;
                $nova_regra->meses = $regra["meses"];
                $nova_regra->parcelas = $regra["parcelas"];
                $nova_regra->posicao = $key;
                $nova_regra->save();
            }
        }

        if ($this->catalogo) {
            $this->reserva->catalogo = $this->catalogo->store('uploads');
            $this->reserva->save();
            \Util::limparLivewireTemp();
        }

        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Reserva salva com sucesso!']);
        $this->emit("atualizaDatatableReservas");
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.sistema.reservas.modal-cadastro');
    }
}
