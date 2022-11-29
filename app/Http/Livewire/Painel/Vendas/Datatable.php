<?php

namespace App\Http\Livewire\Painel\Vendas;

use Livewire\Component;
use App\Models\Venda;
use App\Models\Reserva;
use Livewire\WithPagination;
use App\Classes\FuncoesVenda;

class Datatable extends Component
{
    use WithPagination;

    public $filtro_inicio;
    public $filtro_fim;
    public $filtro_reserva;
    public $filtro_cliente;
    public $filtro_assessor;

    public $reservas;

    protected $listeners = ["atualizaValor", "atualizaDatatableVendas" => '$refresh'];

    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->filtro_inicio = date("Y-m-d", strtotime("-15 Days"));
        $this->filtro_fim = date("Y-m-d");
        $this->reservas = Reserva::orderBy("fim", "desc")->get();
    }

    public function atualizaValor(Venda $venda, $campo, $valor){
        $venda->$campo = $valor;
        $venda->save();
        FuncoesVenda::atualizaValores($venda);
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }

    public function aprovar(Venda $venda){
        $venda->aprovada = true;
        $venda->save();
        $this->emit('$refresh');
    }

    public function reprovar(Venda $venda){
        $venda->aprovada = false;
        $venda->save();
        $this->emit('$refresh');
    }

    public function excluirVenda(Venda $venda){
        $venda->delete();
        $this->emit('$refresh');
    }

    public function render()
    {
        $vendas = Venda::where(null);
        if(session()->get('admin')['acesso'] === 1){
            $vendas = Venda::where("assessor_id", session()->get('admin')['assessor_id']);
        }
        
        if($this->filtro_inicio){
            $vendas = $vendas->where("created_at", ">=", $this->filtro_inicio . " 00:00:00");
        }

        if($this->filtro_fim){
            $vendas = $vendas->where("created_at", "<=", $this->filtro_fim . " 23:59:59");
        }

        if($this->filtro_reserva){
            $vendas = $vendas->where("reserva_id", $this->filtro_reserva);
        }

        if($this->filtro_assessor){
            $vendas = $vendas->where("assessor_id", $this->filtro_assessor);
        }

        if($this->filtro_cliente){
            $filtro = $this->filtro_cliente;
            $vendas = $vendas->whereHas("cliente", function($q) use ($filtro){
                $q->where("nome_dono", "LIKE", "%" . $filtro . "%");
            });
        }
        
        $vendas = $vendas->orderBy("codigo", "DESC")->paginate(20);

        return view('livewire.painel.vendas.datatable', ['vendas' => $vendas]);
    }
}
