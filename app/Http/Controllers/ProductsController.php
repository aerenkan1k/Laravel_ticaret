<?php
  
namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;  
use Illuminate\Http\Request;
use App\Models\Product; 
  
class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
  
    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
  
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "photo" => $product->photo,
                "price" => $product->price,
                "quantity" => 1
            ];
        }
  
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Ürün sepetinize eklendi.');
    }
  
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Sepetiniz güncellendi.');
        }
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Ürün sepetten kaldırıldı.');
        }
    }
    public function changelocale(){
        if(session()->get('locale')=='tr')
        {
            session()->put('locale','en');
            App::setLocale('en');
        }
        else{
            session()->put('locale','tr');
            App::setLocale('tr');
        }
        return redirect()->back();
        
    }

}