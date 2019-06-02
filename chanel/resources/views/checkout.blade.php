
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Chanel - Checkout</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/jquery.mask.min.js')}}"></script>

    <!-- Custom styles for this template -->
    <style>
    .container {
  max-width: 960px;
}

.border-top { border-top: 1px solid #e5e5e5; }
.border-bottom { border-bottom: 1px solid #e5e5e5; }
.border-top-gray { border-top-color: #adb5bd; }

.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

.lh-condensed { line-height: 1.25; }</style>
  </head>

  <body class="bg-light">

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

    <div class="container">
      <div class="py-5 text-center">
          <a href="/">
        <img class="d-block mx-auto mb-4" src="{{asset('/img/logo_auth.png')}}" alt="" width="72" height="72">
    </a>
        <h2>Checkout</h2>
        <p class="lead">Abaixo preencha os dados para confirmar a sua compra. Obrigado por escolher a ChanelStore!</p>
      </div>

      @php
                if(!Session::has('cart')) $cart = [];
                else $cart = Session::get('cart');

                $totalCost = 0;
            @endphp
            
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Seu carrinho</span>
            <span class="badge badge-secondary badge-pill">{{ count($cart) > 0 ? count($cart) : '0'}}</span>
          </h4>
          <ul class="list-group mb-3">
            @if(count($cart) > 0)
            @foreach($cart as $sp)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">{{ getProductNameById($sp['id'])}}</h6>
                      <small class="text-muted">Quantidade: {{$sp['quantity']}}</small>
                    </div>
                    <span class="text-muted">R$ {{ number_format($sp['totalCost'], 2, ',', '.')}}</span>
                  </li>
            @php
                $totalCost += $sp['totalCost'];
            @endphp
            @endforeach
            @else
            <tr>
                <td colspan="6">Nenhum produto no seu carrinho =(</td>
            </tr>
            @endif
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (R$)</span>
              <strong>R$ {{ number_format($totalCost, 2, ',', '.')}}</strong>
            </li>
          </ul>

        {{-- <form method="POST" action="{{route('confirmCheckout')}}" class="card p-2"> --}}
            {{-- @csrf --}}
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Ativar</button>
              </div>
            </div>
          {{-- </form> --}}
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Dados de entrega</h4>
        <form class="needs-validation" method="POST" action="{{route('storeCheckout')}}">  
            @csrf
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Pais</label>
                <select class="custom-select d-block w-100" name="country" id="country" required>
                  <option value="" disabled selected>Choose...</option>
                  <option>Brasil</option>
                </select>
                <div class="invalid-feedback">
                  Por favor selecione um país válido.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Estado</label>
                <select class="custom-select d-block w-100" name="state" id="state" required>
                  <option value="" selected disabled>Escolha...</option>
                  <option value="PE">Pernambuco</option>
                  <option value="RJ">Rio de janeiro</option>
                  <option value="SP">São paulo</option>
                  <option value="BH">Bahia</option>
                </select>
                <div class="invalid-feedback">
                  Selecione um estado válido.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">CEP</label>
                <input type="text" class="form-control cep" name="cep"  data-mask="00000-000" data-mask-reverse="true" id="zip" placeholder="00.000-00" required>
                <div class="invalid-feedback">
                  CEP code required.
                </div>
              </div>
            </div>

            <div class="mb-3">
                    <label for="address">Endereço</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>
            <hr class="mb-4">

            <h4 class="mb-3">Pagamento</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" value="0" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" value="1" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nome do cartão</label>
                <input type="text" class="form-control creditCardName" id="cc-name" placeholder="" required>
                <small class="text-muted">Nome completo igual ao cartão.</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control creditCard" minlength="16" maxlength="20" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control dateEx" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control cvv" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" type="submit">Confirmar compra!</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 ChannelStore</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
        $(document).ready(function(){
            $('.cep').mask('00000-000');
            $(".cvv").mask('000');
            $(".dateEx").mask('00/00');
             $(".creditCardName").lettersOnly();

            $('.creditCard').mask('0000 0000 0000 0000');
        })
    </script>
    <script>
    jQuery.fn.lettersOnly = function() {
  $(this).keydown(function(e) {
    var key = e.which || e.keyCode;

    if(!e.altKey && !e.ctrlKey && key >=48 && key<=57 || key>=96 && key<=105 ||key==188||key==109||key==110||key==13||key==35|| key==36|| key==46||key==45||key==107||key==219||key==221||key==220||key==186||key==222|| key==191||key==187||key==192) {
        return false;
    }
    else {
      return true;  
    }
  });
}
jQuery.fn.numbersOnly = function() {
  $(this).keydown(function(e) {
    var key = e.which || e.keyCode;
    if(key >= 65 && key <= 90 || key >= 186 && key <= 188|| key >=191 && key <= 222) {
        return false;
    }
    else {
      if(!e.shiftKey) {
        return true;
      }
      else {
        return false;
      }
    }
  });
}
jQuery.fn.alphaNumericOnly = function() {
  $(this).keydown(function(e) {
    var key = e.which || e.keyCode;
    if(e.shiftKey && key >= 48 && key <= 57) {
      return false;
    }
    else {
       if(key >= 186 && key <= 187 || key >= 191 && key <= 222) {
        return false;
      }
      else {
        return true; 
      }
    }
  });
}
</script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
