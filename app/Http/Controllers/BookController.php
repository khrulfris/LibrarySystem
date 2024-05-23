<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $Books = Book::paginate(15);
        return view('index', compact('Books'));
    }

    public function create(){
        return view('addBook');
    }

    public function store(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('book.index')
        ->with('success','Book saved successfully.','OK');
    }

    public function show(Book $book){
    }

    public function edit(Book $book){
    }

    public function update()
    {
        $book->update($request->all());
        return redirect()->back()
        ->with('success','Book updated successfully.','OK');
    }

    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('book.index')
        ->with('success','Book deleted successfully.','OK');
    }
}
