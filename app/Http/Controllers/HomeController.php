<?php 

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller {
    public function index() {
        return view('home', [
            'title'=> 'Home',
            'active'=> 'home',
            'posts' => Post::latest()->limit(5)->get()
        ]);
    }
}