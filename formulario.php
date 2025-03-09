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

 <main class="container text-center my-5">  <!--nesse main class container my-5 vai fazer com que crie um espaço nas margens do container -->
    <form action="./aluno-cadastrar.php" method="POST"> <!-- aqui criamos um formulario e definimos para onde serao enviados as informações e o metodo POST de como eles serao enviados -->
        
        
        <h2>Formulario</h1> <!-- titulo criado com h2 -->
        
        
        
        <input type="text" class="form-control" placeholder="Nome" name="Nome"> <!-- nessa linha criamos um input onde o usuario vai cadastar o nome e identificamos o nome desse input -->

        
        <input type="number" class="form-control" placeholder="Telefone" name="tel"> <!--  nessa linha criamos um input onde o usuario vai cadastar o telefone e identificamos o nome desse input -->

        <input type="email" class="form-control" placeholder="Email" name="email"> <!--nessa linha criamos um input onde o usuario vai cadastar o email e identificamos o nome desse input -->

        <input type="date" class="form-control" placeholder="Data de Nascimento" name="nascimento"> <!--nessa linha criamos um input onde o usuario vai definir a data de nascimento dele por meio de um calendario interativo e identificamos o nome desse input -->

         <div> <!--div para agrupar os elementos  -->
            
             <input type="checkbox" class="form-check-input" id="frequente" name="frequente">  <!-- aqui eu criei uma caixa de marcar e desmarcar e adicionei uma estilização pronta do boostrap e identifiquei o nome dele -->
             <label class="form-check-label" for="frequente">Frequente?</label> <!-- aqui eu criei um label que seria um texto junto do check box e adicionei um for caso o usuario clique no texto tambem marque e desmarque o checkbox  -->
    </div>

        <input type="file" name="img" accept="image/*"> <!-- aqui eu criei um input tipo imagem onde o usuario vai salvar uma imagem -->
            
        

        <button type="submit" class="btn btn-primary btn-custom">Enviar</button> <!-- butao de enviar pra quando o usuario ja tenha preenchido todos os campos do formulario junto com uma estilização definida no class-->

    </form>
</main>
