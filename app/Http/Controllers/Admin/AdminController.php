<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Book;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        $books = Book::orderBy('created_at', 'DESC')->get();
        $mergedData = $products->merge($books); // Product ve Book verilerini birleştir
    
        return view('admin.index', compact('mergedData'));
    }
    
  
    public function create()
    {
        return view('admin.create');
    }
    
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|in:book,product',
            'author' => 'nullable|string',
            'photo' => 'nullable|string',
            'book_description' => 'string',
        ]);
    
        if ($validatedData['type'] === 'book') {
            Book::create($validatedData);
            $message = 'Kitap başarıyla eklendi';
        } elseif ($validatedData['type'] === 'product') {
            Product::create($validatedData);
            $message = 'Ürün başarıyla eklendi';
        } else {
            return redirect()->route('admin.index')->with('error', 'Geçersiz ürün tipi');
        }
    
        return redirect()->route('admin.index')->with('success', $message);
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

/**
 * Show the form for editing the specified resource.
 */
public function edit($id)
{
    $product = Product::find($id);
    $book = Book::find($id);

    if (!$product && !$book) {
        abort(404);
    }

    // Merge data from $product and $book into a single variable $mergedData
    $mergedData = collect();

    if ($product) {
        $mergedData = $mergedData->merge($product->toArray());
    }

    if ($book) {
        $mergedData = $mergedData->merge($book->toArray());
    }

    return view('admin.edit', compact('mergedData'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // Hem Product hem de Book tablolarında ilgili ID'ye sahip bir kayıt arayın.
    $product = Product::find($id);
    $book = Book::find($id);

    // Eğer hem Product hem de Book'ta böyle bir kayıt yoksa, 404 hatası döndürün.
    if (!$product && !$book) {
        abort(404);
    }

    // İlgili kaydı güncelleyin.
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