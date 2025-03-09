<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- esses link servem para eu utilizar estilizações prontas do boostrap -->


<html lang="pt-br"> <!-- definindo a linguagem do site-->
<title>formulario</title> <!-- definindo o titulo-->

<style>
form{
    
    display: flex; /*display flex para deixar o conteudo dentro do form em uma linha*/ 
        flex-direction: column; /* fd para deixar o conteudo em uma coluna só*/ 
        align-items: center; /* isso daqui alinha os itens do form verticalmente no centro*/ 
        gap: 20px; /*aumenta o espaço entre os itens*/ 
        
    
}
@keyframes fadeIn { /*nessa linha estamos usando uma animação chamada fade in que cria um efeito de transição suave que torna um elemento visivel gradualmente*/
    0% {
      opacity: 0; /*na hora que o usuario entrar na pagina o elemento ele vai ficar "invisivel"*/ 
    }
    100% {
      opacity: 1;/*depois disso ele vai ficar com opacity 1 entao 100% visivel*/ 
    }
  }

  h2 {
    animation: fadeIn 2s ease-out;  /*aqui estamos aplicando o efeito ao h2 da pagina 2s de duração e ease-out a animação começa rapido e desacelera */
  }


  .form-control{
    width: 350px; /* definindo uma largura pro formulario*/ 
}
.form-control {
    transition: border 0.3s ease, box-shadow 0.3s ease; /* aqui eu defini uma transição suave para a borda e a sombra dos input do form que dura 0.3s e a animação começa devagar e depois desacelera */  
}

.form-control:focus {
    border-color: #007bff; /*aqui estou aplcando pra ele mudar a cor da borda para um azul claro apos ele interagir com algum input*/ 
}

button{

width: 150px;
} /*define a largura do botao */ 

.btn-custom {
    transition: transform 0.3s ease, background-color 0.3s ease; /*aqui estou falando para ele criar uma animação simples na hora que o usuario interagir com o botao enviar  */ 
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

$id_aluno_editar = $_GET['id_aluno_editar'];  /* Variável que vai receber o valor do id do aluno passado pela URL */
var_dump($id_aluno_editar); /*vai imprimir o valor da variavel em array*/ 

$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1'; //isso daqui e a string de conexao com o banco. estou especificando o nome e o endereço.

$user = 'root';//aqui acessamos o banco de dados com o usuario root

$password = ''; //aqui colocamos a senha password. como nosso banco de dados nao tem senha entao deixamos vazio.

$banco = new PDO($dsn, $user, $password);//aqui ele cria uma instancia que podemos usar para executar consultas sql 

$select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.id = tb_info_alunos.id_alunos  WHERE tb_info_alunos.id = ' . $id_aluno_editar; /*aqui criamos um sql que vai pegar o campo nome da tabela aluno e os outros campos da tabela info alunos e definir em um unico id que seria o $id_alunos_editar*/ 

$dados = $banco->query($select)->fetch();//aqui tem uma variavel que armazena o resultado do select em array por causa do fetchALL.


?>

<main class="container text-center my-5"><!--nesse main class container my-5 vai fazer com que crie um espaço nas margens do container -->
    <form action="./aluno-editar.php" method="POST"><!-- aqui criamos um formulario e definimos para onde serao enviados as informações e o metodo POST de como eles serao enviados -->
        
        
        <h2>Editar Cadastro</h1><!-- titulo criado com h1 -->

        
        <input type="hidden" class="form-control" placeholder="id"      name="id"     value="13">  <!-- aqui mandei ele criar um campo de input invisivel que armazena um valor fixo-->
        
        <input type="text" class="form-control" placeholder="nome"      name="Nome"     value="<?=$dados['nome'] ?>"> <!--aqui estou mandando ele imprimir o nome de acordo com o id do campo nome -->

        <input type="number" class="form-control" placeholder="telefone" name="tel" value="<?=$dados['telefone']?>"> <!--aqui estou mandnado ele imprimir o telefone de acordo com o id do campo telefone -->

        <input type="email" class="form-control" placeholder="email"     name="email"    value="<?=$dados['email']?>"><!--aqui estou mandando ele imprimir o email de acordo com o id do campo email -->

        <input type="date" class="form-control" placeholder="nascimento" name="nasc" value="<?=$dados['nascimento']?>"><!-- aqui estou mandando ele imprimir a data de nascimento de acordo com o id do campo nascimento -->

        <div>
            
            <input type="checkbox" class="form-check-input" name="frequente"> <!-- aqui estou adicionando um cheboxa -->
            <label class="form-check-label" for="frequente">Frequente?</label> <!-- rotulo de texto do checkbox frequente-->
    </div>

        <input type="file" name="img" accept="image/*"><!-- aqui eu criei um input tipo imagem onde o usuario vai salvar uma imagem -->
            
        

        <button type="submit" class="btn btn-primary btn-custom">Enviar</button><!-- botao de enviar pra quando o usuario ja tenha terminado de editar todos os campos do formulario junto com uma estilização pronta definida no class-->


    </form>
</main>
