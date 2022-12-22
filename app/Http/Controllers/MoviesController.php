<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
class MoviesController extends Controller
{
    
    public function index()
    {
        // Get - all data from database
        $movies = Movies::all();

        return response()->json($movies);
    }

   
    public function store(Request $request)
    {
        // POST Data to database from user

        // validation

        $this->validate($request,[
            'title' => 'required'
        ]);

        $movies = new Movies();

        //image data

        // if($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $allowedfileExtension = ['pdf','png','jpg'];
        //     $extension = $file->getClientOriginalExtension();
        //     $check = in_array($extension, $allowedfileExtension);

        //     if($check) {
        //         $name = time() . $file->getClientOriginalName();
        //         $file->move('images', $name);
        //         $movies->photo = $name;
        //     }
        // }

        // text data
        $movies->title = $request->input('title');

        $movies->save();

        return response()->json($movies);
    }

    
    public function show($id)
    {
        // give 1 items from movies table
        $movies = Movies::find($id);

        return response()->json($movies);
    }

   
    public function update(Request $request, $id)
    {
        // Update- ID

        $this->validate($request,[
            'title' => 'required'
        ]);

        $movies = Movies::find($id);

        $movies->title = $request->input('title');

        $movies->save();

        return response()->json($movies);
    }

   
    public function destroy($id)
    {
        // Delete- ID
        $movies = Movies::find($id);
        $movies->delete();
        return response()->json('A film sikeresen törölve');
    }
}
