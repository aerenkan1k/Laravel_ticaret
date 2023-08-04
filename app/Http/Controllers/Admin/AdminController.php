<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Book;
use App\Models\AllProduct;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdminController extends Controller
{
    public function index()
{
    $products = Product::orderBy('created_at', 'desc')->get();
    $books = Book::orderBy('created_at', 'desc')->get();
    return view('admin.index', ['products' => $products, 'books' => $books]);
}
    public function elektronikler()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.elektronikler', ['products' => $products]);
    }
    public function kitaplar()
{
    $books = Book::orderBy('created_at', 'desc')->get();
    return view('admin.kitaplar', ['books' => $books]);
}

    
  
public function create()
{
    return view('admin.create');
}

public function store(Request $request)
{
    $productType = $request->input('product_type');

    switch ($productType) {
        case 'book':
            $book = Book::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'author' => $request->input('author'),
                'book_description' => $request->input('description'),
                'photo' => $request->file('photo')->store('photos', 'public'),
            ]);
            break;
            case 'product':
                $product = Product::create([
                    'product_name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'product_description' => $request->input('description'),
                    'product_fulldescription' => $request->input('fulldescription'), 
                    'photo' => $request->file('photo')->store('photos', 'public'),
                ]);
                break;
        default:
            throw new Exception('Invalid product type');
    }

    return redirect()->route('admin.index');
}

    
    

    

    public function show(string $id)
    {
        $product = Product::find($id);
        $book = Book::find($id);

        if (!$product && !$book) {
            abort(404);
        }

        return view('admin.show', compact('product', 'book'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $book = Book::find($id);

        if (!$product && !$book) {
            abort(404);
        }

        $mergedData = collect();

        if ($product) {
            $mergedData = $mergedData->merge($product->toArray());
        }

        if ($book) {
            $mergedData = $mergedData->merge($book->toArray());
        }

        return view('admin.edit', compact('mergedData'));
    }


    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $book = Book::find($id);

        if (!$product && !$book) {
            abort(404);
        }

        if ($product) {
            $product->update($request->all());
        } elseif ($book) {
            $book->update($request->all());
        }

        return redirect()->route('admin.index')->with('success', 'Ürün başarıyla güncellendi');
    }
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $book = Book::find($id);

        if (!$product && !$book) {
            abort(404);
        }

        if ($product) {
            $product->delete();
        } elseif ($book) {
            $book->delete();
        }

        return redirect()->route('admin.index')->with('success', 'Ürün başarıyla silindi');
    }
}