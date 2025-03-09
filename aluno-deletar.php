<?php

echo '<h1>Aluno-deletar.php</h1>'; /*imprimi o h1*/ 

$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1'; //isso daqui e a string de conexao com o banco. estou especificando o nome e o endereço.

$user = 'root'; //aqui acessamos o banco de dados com o usuario root

$password = ''; //aqui colocamos a senha password. como nosso banco de dados nao tem senha entao deixamos vazio.


$banco = new PDO($dsn, $user, $password);  //aqui ele cria uma instancia que podemos usar para executar consultas sql 


//var_dump($_GET); para exibir as informações na tela


$idFormulario = $_GET['id']; /*pega o valor de id que foi passado atravez do url*/ 

$delete = 'DELETE FROM tb_alunos WHERE id = :id'; /*variavel com um sql que vai deleter o campo de acordo com o id */ 

$box = $banco->prepare($delete); /*aqui o box recebe o valor do sql preparado */ 

$box->execute([
    ':id'=> $idFormulario /* aqui ele vai executar o sql que vai deletar o campo de acordo com pleace holder que vai receber o valor do id puxado atraves do get */ 
]);

// apagando informações da tb_info_alunos
$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos';  /*variavel com um sql que vai deleter o campo de acordo com o id */ 


//pode colocar qualquer nome mas por boa pratica colocamos igual

$box = $banco->prepare($delete); /*aqui o box recebe o valor do sql preparado */ 

$box->execute([
    ':id_alunos'=> $idFormulario  /* aqui ele vai executar o sql que vai deletar o campo de acordo com pleace holder que vai receber o valor do id puxado atraves do get */ 
]);



// var_dump($box); para exibir as informações na tela

// twig 
echo '<script>
alert("Usuario Apagado com Sucesso!!!")
window.location.replace("index.php")
</script>'; //apos a ação deleter ter acontecido ele vai mandar um alert de mensage, usuario apagado com sucesso e vai retornar para o index.
// header('location:index.php');


