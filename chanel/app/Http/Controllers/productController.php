<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductHistory;
use DB;
use Illuminate\Support\Facades\Auth;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function searchProduct(){
        if(isset($_GET) && isset($_GET['s'])){
            $g = DB::table('products')->where('nome', 'LIKE', '%'.$_GET['s'].'%')->orderBy('created_at', 'DESC')->get();
            return view('searchProduct', ['search' => $g]);

        }
    }

    public function storeCheckout(Request $request){

        if(!auth::check()) return redirect()->back()->with('error', 'Necessário estar autenticado para isto');

        if(!$request->session()->has('cart')) return redirect()->back()->with('error', 'Não achamos nada no seu carrinho');

        $cart = $request->session()->get('cart');

        if(!count($cart) > 0)
        {
            return redirect('/')->with('error', 'Este carrinho não possui itens.');

        }
            for ($i=0; $i < count($cart); $i++) { 
                # code...
            

            
        $sp = DB::table('products')->where('id', $cart[$i]['id'])->get();

        foreach ($sp as $s) {
            # code...
        if($cart[$i]['quantity'] > $s->quantidade) return redirect()->back()->with('error', 'Não temos estoque para este pedido =(');
  
        $request->validate([
                'country'=>'required',
                'state'=>'required',
                'cep'=>'required',
                'address'=>'required'
            ]);
    
            switch ($request->paymentMethod) {
                case 0:
                $request->paymentMethod = 'Debito';
                    break;
                case 1:
                $request->paymentMethod = 'Credito';
                    break;
                default:
                    return redirect()->back()->withError('error', 'O metodo de pagamento inválido')->withInput($request->all());
                    break;
            }
            $ph = new ProductHistory([
                'date' => now(),
                'product_id'    => $cart[$i]['id'],
                'quantity'      => $cart[$i]['quantity'],
                'cost'          => $s->preco*$cart[$i]['quantity'],
                'paymentMethod' => $request->paymentMethod,
                'user_id'       => auth::user()->id,
                'country'       => $request->country,
                'state'         => $request->state,
                'address'       => $request->address,
                'cep'           => $request->cep                
            ]);
            
            $request->session()->forget('cart');
            $ph->save();
            }
            
             
        }
        return redirect('/home')->with('success', 'Compra realizada com sucesso.');

    

    }

    public function deletedBuy($id){
        
        if(!auth::check()) return redirect()->back()->with('error', 'Você não esta logado para fazer isto.');

        $ph = ProductHistory::find($id);
        if($ph->user_id == auth::user()->id && $ph->status == "waiting"){
        $ph->delete();
            return redirect()->back()->with('success', 'Você cancelou sua compra com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Esta compra não é sua ou não esta disponivél para ser cancelada.');
         }


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth::check()) return redirect('/')->back()->with('error', 'você precisa efetuar o login para fazer isto.');

       return view('create_product');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
        
        $product = new Product;

        $request->validate([
            'nome'=>'required|min:5',
            'preco'=>'required|min:2',
            'quantidade'=>'required|min:1'
        ]);


        if($request->hasfile('images'))
            {

        foreach($request->file('images') as $image)
        {
            $imgtemp = time();
            $name= mt_rand(100, 9999) . "-" . mt_rand(100,999) . $image->getClientOriginalExtension();
            $image->move(public_path().'/img/product_images', $name);  
            $data[] = $name;
        }
     }

     
            $product->images = json_encode($data);
            

        $product->nome = $request->nome;
        $product->preco = str_replace(',', '.', $request->preco);
        $product->descricao = $request->descricao;
        $product->tamanho = $request->tamanho;
        $product->quantidade = $request->quantidade;

        $url = str_replace(" ","-", $request->input('name'));
            $url = strtolower($url);
            $url = $url.'-'.mt_rand(100, 999);
            $product->url = $url;


        $product->save();
        return redirect('product/'.$url);

       } catch (Exception $e) {

        return redirect()->back()->with('Error', $e);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $product = DB::table('products')->where('url', $url)->get();
        $recommends = DB::table('products')->orderBy('created_at', 'DESC')->limit(4)->get();
        if(count($product) > 0)
            return view('product.show', [
                'product'      =>      $product,
                'reco'  =>  $recommends
                ]);
        else
            return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
