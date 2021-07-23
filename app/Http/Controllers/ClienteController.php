<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteRaca;
use App\Models\CreditoAnalise;
use App\Models\PendenciaFinanceira;
use App\Models\ProtestoEstadual;
use App\Models\ConsultaChequeInterno;
use App\Models\ChequeSemFundo;
use App\Models\ConsultaChequeMercado;
use App\Models\ConsultaReferenciaComercial;
use App\Models\ConsultaSemCheque;
use App\Models\DocumentoRoubado;
use App\Models\IndiceRelacionamentoSetor;
use App\Models\ParticipacaoSocietaria;
use Illuminate\Support\Facades\Http;

class ClienteController extends Controller
{
    //

    public function index(){
        $clientes = Cliente::all();
        return view("painel.clientes.consultar", ["clientes" => $clientes]);
    }

    public function visualizar(Cliente $cliente){
        return view("painel.clientes.visualizar", ['cliente' => $cliente]);
    }

    public function cadastro(Request $request){
        $anterior = redirect()->back()->getTargetUrl();
        return view('cadastro.index', ["anterior" => $anterior]);
    }

    public function cadastrar(Request $request){
        $request->validate([
            'email' => 'required|min:3|max:100',
            'senha' => 'required|min:5|max:15'
        ]);

        $cliente = Cliente::where("email", $request->email)->first();

        if($cliente){
            toastr()->error("Já existe um cliente cadastrado com esse e-mail.");
            return redirect()->back();
        }

        if($request->senha != $request->senha2){
            toastr()->error("As senhas não coincidem.");
            return redirect()->back();
        }

        $cliente = new Cliente;
        $cliente->email = $request->email;
        $cliente->nome_dono = $request->nome;
        $cliente->estado = $request->estado;
        $cliente->cidade = $request->cidade;
        $cliente->senha = Hash::make($request->senha);
        $cliente->telefone = $request->telefone;
        $cliente->save();

        foreach($request->racas as $raca){
            $cliente_raca = new ClienteRaca;
            $cliente_raca->cliente_id = $cliente->id;
            $cliente_raca->raca_id = $raca;
            $cliente_raca->save();
        }

        session()->put(["cliente" => $cliente->toArray()]);

        session()->flash("cadastro_finalizado");
        return redirect($request->anterior);
    
    }

    public function cadastro_final(Request $request){

        $request->validate([
            'nome' => 'required|min:2|max:100',
            'fazenda' => 'required|min:2|max:200',
            'cpf' => 'required|min:11|max:14',
            'cnpj' => 'required|min:14|max:18',
            'cep' => 'required|min:8|max:9',
            'cidade' => 'required|max:15',
            'bairro' => 'required|min:3|max:60',
            'numero' => 'required|min:1|max:10',
            'complemento' => 'max:50',
            'endereco' => 'required|min:3|max:100',
            'whatsapp' => 'required|min:10|max:14',
        ]);

        $cliente = Cliente::find(session()->get("cliente")["id"]);

        $cliente->nome_dono = $request->nome;
        $cliente->nome_fazenda = $request->fazenda;
        $cliente->cnpj = $request->cnpj;
        $cliente->cpf = $request->cpf;
        $cliente->cep = $request->cep;
        $cliente->cidade = $request->cidade;
        $cliente->interesses = $request->interesses;
        $cliente->racas = $request->racas;
        $cliente->estado = $request->estado;
        $cliente->bairro = $request->bairro;
        $cliente->numero = $request->numero;
        $cliente->complemento = $request->complemento;
        $cliente->rua = $request->endereco;
        $cliente->whatsapp = $request->whatsapp;
        $cliente->finalizado = true;
        
        $cliente->save();

        session()->forget("cliente");
        session(["cliente" => $cliente->toArray()]);

        toastr()->success("Cadastro efetuado com sucesso.");
        return redirect()->route("index");

    }

    public function salvar_dados_gerais(Request $request, Cliente $cliente){
        $cliente->nome_dono = $request->nome_dono;
        $cliente->email = $request->email;
        $cliente->cpf = $request->cpf;
        $cliente->cnpj = $request->cnpj;
        $cliente->telefone = $request->telefone;
        $cliente->whatsapp = $request->whatsapp;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        $cliente->bairro = $request->bairro;
        $cliente->complemento = $request->complemento;
        $cliente->estado = $request->estado;
        $cliente->cidade = $request->cidade;
        $cliente->cep = $request->cep;
        $cliente->save();
        toastr()->success("Dados salvos com sucesso!");
        return redirect()->back();
    }

    public function analise_credito(Cliente $cliente){
    
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->post('https://api.scccheck.com.br/login', [
            "logon" => "3158814",
            "senha" => "berrante40"
        ]);

        if($response->status() == 200){
            $token = $response->object()->token;
        }else{
            toastr()->error("Erro na autenticação", "Erro");
            return redirect()->back();
        }

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->post('https://api.scccheck.com.br/consultas/crednet', [
            "achei_recheque" => false,
            "tipo_pessoa" => "F",
            "doc_consultado" => "111.021.656-46",
            "adicionais" => [6, 19]
        ]);
        
        dd($response->object());

        if($response->status() == 200){

            $res = $response->object();
            
            $analise = new CreditoAnalise;
            $analise->cliente_id = $cliente->id;
            $analise->nome = $res->confirmei->detalhe->nome_razao;
            $analise->nascimento = $res->confirmei->detalhe->dt_origem;
            $analise->situacao = $res->confirmei->detalhe->cod_situacao;
            $analise->doc_situacao = $res->confirmei->detalhe->situacao_doc;
            $analise->data_situacao = $res->confirmei->detalhe->dt_situacao;
            $analise->ccf_disponivel = $res->confirmei->detalhe->ccf_indisponivel;
            $analise->nome_mae = $res->confirmei->detalhe->nome_mae;
            if($res->capacidade_pagamento_com_positivo->detalhe)
                $analise->capacidade_pagamento_com_positivo = $res->capacidade_pagamento_com_positivo->detalhe->vlr_capacidade_pagamento;
            $analise->save();

            foreach($res->pendencias_financeiras->detalhes as $pend){
                $pendencia = new PendenciaFinanceira;
                $pendencia->credito_analise_id = $analise->id;
                $pendencia->data_ocorrencia = $pend->dt_ocorrencia;
                $pendencia->modalidade = $pend->modalidade;
                $pendencia->avalista = $pend->avalista;
                $pendencia->tipo_moeda = $pend->tipo_moeda;
                $pendencia->valor_pendencia = $pend->vlr_pendencia;
                $pendencia->contrato = $pend->contrato;
                $pendencia->origem = $pend->origem;
                $pendencia->praca_embratel = $pend->praca_embratel;
                $pendencia->tipo_anotacao = $pend->tipo_anotacao;
                $pendencia->save();
            }

            if(isset($res->protesto_estadual->detalhes)){
                foreach($res->protesto_estadual->detalhes as $prot){
                    $protesto = new ProtestoEstadual;
                    $protesto->credito_analise_id = $analise->id;
                    $protesto->data_ocorrencia = $prot->dt_ocorrencia;
                    $protesto->tipo_moeda = $prot->tipo_moeda;
                    $protesto->valor_protesto = $prot->vlr_protesto;
                    $protesto->cartorio = $prot->cartorio;
                    $protesto->cidade = $prot->cidade;
                    $protesto->uf = $prot->uf;
                    $protesto->save();
                }
            }

            if(isset($res->cheques_sem_fundos->detalhes)){
                foreach($res->cheques_sem_fundos->detalhes as $cheq){
                    $cheque = new ChequeSemFundo;
                    $cheque->credito_analise_id = $analise->id;
                    $cheque->data_ocorrencia = $cheq->dt_ocorrencia;
                    $cheque->numero_cheque = $cheq->numero_cheque;
                    $cheque->alinea_cheque = $cheq->alinea_cheque;
                    $cheque->quantidade_ccf = $cheq->quantidade_ccf;
                    $cheque->valor_cheque = $cheq->vlr_cheque;
                    $cheque->numero_banco = $cheq->numero_banco;
                    $cheque->nome_banco = $cheq->nome_banco;
                    $cheque->agencia = $cheq->agencia;
                    $cheque->cidade = $cheq->cidade;
                    $cheque->uf = $cheq->uf;
                    $cheque->save();
                }
            }

            if(isset($res->consultas_serasa->consultas_cheques_interno)){
                $consulta = new ConsultaChequeInterno;
                $consulta->credito_analise_id = $analise->id;
                $consulta->dia_mes_primeiro_cheque_a_vista = $$res->consultas_serasa->consultas_cheques_interno->dia_mes_primeiro_cheque_a_vista;
                $consulta->dia_mes_ultimo_cheque_a_vista = $$res->consultas_serasa->consultas_cheques_interno->dia_mes_ultimo_cheque_a_vista;
                $consulta->tot_15_dias_a_vista = $$res->consultas_serasa->consultas_cheques_interno->tot_15_dias_a_vista;
                $consulta->tot_30_dias_a_prazo = $$res->consultas_serasa->consultas_cheques_interno->tot_30_dias_a_prazo;
                $consulta->tot_60_dias_a_prazo = $$res->consultas_serasa->consultas_cheques_interno->tot_60_dias_a_prazo;
                $consulta->tot_90_dias_a_prazo = $$res->consultas_serasa->consultas_cheques_interno->tot_90_dias_a_prazo;
                $consulta->tot_cheques_prazo = $$res->consultas_serasa->consultas_cheques_interno->tot_cheques_prazo;
                $consulta->save();
            }

            if(isset($res->consultas_serasa->consultas_cheques_mercado)){
                $consulta = new ConsultaChequeMercado;
                $consulta->credito_analise_id = $analise->id;
                $consulta->dia_mes_primeiro_cheque_a_vista = $$res->consultas_serasa->consultas_cheques_mercado->dia_mes_primeiro_cheque_a_vista;
                $consulta->dia_mes_ultimo_cheque_a_vista = $$res->consultas_serasa->consultas_cheques_mercado->dia_mes_ultimo_cheque_a_vista;
                $consulta->tot_15_dias_a_vista = $$res->consultas_serasa->consultas_cheques_mercado->tot_15_dias_a_vista;
                $consulta->tot_30_dias_a_prazo = $$res->consultas_serasa->consultas_cheques_mercado->tot_30_dias_a_prazo;
                $consulta->tot_60_dias_a_prazo = $$res->consultas_serasa->consultas_cheques_mercado->tot_60_dias_a_prazo;
                $consulta->tot_90_dias_a_prazo = $$res->consultas_serasa->consultas_cheques_mercado->tot_90_dias_a_prazo;
                $consulta->tot_cheques_prazo = $$res->consultas_serasa->consultas_cheques_mercado->tot_cheques_prazo;
                $consulta->save();
            }

            if(isset($res->consultas_serasa->referencia_comercial)){
                $consulta = new ConsultaReferenciaComercial;
                $consulta->credito_analise_id = $analise->id;
                $consulta->consultante_1 = $$res->consultas_serasa->referencia_comercial->consultante_1;
                $consulta->dia_mes_consulta_1 = $$res->consultas_serasa->referencia_comercial->dia_mes_consulta_1;
                $consulta->consultante_2 = $$res->consultas_serasa->referencia_comercial->consultante_2;
                $consulta->dia_mes_consulta_2 = $$res->consultas_serasa->referencia_comercial->dia_mes_consulta_2;
                $consulta->consultante_3 = $$res->consultas_serasa->referencia_comercial->consultante_3;
                $consulta->dia_mes_consulta_3 = $$res->consultas_serasa->referencia_comercial->dia_mes_consulta_3;
                $consulta->save();
            }

            if(isset($res->consultas_serasa->consultas_sem_cheques)){
                $consulta = new ConsultaSemCheque;
                $consulta->credito_analise_id = $analise->id;
                $consulta->qtd_consultas_15_dias = $$res->consultas_serasa->consultas_sem_cheques->qtd_consultas_15_dias;
                $consulta->qtd_consultas_30_dias = $$res->consultas_serasa->consultas_sem_cheques->qtd_consultas_30_dias;
                $consulta->qtd_consultas_60_dias = $$res->consultas_serasa->consultas_sem_cheques->qtd_consultas_60_dias;
                $consulta->qtd_consultas_90_dias = $$res->consultas_serasa->consultas_sem_cheques->qtd_consultas_90_dias;
                $consulta->save();
            }

            if(isset($res->alerta_documentos_roubados->detalhes)){
                foreach($res->alerta_documentos_roubados->detalhes as $alert){
                    $alerta = new DocumentoRoubado;
                    $alerta->credito_analise_id = $analise->id;
                    $alerta->tipo_documento = $alert->tipo_documento;
                    $alerta->num_documento = $alert->num_documento;
                    $alerta->dt_ocorrencia = $alert->dt_ocorrencia;
                    $alerta->save();
                }
            }

            if(isset($res->indice_relacionamento_mercado_setor->detalhes)){
                foreach($res->indice_relacionamento_mercado_setor->detalhes as $indi){
                    $indice = new IndiceRelacionamentoSetor;
                    $indice->credito_analise_id = $analise->id;
                    $indice->cod_setor = $indi->cod_setor;
                    $indice->desc_setor = $indi->desc_setor;
                    $indice->faixa = $indi->faixa;
                    $indice->relacionamento = $indi->relacionamento;
                    $indice->relacionamento = $indi->relacionamento;
                    $indice->relacionamento = $indi->relacionamento;
                    $indice->save();
                }
            }

            if(isset($res->participacao_societaria->detalhes)){
                foreach($res->participacao_societaria->detalhes as $part){
                    $participacao = new ParticipacaoSocietaria;
                    $participacao->credito_analise_id = $analise->id;
                    $participacao->nome_empresa = $part->nome_empresa;
                    $participacao->nome_empresa = $part->nome_empresa;
                    $participacao->percentual_participacao = $part->percentual_participacao;
                    $participacao->uf = $part->uf;
                    $participacao->dt_inicio_participacao = $part->dt_inicio_participacao;
                    $participacao->dt_atualizacao = $part->dt_atualizacao;
                    $participacao->possui_restricao = $part->possui_restricao;
                    $participacao->situacao_empresa = $part->situacao_empresa;
                    $participacao->save();
                }
            }

            toastr()->success("Análise feita com sucesso!", "Sucesso");
            return redirect()->back();
        }else{
            toastr()->error($response->body(), "Erro");
            return redirect()->back();
        }
    }
}
