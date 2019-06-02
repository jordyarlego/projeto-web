@extends('layouts.home_layout')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Resumo</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <button class="btn btn-sm btn-outline-secondary">Exportar</button>
        </div>     
      </div>
    </div>
    <div>
            <h2 class="h2">Perfil</h2>
            <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                        <td>Nome:</td><td>{{auth::user()->name}}</td>                        
                        </tr>
                        <tr>
                             <td>E-mail</td><td>{{auth::user()->email}}</td>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
    </div>
    <hr>
    <h2>Historico de compras</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Quantidade</th>
            <th>Produto</th>
            <th>Preço</th>            
            <th>Status</th>            
            <th>Actions</th>            
          </tr>
        </thead>
        <tbody>
            @if(isset($productsh) && count($productsh) > 0 )
            @php
                $i = count($productsh);
            @endphp
            @foreach ($productsh as $ph)
            
                
            
          <tr>
            <td>{{$ph->quantity}}</td>
            <td>{{ getProductNameById($ph->product_id)}}</td>
          <td>R$ {{ number_format($ph->cost, 2, ',', '.') }}</td>
            <td>{{ $ph->status }}</td>
            
            <td>
                @if($ph->status == "waiting")
                
            <a href="/deletedBuy/{{$ph->id}}">
                    <button class="btn btn-warning"><i class="fa fa-times" aria-hidden="true"></i></button>
                </a>

                @endif
                
            </td>
            
          </tr>
          @php
                $i--;
            @endphp
          @endforeach

          @else
          <tr>
              <td colspan="7" style="text-align:center;">Nenhuma compra encontrada.</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
@endsection
