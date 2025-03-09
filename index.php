<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- esses link servem para eu utilizar estilizações prontas do boostrap -->


<?php
$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1'; //isso daqui e a string de conexao com o banco. estou especificando o nome e o endereço.
$user = 'root'; //aqui acessamos o banco de dados com o usuario root
$password = ''; //aqui colocamos a senha password. como nosso banco de dados nao tem senha entao deixamos vazio.

$banco = new PDO($dsn, $user, $password); //aqui ele cria uma instancia que podemos usar para executar consultas sql 

$select = "SELECT * FROM tb_alunos"; //aqui criamos uma variavel com um script sql que consulta a tabela tb_alunos do banco de dados

$resultado = $banco->query($select)->fetchAll(); //aqui tem uma variavel que armazena o resultado do select em array por causa do fetchALL.

// echo '<pre>'; //pre serve para organizar
// var_dump($resultado); //ele faz um debug das informações

?>

<main class="container my-5"> <!--nesse main class container my-5 vai fazer com que crie um espaço nas margens do container -->

    <table class="table table-striped"> <!--aqui estou utilizando um design de interface pronto do boostrap para minha tabela -->

        <div class="my-3 d-flex justify-content-end"> <!--nessa linha estou alinhando o botao com as estilizações do bootstrap -->
            <a href="formulario.php" class="btn btn-success">Cadastrar Novo Aluno</a> <!--nessa linha estou linkando o botao pra onde ele vai levar o usuario ao clicar e estilizando ele -->
        </div>

        <tr> <!-- aqui abri uma tag que vai criar uma linha na minha tabela -->
            <td> id </td> <!-- criei uma coluna -->
            <td> nome </td><!-- criei uma coluna -->
            <td class="text-center"> ação</td><!-- criei outra coluna mas com uma estilização pra deixar o titulo centralizado -->
        </tr>

        <?php foreach ($resultado as $linha) { ?> <!--aqui criei um foreach que pega o resultado da variavel que seria selecionar toda a tabela e ir imprindo linha por linha as informações abaixo-->

            <tr> <!--cria a linha onde ficara as informações de cada usuario -->
                <td> <?= $linha['id'] ?> </td> <!-- cria uma coluna onde vai ficar os id do banco -->
                <td> <?php echo $linha['nome'] ?> </td> <!--cria uma coluna onde vai ficar os nome do banco -->
                <td class="text-center"> <!-- aqui cria uma coluna para os botoes abir, editar e excluir junto com uma estilização pra ficar centralizado-->

                    <a class="btn btn-primary" href="./ficha.php?Id_alunos=<?= $linha['id'] ?>">Abrir</a> <!-- nessa linha ele vai criar um botao de abrir para o id especifico do aluno que levara para a ficha do aluno. -->


                    <!-- GET antes do ? é o link de acesso depois da ? são variaveis  -->
                    
                    <a class="btn btn-warning" href="./formulario-editar.php?id_aluno_editar=<?= $linha['id'] ?>">Editar</a> <!-- aqui a mesma coisa cria um botao de editar que vai levar para a pagina especfica do aluno onde o usuario vai conseguir editar as informações dele -->

                    <a class="btn btn-danger" href="./aluno-deletar.php?id=<?= $linha['id'] ?>">Excluir</a> <!-- mesma coisa cria um botao de excluir na linha do usuario e ao clicar ele vai acessar o arquivo aluno-deletar onde ele tem os parametros para deletar o usuario com base no id -->


                    <!-- caminho arquivo ? variaveis -->
                </td>
            </tr>
        <?php } ?>
    </table>
</main>