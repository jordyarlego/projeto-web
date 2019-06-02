@extends('layouts.home_layout')
@section('body')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo Produto</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button class="btn btn-sm btn-outline-secondary">Exportar</button>
      </div>     
    </div>
  </div>
<form action="/product/store" class="form" method="post" enctype="multipart/form-data">
  
    @csrf
        <div class="form-group">
                <label for="exampleFormControlFile1">Imagens: *Selecione control para adicionar mais de uma.</label>
                <input name="images[]" type="file" class="form-control-file" id="exampleFormControlFile1" multiple="multiple">
              </div>
    <div class="row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nome</label>
          <input name="nome" type="text" class="form-control" id="inputEmail4" minlength="5" maxlength="30" placeholder="Nome do Produto" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Preço</label>
          R$ <input name="preco" type="text" class="form-control price" id="inputCost" placeholder="0,00" required>
        </div>
      </div>
      <script>
      $(document).ready(function(){
  $('#inputCost').mask("#.##0,00", {reverse: true});
      });
  </script>

      <div class="form-group">
        <label for="inputAddress">Descrição</label>
        <textarea class="form-control" name="descricao" maxlength="100" id="inputAddress" rows="5"></textarea>
      </div>

     <div class="row">
      <div class="form-group col-md-6">
        <label for="inputAddress2">Tamanho</label>
        <select id="inputState" name="tamanho" class="form-control" required>
            <option selected disabled>Escolha o Tamanho</option>
            <option value="P">P</option>
            <option value="M">M</option>
            <option value="G">G</option>
              </select>

      </div>

      <div class="form-group col-md-6" >
            <label for="inputAddress2">Quantidade</label>
          <input type="number" name="quantidade" value="0" class="form-control" required>
          </div>

        </div>
      <button type="submit" class="btn btn-primary">Create</button>

</form>
</div>
<script>
  $(document).ready(function(){

    $('.price').mask("#.##0,00", {reverse: true});


  });

</script>
@endsection
