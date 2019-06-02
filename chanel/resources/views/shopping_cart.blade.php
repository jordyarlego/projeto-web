@extends('layouts.layout')
@section('body')
  @include('includes.menu-nav')
<div class="container mb-4" style="margin-top:3em;">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produto</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col" class="text-center">
                                {{-- Quantidade --}}
                            </th>
                            <th scope="col" class="text-right">Preço</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                            $totalCost = 0;
                            $cart = Session::get('cart');
                        @endphp
                        @if(isset($cart) && count($cart) > 0)
                        
                        @foreach($cart as $sp)
                    {{-- <a href="/{{getProductUrlById($sp['id'])}}"> --}}
                        <tr style="cursor:pointer;" onclick="window.location='/product/{{getProductUrlById($sp['id'])}}';">
                        <td><img src="{{asset('/img/product_images/'.$sp['image'])}}" style="width:60px;height:60px;" /> </td>
                        <td>{{ getProductNameById($sp['id']) }}</td>
                            <td>{{ $sp['quantity'] }}</td>
                            <td>
                            
                            </td>
                            <td class="text-right">R$ {{ number_format($sp['totalCost'], 2, ',', '.')}} </td>
                        <td class="text-right">
                        <form action="{{route('rmToCart')}}" method="post">
                            @csrf
                        <input type="hidden" value="{{$sp['id']}}" name="id">

                                <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-minus"></i></button>
                             </a>
                            </form>
                        </td>
                        </tr>
                    {{-- </a> --}}
                        @php
                            $totalCost += $sp['totalCost'];
                        @endphp
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">Nenhum produto no seu carrinho =(</td>
                        </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                        <td class="text-right"><strong>R$ {{ number_format($totalCost, 2, ',', '.')}}</strong></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="/">
                        <button class="btn btn-block btn-light">Continuar comprando</button>
                    </a>    
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    @if(auth::check())
                    <a href="/checkout">
                        <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                    </a>
                    @else
                    <a href="/register">
                        <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection