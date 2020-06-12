<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
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


$lista = [];
if($name && $cpf) {

    if($foto[size]>0){
    $nomedoarquivo = md5(time().rand(0,99)).'.png';
        move_uploaded_file($foto['tmp_name'], 'arquivos/'.$nomedoarquivo);


        $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, cpf = :cpf, data = :data, email = :email, ddd = :ddd, telefone = :telefone, rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado, foto = :foto WHERE id = :id");
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
        $sql->bindValue(':id', $id);
        $sql->bindValue(':foto', $nomedoarquivo);
        $sql->execute();

        header("Location: lista.php");
        exit;

    } else {
        $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, cpf = :cpf, data = :data, email = :email, ddd = :ddd, telefone = :telefone, rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado WHERE id = :id");
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
        $sql->bindValue(':id', $id);
        $sql->execute();

        header("Location: lista.php");
        exit;
    }
    
} else {
    header("Location: editar.php");
    exit;
}