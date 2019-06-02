<html>
<head>
<title>Chanel - E-Commerce </title>
<link rel="icon" href="{{asset('img/favicon.ico')}}">


<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/jquery.mask.min.js')}}"></script>

</head>

<body>

        @if(session('error') || session('success'))
        <script>
          $( document ).ready(function() {
            $('#warningToast').toast({delay:5000});
            $('#warningToast').toast('show');
          });
        </script>
        <div aria-live="polite" aria-atomic="true" style="z-index:9999999;position: fixed; top: 75px; right: 20px;min-height:200px;" >
          <div class="toast" id="warningToast">
          <div class="toast-header {{session('error') ? 'bg-warning' : 'bg-success'}}">
                <i class="{{session('error') ? 'fa fa-exclamation' : 'fas fa-check-double'}}"></i>
              <strong class="mr-auto font-weight-500">&nbsp;&nbsp;{{session('error') ? 'Ops!' : 'Sucesso!'}}</strong>        
              <small>Agora</small>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body" style="color:#212529;">
              {{session('error') ? session('error') : session('success')}}
            </div>
          </div>
        </div>
        @endif


@yield('body')
    <!------------Footer----------->

<section class="footer">
  <div class="container tex-center">
      <div class="row">
          <div class="col-md-3">
              <h1>Links Úteis</h1>
              <a href="rodape/politica_de_privacidade.html"><p>Política de Privacidade</p></a>
              <a href="rodape/rodatermos_de_uso.html"><p>Termos de Uso</p></a>
              <a href="rodape/politica_de_devolucao.html"><p>Política de Devolução</p></a>
          </div>
          
          <div class="col-md-3">
              <h1>Empresa</h1>
              <a href="rodape/sobre_nos.html" ><p>Sobre Nós</p></a>
              <a href="rodape/contate-nos.html"><p>Contate-nos</p></a>
          </div>
          <div class="col-md-3">
           <h1>Atendimento ao Cliente</h1> 
              <p>0800-0000</p>
              <p>alunofg@meuemail.com</p>
          </div>
          <div class="col-md-3 footer-image">
              <h1>Em breve</h1>
              <img src="{{asset('img/app-logo.png')}}">
          </div>
      </div>
      <hr>
      
        <p class="copyright"> © 2019 Todos os direitos reservados: Igor Carvalho - Jordy Arlego - Lucas Florentino - Vinicius Oliveira - Wolgran Julio </p>
    </div>    
  </section>  

  <script>
    function openmenu()
      {
          document.getElementById("side-menu").style.display="block";
          document.getElementById("menu-btn").style.display="none";
          document.getElementById("close-btn").style.display="block";
      }
      function closemenu()
      {
          document.getElementById("side-menu").style.display="none";
          document.getElementById("menu-btn").style.display="block";
          document.getElementById("close-btn").style.display="none";
      }
    </script>  

</body>
</html>