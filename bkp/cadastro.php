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

if(isset($_POST["nome_completo"])){
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $stmt = $pdo->prepare("UPDATE clientes_pre SET nome_dono = ?, rg = ?, nascimento = ?, documento = ?, 
        estado_civil = ?, inscricicao_produtor_rural = ?, cep = ?, rua = ?, numero = ?, complemento = ?, 
        cidade = ?, estado = ?, referencia_bancaria_banco = ?, referencia_bancaria_gerente = ?, 
        referencia_bancaria_tel = ?, referencia_comercial1 = ?, referencia_comercial1_tel = ?, referencia_comercial2 = ?, 
        referencia_comercial2_tel = ?, referencia_comercial3 = ?, referencia_comercial3_tel = ?, referencia_coorporativa1 = ?, 
        referencia_coorporativa1_tel = ?, referencia_coorporativa2 = ?, referencia_coorporativa2_tel = ? WHERE email = ?");

        $stmt->bindParam(1, $_POST['nome_completo']);
        $stmt->bindParam(2, $_POST['rg']);
        $stmt->bindParam(3, $_POST['nascimento']);
        $stmt->bindParam(4, $_POST['documento']);
        $stmt->bindParam(5, $_POST['estado_civil']);
        $stmt->bindParam(6, $_POST['inscricao_produtor_rural']);
        $stmt->bindParam(7, $_POST['cep']);
        $stmt->bindParam(8, $_POST['endereco']);
        $stmt->bindParam(9, $_POST['numero']);
        $stmt->bindParam(10, $_POST['complemento']);
        $stmt->bindParam(11, $_POST['cidade']);
        $stmt->bindParam(12, $_POST['estado']);
        $stmt->bindParam(13, $_POST['referencia_bancaria_banco']);
        $stmt->bindParam(14, $_POST['referencia_bancaria_gerente']);
        $stmt->bindParam(15, $_POST['referencia_bancaria_tel']);
        $stmt->bindParam(16, $_POST['referencia_comercial1']);
        $stmt->bindParam(17, $_POST['referencia_comercial1_tel']);
        $stmt->bindParam(18, $_POST['referencia_comercial2']);
        $stmt->bindParam(19, $_POST['referencia_comercial2_tel']);
        $stmt->bindParam(20, $_POST['referencia_comercial3']);
        $stmt->bindParam(21, $_POST['referencia_comercial3_tel']);
        $stmt->bindParam(22, $_POST['referencia_coorporativa1']);
        $stmt->bindParam(23, $_POST['referencia_coorporativa1_tel']);
        $stmt->bindParam(24, $_POST['referencia_coorporativa2']);
        $stmt->bindParam(25, $_POST['referencia_coorporativa2_tel']);
        $stmt->bindParam(26, $_POST['email']);
        $stmt->execute();
        echo "Sucesso";
    }catch(PDOException $e) {
        echo 'Deu ruim';
        echo $e->getMessage();
    }
    
};


?>