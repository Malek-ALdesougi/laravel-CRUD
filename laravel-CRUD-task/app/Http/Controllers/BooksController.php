<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    public function index()
    {
        $books = [
            ['title' => 'Jhon', 'description' => 'An amazing book', 'author' => 'Jhon', 'image' => 'http://smartmobilestudio.com/wp-content/uploads/2012/06/leather-book-preview.png'],
            ['title' => 'malek', 'description' => 'fantastic book', 'author' => 'malek', 'image' => 'https://www.pngfind.com/pngs/m/60-605540_plain-book-transparent-image-plain-book-cover-png.png'],
            ['title' => 'sally', 'description' => 'children book', 'author' => 'sally', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCFQM8HSub1R8XnR5SiS79DRNnWKeqhZQVhmnsYuJSRfvwNVo76Au5uzCsbUdRbBschNA&usqp=CAU'],
            ['title' => 'omar', 'description' => 'children book', 'author' => 'Omar', 'image' => 'https://www.freeiconspng.com/uploads/book-icon--mixed-iconset--simiographics-0.png'],
            ['title' => 'mohammed', 'description' => ' book', 'author' => 'mohammed', 'image' => 'http://smartmobilestudio.com/wp-content/uploads/2012/06/leather-book-preview.png']
        ];

        return view('home', ['allBooks' => $books]);
    }
};
