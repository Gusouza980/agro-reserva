<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Cidade;
use App\Models\Estado;
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
use App\Models\SerasaScore;
use App\Models\Lote;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Exports\ClienteExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Classes\Email;
use App\Classes\Util;

class ClienteController extends Controller
{
    //

    public function index(){
        $clientes = Cliente::all();
        return view("painel.clientes.consultar", ["clientes" => $clientes]);
    }

    public function exportar(){
        return Excel::download(new ClienteExport, 'clientes '. date("d-m-Y H.i") .'.xlsx');
    }

    public function visualizar(Cliente $cliente){
        return view("painel.clientes.visualizar", ['cliente' => $cliente]);
    }

    public function cadastro(){
        if(session()->get("cliente") && session()->get("cliente")["finalizado"]){
            return redirect()->route("index");
        }
        $anterior = redirect()->back()->getTargetUrl();
        session()->flash("nome_pagina", "Pré Cadastro");
        return view('cadastro.index', ["anterior" => $anterior]);
    }

    public function cadastro_vendedor(){
        if(session()->get("cliente") && isset(session()->get("cliente")["vendedor"]) && session()->get("cliente")["vendedor"] && session()->get("cliente")["finalizado"]){
            return redirect()->route("index");
        }
        $anterior = redirect()->back()->getTargetUrl();
        session()->flash("nome_pagina", "Quero Vender");
        return view('cadastro.vendedor', ["anterior" => $anterior]);
    }

    public function cadastro_painel(Request $request){
        $cliente = Cliente::where("email", $request->email)->orWhere("cpf", $request->documento)->orWhere("documento", $request->documento)->first();

        if($cliente){
            toastr()->error("E-mail já utilizado");
            return redirect()->back();
        }

        $cliente = new Cliente;
        $cliente->email = $request->email;
        $cliente->senha = Hash::make($request->senha);
        $cliente->nome_dono = $request->nome_dono;
        $cliente->whatsapp = $request->whatsapp;
        $cliente->telefone = $request->telefone;
        $cliente->documento = $request->documento;
        $cliente->rua = $request->rua;
        $cliente->bairro = $request->bairro;
        $cliente->numero = $request->numero;
        $cliente->cep = $request->cep;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->finalizado = false;
        $cliente->save();

        $file = file_get_contents('templates/emails/confirma-cadastro/confirma-cadastro.html');
        $file = str_replace("{{ nome }}", $cliente->nome_dono, $file);
        $file = str_replace("{{ usuario }}", $cliente->email, $file);
        $file = str_replace("{{ senha }}", $request->senha, $file);
        Email::enviar($file, "Confirmação de Cadastro", $cliente->email, false);

        toastr()->success("Cadastro realizado com sucesso!");
        return redirect()->back();
    }

    public function finalizar_cadastro(){
        if(session()->get("cliente") && session()->get("cliente")["finalizado"]){
            return redirect()->route("index");
        }
        $anterior = redirect()->back()->getTargetUrl();
        $finalizar = true;
        session()->flash("nome_pagina", "Cadastro Final");
        return view('cadastro.finalizar', ["anterior" => $anterior, "finalizar" => $finalizar]);
    }

    public function cadastrar_vendedor(Request $request){
        
        if($request->email){
            $cliente = Cliente::where("email", $request->email)->first();
            if($cliente){
                session()->flash("erro_email", "O email informado já está sendo utilizado.");
                return redirect()->back()->withInput();
            }
        }

        if(session()->get("cliente")){
            $cliente = Cliente::find(session()->get("cliente")["id"]);
        }else{
            $cliente = new Cliente;
        }

        if($request->email){
            $cliente->email = $request->email;
        }
        
        if($request->nome_dono){
            $cliente->nome_dono = $request->nome_dono;
        }

        if($request->telefone){
            $cliente->telefone = $request->telefone;
        }

        if($request->nome_fazenda){
            $cliente->nome_fazenda = $request->nome_fazenda; 
        }  

        if($request->senha){
            $cliente->senha = Hash::make($request->senha);
        }

        if($request->vender_registro){
            $cliente->vender_registro = $request->vender_registro;
        }

        if($request->racas_vender){
            $cliente->racas_vender = $request->racas_vender;
        }

        $cliente->vendedor = 1;

        if(!$cliente->finalizado){
            $cliente->finalizado = false;
        }

        $cliente->save();

        $rdStation = new \RDStation\RDStation($cliente->email);
        $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
        $rdStation->setLeadData('name', $cliente->nome_dono);
        $rdStation->setLeadData('identifier', 'precadastro');
        $rdStation->setLeadData('telefone', $cliente->telefone);
        $rdStation->setLeadData('nome_fazenda', $cliente->nome_fazenda);
        if($cliente->vender_registro){
            $rdStation->setLeadData('registro', "Com Registro");
        }else{
            $rdStation->setLeadData('registro', "Sem Registro");
        }
        $rdStation->setLeadData('racas_vender', $cliente->racas_vender);
        $rdStation->setLeadData('cadastro-finalizado', "Não");
        if(session()->get("lote_origem")){
            $lote = Lote::find(session()->get("lote_origem"));
            $rdStation->setLeadData('nome_lote_origem', $lote->nome);
            $rdStation->setLeadData('numero_lote_origem', $lote->numero . $lote->letra);
            $rdStation->setLeadData('raca_lote_origem', $lote->raca->nome);
            $rdStation->setLeadData('fazenda_lote_origem', $lote->fazenda->nome_fazenda);
        }
        $rdStation->sendLead();

        session(["cliente" => $cliente->toArray()]);
        $file = file_get_contents('templates/emails/confirma-cadastro/confirma-cadastro.html');
        $file = str_replace("{{nome}}", $cliente->nome_dono, $file);
        $file = str_replace("{{usuario}}", $cliente->email, $file);
        $file = str_replace("{{senha}}", $request->senha, $file);
        Email::enviar($file, "Confirmação de Cadastro", session()->get("cliente")["email"], false);

        return redirect()->back();
        
        // if(session()->get("pagina_retorno")){
        //     $pagina = session()->get("pagina_retorno");
        //     session()->forget("pagina_retorno");
        //     return redirect($pagina);
        // }else{
        //     return redirect()->route("index");
        // }
    }

    public function cadastrar(Request $request){
        $cliente = Cliente::where("email", $request->email)->first();

        if($cliente){
            session()->flash("erro_email", "O email informado já está sendo utilizado.");
            return redirect()->back()->withInput();
        }

        $cliente = new Cliente;
        $cliente->email = $request->email;
        $cliente->nome_dono = $request->nome;
        $cliente->telefone = $request->telefone;
        // $cliente->interesses = $request->interesse;
        $cliente->senha = Hash::make($request->senha);

        if($request->segmento){
            $cliente->segmentos = implode(",", $request->segmento);
        }
        // $cliente->nome_fazenda = $request->fazenda;
        // $cliente->racas = implode(", ", $request->racas);
        $cliente->finalizado = false;
        $cliente->save();

        $rdStation = new \RDStation\RDStation($cliente->email);
        $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
        $rdStation->setLeadData('name', $cliente->nome_dono);
        $rdStation->setLeadData('identifier', 'precadastro');
        $rdStation->setLeadData('telefone', $cliente->telefone);
        $rdStation->setLeadData('cadastro-finalizado', "Não");
        if(session()->get("lote_origem")){
            $lote = Lote::find(session()->get("lote_origem"));
            $rdStation->setLeadData('nome_lote_origem', $lote->nome);
            $rdStation->setLeadData('numero_lote_origem', $lote->numero . $lote->letra);
            $rdStation->setLeadData('raca_lote_origem', $lote->raca->nome);
            $rdStation->setLeadData('fazenda_lote_origem', $lote->fazenda->nome_fazenda);
        }
        $rdStation->sendLead();

        session(["cliente" => $cliente->toArray()]);
        $file = file_get_contents('templates/emails/confirma-cadastro/confirma-cadastro.html');
        $file = str_replace("{{nome}}", $cliente->nome_dono, $file);
        $file = str_replace("{{usuario}}", $cliente->email, $file);
        $file = str_replace("{{senha}}", $request->senha, $file);
        Email::enviar($file, "Confirmação de Cadastro", session()->get("cliente")["email"], false);

        return redirect()->back();
        
        // if(session()->get("pagina_retorno")){
        //     $pagina = session()->get("pagina_retorno");
        //     session()->forget("pagina_retorno");
        //     return redirect($pagina);
        // }else{
        //     return redirect()->route("index");
        // }
    }

    public function login_cadastro(Request $request){
        $cliente = Cliente::where("email", $request->email)->first();
        if($cliente){
            if(Hash::check($request->senha, $cliente->senha)){
                return response()->json($cliente->toJson());
            }else{
                return response()->json("002");
            }
        }else{
            return response()->json("001");
        }
    }

    public function cadastro_final(Request $request){

        if($request->pessoa_fisica == "1"){
            $cliente = Cliente::where("cpf", $request->cpf)->orWhere("documento", $request->cpf)->first();
            if($cliente){
                session()->flash("erro_email", "O cpf informado já está sendo utilizado.");
                return redirect()->back()->withInput();
            }
        }else{
            $cliente = Cliente::where("cnpj", $request->cnpj)->orWhere("documento", $request->cnpj)->first();
            if($cliente){
                session()->flash("erro_email", "O cnpj informado já está sendo utilizado.");
                return redirect()->back()->withInput();
            }
        }

        $cliente = Cliente::find(session()->get("cliente")["id"]);

        $cliente->nome_fazenda = $request->nome_fazenda;
        $cliente->rg = $request->rg;
        $cliente->nascimento = Util::convertDateToString($request->nascimento);
        if($request->pessoa_fisica == "1"){
            $cliente->pessoa_fisica = true;
            $cliente->cpf = $request->cpf;
            $cliente->documento = $request->cpf;
        }else{
            $cliente->pessoa_fisica = false;
            $cliente->cnpj = $request->cnpj;
            $cliente->documento = $request->cnpj;
        }

        // $cliente->estado_civil = $request->estado_civil;
        $cliente->inscricao_produtor_rural = $request->inscricao_produtor_rural;
        $cliente->cep = $request->cep;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        $cliente->complemento = $request->complemento;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->bairro = $request->bairro;
        $cliente->pais = $request->pais;
        $cliente->referencia_bancaria_banco = $request->referencia_bancaria_banco;
        $cliente->referencia_bancaria_gerente = $request->referencia_bancaria_gerente;
        $cliente->referencia_bancaria_tel = $request->referencia_bancaria_tel;
        $cliente->referencia_comercial1 = $request->referencia_comercial1;
        $cliente->referencia_comercial1_tel = $request->referencia_comercial1_tel;
        $cliente->referencia_comercial2 = $request->referencia_comercial2;
        $cliente->referencia_comercial2_tel = $request->referencia_comercial2_tel;
        // $cliente->referencia_comercial3 = $request->referencia_comercial3;
        // $cliente->referencia_comercial3_tel = $request->referencia_comercial3_tel;
        // $cliente->referencia_coorporativa1 = $request->referencia_coorporativa1;
        // $cliente->referencia_coorporativa1_tel = $request->referencia_coorporativa1_tel;
        // $cliente->referencia_coorporativa2 = $request->referencia_coorporativa2;
        // $cliente->referencia_coorporativa2_tel = $request->referencia_coorporativa2_tel;
        $cliente->finalizado = true;

        // $rdStation = new \RDStation\RDStation($cliente->email);
        // $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
        // $rdStation->setLeadData('identifier', 'cadastro-completo');
        // $rdStation->setLeadData('documento', $cliente->documento);
        // $rdStation->setLeadData('cep', $cliente->cep);
        // $rdStation->setLeadData('rua', $cliente->rua);
        // $rdStation->setLeadData('numero', $cliente->numero);
        // $rdStation->setLeadData('complemento', $cliente->complemento);
        // $rdStation->setLeadData('cidade', $cliente->cidade);
        // $rdStation->setLeadData('estado', $cliente->estado);
        // $rdStation->setLeadData('pais', $cliente->pais);
        // $rdStation->setLeadData('referencia_comercial1', $cliente->referencia_comercial1);
        // $rdStation->setLeadData('referencia_comercial1_tel', $cliente->referencia_comercial1_tel);
        // $rdStation->setLeadData('referencia_comercial2', $cliente->referencia_comercial2);
        // $rdStation->setLeadData('referencia_comercial2_tel', $cliente->referencia_comercial2_tel);
        // $rdStation->setLeadData('cadastro-finalizado', "Sim");
        // if(session()->get("lote_origem")){
        //     $lote = Lote::find(session()->get("lote_origem"));
        //     $rdStation->setLeadData('nome_lote_origem', $lote->nome);
        //     $rdStation->setLeadData('numero_lote_origem', $lote->numero . $lote->letra);
        //     $rdStation->setLeadData('raca_lote_origem', $lote->raca->nome);
        //     $rdStation->setLeadData('fazenda_lote_origem', $lote->fazenda->nome_fazenda);
        //     session()->forget("lote_origem");
        // }
        // $rdStation->sendLead();

        session()->forget("cliente");
        session(["cliente" => $cliente->toArray()]);
        
        $cliente->save();
        
        return redirect()->back();

    }

    public function salvar_dados_gerais(Request $request, Cliente $cliente){
        $cliente->nome_dono = $request->nome_dono;
        $cliente->nome_fazenda = $request->nome_fazenda;
        $cliente->email = $request->email;
        $cliente->inscricao_produtor_rural = $request->inscricao_produtor_rural;
        $cliente->documento = $request->documento;
        $cliente->cpf = $request->cpf;
        $cliente->cnpj = $request->cnpj;
        $cliente->pessoa_fisica = $request->pessoa_fisica;
        $cliente->nascimento = $request->nascimento;
        $cliente->rg = $request->rg;
        $cliente->whatsapp = $request->whatsapp;
        $cliente->telefone = $request->whatsapp;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        $cliente->complemento = $request->complemento;
        $cliente->estado = $request->estado;
        $cliente->cidade = $request->cidade;
        $cliente->bairro = $request->bairro;
        $cliente->cep = $request->cep;
        $cliente->referencia_bancaria_banco = $request->referencia_bancaria_banco;
        $cliente->referencia_bancaria_gerente = $request->referencia_bancaria_gerente;
        $cliente->referencia_bancaria_tel = $request->referencia_bancaria_tel;
        $cliente->referencia_comercial1 = $request->referencia_comercial1;
        $cliente->referencia_comercial1_tel = $request->referencia_comercial1_tel;
        $cliente->referencia_comercial2 = $request->referencia_comercial2;
        $cliente->referencia_comercial2_tel = $request->referencia_comercial2_tel;
        $cliente->referencia_comercial3 = $request->referencia_comercial3;
        $cliente->referencia_comercial3_tel = $request->referencia_comercial3_tel;
        $cliente->referencia_coorporativa1 = $request->referencia_coorporativa1;
        $cliente->referencia_coorporativa1_tel = $request->referencia_coorporativa1_tel;
        $cliente->referencia_coorporativa2 = $request->referencia_coorporativa2;
        $cliente->referencia_coorporativa2_tel = $request->referencia_coorporativa2_tel;
        $cliente->save();
        toastr()->success("Dados salvos com sucesso!");
        return redirect()->back();
    }

    public function analise_credito(Cliente $cliente){
    
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->post('https://api.scccheck.com.br/login', [
            "logon" => "2249099",
            "senha" => "@Agro2021"
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
            "doc_consultado" => $cliente->cpf,
            "adicionais" => [19, 36]
        ]);
        
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
            if(isset($res->capacidade_pagamento_com_positivo)){
                if(isset($res->capacidade_pagamento_com_positivo->detalhe)){
                    $analise->capacidade_pagamento_com_positivo = $res->capacidade_pagamento_com_positivo->detalhe->vlr_capacidade_pagamento;
                }
            }
            $analise->save();

            if(isset($res->pendencias_financeiras->detalhes)){
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
                $consulta->dia_mes_primeiro_cheque_a_vista = $res->consultas_serasa->consultas_cheques_interno->dia_mes_primeiro_cheque_a_vista;
                $consulta->dia_mes_ultimo_cheque_a_vista = $res->consultas_serasa->consultas_cheques_interno->dia_mes_ultimo_cheque_a_vista;
                $consulta->tot_15_dias_a_vista = $res->consultas_serasa->consultas_cheques_interno->tot_15_dias_a_vista;
                $consulta->tot_30_dias_a_prazo = $res->consultas_serasa->consultas_cheques_interno->tot_30_dias_a_prazo;
                $consulta->tot_60_dias_a_prazo = $res->consultas_serasa->consultas_cheques_interno->tot_60_dias_a_prazo;
                $consulta->tot_90_dias_a_prazo = $res->consultas_serasa->consultas_cheques_interno->tot_90_dias_a_prazo;
                $consulta->tot_cheques_prazo = $res->consultas_serasa->consultas_cheques_interno->tot_cheques_prazo;
                $consulta->save();
            }

            if(isset($res->consultas_serasa->consultas_cheques_mercado)){
                $consulta = new ConsultaChequeMercado;
                $consulta->credito_analise_id = $analise->id;
                $consulta->dia_mes_primeiro_cheque_a_vista = $res->consultas_serasa->consultas_cheques_mercado->dia_mes_primeiro_cheque_a_vista;
                $consulta->dia_mes_ultimo_cheque_a_vista = $res->consultas_serasa->consultas_cheques_mercado->dia_mes_ultimo_cheque_a_vista;
                $consulta->tot_15_dias_a_vista = $res->consultas_serasa->consultas_cheques_mercado->tot_15_dias_a_vista;
                $consulta->tot_30_dias_a_prazo = $res->consultas_serasa->consultas_cheques_mercado->tot_30_dias_a_prazo;
                $consulta->tot_60_dias_a_prazo = $res->consultas_serasa->consultas_cheques_mercado->tot_60_dias_a_prazo;
                $consulta->tot_90_dias_a_prazo = $res->consultas_serasa->consultas_cheques_mercado->tot_90_dias_a_prazo;
                $consulta->tot_cheques_prazo = $res->consultas_serasa->consultas_cheques_mercado->tot_cheques_prazo;
                $consulta->save();
            }

            if(isset($res->consultas_serasa->referencia_comercial)){
                $consulta = new ConsultaReferenciaComercial;
                $consulta->credito_analise_id = $analise->id;
                $consulta->consultante_1 = $res->consultas_serasa->referencia_comercial->consultante_1;
                $consulta->dia_mes_consulta_1 = $res->consultas_serasa->referencia_comercial->dia_mes_consulta_1;
                $consulta->consultante_2 = $res->consultas_serasa->referencia_comercial->consultante_2;
                $consulta->dia_mes_consulta_2 = $res->consultas_serasa->referencia_comercial->dia_mes_consulta_2;
                $consulta->consultante_3 = $res->consultas_serasa->referencia_comercial->consultante_3;
                $consulta->dia_mes_consulta_3 = $res->consultas_serasa->referencia_comercial->dia_mes_consulta_3;
                $consulta->save();
            }

            if(isset($res->consultas_serasa->consultas_sem_cheques)){
                $consulta = new ConsultaSemCheque;
                $consulta->credito_analise_id = $analise->id;
                $consulta->qtd_consultas_15_dias = $res->consultas_serasa->consultas_sem_cheques->qtd_consultas_15_dias;
                $consulta->qtd_consultas_30_dias = $res->consultas_serasa->consultas_sem_cheques->qtd_consultas_30_dias;
                $consulta->qtd_consultas_60_dias = $res->consultas_serasa->consultas_sem_cheques->qtd_consultas_60_dias;
                $consulta->qtd_consultas_90_dias = $res->consultas_serasa->consultas_sem_cheques->qtd_consultas_90_dias;
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

            if(isset($res->indice_relacionamento_mercado_setor)){
                if(isset($res->indice_relacionamento_mercado_setor->detalhes)){
                    foreach($res->indice_relacionamento_mercado_setor->detalhes as $indi){
                        $indice = new IndiceRelacionamentoSetor;
                        $indice->credito_analise_id = $analise->id;
                        $indice->cod_setor = $indi->cod_setor;
                        $indice->desc_setor = $indi->desc_setor;
                        $indice->faixa = $indi->faixa;
                        $indice->relacionamento = $indi->relacionamento;
                        $indice->tendencia = $indi->tendencia;
                        $indice->mensagem = $indi->mensagem;
                        $indice->save();
                    }
                }
            }
            
            if(isset($res->participacao_societaria->detalhes)){
                foreach($res->participacao_societaria->detalhes as $part){
                    $participacao = new ParticipacaoSocietaria;
                    $participacao->credito_analise_id = $analise->id;
                    $participacao->nome_empresa = $part->nome_empresa;
                    $participacao->cnpj_empresa = $part->cnpj_empresa;
                    $participacao->percentual_participacao = $part->percentual_participacao;
                    $participacao->uf = $part->uf;
                    $participacao->dt_inicio_participacao = $part->dt_inicio_participacao;
                    $participacao->dt_atualizacao = $part->dt_atualizacao;
                    $participacao->possui_restricao = $part->possui_restricao;
                    $participacao->situacao_empresa = $part->situacao_empresa;
                    $participacao->save();
                }
            }

            if(isset($res->serasa_score_positivo) && isset($res->serasa_score_positivo->detalhe)){
                $score = new SerasaScore;
                $score->credito_analise_id = $analise->id;
                $score->pontuacao = $res->serasa_score_positivo->detalhe->pontuacao;
                $score->risco = $res->serasa_score_positivo->detalhe->risco;
                $score->desc_risco = $res->serasa_score_positivo->detalhe->desc_risco;
                $score->save();
            }

            toastr()->success("Análise feita com sucesso!", "Sucesso");
            return redirect()->back();
        }else{
            toastr()->error($response->body(), "Erro");
            return redirect()->back();
        }
    }

    public function exportar_analise_credito(CreditoAnalise $analise){
        $data = ["analise" => $analise];
        $pdf = PDF::loadView('painel.clientes.relatorios.credito', $data);
        return $pdf->stream();
        // $pdf->save(public_path() . "/comprovantes/".$venda->id.".pdf");
    }

    public function aprovacao(Cliente $cliente, $aprovacao){
        if($aprovacao == "reprovado"){
            $cliente->aprovado = -1;
            toastr()->success("Cliente reprovado!");
        }else{
            $cliente->aprovado = 1;
            toastr()->success("Cliente aprovado!");
        }
        $cliente->save();
        
        return redirect()->back();
    }

    public function finalizar(Cliente $cliente){
        $cliente->finalizado = true;
        $cliente->save();
        return redirect()->back();
    }

    public function pre_to_main(){
        $clientes = Cliente::all();
        foreach($clientes as $cliente){
            if(is_numeric($cliente->cidade)){
                $cidade = Cidade::find($cliente->cidade);
                if($cidade){
                    $cliente->cidade = $cidade->nome;
                }
            }
            if(is_numeric($cliente->estado)){
                $estado = Estado::find($cliente->estado);
                if($estado){
                    $cliente->estado = $estado->uf;
                }
            }
            $cliente->save();
        }
    }
}
