<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostStep;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

     public function fetchData(Request $request)
     {   
        $category = $request->query('category');
         $posts = Post::where('category', $category)->get();
      
         return response()->json(['posts' => $posts]);
     }

    // public function store(Request $request)
    // {
        
    //     try {
            
    //         $post = New Post();
    //         $post->title = $request->input('title');
    //         $post->category = $request->input('category');
    //         $post->goals = $request->input('goals');
    //         // $post->project_date = $projectDate;
    //         $post->project_url = $request->input('project_url');
    //         $post->project_detail = $request->input('project_detail');
    //         if ($request->hasFile('image')) {
    //             // Store the uploaded file in the specified directory
    //             $imagePath = $request->file('image')->store('/admin/img', 'public');
        
    //             // Save the image path to the database
    //             $post->image = $imagePath;
    //         }
    //         $post->source_code = $request->input('source_code');
    //         $post->instructions = $request->input('instructions');
    //         // dd($post->category);
    //         $post->save();
           
            
    //         return redirect()->route('admin.dashboard')->with('success', 'Post created successfully.');
    //     } catch (\Throwable $th) {
    //         dd($th->getMessage()); // Dump the error message for debugging
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Post $post, $id)
    // {   
    //     // \Log::info($request->all());
    //     $data = $request->all();
    //     $data = $request->except('image');
    //     if($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('/admin/img', 'public');
    //         $data['image'] = $imagePath;
    //     }
    //     $post = Post::findOrFail($id);
    //     $post->update($data);
    //     // return response()->json(['message' => 'Post Updated Successfully']);
    //     foreach ($request->input('step_instructions') as $index => $instruction) {
    //         if (isset($post->steps[$index])) {
    //             $postStep = $post->steps[$index];
    //             $postStep->instructions = $instruction;
    //             $postStep->source_code = $request->input('step_source_code')[$index];
    //             // Update image if provided
    //             if ($request->hasFile('step_images') && isset($request->step_images[$index])) {
    //                 $stepImagePath = $request->file('step_images')[$index]->store('/admin/img', 'public');
    //                 $postStep->image = $stepImagePath;
    //             }
    //             $postStep->save();
    //         } else {
    //             $post->steps()->create([
    //                 'instructions' => $instruction,
    //                 'source_code' => $request->input('step_source_code')[$index],
    //                 // Add other fields as needed
    //             ]);
    //         }
    //     }
    //     return redirect()->route('admin.dashboard')->with('success', 'Post Updated Successfully');

        
    // }

    
}
