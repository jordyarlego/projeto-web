<?php

function getProductNameById($id){

    return \DB::table('products')->where('id', $id)->value('nome');

}
function getProductUrlById($id){

    return \DB::table('products')->where('id', $id)->value('url');

}