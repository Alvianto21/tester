<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

use function Valet\user;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostController extends Controller
{
    //
    use HasFactory;
    public function index() {
        $title ='';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'in ' . $category->name;
        }        
        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = 'by ' . $author->name;
        }        
        return view('posts', [
            'title' => 'All Posts ' . $title,
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
            'active' => 'posts'
        ]);
    }
    public function show(Post $post) {
        return view('post', [
            'title' => 'Posts',
            'posts' => $post,
            'active' => 'posts'
        ]);
    }
        
}
