<?php

namespace App\Services;

class ClienteService
{

    public function sendRdstation($cliente){
        $rdStation = new \RDStation\RDStation($cliente->email);
        $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
        $rdStation->setLeadData('name', $cliente->nome_dono);
        $rdStation->setLeadData('identifier', 'cadastro');
        $rdStation->setLeadData('telefone', $cliente->telefone);
        $rdStation->setLeadData('rg', $cliente->rg);
        $rdStation->setLeadData('cpf', $cliente->cpf);
        $rdStation->setLeadData('nascimento', $cliente->nascimento);
        $rdStation->setLeadData('estado_civil', config("clientes.estados_civis.$cliente->estado_civil") ?? '');
        $rdStation->sendLead();
    }
}
