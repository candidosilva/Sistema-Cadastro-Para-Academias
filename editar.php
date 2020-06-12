<?php
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');
if($id) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {

        $info = $sql->fetch(PDO::FETCH_ASSOC);

    } else {
        header("Location: lista.php");
    exit;
    }

} else {
    header("Location: lista.php");
    exit;
}

?>

<html>
<head>
    <meta charset="UTF-8"/>
    <title>GYM</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>  
</head>
<body>
<main>
    <div class="fundo">
        <div class="cadastro">
            <div class="titulo">
                <h1>Editar Usuário</h1>
            </div>
            <form method="POST" class="formulario" action="editar_action.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$info['id'];?>" /> 
                <div class="foto">
                    <img src="arquivos/<?=$info['foto'];?>">    
                </div>
                <div class="input-wrapper">
                    <label for="input-file">
                        Selecionar Arquivo
                    </label>
                    <input type="file" name="foto" id="input-file" />
                    <span id="file-name"></span>
                </div>
                <div class="nome">
                    <input type="text" name="nome" class="input-field" value="<?=$info['nome'];?>"  >
                    <input type="text" name="sobrenome" class="input-field" value="<?=$info['sobrenome'];?>" >
                    <input type="text" name="cpf" class="input-field" value="<?=$info['cpf'];?>" >
                    <input type="date" name="data" value="<?=$info['data'];?>">
                </div>
                <div class="emailtel">
                    <input type="email" name="email" class="input-field" value="<?=$info['email'];?>">
                    <input type="text" name="ddd" class="input-field" value="<?=$info['ddd'];?>">
                    <input type="text" name="telefone" class="input-field" value="<?=$info['telefone'];?>">
                </div>
                <div class="local">
                    <input type="text" name="rua" class="input-field" value="<?=$info['rua'];?>">
                    <input type="text" name="numero" class="input-field" value="<?=$info['numero'];?>">
                    <input type="text" name="bairro" class="input-field" value="<?=$info['bairro'];?>">
                </div>
                <div class="local-g">
                    <input type="text" name="cidade" class="input-field" value="<?=$info['cidade'];?>">
                    <input type="" name="estado" class="input-field" value="<?=$info['estado'];?>">
                </div>
                <button type="submit" class="submit-btn">Salvar</button>

            </form>
        </div>
    </div>
<footer>
creditos
<a href="https://www.freepik.com/free-photos-vectors/sport">Sport photo created by freepik - www.freepik.com</a>
</footer>
</main>
</body>
<script type="text/javascript" src="script.js"></script>
</html>