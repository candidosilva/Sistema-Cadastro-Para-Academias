<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$cpf = filter_input(INPUT_POST, 'cpf');
$data = filter_input(INPUT_POST, 'data');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$ddd = filter_input(INPUT_POST, 'ddd');
$telefone = filter_input(INPUT_POST, 'telefone');
$rua = filter_input(INPUT_POST, 'rua');
$numero = filter_input(INPUT_POST, 'numero');
$bairro = filter_input(INPUT_POST, 'bairro');
$cidade = filter_input(INPUT_POST, 'cidade');
$estado = filter_input(INPUT_POST, 'estado');
$foto = $_FILES['foto'];



if($name && $cpf) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE cpf = :cpf");
    $sql->bindValue(':cpf', $cpf);
    $sql->execute();

    if($sql->rowCount() === 0) {

        $nomedoarquivo = md5(time().rand(0,99)).'.png';
        move_uploaded_file($foto['tmp_name'], 'arquivos/'.$nomedoarquivo);

      
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, sobrenome, cpf, data, email, ddd, telefone, rua, numero, bairro, cidade, estado, foto ) VALUES (:nome, :sobrenome, :cpf, :data, :email, :ddd, :telefone, :rua, :numero, :bairro, :cidade, :estado, :foto)");
        $sql->bindValue(':nome', $name);
        $sql->bindValue(':sobrenome', $sobrenome);
        $sql->bindValue(':cpf', $cpf);
        $sql->bindValue(':data', $data);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':ddd', $ddd);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':rua', $rua);
        $sql->bindValue(':numero', $numero);
        $sql->bindValue(':bairro', $bairro);
        $sql->bindValue(':cidade', $cidade);
        $sql->bindValue(':estado', $estado);
        $sql->bindValue(':foto', $nomedoarquivo);
        $sql->execute();

        header("Location: index.html");
        exit;
    } else { 
        header("Location: jaexiste.html");
    }
}