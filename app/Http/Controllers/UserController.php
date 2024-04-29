<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function manageUsers()
    {

        $users = User::orderBy('role', 'asc')->simplePaginate(10);
        return view('manage-users', compact('users'));
    }

    public function removeUser(string $id)
    {
        $user = User::find($id);
        if ($user->role == 1) {
            return 'You cannot delete an admin.';
        }
        $user->delete();
        return  redirect(route('users.manage'));
    }

    /**
     * Returns the login page
     * */
    public function login()
    {
        return view('login');
    }

    /**
     * Login function to handle login data
     * */
    public function loginSubmit(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('login-success', 'yes');
        }
        return redirect(route('login'))->with('login_error', 'error');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User',
            'password' => 'required|min:8',
        ], [
            'email.unique' => 'This email is already associated with another account. Login!'
        ]);
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        /*
         *
         * File Upload Handling
         *
         * */

        $name = time() . '_userDP_' . $request->profile_pic->getClientOriginalName();
        $path = $request->file('profile_pic')->storeAs('public/avatars', $name);

        $user->profile_pic = $name;

        $user->save();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('login-success', 'yes');
        }

        return redirect(route('login'))->with('registration_success', 'true');
    }


    public function logoutSubmit()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    public function addFavouriteBook(Request $request, string $book_id)
    {
        $user = Auth::user();
        $book = Book::find($book_id);

        $user->favoriteBooks()->attach($book, ['note' => $request->input('note')]);
//        return User::with('favoriteBooks')->get();
        return redirect(route('favbooks.index'));
    }

    public function removeFavouriteBook(string $book_id)
    {
        $user = Auth::user();
        $book = Book::find($book_id);

        $user->favoriteBooks()->detach($book);
        return redirect(route('favbooks.index'));
    }


    public function favouriteBooks()
    {
        $user = Auth::user();
        // return $user->favoriteBooks;
        return view('user-favs', ['books' => $user->favoriteBooks]);
        // Directly reverse here: ()->orderByDesc('id')->get()
        // But i am reversing it in the view file so that i can use it un-reversed too when needed.
    }
}
