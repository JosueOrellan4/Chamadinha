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
    animation: fadeIn 2s ease-out; /* */ 
}



.form-control{
    width: 350px; /* */ 
}
.form-control {
    transition: border 0.3s ease, box-shadow 0.3s ease; /* */ 
}

.form-control:focus {
    border-color: #007bff; /*define a cor do botao*/ 
}

button{
width: 150px;} /*define a largura do botao */ 

.btn-custom {
    transition: transform 0.3s ease, background-color 0.3s ease; /* cria uma animação simples que expande o botao na hora que o usuario passa o ponteiro por cima do botao*/ 
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

        
        <input type="number" class="form-control" placeholder="Telefone" name="tel"> <!-- -->

        <input type="email" class="form-control" placeholder="Email" name="email"> <!-- -->

        <input type="date" class="form-control" placeholder="Data de Nascimento" name="nascimento"> <!-- -->

        <div> <!-- -->
            
            <input type="checkbox" class="form-check-input" name="frequente">
            <label class="form-check-label" for="frequente">Frequente?</label>
    </div>

        <input type="file" name="img" accept="image/*"> <!-- -->
            
        

        <button type="submit" class="btn btn-primary btn-custom">Enviar</button> <!-- -->

    </form>
</main>
