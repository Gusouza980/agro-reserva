<?php

return [
    'usuarios' => [
        "consulta" => [0],
        "cadastro" => [0],
    ],
    'clientes' => [
        "consulta" => [0, 1, 2, 4],
        "cadastro" => [0, 4],
        "consulta_completa" => [0,4],
        "visualizar" => [0, 4],
        "visualizar_comercial" => [0, 1],
    ],
    'marketplaces' => [
        "consulta" => [0],
    ],
    'fazendas' => [
        "consulta" => [0, 3, 4],
        "cadastro" => [0, 3, 4],
    ],
    'reservas' => [
        "consulta" => [0, 1, 3, 4],
        "cadastro" => [0, 1, 3, 4],
    ],
    'noticias' => [
        "consulta" => [0, 2, 3],
        "cadastro" => [0, 2, 3],
    ],
    'racas' => [
        "consulta" => [0, 3],
        "cadastro" => [0, 3],
    ],
    'assessores' => [
        "consulta" => [0],
        "cadastro" => [0],
    ],
    'visitas' => [
        "consulta" => [0, 1, 2, 4],
    ],
    'vendas' => [
        "consulta" => [0, 1, 2, 4],
        "cadastro" => [0, 1, 4],
        "visualizar" => [0, 1, 4],
    ],
    'carrinhos' => [
        "consulta" => [0, 1, 2, 4],
    ],
    'popups' => [
        "consulta" => [0, 2, 3],
        "cadastro" => [0, 2, 3]
    ],
    'live' => [
        "consulta" => [0, 2, 3],
        "cadastro" => [0, 2, 3]
    ],
    'banners' => [
        "consulta" => [0, 2, 3],
        "cadastro" => [0, 2, 3]
    ],
    'seo' => [
        "consulta" => [0, 2],
        "cadastro" => [0, 2]
    ],
    'tasks' => [
        "consulta" => [0, 1, 2, 3, 4],
    ],
    'niveis' => [
        0 => "Admin",
        1 => "Comercial",
        2 => "Digital",
        3 => "Criação",
        4 => "Jurídico"
    ],
];

?>