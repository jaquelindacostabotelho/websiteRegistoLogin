<?php
//Conexao
require_once 'conexao.php';
//Sessão
session_start();


//Verificação para que o USER não aceda a pagina home.php diretamente
if(!isset($_SESSION['logado'])):
    header('Location: indexLogin.php');
endif;

//Dados
$id = $_SESSION['id_utilizador'];
$sql = "SELECT * FROM utilizadores WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
$dados = mysqli_fetch_array($result);
mysqli_close($conn); //para encerrar a sessão
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="author" content="Jaqueline Botelho">
    <meta name="descrption" content="Página para apresentar ferramentas para gestão de projetos">
    <meta name="keywords" content="HTML, CSS, PHP, bootstrap, projetos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=McLaren&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/style.css">
    <script src="https://kit.fontawesome.com/3d084ec093.js" crossorigin="anonymous"></script>
    <title>Gestão de Projetos</title>
</head>


<body>
    <header>
         <!--NavBar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand fonte-texto" href="#"> Olá <?php echo $dados['name']; ?> , bem vindo(a)! </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" 
            id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fonte-texto" href="#" 
                    id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">Nossas indicações</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="https://slack.com/intl/pt-pt/" target="_blank">Slack</a></li>
                        <li><a class="dropdown-item" href="https://trello.com/" target="_blank">Trello</a></li>
                        <li><a class="dropdown-item" href="https://www.google.pt/drive/apps.html" target="_blank">Google Drive</a></li>
                        <li><a class="dropdown-item" href="https://www.google.com/intl/pt-PT/calendar/about/" target="_blank">Google Agenda</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link fonte-texto" href="#" data-toggle="modal"
                        data-target="#modalContato">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fonte-texto" href="logOut.php">Sair</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>

        <!--CARROSSEL-->
        <main>
          <section>
              <div id="carouselExampleIndicators" class="carousel fonte-texto" data-interval="6000"
                  data-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                 </ol>
                  <div class="carousel-inner">
                      <div class="carousel-item active">
                          <img class="d-block w-100 imagem-carrossel" src="./src/assets/slack.png" alt="Primeiro Slide">
                          <div class="carousel-caption d-none d-md-block"></div>                                          
                        </div>
                        <div class="carousel-item">
                          <img class="d-flex w-100 imagem-carrossel" src="./src/assets/trello.png" alt="Segundo Slide">
                          <div class="carousel-caption d-none d-md-block"></div>
                      </div>
                      <div class="carousel-item">
                          <img class="d-block w-100 imagem-carrossel" src="./src/assets/googleAgenda.png" alt="Terceiro Slide">
                          <div class="carousel-caption d-none d-md-block"></div>
                     </div>                                    
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Anterior</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Próximo</span>
                  </a>
              </div>
              <article>
                  <h1 class="text-center fonte-texto pt-5">4 ferramentas para Gestão de Projetos</h1>
                  <p class="text-center fonte-texto pb-5">
                    Saiba mais sobre as tecnologias...<br><br>Muitos profissionais podem viver situações complicadas quando se fala em gestão de projetos.
                    <br>Podem encontrar dificuldade em colocar em prática, as ações para que tudo possa acontecer conforme o planejado.
                    <br>Foi pensando nisso que trouxemos algumas opções de ferramentas que auxilam na gestão de projetos.
                    <br>São tecnologias alternativas com recursos de gestão e que trazem resultados.                 
                    <br>Aqui neste conteúdo, vais conhecer uma lista de 4 ferramentas para gestão de projetos.
                    <br>Cada uma com uma função específica, que vai de encontro com as diferentes realidades que podem existir no seu dia a dia!
                </p>
              </article>
          </section>
      </main>
      <!--Cards-->
      <section>
          <div class="container-fluid bg-dark">
              <div class="row justify-content-around">
                  <div class="card borda-card m-3" style="width: 18rem">
                      <img class="card-img-top imagem-card" src="./src/assets/img2.PNG" alt="Imagem de capa do card">
                      <div class="card-body">
                          <h5 class="card-title fonte-titulo-card">Troque mensagens pelo Slack</h5>
                          <p class="card-text fonte-texto-card-footer">
                              Facilite seu trabalho!
                          </p>
                          <a href="https://slack.com/intl/pt-pt/" target="_blank" class="btn btn-danger fonte-texto-card-footer">Ver mais</a>
                      </div>
                  </div>
                  <div class="card borda-card m-3" style="width: 18rem">
                      <img class="card-img-top imagem-card" src="./src/assets/img3.PNG" alt="Imagem de capa do card">
                      <div class="card-body">
                          <h5 class="card-title fonte-titulo-card">Uma Plataforma de Produtividade: Trello</h5>
                          <p class="card-text fonte-texto-card-footer">
                                Integre os apps!
                          </p>
                          <a href="https://trello.com/" target="_blank" class="btn btn-danger fonte-texto-card-footer">Ver mais</a>
                      </div>
                  </div>
                  <div class="card borda-card m-3" style="width: 18rem">
                      <img class="card-img-top imagem-card" src="./src/assets/img1.PNG" alt="Imagem de capa do card">
                      <div class="card-body">
                          <h5 class="card-title fonte-titulo-card">Tenha tudo guardado para quando precisar</h5>
                          <p class="card-text fonte-texto-card-footer">
                              Se surpreenda com Drive!
                          </p>
                          <a href="https://www.google.pt/drive/apps.html" target="_blank" class="btn btn-danger fonte-texto-card-footer">Ver mais</a>
                      </div>
                  </div>
                  <div class="card borda-card m-3" style="width: 18rem">
                    <img class="card-img-top imagem-card" src="./src/assets/img4.PNG" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title fonte-titulo-card">Deixe o trabalho com a Agenda do Google</h5>
                        <p class="card-text fonte-texto-card-footer">
                            Se organize e tenha tudo em dia!
                        </p>
                        <a href="https://www.google.com/intl/pt-PT/calendar/about/" target="_blank" class="btn btn-danger fonte-texto-card-footer">Ver mais</a>
                    </div>
                </div>
              </div>
          </div>
      </section>
  
      <!--Modal-->
      <div class="modal fade" id="modalContato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title " id="exampleModalLabel">Contato</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <!-- FORM -->
                      <form>
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Email</label>
                              <input type="email" class="form-control" id="exampleFormControlInput1"
                                  placeholder="name@example.com">
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlSelect1">Selecione o tipo de
                                  comentário</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Dúvidas</option>
                                  <option>Sugestōes</option>
                                  <option>Elogios</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlTextarea1">Escreva aqui seu
                                  comentário</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-primary">Enviar</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <footer class="container-fluid pt-5">
      <div>
          <p class="text-center fonte-texto-card-footer">Densenvolvido por:</p>
      </div>
      <div class="text-center pt-1">
          <p>Copyrigth @ Jaqueline Botelho at Cinel <time datetime="2021">2021</time></p>  
      </div>
  </footer>

      <!-- script -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
</body>


