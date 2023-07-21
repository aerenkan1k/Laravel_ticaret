<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;


class Item2Controller extends Controller
{
    public function update(Request $request,$id){
        $data = $request->only('name','author','photo','price');
        $books = Book::find($id);
        $books->update($data);

        return BookResource::make($books);
    }
}
