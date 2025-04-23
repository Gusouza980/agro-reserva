<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientesExport implements FromArray, WithHeadings
{
    public $tipo;

    public function __construct($tipo)
    {
        $this->tipo = $tipo;
    }

    public function array(): array
    {
        switch($this->tipo){
            case "todos":
                $clientes = Cliente::all()->toArray();
                return $this->processarDados($clientes);
            case "aprovados":
                $clientes = Cliente::where("aprovado", 1)->get()->toArray();
                return $this->processarDados($clientes);
            case "reprovados":
                $clientes = Cliente::where("aprovado", -1)->get()->toArray();
                return $this->processarDados($clientes);
            case "em_analise":
                $clientes = Cliente::where("aprovado", 0)->get()->toArray();
                return $this->processarDados($clientes);
            case "finalizados":
                $clientes = Cliente::where("finalizado", 1)->get()->toArray();
                return $this->processarDados($clientes);
            case "nao_finalizados":
                $clientes = Cliente::where("finalizado", 0)->get()->toArray();
                return $this->processarDados($clientes);
            default:
                return [];
        }
    }

    private function processarDados(array $clientes)
    {
        $clientes = array_map(function($cliente){
            return [
                'Nome' => $cliente['nome_dono'],
                'E-mail' => $cliente['email'],
                'Telefone' => $cliente['telefone'] ?? $cliente['whatsapp'],
                'Documento' => $cliente['cpf'] ?? $cliente['cnpj'] ?? 'Não Informado',
                'Tipo' => $cliente['pessoa_fisica'] ? "Pessoa Física" : "Pessoa Jurídica",
                'Estado' => $cliente['estado'] ?? 'Não Informado',
                'Cidade' => $cliente['cidade'] ?? 'Não Informado',
                'CEP' => $cliente['cep'] ?? 'Não Informado',
                'Aprovação' => $cliente['aprovado'] == 0 ? "Em Análise" : ($cliente['aprovado'] == -1 ? "Reprovado" : "Aprovado"),
                'Cadastro Finalizado ?' => $cliente['finalizado'] ? "Sim" : "Não",
                'Data de Cadastro' => date('d/m/Y H:i:s', strtotime($cliente['created_at'])),
            ];
        }, $clientes);

        return $clientes;
    }

    public function headings(): array
    {
        return [
            'Nome',
            'E-mail',
            'Telefone',
            'Documento',
            'Tipo',
            'Estado',
            'Cidade',
            'CEP',
            'Aprovação',
            'Cadastro Finalizado ?',
            'Data de Cadastro',
        ];
    }
}
