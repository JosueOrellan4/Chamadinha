<?php echo '<h1>Cadastro de Aluno</h1>';

var_dump(
    $_POST
);

$nomeFormulario = $_POST['Nome'];



$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO tb_alunos (nome) VALUES (:nome)'; /*script*/ 


$box = $banco->prepare($insert);


$box->execute([
    ':nome'=> $nomeFormulario/*script executado*/ 
    

]);



$telefoneFormulario=$_POST['tel'];
$emailFormulario=$_POST['email'];
$nascimentoFormulario=$_POST['nascimento'];
$frequenteFormulario=$_POST['frequente'];
$imagemFormulario=$_POST['img'];

$id_aluno = $banco->lastInsertId();


$insert2 = 'INSERT INTO tb_info_alunos(telefone, email, nascimento, frequente, id_alunos, img) VALUES (:telefone, :email, :nascimento, :frequente, :id_alunos, :img)';

$box = $banco->prepare($insert2);

$box->execute([
    ':telefone' => $telefoneFormulario,
    ':email' => $emailFormulario,
    ':nascimento' => $nascimentoFormulario,
    ':frequente' => $frequenteFormulario,
    ':img' => $imagemFormulario,
    ':id_alunos' => $id_aluno,
]);

$id_aluno = $banco->lastInsertId();

echo $id_aluno;