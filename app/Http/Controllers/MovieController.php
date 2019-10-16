<?php
namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movies()
    {
        $query = "
            SELECT *
            FROM `movies`
            WHERE `rating` > ?
            ORDER BY `name` ASC
            LIMIT 10
        ";

        $query_builder = DB::table('movies');
        $query_builder ->where('rating', '>', 3);
        $query_builder -> orderBy('name', 'asc');
        $query_builder -> limit(10);

        $movies = $query_builder->pluck('rating');

        $movies = DB::table('movies')
            ->where('rating', '>', 8)
            ->orderBy('name')
            ->limit(10)
            ->get();

        

        dd($movies);
    }
}
