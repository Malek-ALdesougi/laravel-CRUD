<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class BooksController extends Controller
{
    // read data from the database and show them in the table in the home page
    public function index()
    {
        $book = Books::all();
        $name = Auth::user();
        return view('/home', ['allBooks' => $book, 'user' => $name]);

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
        Storage::disk('public')->put($bookImage->getFilename() . '.' . $extension,  File::get($bookImage));

        $newBook = new Books;
        $newBook->book_title = $request->title;
        $newBook->Description = $request->Description;
        $newBook->Author = $request->Author;
        $newBook->image = $bookImage->getFilename() . '.' . $extension;

        $newBook->save();
        return redirect('/home');
    }

    public function post($id)
    {
        $book = Books::find($id);
        return view('/edit', ['book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'Required|max:50',
            'Description' => 'Required',
            'Author' => 'Required',
            'image' => 'Required',
        ]);

        // saving the imgae into the storage 
        $bookImage = $request->file('image');
        //Retrieving The Original Name Of An Uploaded File
        $extension = $bookImage->getClientOriginalExtension();
        Storage::disk('public')->put($bookImage->getFilename() . '.' . $extension,  File::get($bookImage));

        $updateBook = Books::find($id);
        $updateBook->book_title = $request->title;
        $updateBook->Description = $request->Description;
        $updateBook->Author = $request->Author;
        $updateBook->image = $bookImage->getFilename() . '.' . $extension;

        $updateBook->save();
        return redirect('/home');
    }

    public function delete($id)
    {
        $book = Books::find($id);
        $book->delete();
        return redirect('home')->with('success', 'Book deleted successfully');
    }

    public function search(Request $request)
    {
        $get_book = $request->search_book;
        $book = Books::where('book_title', 'LIKE', '%' . $get_book . '%')->get();
        return view('search', compact('book'));
    }

    public function author($name)
    {

        return view('/author', ['author' => Books::where('author', $name)->get()]);
    }
    // , author::where('name' , $name)]


    public function login(Request $request)
    {
        // dump($request->all());
        // die;
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //    if(Auth::attempt([$credentials]))
        //    {
        //     //login success 
        //     return redirect('home');
        //    }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/home');
        }

        return back()->with('error', 'Your email or password are not correct ');
    }


    public function userRegisteration(Request $req)
    {

        $newUser = $req->validate([
            'name' => 'required',
            'email' =>'required|unique:users',
            'password' =>'required'
        ]);

        $user = new User;

        $user->name = $newUser['name'];
        $user->email = $newUser['email'];
        $user->password =Hash::make($newUser['password']);
        $user->save();

        return redirect('login');
    }


    public function logoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }


};