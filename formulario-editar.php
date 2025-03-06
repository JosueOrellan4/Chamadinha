<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



<html lang="pt-br">
<title>formulario</title>

<style>
form{
    
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        
    
}
@keyframes fadeIn {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }

  h2 {
    animation: fadeIn 2s ease-out;
  }

h2{
    animation: fadeIn 2s ease-out;
}



.form-control{
    width: 350px;
}
.form-control {
    transition: border 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
}

button{
width: 150px;}

.btn-custom {
    transition: transform 0.3s ease, background-color 0.3s ease;
}

.btn-custom:hover {
    transform: scale(1.1);  /* Expande o botão */
    background-color: #0056b3;  /* Muda a cor do fundo */
}



</style>

<!-- 
METODO DE ENVIO ->
GET -> manda informações atraves da URL
POST -> manda informações atraves do corpo do arquivo...
ACTION ->
fala para onde deve enviar os dados
-->

<?php

$id_aluno_editar = $_GET['id_aluno_editar'];

var_dump($id_aluno_editar);

$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.id = tb_info_alunos.id_alunos  WHERE tb_info_alunos.id = ' . $id_aluno_editar;

$dados = $banco->query($select)->fetch();

?>

<main class="container text-center my-5">
    <form action="./aluno-editar.php" method="POST">
        
        
        <h2>Editar Cadastro</h1>

        
        <input type="hidden" class="form-control" placeholder="id"      name="id"     value="13">
        
        <input type="text" class="form-control" placeholder="nome"      name="Nome"     value="<?=$dados['nome'] ?>">

        <input type="hidden" class="form-control" placeholder="id"      name="id_aluno"     value="13">

        <input type="number" class="form-control" placeholder="telefone" name="tel" value="<?=$dados['telefone']?>">

        <input type="email" class="form-control" placeholder="email"     name="email"    value="<?=$dados['email']?>">

        <input type="date" class="form-control" placeholder="nascimento" name="nasc" value="<?=$dados['nascimento']?>">

        <div>
            
            <input type="checkbox" class="form-check-input" name="frequente">
            <label class="form-check-label" for="frequente">Frequente?</label>
    </div>

        <input type="file" name="img" accept="image/*">
            
        

        <button type="submit" class="btn btn-primary btn-custom">Enviar</button>

    </form>
</main>
