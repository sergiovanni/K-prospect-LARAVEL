<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Mail\CommercialCreated;
use Illuminate\Support\Facades\DB;




class CommercialController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs ayant le rôle 'commercial'
        $commercials = User::whereHas('roles', function($query) {
            $query->where('name', 'commercial');
        })->get();

        $commercialCount = User::whereHas('roles', function($query) {
            $query->where('name', 'commercial');
        })->count();

        // dd($commercialCount);
        return view('commercials.index', compact('commercials'));
    }

    public function adminIndex()
    {
        $commercials = User::whereHas('roles', function($query) {
            $query->where('name', 'commercial');
        })->get();
        
        $commercialCount = User::whereHas('roles', function($query) {
            $query->where('name', 'commercial');
        })->count();
        
        dd($commercialCount);
        return view('home_admin', compact('commercialCount'));
    }


    public function create()
    {
        return view('commercials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $password = Str::random(8);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        $user->assignRole('commercial');

        Mail::to($user->email)->send(new CommercialCreated($user, $password));

        return redirect()->route('commercials.index')->with('success', 'Commercial created and email sent.');
    }
}
