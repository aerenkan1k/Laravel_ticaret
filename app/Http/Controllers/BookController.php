<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Book;
 
class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }
   
    public function bookCart()
    {
        return view('cart');
    }
    public function addBooktoCart($id)
    {
        $book = Book::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $book->name,
                "quantity" => 1,
                "price" => $book->price,
                "photo" => $book->photo
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Kitap sepete eklendi.');
    }
     
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Kitap sepete eklendi.');
        }
    }
   
    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Kitap sepetten çıkarıldı.');
        }
    }
}