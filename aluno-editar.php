<?php
echo '<h1>Aluno Editar</h1>'; /*vai imprimir o titulo aluno editar no site*/ 

var_dump($_POST); 

$editarId = $_POST['id']; //pega o valor do campo e atribui a variavel
$editarNome = $_POST['Nome']; //pega o valor do campo e atribui a variavel

$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1'; //isso daqui e a string de conexao com o banco. estou especificando o nome e o endereço.

$user = 'root'; //aqui acessamos o banco de dados com o usuario root

$password = ''; //aqui colocamos a senha password. como nosso banco de dados nao tem senha entao deixamos vazio.


$banco = new PDO($dsn, $user, $password);  //aqui ele cria uma instancia que podemos usar para executar consultas sql 


$update = 'UPDATE tb_alunos SET nome = :nome WHERE id = :id'; /*variavel com sql que seta um novo valor ao campo definido*/ 


$banco->prepare($update)->execute([ /* perepara o banco e executa o sql dentro da variavel update*/ 
    ':id'  => $editarId, /*passando valores reais para o pleaceholder*/ 
    ':nome' => $editarNome /*passando valores reais para o pleaceholder*/ 
]);


$editarTel = $_POST['tel']; //pega o valor do campo e atribui a variavel
$editarEmail = $_POST['email']; //pega o valor do campo e atribui a variavel


$update = 'UPDATE tb_info_alunos SET telefone = :telefone, email = :email WHERE id = :id'; /*variavel com sql que seta um novo valor ao campo definido*/ 

$banco->prepare($update)->execute([ /* perepara o banco e executa o sql dentro da variavel update*/ 
    ':id'  => $editarId, /*passando valores reais para o pleaceholder*/ 
    ':telefone' => $editarTel, /*passando valores reais para o pleaceholder*/ 
    ':email' => $editarEmail /*passando valores reais para o pleaceholder*/ 
]);
