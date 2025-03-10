  <?php echo '<h1>Cadastro de Aluno</h1>'; //estou mandando ele imprimir o h1 



$nomeFormulario = $_POST['Nome']; //pega o valor do campo e atribui a variavel



$dsn = 'mysql:dbname=db_ti24;host=127.0.0.1';//isso daqui e a string de conexao com o banco. estou especificando o nome e o endereço.

$user = 'root'; //aqui acessamos o banco de dados com o usuario root

$password = ''; //aqui colocamos a senha password. como nosso banco de dados nao tem senha entao deixamos vazio.


$banco = new PDO($dsn, $user, $password); //aqui ele cria uma instancia que podemos usar para executar consultas sql 

$insert = 'INSERT INTO tb_alunos (nome) VALUES (:nome)'; /*aqui criamos um sql que vai inserir um novo registro no campo nome da tabela alunos esse novo registro vai vir do pleace holder*/ 


$box = $banco->prepare($insert); /*aqui o box recebe o valor do sql preparado*/ 



$box->execute([
    ':nome'=> $nomeFormulario/* aqui ele esta pegando a variavel box onde esta o script que seleciona minha tabela executa para que o pleaceholder nome receba os dados do campo nomeformulario*/ 
    

]);



$telefoneFormulario=$_POST['tel']; //pega o valor do campo e atribui a variavel
$emailFormulario=$_POST['email']; //pega o valor do campo e atribui a variavel
$nascimentoFormulario=$_POST['nascimento']; //pega o valor do campo e atribui a variavel
$frequenteFormulario=$_POST['frequente']; //pega o valor do campo e atribui a variavel
$imagemFormulario=$_POST['img']; //pega o valor do campo e atribui a variavel




$insert2 = 'INSERT INTO tb_info_alunos(telefone, email, nascimento, frequente, id_alunos, img) VALUES (:telefone, :email, :nascimento, :frequente, :id_alunos, :img)'; /*aqui criamos um sql que vai inserir um novo registro nos campos telefone,email,nascimento e frequente da tabela info alunos esse novo registro vai vir do pleace holder*/ 


$box = $banco->prepare($insert2); /*prepara o codigo sql para o banco e adiciona em uma variavel*/ 

$box->execute([
    ':telefone' => $telefoneFormulario, /* aqui ele esta pegando a variavel box onde esta o script que seleciona minha tabela executa para que o pleaceholder telefone receba os dados do campo telefoneFormulario*/ 

    ':email' => $emailFormulario,/* aqui ele esta pegando a variavel box onde esta o script que seleciona minha tabela executa para que o pleaceholder email receba os dados do campo emailFormulario*/ 

    ':nascimento' => $nascimentoFormulario,/* aqui ele esta pegando a variavel box onde esta o script que seleciona minha tabela executa para que o pleaceholder nascimento receba os dados do campo nascimentoFormulario*/ 

    ':frequente' => $frequenteFormulario,/* aqui ele esta pegando a variavel box onde esta o script que seleciona minha tabela executa para que o pleaceholder frequente receba os dados do campo frequenteFormulario*/ 

    ':img' => $imagemFormulario,/* aqui ele esta pegando a variavel box onde esta o script que seleciona minha tabela executa para que o pleaceholder img receba os dados do campo imagemFormulario*/ 

    ':id_alunos' => $id_aluno,  /*aqui ele receba o valor da variavel id aluno que seria o ultimo id inserido*/ 
]);

$id_aluno = $banco->lastInsertId(); //recupera o ultimo id inserido

echo $id_aluno; /*exibe o valor da variavel*/