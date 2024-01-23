<?php

namespace App\Http\Livewire\Institucional\CadastroNovo;

use App\Classes\Agrisk\Apiary\ApiaryClient;
use Illuminate\Validation\ValidationException;
use App\Facades\AgriskFacade;
use App\Facades\Viacep;
use App\Models\ClienteDocumento;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Cliente;
use App\Services\ClienteService;
use App\Classes\Agrisk\Apiary\ApiaryError;
class Pagina extends Component
{
    use WithFileUploads;
    public $form = [];
    public $confirmar_senha;
    public $comprovante_residencial;
    public $comprovantes_residenciais = [];
    public $contrato_social;
    public $contratos_sociais = [];
    public $documento;
    public $documentos = [];
    public $ficha_sanitaria;
    public $fichas_sanitarias = [];
    public $matricula_imovel;
    public $matriculas_imoveis = [];

    protected $rules = [
        'form.nome_dono' => 'required|max:100',
        'form.email' => 'required|email|max:100|unique:clientes,email',
        'form.telefone' => 'required|max:20',
        'form.senha' => 'required|same:confirmar_senha',
        'confirmar_senha' => 'required|same:form.senha',
        'form.rg' => 'max:20',
        'form.estado_civil' => '',
        'form.cpf' => 'cpf',
        'form.cep' => 'max:20',
        'form.rua' => 'max:100',
        'form.bairro' => 'max:50',
        'form.cidade' => 'max:50',
        'form.estado' => 'max:2',
        'form.pais' => 'max:50',
        'form.nascimento' => 'date',

        'form.cep_propriedade' => 'max:20',
        'form.rua_propriedade' => 'max:100',
        'form.bairro_propriedade' => 'max:50',
        'form.cidade_propriedade' => 'max:50',
        'form.estado_propriedade' => 'max:2',
        'form.pais_propriedade' => 'max:50',

        'form.cnpj' => 'max:20',
        'form.nome_fantasia' => 'max:100',
        'form.cep_comercial' => 'max:20',
        'form.rua_comercial' => 'max:100',
        'form.bairro_comercial' => 'max:50',
        'form.cidade_comercial' => 'max:50',
        'form.estado_comercial' => 'max:2',
        'form.pais_comercial' => 'max:50',

        'form.agriskId' => 'nullable',
        'form.agriskTaxId' => 'nullable',

        'comprovante_residencial.*' => 'nullable|file|max:3048',
        'contrato_social.*' => 'nullable|file|max:3048',
        'documento.*' => 'nullable|file|max:3048',
        'ficha_sanitaria.*' => 'nullable|file|max:3048',
        'matricula_imovel.*' => 'nullable|file|max:3048',
    ];

    protected $validationAttributes = [
        'form.nome_dono' => 'Nome Completo',
        'form.email' => 'E-mail',
        'form.telefone' => 'Telefone',
        'form.senha' => 'Senha',
        'confirmar_senha' => 'Confirmar Senha',
        'form.rg' => 'RG',
        'form.estado_civil' => 'Estado Civil',
        'form.cpf' => 'CPF',
        'form.cep' => 'CEP',
        'form.rua' => 'Rua',
        'form.bairro' => 'Bairro',
        'form.cidade' => 'Cidade',
        'form.estado' => 'Estado',
        'form.pais' => 'País',
        'form.nascimento' => 'Nascimento',

        'form.cep_propriedade' => 'CEP',
        'form.rua_propriedade' => 'Rua',
        'form.bairro_propriedade' => 'Bairro',
        'form.cidade_propriedade' => 'Cidade',
        'form.estado_propriedade' => 'Estado',
        'form.pais_propriedade' => 'País',
        'form.nascimento_propriedade' => 'Nascimento',

        'form.cnpj' => 'CNPJ',
        'form.nome_fantasia' => 'Nome Fantasia',
        'form.cep_comercial' => 'CEP',
        'form.rua_comercial' => 'Rua',
        'form.bairro_comercial' => 'Bairro',
        'form.cidade_comercial' => 'Cidade',
        'form.estado_comercial' => 'Estado',
        'form.pais_comercial' => 'País',
        'form.nascimento_comercial' => 'Nascimento',
    
        'comprovante_residencial' => 'Comprovante de Endereço',
        'contrato_social' => 'Contrato Social',
        'documento' => 'Documento',
        'ficha_sanitaria' => 'Ficha Sanitária',
        'matricula_imovel' => 'Matrícula do Imóvel',
    ];

    private function getPluralAttribute($attribute){
        switch($attribute){
            case('comprovante_residencial'):
                return 'comprovantes_residenciais';
            case('contrato_social'):
                return 'contratos_sociais';
            case('documento'):
                return 'documentos';
            case('ficha_sanitaria'):
                return 'fichas_sanitarias';
            case('matricula_imovel'):
                return 'matriculas_imoveis';
            default:
                return $attribute;
        }
    }

    public function salvar(){
        $this->validate();
<<<<<<< HEAD
	if(isset($this->form['estado_civil']) && !empty($this->form['estado_civil'])){
		$this->form['estado_civil'] = config('clientes.estados_civis_nomes')[$this->form['estado_civil']];
	}
=======
        if(isset($this->form['estado_civil'])){
            $this->form['estado_civil'] = config("clientes.estados_civis_nomes")[$this->form['estado_civil']];
        }
        
        $this->createAgriskClient();

>>>>>>> 99d3ccf8f74b5cb44fe975d69ede570a0898979c
        $cliente = Cliente::create($this->form);
        $clienteService = new ClienteService();
        foreach($this->documentos as $documento){
            if(!empty($documento)){
                $anexo = new ClienteDocumento;
                $anexo->cliente_id = $cliente->id;
                $anexo->tipo = 2;
                $anexo->caminho = $documento->store('uploads', 'local');
                $anexo->save();
            }
        }
        foreach($this->comprovantes_residenciais as $comprovante){
            if(!empty($comprovante)){
                $anexo = new ClienteDocumento;
                $anexo->cliente_id = $cliente->id;
                $anexo->tipo = 0;
                $anexo->caminho = $comprovante->store('uploads', 'local');
                $anexo->save();
            }
        }
        foreach($this->contratos_sociais as $contrato){
            if(!empty($contrato)){
                $anexo = new ClienteDocumento;
                $anexo->cliente_id = $cliente->id;
                $anexo->tipo = 1;
                $anexo->caminho = $contrato->store('uploads', 'local');
                $anexo->save();
            }
        }
        foreach($this->fichas_sanitarias as $ficha){
            if(!empty($ficha)){
                $anexo = new ClienteDocumento;
                $anexo->cliente_id = $cliente->id;
                $anexo->tipo = 3;
                $anexo->caminho = $ficha->store('uploads', 'local');
                $anexo->save();
            }
        }
        foreach($this->matriculas_imoveis as $matricula){
            if(!empty($matricula)){
                $anexo = new ClienteDocumento;
                $anexo->cliente_id = $cliente->id;
                $anexo->tipo = 4;
                $anexo->caminho = $matricula->store('uploads', 'local');
                $anexo->save();
            }
        }
        if(env('APP_ENV') != 'local'){
            $clienteService->sendRdstation($cliente);
        }
        session()->put(["cliente" => $cliente]);
        if($cliente->agriskId){
            return redirect()->route('cadastro.termos');
        }else{
            return redirect()->route('index');
        }
    }

    public function createAgriskClient(){
        if(!$this->form['cpf'] || !$this->form['nascimento']){
            return true;
        }
        $response = AgriskFacade::createClient(\Util::limparString($this->form['cpf']), date("d/m/Y", strtotime($this->form['nascimento'])));
        if($response instanceof ApiaryError){
            throw ValidationException::withMessages([
                'form.cpf' => implode(',', $response->getArrayMessages())
            ]);
        }else{
            $agriskClient = AgriskFacade::clientDetail($response->id);
            if($agriskClient instanceof ApiaryError){
                throw ValidationException::withMessages([
                    'form.cpf' => implode(',', $agriskClient->getArrayMessages())
                ]);
            }else{
                $response = AgriskFacade::createTerms($agriskClient);
                if($response instanceof ApiaryError){
                    throw ValidationException::withMessages([
                        'form.cpf' => implode(',', $response->getArrayMessages())
                    ]);
                }else{
                    $this->form['agriskId'] = $agriskClient->id;
                    $this->form['agriskTaxId'] = $this->form['cpf'];
                    $this->form['agriskTermosToken'] = AgriskFacade::getTermsAuthorizationToken($response->url);
                }
            }
        }
        return true;
    }

    public function updated($propertyName, $value){
        if($propertyName == 'comprovante_residencial' || $propertyName == 'contrato_social' || $propertyName == 'documento' || $propertyName == 'ficha_sanitaria' || $propertyName == 'matricula_imovel'){
            $this->validateOnly($propertyName);
            $variavel = $this->getPluralAttribute($propertyName);
            foreach($this->$propertyName as $file){
                if(!empty($file)){
                    array_push($this->$variavel, $file);
                }
            }
            $this->$propertyName = null;
        }

        if($propertyName == 'form.cep' || $propertyName == 'form.cep_propriedade' || $propertyName == 'form.cep_comercial'){
            $sufix = str_replace('form.cep', '', $propertyName);
            $data = Viacep::getData($value);
            if($data !== false){
                $this->form['estado'.$sufix] = $data['uf'] ?? '';
                $this->form['cidade'.$sufix] = $data['localidade'] ?? '';
                $this->form['bairro'.$sufix] = $data['bairro'] ?? '';
                $this->form['rua'.$sufix] = $data['logradouro'] ?? '';
                $this->form['pais'.$sufix] = 'Brasil';
            }
        }

        if($propertyName == 'form.estado_civil'){
            if(empty($value) || $value < 3){
                $this->form["nome_conjugue"] = "";
                $this->form["cpf_conjugue"] = "";
            }
        }
    }

    public function removerUpload($variavel, $key){
        unset($this->$variavel[$key]);
        $this->emit('$refresh');
    }

    public function clearIncorrectFiles(){
        if(!empty($this->getErrorBag()->messages())){
            foreach($this->getErrorBag()->messages() as $propertyName => $errors){
                if($propertyName == 'comprovante_residencial' || $propertyName == 'contrato_social' || $propertyName == 'documento' || $propertyName == 'ficha_sanitaria' || $propertyName == 'matricula_imovel'){
                    $this->$propertyName = null;
                }
            }
        }
    }

    public function checkFirstError(){
        if(!empty($this->getErrorBag()->messages())){
            $field = array_keys($this->getErrorBag()->messages())[0];
            $this->dispatchBrowserEvent('scrollToError', ['model' => $field]);
        }
    }

    public function mount(){
        $this->form['pessoa_fisica'] = 1;
    }
    public function render()
    {
        $this->dispatchBrowserEvent('loadMasks');
        $this->clearIncorrectFiles();
        $this->checkFirstError();
        $json = file_get_contents("json/mascaras_telefone.json");
        $paises = json_decode($json);
        return view('livewire.institucional.cadastro-novo.pagina', ['paises' => $paises])->layout('layouts.login');
    }
}
