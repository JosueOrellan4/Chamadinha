<?php echo '<h1>Cadastro de Aluno</h1>';

var_dump(
    $_POST
);

$nomeFormulario = $_POST['Nome'];
$telefoneFormulario=$_POST['tel'];
$emailFormulario=$_POST['email'];
$nascimentoFormulario=$_POST['nascimento'];


$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO tb_alunos (nome) VALUES (:nome)'; /*script*/ 

$insert2 = 'INSERT INTO tb_info_alunos(telefone, email, nascimento) VALUES (:telefone, :email, :nascimento';

$box = $banco->prepare($insert);
$box2 = $banco->prepare($insert2);

$box->execute([
    ':nome'=> $nomeFormulario/*script executado*/ 
    

]);

$box2->execute([
    ':telefone'=>$telefoneFormulario,
    ':email'=>$emailFormulario,
    ':nascimento'=>$nascimentoFormulario
]);

$id_aluno = $banco->lastInsertId();

echo $id_aluno;