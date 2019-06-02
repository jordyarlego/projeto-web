@extends('layouts.layout')
@section('body')


@include('includes.menu-nav')

<!-------------Single Product------------->    
@if(count($product) > 0)

@foreach ($product as $p)   
<?php $images = json_decode($p->images);?>
<section class="single-product">
<div class="container">
<div class="row">
<div class="col-md-5">
    <div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <?php $count = 0; ?>
    @foreach($images as $i)    

    <div class="carousel-item {{ $count == 0 ? 'active' : '' }}">

      <img src="{{ asset('img/product_images/'.$i ) }}" class="d-block">
    </div>
    <?php $count++; ?>
    @endforeach 

      <a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  
</div>
</div>   
    
 <div class="col-md-7">
       
   
    
     <p class="new-arrival text-center">Novo</p>
     <h2>{{$p->nome}}</h2>
     <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>  
        
     <p class="price">R$ {{ number_format($p->preco, 2, ',', '.') }}</p>
     {{-- <p><b>Marca:</b> Nike</p> --}}
     <p><b>Frete:</b> Grátis</p>
     <p class="redtext">Quantidade em estoque: {{$p->quantidade}}</p>
     

 <form action="{{route('addToCart')}}" method="POST">
  @csrf

 <input type="hidden" value="{{$p->id}}" name="id">
 <input type="hidden" value="{{$p->preco}}" name="cost"> 
 <input type="hidden" value="{{$p->quantidade}}" name="maxQuantity"> 
 <input type="hidden" value="{{$images[0]}}" name="image"> 
 <input type="number" name="quantity" value="1">

        <button type="submit" class="btn btn-primary">Adicionar ao carrinho</button>
      </form>

       

</div>    
</div>    
</div>    
</section>
    
<!------------product-description-------------->
    
<section class="product-description">
<div class="container">
<h6><strong>Descrição</strong></h6>

{{$p->descricao}}
    
<hr>    
</div> 

@endforeach

@endif
<div class="container">
    <div class="title-box">
    <h2>Recomendados</h2>
    </div>
    <div class="row">
      @if(count($reco) > 0)
        @foreach ($reco as $r)
        @php
        $default = json_decode($r->images);
    @endphp
            
        
    <div class="col-md-3">
    <div class="product-top">
        <a href="/product/{{$r->url}}"><img src="{{ asset('img/product_images/'.$default[0] ) }}"></a> 
        <div class="overlay-right">
            <button type="button" class="btn btn-secondary" title="Adicionar ao Carrinho">
           <i class="fa fa-shopping-cart"></i> 
        </button>
        </div>
    </div>
     <div class="product-bottom text-center">
      {{--
        <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>  
      <i class="fa fa-star"></i>    --}}
      <h3>{{$r->nome}}</h3>
      <h5>R$ {{ number_format($r->preco, 2, ',', '.') }}</h5>
    </div>
    </div>
    @endforeach
    @endif
  
    
    </div>
</div>
    
</section>    
@endsection