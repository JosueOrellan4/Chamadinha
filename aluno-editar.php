<?php
echo '<h1>ALuno Editar</h1>';

var_dump($_POST);

$editarId = $_POST['id'];
$editarNome = $_POST['Nome'];

$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);


$update = 'UPDATE tb_alunos SET nome = :nome WHERE id = :id'; /*script*/ 


$banco->prepare($update)->execute([
    ':id'  => $editarId,
    ':nome' => $editarNome
]);


$editarTel = $_POST['tel'];
$editarEmail = $_POST['email'];
$editarIdaluno = $_POST['id_aluno'];

$update2 = 'UPDATE tb_info_alunos SET tel = :tel, email = :email WHERE id_alunos = :id_alunos';

$banco->prepare($update2)->execute([
    ':tel' => $editarTel,
    ':email' => $editarEmail,
    ':id_alunos' => $editarIdaluno
]);
