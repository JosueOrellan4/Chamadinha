<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php

echo 'olá';

$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1'; /*adaptar para nossa realidade quando fazer a conexão*/
$user = 'root';
$password = '';


$banco = new PDO($dsn, $user, $password);

$select = 'SELECT * FROM tb_alunos';

$resultado = $banco->query($select)->fetchAll();

/* echo '<pre>';
var_dump($resultado);/*imprimi todas as informações do banco*/
?>
<main class="container my-5">
    <table class="table table-dark table-striped"> 
        <tr>
            <td>id</td>
            <td>nome</td>
            <td>Ações</td>
        </tr>
        <?php foreach ($resultado as $linha) { ?> 
            <tr>
                <td> <?= $linha['id'] ?> </td>
                <td> <?php echo $linha['nome'] ?> </td>
                <td>
                    <a href="./ficha.php?id_aluno<?= $linha['id'] ?>" class="btn btn-primary" href="#" role="button">Abrir</a>
                    <a href="#" class="btn btn-warning" href="#" role="button">Editar</a>
                    <a href="#" class="btn btn-danger" href="#" role="button">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>