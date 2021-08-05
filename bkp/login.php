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

if(isset($_POST["email"])){
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $stmt = $pdo->prepare('SELECT * FROM clientes_pre WHERE email = :email AND senha = :senha');
        $stmt->execute(array(
            ':email' => $_POST["email"],
            ':senha' => $_POST["senha"],
        ));
        if($stmt->rowCount()){
            print_r(json_encode($stmt->fetch(PDO::FETCH_ASSOC)));
        }else{
            echo 'Erro';
        }
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
    
};


?>