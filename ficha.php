<?php 

$id_alunos = $_GET['Id_alunos']; /*aqui estamos pegando o id_alunos da tabela_info_alunos como identificador para nosso sql abaixo*/ 

$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1'; //isso daqui e a string de conexao com o banco. estou especificando o nome e o endereço.

$user = 'root'; //aqui acessamos o banco de dados com o usuario root

$password = ''; //aqui colocamos a senha password. como nosso banco de dados nao tem senha entao deixamos vazio.


$banco = new PDO($dsn, $user, $password); //aqui ele cria uma instancia que podemos usar para executar consultas sql 

$select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.id = tb_info_alunos.id_alunos  WHERE tb_info_alunos.id = ' . $id_alunos; /*aqui criamos um sql que vai pegar o campo nome da tabela aluno e os outros campos da tabela info alunos e definir em um unico id que seria o $id_alunos*/ 

$dados = $banco->query($select)->fetch(); //aqui tem uma variavel que armazena o resultado do select em array por causa do fetchALL.






?>






<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- esses link servem para eu utilizar estilizações prontas do boostrap -->


<style>
    main {  
        display: flex; /*displey flex para os elementos ficarem em linha*/ 
        flex-direction: column; /*para os elementos ficarem em uma so coluna*/ 
        align-items: center; /* ele centraliza os elementos verticalmente */
    }

    form {
        width: 600px; /*widh para definir a largura*/ 
    }

    img{
        width: 200px;  /*widh para definir a largura*/ 
        object-fit: cover; /*para centralizar a imagem cortando as partes da imagem para preencher o espaço  */ 
    }

</style>


<main class="container text-center my-5"><!--nesse main class container my-5 vai fazer com que crie um espaço nas margens do container -->


    <img src="./img/<?php echo $dados['img'] ?>" alt=""> <!-- aqui estou mandando ele imprimir a imagem de acordo com o id da img.  -->

    <form action="#"> <!-- abri um formulario-->
        <label for="nome">Nome</label> <!-- rotulo de texto do campo nome  -->
        <input type="text" value="<?php echo $dados ['nome']  ?>" disabled class="form-control"><!-- aqui estou mandando ele imprimir o nome do aluno de acordo com o id do campo nome -->

        <div class="row mt-2"> <!-- div com estilização do boostrap -->
            <div class="col"> <!-- div para ajudar no layout do formulario -->
                <label for="telefone">Telefone</label><!-- rotulo de texto do campo telefone -->
                <input type="number" value="<?php echo $dados['telefone'] ?>" disabled class="form-control"><!--aqui estou mandnado ele imprimir o telefone de acordo com o id do campo telefone -->
            </div>
            <div class="col"><!--div para ajudar no layout do formulario -->
                <label for="email">email</label><!-- rotulo de texto do campo email -->
                <input type="email" value="<?php echo $dados['email'] ?>" disabled class="form-control"><!--aqui estou mandando ele imprimir o email de acordo com o id do campo email -->
            </div>
        </div>

        <div class="row mt-2"><!--div com estilização do boostrap  -->
            <div class="col"><!--div para ajudar no layout do formulario -->
                <label for="data_nascimento">Data Nascimento</label><!-- rotulo de texto do campo data nascimento-->
                <input type="date" value="<?php echo $dados['nascimento'] ?>" disabled class="form-control"><!-- aqui estou mandando ele imprimir a data de nascimento de acordo com o id do campo nascimento -->
            </div>
            <div class="col my-4 pt-2"><!--div com estilização do boostrap  -->
                <input type="checkbox" class="form-check-input"><!-- aqui estou adicionando um cheboxa -->
                <label for="frequente">Frequente</label><!-- rotulo de texto do checkbox frequente-->
            </div>
        </div>

    </form>

</main>