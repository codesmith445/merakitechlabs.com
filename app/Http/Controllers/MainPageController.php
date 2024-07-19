<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $categories = Post::select('category')->distinct()->get();
        // logic for search input
        $query = $request->input('query');
        // \DB::enableQueryLog();
        // $phpPosts = Post::where('category', 'php')->get();
        // $javascriptPosts = Post::where('category', 'javascript')->get();
        // $laravelPosts = Post::where('category', 'laravel')->get();
        // logic for display data and display search
        // $phpPosts = Post::where('category', 'php')->where('title', 'like', '%' .$query . '%')->get();
        // $javascriptPosts = Post::where('category', 'javascript')->where('title', 'like', '%' .$query . '%')->get();
        // $laravelPosts = Post::where('category', 'laravel')->where('title', 'like', '%' .$query . '%')->get();
        
        // logic for display data and display search
        // $phpPosts = Post::where('category', 'php');
        // $javascriptPosts = Post::where('category', 'javascript');
        // $laravelPosts = Post::where('category', 'laravel');

        $phpPosts = Post::where('category', 'php')->take(6);
        $javascriptPosts = Post::where('category', 'javascript')->take(6);
        $laravelPosts = Post::where('category', 'laravel')->take(6);
        $nodejsPosts = Post::where('category', 'nodejs')->take(6);
        $pythonPosts = Post::where('category', 'python')->take(6);
        
        // Add the title search condition only if $query is not empty
        if ($query) {
            $phpPosts->where('title', 'like', '%' . $query . '%');
            $javascriptPosts->where('title', 'like', '%' . $query . '%');
            $laravelPosts->where('title', 'like', '%' . $query . '%');
            $nodejsPosts->where('title', 'like', '%' . $query . '%');
            $pythonPosts->where('title', 'like', '%' . $query . '%');
        }
        $phpPosts = $phpPosts->get();
        $javascriptPosts = $javascriptPosts->get();
        $laravelPosts = $laravelPosts->get();
        $nodejsPosts = $nodejsPosts->get();
        $pythonPosts = $pythonPosts->get();
        // dd(\DB::getQueryLog());
        // logic to display no post found in search
        
        return view('merakitech.index', compact('phpPosts', 'javascriptPosts', 'laravelPosts', 'nodejsPosts', 'pythonPosts', 'categories'));
    }

    public function projectDetails($id) {
        $post = Post::findOrFail($id);
        $categories = Post::select('category')->distinct()->get();
        $category = $post->category;
        $relatedPosts = Post::where('category', $category)->limit(3)->get();
        $phpPosts = Post::where('category', 'php')->get();
        $javascriptPosts = Post::where('category', 'javascript')->get();
        $laravelPosts = Post::where('category', 'laravel')->get();
        $nodejsPosts = Post::where('category', 'nodejs')->get();
        $pythonPosts = Post::where('category', 'python')->get();

        // Fetch recent posts
        $recentPosts = Post::latest()->limit(5)->get();

        return view('merakitech.project-details', compact('post', 'relatedPosts', 'phpPosts', 'javascriptPosts', 'laravelPosts', 'nodejsPosts', 'pythonPosts', 'categories', 'recentPosts'));
        // return view('merakitech.project-details');
    }

    public function projectLists($category) {
        // $posts = Post::where('category', $category)->get();
        $posts = Post::where('category', $category)->paginate(6);
        $categories = Post::select('category')->distinct()->get();
        return view('merakitech.project-lists', compact('posts', 'category', 'categories'));
    }
    
    public function allProjectLists() {
        $posts = Post::paginate(6);
        return view('merakitech.allproject-lists', compact('posts'));
    }

    public function about() {
        $phpPosts = Post::where('category', 'php')->get();
        $javascriptPosts = Post::where('category', 'javascript')->get();
        $laravelPosts = Post::where('category', 'laravel')->get();
        $nodejsPosts = Post::where('category', 'nodejs')->get();
        $pythonPosts = Post::where('category', 'python')->get();
        $categories = Post::select('category')->distinct()->get();
        return view('merakitech.about', compact('phpPosts', 'javascriptPosts', 'laravelPosts', 'nodejsPosts', 'pythonPosts', 'categories'));
    }

    public function freeEbook() {
        return view('merakitech.free-ebook');
    }

}
