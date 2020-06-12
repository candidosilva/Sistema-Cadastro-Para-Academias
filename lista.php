<?php
require 'config.php';

?>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
</head>

<?php

$lista=[];
$sql = $pdo->query("SELECT * FROM usuarios");
$lista = $sql->fetchAll(PDO::FETCH_ASSOC);

?>


<div class = "fundo">
<div class="pg-lista">
    <h1>Lista Usuários Cadastrados</h1>
</div>
    <div class="table">
        <table class="table-content">
            <thead>
                <tr>
                    <td>FOTO</td>
                    <td>NOME</td>
                    <td>SOBRENOME</td>
                    <td>CPF</td>
                    <td>DATA DE NASCIMENTO</td>
                    <td>E-MAIL</td>
                    <td>DDD</td>
                    <td>TELEFONE</td>
                    <td>RUA</td>
                    <td>NUMERO</td>
                    <td>BAIRRO</td>
                    <td>CIDADE</td>
                    <td>ESTADO</td>
                    <td>EDITAR</td>
                    <td>EXCLUIR</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($lista as $usuario): ?>
                <tr>   
                    <td><img class="foto-lista" src="arquivos/<?=$usuario['foto']; ?>"></td>   
                    <td><?=$usuario['nome'];?></td>   
                    <td><?=$usuario['sobrenome'];?></td>   
                    <td><?=$usuario['cpf'];?></td>   
                    <td><?=$usuario['data'];?></td>   
                    <td><?=$usuario['email'];?></td>   
                    <td><?=$usuario['ddd'];?></td>   
                    <td><?=$usuario['telefone'];?></td>   
                    <td><?=$usuario['rua'];?></td>   
                    <td><?=$usuario['numero'];?></td>   
                    <td><?=$usuario['bairro'];?></td>   
                    <td><?=$usuario['cidade'];?></td>   
                    <td><?=$usuario['estado'];?></td> 
                    <td><a href="editar.php?id=<?=$usuario['id'];?>">Editar</a></td>
                    <td><a href="excluir.php?id=<?=$usuario['id'];?>" onclick="return confirm('Tem Certeza ?')">Excluir</a></td>
                </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div>
    <a href="index.html" class="voltar-btn"> Voltar </a>
</div>