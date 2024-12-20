<?php

    return [
        "checklists" => [
            // ETAPA 1
            0 => [
                "nome_propriedade" => "NOME DA PROPRIEDADE",
                "cpf" => "CPF",
                "rg" => "RG",
                "cnpj" => "CNPJ",
                "inscricao_estadual" => "INSCRIÇÃO ESTADUAL",
                "endereco_residencial" => "ENDEREÇO RESIDENCIAL",
                "endereco_propriedade" => "ENDEREÇO PROPRIEDADE",
                "declaracao_imposto" => "DECLARAÇÃO IMPOSTO DE RENDA",
                "selfie" => "SELFIE COM DOCUMENTO",
                "referencia_bancaria" => "REFERENCIA BANCARIA",
                "referencia_comercial" => "REFERENCIA COMRCIAL"
            ],

            // ETAPA 2
            1 => [
                "processo_judicial" => "PROCESSO JUDICIAL",
                "referencia_comercial_analise" => "REFERENCIA COMERCIAL",
            ]
        ],
        "etapa_cadastro" => [
            0 => "Antigo",
            1 => "Pré-Cadastro",
            2 => "Dados Pessoais",
            3 => "Dados de Propriedade",
            4 => "Informações Complementares",
            5 => "Selfie"
        ],
        "estados_civis" => [
            0 => "Solteiro(a)",
            1 => "Divorciado(a)",
            2 => "Viuvo(a)",
            3 => "Casado(a)",
            4 => "União Estável",
        ],
        "estados_civis_nomes" => [
            "Solteiro(a)" => 0,
            "Divorciado(a)" => 1,
            "Viuvo(a)" => 2,
            "Casado(a)" => 3,
            "União Estável" => 4
        ],
        "tipos_documento" => [
            0 => "Comprovante de Residência",
            1 => "Contrato Social",
            2 => "Documento",
            3 => "Ficha Sanitária",
            4 => "Matricula do Imóvel"
        ],
        "aprovacao" => [
            "status" => [
                0 => "Pendente",
                1 => "Aprovado",
                -1 => "Reprovado"
            ],
            "cor" => [
                0 => "bg-yellow-600",
                1 => "bg-emerald-400",
                -1 => "bg-red-600"
            ]
        ]
    ]

?>