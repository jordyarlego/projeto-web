<div class="top-nav-bar">
        <div class="search-box">
            <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
            <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
            
            <a href="/"><img src="{{ asset('img/logo1.png') }}"  class="logo"></a>
            
            <input type="text" name="s" id="fromSearch" onkeypress="callToSearchBox();" placeholder="Buscar no Chanel" class="form-control">

        <button type="button" 
            onclick="event.preventDefault();
                          document.getElementById('send_search').submit();" style="background-color:transparent;border:none;">

            <span class="input-group-text"><i class="fa fa-search"></i></span>
        </button>
            
        </div> 
    
        <div class="menu-bar">
        <ul>
            @php
                if(Session::has('cart')) $cart = Session::get('cart');
                else $cart = [];
            @endphp
        <li><a href="/cart"><i class="fa fa-shopping-cart"></i> {{count($cart)}} Carrinho</a></li>    
        @if(Auth::check())    
        <li><a href="/home">Minha Conta</a></li> 
        @else    
        <li><a href="/register">Cadastre-se</a></li> 
        <li><a href="/login">Login</a></li> 
        @endif      
        </ul>   
        </div> 
        </div>
        <script>
            function callToSearchBox(){
                var val =  $('#fromSearch').val();
                $('#searchbox').val(val);
                }
        </script>
        <form action="{{route('search')}}" id="send_search" class="row" style="display:none;">           
                <input type="text" name="s" placeholder="Buscar no Chanel" id="searchbox" class="form-control">
        
            </form> 