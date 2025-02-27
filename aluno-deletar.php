<?php

echo '<h1>Aluno-deletar.php</h1>';

$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);



//var_dump($_GET); para exibir as informações na tela


$idFormulario = $_GET['id'];
// apagando informações da tb_alunos
$delete = 'DELETE FROM tb_alunos WHERE id = :id';
$box = $banco->prepare($delete);
$box->execute([
    ':id'=> $idFormulario
]);

// apagando informações da tb_info_alunos
$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos'; //pode colocar qualquer nome mas por boa pratica colocamos igual
$box = $banco->prepare($delete);
$box->execute([
    ':id_alunos'=> $idFormulario //precisa ser igual ao de cima
]);
// var_dump($box); para exibir as informações na tela

// twig 
echo '<script>
alert("Usuario Apagado com Sucesso!!!")
window.location.replace("index.php")
</script>';
// header('location:index.php');


