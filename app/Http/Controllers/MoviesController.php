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
        $count = 0;

        foreach ($movies as $result) {
            $count++;
            echo  $count. ". " . $result->title;
            echo "<br />";
        }
    }
    public function toprated()
    {
        // toprated 220

        echo "<a target='_blank' href='https://www.themoviedb.org/'><img src='https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_2-d537fb228cf3ded904ef09b136fe3fec72548ebc1fea3fbbd1ad9e36364db38b.svg' height='50px' alt='The Movie DataBase'/></a>";
        echo "<br />This product uses the TMDB API but is not endorsed or certified by TMDB.<br />";
        echo "<br /><u>Top Rated Movies:</u><br /><br />";
        $count = 0;

        for ($x=1; $x < 12; $x++) {
    
            $url_single = "https://api.themoviedb.org/3/movie/top_rated?api_key=93b20005a7082547745bfa44e9379899&page={$x}&language=hu-HU";
            $json_single = file_get_contents($url_single);
            $obj_single = json_decode($json_single);

            foreach ($obj_single->results as $result) {
                $count++;
                echo  $count. ". " . $result->title;
                echo "<br />";
            }
        }
        echo "<br />";
                

                
            }

    public function show($id)
    {
        // give 1 items from movies table
            $movies = Movies::find($id);

            echo $movies->title;
        }


   
    public function store(Request $request)
    {
        
         $count = 0;
        // for ($x=1; $x < 12; $x++) {
            $x = 1;
            $url_single = "https://api.themoviedb.org/3/movie/top_rated?api_key=93b20005a7082547745bfa44e9379899&page={$x}&language=hu-HU";
            $json_single = file_get_contents($url_single);
            $obj_single = json_decode($json_single);

            $data = $obj_single->results[1];

            //$request["title"] = $obj_single->title;

        //     foreach ($object_single->results as $result) {
        //         $count++;
        //         echo  $count. ". " . $result->title;
        //         echo "<br />";
        //     }
        // }

         //validate
        // $this->validate($request, [
          //   "title" => "required"
         //]);
        
         // POST Data to database from user
         $movies = new Movies();
         $movies->title = $request->input('title');
         $movies->save();

         return response()->json($movies, 201);
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
        echo "ez frissit";
    }

   
    public function destroy($id)
    {
        // Delete- ID
        $movies = Movies::find($id);
        $movies->delete();
        return response()->json('A film sikeresen törölve');
        echo "ez töröl";
    }
}
