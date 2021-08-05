<?php
// CONECTANDO AO BANCO

// $user = 'root';
// $pass = '';
// $host = 'localhost';
// $dbname = 'agroreserva';


// $host = '127.0.0.1';
// $port = 3306;
// $user = 'agroreserva';
// $pass = 'AgroAdmin123@';
// $dbname = 'agrolanding';

$host = '3.21.152.40';
$port = 3306;
$user = 'agroreservabd';
$pass = 'AgroAdmin123@';
$dbname = 'agroreserva';

if(isset($_POST["nome"])){
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $stmt = $pdo->prepare('INSERT INTO clientes_pre (nome_dono, email, whatsapp, interesses, nome_fazenda, senha, racas) VALUES(:nome, :email, :whatsapp, :interesse, :fazenda, :senha, :racas)');
        $stmt->execute(array(
            ':nome' => $_POST["nome"],
            ':email' => $_POST["email"],
            ':whatsapp' => $_POST["whatsapp"],
            ':interesse' => $_POST["interesse"],
            ':fazenda' => $_POST["fazenda"],
            ':senha' => $_POST["senha"],
            ':racas' => implode (", ", $_POST["racas"]),
        ));
        if($stmt->rowCount()){
            echo 'Sucesso';
        }else{
            echo 'Erro';
            $arr = $stmt->errorInfo();
            print_r($arr);
        }
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
    
};


?>