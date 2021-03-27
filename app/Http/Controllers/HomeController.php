<?php

namespace App\Http\Controllers;

use App\Background;
use App\Crud;
use App\Image;
use App\Jorney;
use App\Line;
use App\Post;
use App\Price;
use App\Service;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $journeis = Jorney::all();
        $lines = Line::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $backgrounds = Background::all();
        $video = Video::all()->first();
        $cruds = Crud::where('web_page', 'part1')->orderBy('created_at', 'desc')->paginate(6);
        $lineorta = Line::inRandomOrder()->take(8)->get();
        $linefooter = Line::inRandomOrder()->take(5)->get();
        $journeisfooter = Jorney::inRandomOrder()->take(5)->get();
  //      dd($post);
     // dd($video);
        return view('home', compact('journeisfooter','journeis','lines','posts','backgrounds','video','cruds','lineorta','linefooter'));
    }
    public function post($id)
    {
        $journeis = Jorney::all();
        $lines = Line::all();

        $selectedCrud = Crud::findorFail($id);
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        $cruds = Crud::where('web_page', 'part1')->orderBy('created_at', 'desc')->paginate(6);
        $lineorta = Line::inRandomOrder()->take(8)->get();
        $linefooter = Line::inRandomOrder()->take(5)->get();
        $journeisfooter = Jorney::inRandomOrder()->take(5)->get();
        //      dd($post);
        // dd($video);
        return view('post', compact('journeisfooter','journeis','lines','posts','selectedCrud','cruds','lineorta','linefooter'));
    }
    public function line($id)
    {
        $journeis = Jorney::all();
        $lines = Line::all();

        $selectedLine = Line::findorFail($id);
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        $cruds = Crud::where('web_page', 'part1')->orderBy('created_at', 'desc')->paginate(6);
        $lineorta = Line::inRandomOrder()->take(8)->get();
        $linefooter = Line::inRandomOrder()->take(5)->get();
        $journeisfooter = Jorney::inRandomOrder()->take(5)->get();

        $linearray= preg_split("/[-]/",$selectedLine->duration);
        $timearray= preg_split("/[-]/",$selectedLine->startingTime);

        //      dd($post);
        // dd($video);
        return view('line', compact('timearray','linearray','journeisfooter','journeis','lines','posts','selectedLine','cruds','lineorta','linefooter'));
    }


    public function journy($id)
    {
        $journeis = Jorney::all();
        $lines = Line::all();

        $selectedjourney= Jorney::findorFail($id);
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        $cruds = Crud::where('web_page', 'part1')->orderBy('created_at', 'desc')->paginate(6);
        $lineorta = Line::inRandomOrder()->take(8)->get();
        $linefooter = Line::inRandomOrder()->take(5)->get();
        $journeisfooter = Jorney::inRandomOrder()->take(5)->get();

        $linearray= preg_split("/[-]/",$selectedjourney->adres);
         //     dd($selectedjourney->name);
 //    dd($linefooter);
        $this->x = $selectedjourney->name;
        $newData = $lines->flatten()->filter(function($val) {
                $myString = $val->name;

            $splitTokens = explode("-", $myString);
            $string1 = $splitTokens[0];
                $contains = Str::contains($string1, $this->x);

            return $contains;
        });
        return view('journey', compact('newData','linearray','journeisfooter','journeis','lines','posts','selectedjourney','cruds','lineorta','linefooter'));
    }
    public function about()
    {

        $journeis = Jorney::all();
        $lines = Line::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $backgrounds = Background::all();
        $video = Video::all()->first();
        $cruds = Crud::where('web_page', 'part1')->orderBy('created_at', 'desc')->paginate(6);
        $crudsPart2 = Crud::where('web_page', 'part2')->orderBy('created_at', 'desc')->paginate(6);
        $lineorta = Line::inRandomOrder()->take(8)->get();
        $linefooter = Line::inRandomOrder()->take(5)->get();
        $journeisfooter = Jorney::inRandomOrder()->take(5)->get();
        $part1 = Crud::where('web_page', 'part3')->paginate(50);
        //      dd($post);
        // dd($video);
        return view('about', compact('part1','crudsPart2','journeisfooter','journeis','lines','posts','backgrounds','video','cruds','lineorta','linefooter'));

    }
    public function work()
    {

        $journeis = Jorney::all();
        $lines = Line::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $backgrounds = Background::all();
        $video = Video::all()->first();
        $cruds = Crud::where('web_page', 'part1')->orderBy('created_at', 'desc')->paginate(6);
        $crudsPart2 = Crud::where('web_page', 'part1')->orderBy('created_at', 'desc')->paginate(6);
        $lineorta = Line::inRandomOrder()->take(8)->get();
        $linefooter = Line::inRandomOrder()->take(5)->get();
        $journeisfooter = Jorney::inRandomOrder()->take(5)->get();
        $part1 = Crud::where('web_page', 'part3')->paginate(50);
        //      dd($post);
        // dd($video);
        return view('work', compact('part1','crudsPart2','journeisfooter','journeis','lines','posts','backgrounds','video','cruds','lineorta','linefooter'));

    }

    public function contactus()
    {
        $video = Video::all()->first();
        $logos = Image::all();
        $part1 = Crud::where('web_page', 'part1')->paginate(50);
        return view('contactus', compact('part1','video','logos'));
    }


    public function services()
    {
        $journeis = Jorney::all();
        $lines = Line::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $backgrounds = Background::all();
        $video = Video::all()->last();
        $cruds = Crud::where('web_page', 'part1')->orderBy('created_at', 'desc')->paginate(6);
        $crudsPart2 = Crud::where('web_page', 'part2')->orderBy('created_at', 'desc')->paginate(6);
        $lineorta = Line::inRandomOrder()->take(8)->get();
        $linefooter = Line::inRandomOrder()->take(5)->get();
        $journeisfooter = Jorney::inRandomOrder()->take(5)->get();
        //      dd($post);
        // dd($video);
        return view('services', compact('crudsPart2','journeisfooter','journeis','lines','posts','backgrounds','video','cruds','lineorta','linefooter'));

    }

}
