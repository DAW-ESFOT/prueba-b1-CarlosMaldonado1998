<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function show(User $user)
    {
        return $user;
    }

    public function showgenres(User $user)
    {
        $user = $user->genres()->get(['genre_id']);
        return $user;
    }

    public function showallmovies(User $user, Movie $movie)
    {

        $genres = $user->genres()->get(['genre_id']);
        foreach($genres as $genre){
            $user = $movie->where('genre_id', $genre['genre_id'])->get();
        }

        return $user;
    }


    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user, 200);
    }
    public function delete(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
