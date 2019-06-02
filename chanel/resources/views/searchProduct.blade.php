@extends('layouts.layout')
@section('body')
@include('includes.menu-nav')
<div class="container mb-4" style="margin-top:3em;">
    <div class="row"> 
           

        @if(isset($search) && count($search) > 0 )
        <h3>O que encontramos...</h3>

        <div class="col-12 row">
           
            @foreach ($search as $p)
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
            @else
            <center><h5>Nenhum produto encontrado =(</h5></center>
            @endif
        </div>
    </div>
</div>

@endsection