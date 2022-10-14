<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{

    // read data from the database and show them in the table in the home page
    public function index()
    {
        // $books = [
        //     ['title' => 'Jhon', 'description' => 'An amazing book', 'author' => 'Jhon', 'image' => 'http://smartmobilestudio.com/wp-content/uploads/2012/06/leather-book-preview.png'],
        //     ['title' => 'malek', 'description' => 'fantastic book', 'author' => 'malek', 'image' => 'https://www.pngfind.com/pngs/m/60-605540_plain-book-transparent-image-plain-book-cover-png.png'],
        //     ['title' => 'sally', 'description' => 'children book', 'author' => 'sally', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCFQM8HSub1R8XnR5SiS79DRNnWKeqhZQVhmnsYuJSRfvwNVo76Au5uzCsbUdRbBschNA&usqp=CAU'],
        //     ['title' => 'omar', 'description' => 'children book', 'author' => 'Omar', 'image' => 'https://www.freeiconspng.com/uploads/book-icon--mixed-iconset--simiographics-0.png'],
        //     ['title' => 'mohammed', 'description' => ' book', 'author' => 'mohammed', 'image' => 'http://smartmobilestudio.com/wp-content/uploads/2012/06/leather-book-preview.png']
        // ];

        // return view('home', ['allBooks' => $books]);

        $book = Books::all();

        return view('/home', ['allBooks' =>$book]);

    }

    // insert data into the database 
    public function create(Request $request){

        $newBook = new Books;

        $newBook->book_title = $request->title ;
        $newBook->Description = $request->Description;
        $newBook->Author = $request->Author;
        $newBook->image = $request->image;

        $newBook->save();
        
    }
};
