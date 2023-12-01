<?php

namespace App\Http\Livewire\Institucional\CadastroNovo;

use Livewire\Component;
use Livewire\WithFileUploads;

class Pagina extends Component
{
    use WithFileUploads;
    public $form = [];
    public $confirmar_senha;
    public $comprovante_residencial;
    public $contrato_social;
    public $documento;
    public $ficha_sanitaria;
    public $matricula_imovel;

    protected $rules = [
        'form.nome_dono' => 'required|max:100',
        'form.email' => 'required|email|max:100|unique:clientes,email',
        'form.telefone' => 'required|max:20',
        'form.senha' => 'required|same:confirmar_senha',
        'confirmar_senha' => 'required|same:form.senha',
        'form.rg' => 'max:20',
        'form.cpf' => 'cpf',
        'form.cep' => 'max:20',
        'form.rua' => 'max:100',
        'form.bairro' => 'max:50',
        'form.cidade' => 'max:50',
        'form.uf' => 'max:2',
        'form.pais' => 'max:50',
        'form.nascimento' => 'date',

        'form.cep_propriedade' => 'max:20',
        'form.rua_propriedade' => 'max:100',
        'form.bairro_propriedade' => 'max:50',
        'form.cidade_propriedade' => 'max:50',
        'form.uf_propriedade' => 'max:2',
        'form.pais_propriedade' => 'max:50',

        'form.cnpj' => 'max:20',
        'form.nome_fantasia' => 'max:100',
        'form.cep_comercial' => 'max:20',
        'form.rua_comercial' => 'max:100',
        'form.bairro_comercial' => 'max:50',
        'form.cidade_comercial' => 'max:50',
        'form.uf_comercial' => 'max:2',
        'form.pais_comercial' => 'max:50',

        'comprovante_residencial' => 'nullable|file|mimes:pdf,doc,docx|max:3048',
        'contrato_social' => 'nullable|file|mimes:pdf,doc,docx|max:3048',
        'documento' => 'nullable|file|mimes:pdf,doc,docx|max:3048',
        'ficha_sanitaria' => 'nullable|file|mimes:pdf,doc,docx|max:3048',
        'matricula_imovel' => 'nullable|file|mimes:pdf,doc,docx|max:3048',
    ];

    protected $validationAttributes = [
        'form.nome_dono' => 'Nome Completo',
        'form.email' => 'E-mail',
        'form.telefone' => 'Telefone',
        'form.senha' => 'Senha',
        'confirmar_senha' => 'Confirmar Senha',
        'form.rg' => 'RG',
        'form.cpf' => 'CPF',
        'form.cep' => 'CEP',
        'form.rua' => 'Rua',
        'form.bairro' => 'Bairro',
        'form.cidade' => 'Cidade',
        'form.uf' => 'Estado',
        'form.pais' => 'País',
        'form.nascimento' => 'Nascimento',

        'form.cep_propriedade' => 'CEP',
        'form.rua_propriedade' => 'Rua',
        'form.bairro_propriedade' => 'Bairro',
        'form.cidade_propriedade' => 'Cidade',
        'form.uf_propriedade' => 'Estado',
        'form.pais_propriedade' => 'País',
        'form.nascimento_propriedade' => 'Nascimento',

        'form.cnpj' => 'CNPJ',
        'form.nome_fantasia' => 'Nome Fantasia',
        'form.cep_comercial' => 'CEP',
        'form.rua_comercial' => 'Rua',
        'form.bairro_comercial' => 'Bairro',
        'form.cidade_comercial' => 'Cidade',
        'form.uf_comercial' => 'Estado',
        'form.pais_comercial' => 'País',
        'form.nascimento_comercial' => 'Nascimento',
    
        'comprovante_residencial' => 'Comprovante Residencial',
        'contrato_social' => 'Contrato Social',
        'documento' => 'Documento',
        'ficha_sanitaria' => 'Ficha Sanitária',
        'matricula_imovel' => 'Matrícula do Imóvel',
    ];

    public function salvar(){
        $this->validate();
        toastr()->success("Cadastrado com sucesso!");
    }

    public function updated($propertyName){
        if($propertyName == 'comprovante_residencial' || $propertyName == 'contrato_social' || $propertyName == 'documento' || $propertyName == 'ficha_sanitaria' || $propertyName == 'matricula_imovel'){
            $validate = $this->validateOnly($propertyName);
        }
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
        $this->form['tipo_pessoa'] = 0;
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
