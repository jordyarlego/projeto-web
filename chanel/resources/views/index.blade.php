@extends('layouts.layout')

@section('body')
  @include('includes.menu-nav')
        
    <section class="header">
    <div class="slider">
      <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('img/carousel/slide1-fit.jpg') }}"  class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
            <h5>Chega de Desculpas!</h5>
            <p>Hora de virar Fitness com itens em até 70% de desconto</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('img/carousel/slide2-vestido.jpg') }}"   class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
            <h5>Vista o seu melhor vestido</h5>
            <p>Encante com a nossa nova coleção</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('img/carousel/slide3-modaM.jpg') }}"   class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
            <h5>Seja um novo homem!</h5>
            <p>Renove seu guarda-roupa</p>
          </div>
        </div>
        
      </div>
      <ol class="carousel-indicators">
        <li data-target="#slider" data-slide-to="0" class="active"></li>
        <li data-target="#slider" data-slide-to="1"></li>
        <li data-target="#slider" data-slide-to="2"></li>
      </ol>
    </div>  
    </div>    
    
    </section>
        
    <!---------------featured-categories---------------->
        
    <section class="featured-categories"> 
    <div class="container">
     <div class="row">
         <div class="col-md-4">
         <img src="{{ asset('img/categorias em destaque/categoria_esporte_1.png') }}"  height="220"> 
        </div>
         <div class="col-md-4">
         <img src="{{ asset('img/categorias em destaque/categoriaJ_jeans_2.jpg') }}" >
        </div>
         <div class="col-md-4">
         <img src="{{ asset('img/categorias em destaque/categoria_sapato_3.jpg') }}" >
        </div>
    </div>   
    </div>   
    </section>
    
    <!-----------------On Sale product------------------>

    <section class="on-sale">
    <div class="container">
        <div class="title-box">
        <h2>Vitrine</h2>
        </div>
        <div class="row">
            @foreach ($products as $p)
            @php
                $default = json_decode($p->images);
            @endphp
        <div class="col-md-3">
        <div class="product-top">
          
        <a href="/product/{{$p->url}}"><img src="{{ asset('img/product_images/'.$default[0]) }}" ></a> 
            <div class="overlay-right">
            <a href="/product/{{$p->url}}">
            
            <button type="button" class="btn btn-secondary" title="Quick Shop" onclick="window.location='/product/{{$p->url}}';">
               <i class="fa fa-eye"></i> 
            </button>
          
            </a>
            <form action="{{route('addToCart')}}" method="POST">
                @csrf
              
               <input type="hidden" value="{{$p->id}}" name="id">
               <input type="hidden" value="{{$p->preco}}" name="cost"> 
               <input type="hidden" value="{{$p->quantidade}}" name="maxQuantity"> 
               <input type="hidden" value="{{$default[0]}}" name="image"> 
               <input type="number" name="quantity" value="1" hidden>
              
               <button type="submit" class="btn btn-secondary" title="Add to Cart">
                  <i class="fa fa-shopping-cart"></i> 
               </button>
                    </form>

              
            </div>
        </div>
        <div class="product-bottom text-center">
          {{-- <i class="fa fa-star"></i>  
          <i class="fa fa-star"></i>  
          <i class="fa fa-star"></i>  
          <i class="fa fa-star"></i>  
          <i class="fa fa-star-half-o"></i>   --}}
        <h3>{{$p->nome}}</h3>
        <h5>R$ {{ number_format($p->preco, 2, ',', '.') }}</h5>
        </div>
        </div>
        @endforeach
    </div>  
    </div>
    </section>        
        
    <!----------------Website features----------------->
    
    <section class="website-features">
    <div class="container">
    <div class="row">
    <div class="col-md-3 feature-box">
    <img src="{{ asset('img/site features/fearure1-PagSeguro.png') }}" > 
    <div class="feature-text">
    <p><b>Pagamento Seguro</b></p>    
    </div>
    </div>  
    <div class="col-md-3 feature-box">
    <img src="{{ asset('img/site features/feature2-Devolução.png') }}" > 
    <div class="feature-text">
    <p><b>Receba seu pedido em até 30 dias</b></p>    
    </div>
    </div> 
    <div class="col-md-3 feature-box">
    <img src="{{ asset('img/site features/feature3-Frete.png') }}" > 
    <div class="feature-text">
    <p><b>Frete Grátis<br /></b> Para todo país</p>    
    </div>
    </div>
    <div class="col-md-3 feature-box">
    <img src="{{ asset('img/site features/feature4- PagOnline.png') }}" > 
    <div class="feature-text">
    <p><b>Pagamento Online </b>Aceitamos todos os cartões</p>    
    </div>
    </div> 
    </div>    
    </div>    
    </section>
@endsection