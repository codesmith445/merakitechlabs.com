<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\PostView;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(): View
    {   
        // SEO and OpenGraph
        OpenGraph::setTitle('merakitechlabs - your coding buddy')
              ->setDescription('merakitechlabs is commited to excelence, we dedicate to ensure the best quality of education as possible. We work towards the improvement of our community and make impact to lives of people through our educational tutorials.')
              ->setUrl(url()->current())
              ->addImage(asset('images/01J8Y4Y9HJVZVJHZ6FWSQE0FBS.png')); // Provide the path to your default image
        // End for SEO Purposes
        
        // Latest Post
        $latestPost = Post::where('active', '=', true)
                      ->whereDate('published_at', '<', Carbon::now())
                      ->orderBy('published_at', 'desc')
                      ->limit(5)
                      ->first();
        // // Show the most popular 3 posts based on upvote
        $popularPosts = Post::query()
                       ->leftjoin('upvote_downvotes','posts.id', '=', 'upvote_downvotes.post_id')
                       ->select('posts.id','posts.title','posts.slug','posts.thumbnail','posts.body','posts.active','posts.published_at','posts.user_id','posts.meta_title','posts.meta_description', DB::raw('COUNT(upvote_downvotes.id) as upvote_count'))
                       ->where(function($query) {
                        $query->whereNull('upvote_downvotes.is_upvote')->orWhere('upvote_downvotes.is_upvote', '=', 1);
                       })
                       ->where('active', '=', 1)
                       ->whereDate('published_at', '<', Carbon::now())
                       ->orderByDesc('upvote_count')
                       ->groupBy('posts.id','posts.title','posts.slug','posts.thumbnail','posts.body','posts.active','posts.published_at','posts.user_id','posts.meta_title','posts.meta_description')
                       ->limit(5)
                       ->get();
     
        // If Authorized - Show the recommended post based on upvote
        $user = auth()->user();

        if($user) {
            $leftJoin = "(SELECT cp.category_id, cp.post_id FROM upvote_downvotes JOIN category_post cp ON upvote_downvotes.post_id = cp.post_id WHERE upvote_downvotes.is_upvote = 1 and upvote_downvotes.user_id = ?) as t";
            $recommendedPosts = Post::query()
               ->leftJoin('category_post as cp', 'posts.id', '=', 'cp.post_id')
               ->leftJoin(DB::raw($leftJoin), function($join) {
                $join->on('t.category_id', '=', 'cp.category_id')
                ->on('t.post_id', '<>', 'cp.post_id');
               })
               ->select('posts.*')
               ->where('posts.id', '<>', DB::raw('posts.id'))
               ->setBindings([$user->id])
               ->limit(3)
               ->get();
        } 
        // If Not  - Show the recommended post based on views
        else {
            $recommendedPosts = Post::query()
            ->leftjoin('post_views','posts.id', '=', 'post_views.post_id')
            ->select('posts.id','posts.title','posts.slug','posts.thumbnail','posts.body','posts.active','posts.published_at','posts.user_id','posts.meta_title','posts.meta_description', DB::raw('COUNT(post_views.id) as view_count'))
            ->where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderByDesc('view_count')
            ->groupBy('posts.id','posts.title','posts.slug','posts.thumbnail','posts.body','posts.active','posts.published_at','posts.user_id','posts.meta_title','posts.meta_description')
            ->limit(3)
            ->get();
        }
        // If Not Authorized - Show popular post based on views


        // Show recent categories with their latest posts
        $categories = Category::query()
            //  ->with(['posts' => function($query) {
            //     $query->orderByDesc('published_at')->limit(3);
            //  }])
             ->whereHas('posts', function($query) {
                $query->where('active', '=', 1)
                      ->whereDate('published_at', '<', Carbon::now());
             })
             ->select('categories.id', 'categories.title', 'categories.slug', 'categories.created_at')
             ->selectRaw('MAX(posts.published_at) as max_date')
             ->leftJoin('category_post', 'categories.id', '=', 'category_post.category_id')
             ->leftJoin('posts', 'posts.id', '=', 'category_post.post_id')
             ->orderByDesc('max_date')
             ->groupBy('categories.id', 'categories.title', 'categories.slug', 'categories.created_at')
             ->limit(3)
             ->get();
        // $posts = Post::query()->where('active', '=', 1)
        // ->whereDate('published_at', '<', Carbon::now())
        // ->orderBy('published_at', 'desc')
        // ->paginate(3);
        return view('home', compact('latestPost', 'popularPosts', 'recommendedPosts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Post $post, Request $request)
    {
        if(!$post->active || $post->published_at > Carbon::now()) {
             throw new NotFoundHttpException();
        }
        
        $next = Post::query()
                ->where('active', true)
                ->whereDate('published_at', '<=', Carbon::now())
                ->whereDate('published_at', '<', $post->published_at)
                ->orderBy('published_at', 'desc')
                ->limit(1)
                ->first();

        $prev = Post::query()
                ->where('active', true)
                ->whereDate('published_at', '<=', Carbon::now())
                ->whereDate('published_at', '>', $post->published_at)
                ->orderBy('published_at', 'asc')
                ->limit(1)
                ->first();

        //  Old Code to count view
        // $user = $request->user();

        // PostView::create([
        //     'ip_address' => $request->ip(),
        //     'user_agent' => $request->userAgent(),
        //     'post_id' => $post->id,
        //     'user_id' => $user?->id
        // ]);

        // New Code to count view
        $user = $request->user();
        $ipAddress = $request->ip();
        $userAgent = $request->userAgent();
        $postId = $post->id;

        // Check if a recent view exists with the same IP and user agent in the last hour
        $recentView = PostView::where('post_id', $postId)
                            ->where('ip_address', $ipAddress)
                            ->where('user_agent', $userAgent)
                            ->where('created_at', '>=', Carbon::now()->subHour())
                            ->exists();

        if (!$recentView) {
            PostView::create([
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'post_id' => $postId,
                'user_id' => $user?->id,
            ]);

            // Optionally store session data for additional tracking
            session(['viewed_post_' . $postId => now()]);
        }

        // SEO and OpenGraph
        OpenGraph::setTitle('merakitechlabs - ' .$post->title)
              ->setDescription(Str::limit(strip_tags($post->body), 300))
              ->setUrl('post.view')
              ->addImage(asset($post->getThumbnailUrl())); // Provide the path to your default image
        // End for SEO Purposes
        return view('post.view', compact('post', 'next', 'prev'));
    }

    public function byCategory(Category $category) {
        $posts = Post::query()
        ->join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id', '=', $category->id)
        ->where('active', '=', true)
        ->whereDate('published_at', '<', Carbon::now())
        ->orderBy('published_at', 'desc')
        ->paginate(6);

        // SEO and OpenGraph
        OpenGraph::setTitle('merakitechlabs - ' .$category->slug)
              ->setDescription('merakitechlabs is commited to excelence, we dedicate to ensure the best quality of education as possible. We work towards the improvement of our community and make impact to lives of people through our educational tutorials.')
              ->setUrl('post.index')
              ->addImage(asset('images/01J8Y4Y9HJVZVJHZ6FWSQE0FBS.png')); // Provide the path to your default image
        // End for SEO Purposes
        return view('post.index', compact('posts', 'category'));
    }

    public function search(Request $request) {
        $q = $request->get('q');
        $posts = Post::query()
        ->where('active', '=', true)
        ->whereDate('published_at', '<', Carbon::now())
        ->orderBy('published_at', 'desc')
        ->where(function($query) use ($q) {
            $query->where('title', 'like', "%$q%")
            ->orWhere('body', 'like', "%$q%");
        })
        ->paginate(10);

        return view('post.search', compact('posts'));
    }
}
