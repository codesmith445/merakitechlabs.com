@extends('layouts.layout')
<title>@yield('title', 'Articles List')</title>
@section('content')
<style>
    
.pagination .page-item.active .page-link {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #fff;
}
.pagination .page-item .page-link:hover {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #fff;
}    

.border-shadow-bottom {
        border-top: 1px solid #f1f1f1;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        box-shadow: 0 4px 10px -2px gray;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #fff;
    }

.title-article {
    text-decoration: none;
}

.title-article:hover {
    text-decoration: underline;
    color: #333;
}
</style>
<section class="page-section portfolio" id="portfolio">
    <div class="container">
    
        <!-- End Data Filters -->
        <!-- Portfolio Section Heading-->
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center portfolio-container">
            <!-- Portfolio Item 1-->
            
            <div class="container bootstrap snippets project-lists-bootdey">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 d-flex ">
                        <a href="{{ url('articles/article-user-view') }}" type="button" class="btn btn-lg back-button">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <h2 class="text-center" style="margin-left: 1rem;"><kbd>Category: &nbsp;{{$category}}</kbd></h2>
                    </div>
                </div>
            </div>
    <div class="row">
        <!-- Articles Column -->
        <div class="col-md-8">
            <div class="container py-3">
                <!-- Card Start -->
                @foreach($articles as $article)
                <div class="border-shadow-bottom portfolio-item filter ai mb-4" style="max-width: 100%;">
                    <div class="row">
                        <div class="col-md-8 px-3">
                            <div class="card-block px-6">
                                <a href="{{ url('article-content-details', ['id' => $article->id]) }}" class="title-article"><h4 class="card-title">{{ $article->title }}</h4></a>
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($article->paragraph, 250) }}
                                </p>
                            </div>
                        </div>
                        <!-- Image Section -->
                        <div class="col-md-4">
                            <img src="{{asset('storage/' . $article->image)}}" alt="..." class="img-fluid" style="height: 100%; width: 100%; border-radius: 10px;">
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
                <!-- End of card -->
                
                
            </div>
        </div>
        
        <!-- Recent Articles Column -->
        <div class="col-md-4 py-3">
            @include('articles.recent-articles')
        </div>
    </div>
</div>
    </div>
</section>



@endsection