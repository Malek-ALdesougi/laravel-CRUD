<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{

    // read data from the database and show them in the table in the home page
    public function index()
    {
        $book = Books::all();

        return view('/home', ['allBooks' => $book]);
    }


    // insert data into the database 
    public function create(Request $request)
    {

        $request->validate([
            'title' => 'Required|max:50',
            'Description' => 'Required',
            'Author' => 'Required',
            'image' => 'Required'
        ]);

        // saving the imgae into the storage 
        $bookImage = $request->file('image');
        //Retrieving The Original Name Of An Uploaded File
        $extension = $bookImage->getClientOriginalExtension();
        Storage::disk('public')->put($bookImage->getFilename().'.'.$extension,  File::get($bookImage));
      

        $newBook = new Books;

        $newBook->book_title = $request->title;
        $newBook->Description = $request->Description;
        $newBook->Author = $request->Author;
        $newBook->image = $bookImage->getFilename().'.'.$extension;

        $newBook->save();

        return redirect('/home');
    }
};
