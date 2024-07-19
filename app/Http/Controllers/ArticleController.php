<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        
        return view('articles.index');
    }

    public function articleUserView(Request $request) {
        $categories = Post::select('category')->distinct()->get();
        // Include Post for Dropdown header
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
        $phpPosts = Post::where('category', 'php');
        $javascriptPosts = Post::where('category', 'javascript');
        $laravelPosts = Post::where('category', 'laravel');
        
        
        // Add the title search condition only if $query is not empty
        if ($query) {
            $phpPosts->where('title', 'like', '%' . $query . '%');
            $javascriptPosts->where('title', 'like', '%' . $query . '%');
            $laravelPosts->where('title', 'like', '%' . $query . '%');
        }
        $phpPosts = $phpPosts->get();
        $javascriptPosts = $javascriptPosts->get();
        $laravelPosts = $laravelPosts->get();
        //End Include Post for Dropdown header


        $articleCategories = Article::select('category')->distinct()->get();
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
        $aiArticles = Article::where('category', 'ai');
        $blockchainArticles = Article::where('category', 'blockchain');
        $businessArticles = Article::where('category', 'business');
        $cybersecurityArticles = Article::where('category', 'cybersecurity');
        $datascienceArticles = Article::where('category', 'datascience');
        $iotArticles = Article::where('category', 'iot');
        $remoteworkArticles = Article::where('category', 'remotework');
        
        
        // Add the title search condition only if $query is not empty
        if ($query) {
            $aiArticles->where('title', 'like', '%' . $query . '%');
            $blockchainArticles->where('title', 'like', '%' . $query . '%');
            $businessArticles->where('title', 'like', '%' . $query . '%');
            $cybersecurityArticles->where('title', 'like', '%' . $query . '%');
            $datascienceArticles->where('title', 'like', '%' . $query . '%');
            $iotArticles->where('title', 'like', '%' . $query . '%');
            $remoteworkArticles->where('title', 'like', '%' . $query . '%');
        }
        $aiArticles = $aiArticles->limit(3)->get();
        $blockchainArticles = $blockchainArticles->limit(3)->get();
        $businessArticles = $businessArticles->limit(3)->get();
        $cybersecurityArticles = $cybersecurityArticles->limit(3)->get();
        $datascienceArticles = $datascienceArticles->limit(3)->get();
        $iotArticles = $iotArticles->limit(3)->get();
        $remoteworkArticles = $remoteworkArticles->limit(3)->get();
        
        // Recent Articles
        $recentArticles = Article::latest()->limit(5)->get();

        return view('articles.article-user-view', compact('articleCategories', 'aiArticles', 'blockchainArticles', 'businessArticles', 'cybersecurityArticles', 'iotArticles', 'remoteworkArticles', 'categories', 'phpPosts', 'javascriptPosts', 'laravelPosts', 'recentArticles'));
    }
    

    public function articleLists($category) {
        $recentArticles = Article::latest()->limit(5)->get();
        if ($category && $category !== 'all') {
            $articles = Article::where('category', $category)->paginate(5); 
        } else {
            $articles = Article::paginate(5);
            $category = 'All';
        }
        return view('articles.articlelists', compact('articles', 'recentArticles', 'category'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function articleDetails($id) {
        $post = Post::all();
        $categories = Post::select('category')->distinct()->get();
        // $category = $post->category;
        $phpPosts = Post::where('category', 'php')->get();
        $javascriptPosts = Post::where('category', 'javascript')->get();
        $laravelPosts = Post::where('category', 'laravel')->get();
        
        // $phpPosts = $phpPosts->get();
        // $javascriptPosts = $javascriptPosts->get();
        // $laravelPosts = $laravelPosts->get();

        // Fetch recent articles
        $recentArticles = Article::latest()->limit(5)->get();
        
        $article = Article::findOrFail($id);
        $articleCategories = Article::select('category')->distinct()->get();
        $category = $article->category;
        // logic for display data and display search
        $aiArticles = Article::where('category', 'ai');
        $blockchainArticles = Article::where('category', 'blockchain');
        $businessArticles = Article::where('category', 'business');
        $cybersecurityArticles = Article::where('category', 'cybersecurity');
        $datascienceArticles = Article::where('category', 'datascience');
        $iotArticles = Article::where('category', 'iot');
        $remoteworkArticles = Article::where('category', 'remotework');
        
        $aiArticles = $aiArticles->get();
        $blockchainArticles = $blockchainArticles->get();
        $businessArticles = $businessArticles->get();
        $cybersecurityArticles = $cybersecurityArticles->get();
        $datascienceArticles = $datascienceArticles->get();
        $iotArticles = $iotArticles->get();
        $remoteworkArticles = $remoteworkArticles->get();

        // Recent Articles
        $recentArticles = Article::latest()->limit(5)->get();

        return view('articles.article-content-details', compact('post', 'categories', 'phpPosts', 'javascriptPosts', 'laravelPosts', 'article', 'articleCategories', 'aiArticles', 'blockchainArticles', 'businessArticles', 'cybersecurityArticles', 'datascienceArticles', 'iotArticles', 'remoteworkArticles', 'recentArticles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
