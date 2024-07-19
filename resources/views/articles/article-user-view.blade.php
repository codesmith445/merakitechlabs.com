@extends('layouts.layout')
@section('content')
<style>
    

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
        <!-- Data Filters -->
        <div class="container text-center" style="display: flex; justify-content: center;">
        <div align="center">
            <button class="btn btn-default filter-button-article" data-filter="all"><kbd>All</kbd></button>
            <button class="btn btn-default filter-button-article" data-filter="ai"><kbd>Artificial Intelligence</kbd></button>
            <button class="btn btn-default filter-button-article" data-filter="blockchain"><kbd>BlockChain</kbd></button>
            <button class="btn btn-default filter-button-article" data-filter="business"><kbd>Business</kbd></button>
        </div>
            <!-- Add more categories as needed -->
            
        </div>

        <!-- End Data Filters -->
        <!-- Portfolio Section Heading-->
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center portfolio-container">
            <!-- Portfolio Item 1-->
            
            <div class="container bootstrap snippets project-lists-bootdey">
    <div class="row">
        <!-- Articles Column -->
        <div class="col-md-8">
            <div class="container py-3">
                <!-- Card Start -->
                @foreach($aiArticles as $article)
                <div class="border-shadow-bottom portfolio-item filter-article ai mb-4" style="max-width: 100%;">
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

                @foreach($blockchainArticles as $article)
                <div class="border-shadow-bottom mt-5 portfolio-item filter-article blockchain mb-4" style="max-width: 100%;">
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

                @foreach($businessArticles as $article)
                <div class="border-shadow-bottom mt-5 portfolio-item filter-article business mb-4" style="max-width: 100%;">
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
                <!-- End of card -->

                 <!-- View Links -->
                 <div class="text-center portfolio-item filter-article all" id="view-all">
                    <a href="{{ url('articlelists/all') }}" class="btn viewpost-links">View All</a>
                </div>
                <div class="text-center portfolio-item filter-article ai" id="view-ai" style="display: none;">
                    <a href="{{ url('articlelists/ai') }}" class="btn viewpost-links">View AI</a>
                </div>
                <div class="text-center portfolio-item filter-article blockchain" id="view-blockchain" style="display: none;">
                    <a href="{{ url('articlelists/blockchain') }}" class="btn viewpost-links">View BlockChain</a>
                </div>
                <div class="text-center portfolio-item filter-article business" id="view-business" style="display: none;">
                    <a href="{{ url('articlelists/business') }}" class="btn viewpost-links">View Business</a>
                </div>
                <!-- End View Links -->
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

<script>
$(document).ready(function(){
    function filterArticles(value) {
        if (value == "all") {
            $('.filter-article').hide(); // Hide all initially
            $('.filter-article').slice(0, 3).show('1000'); // Show only the first 3
            $('#view-all').show(); // Show the "View All" button
        } else {
            $(".filter-article").not('.' + value).hide('3000');
            $('.filter-article').filter('.' + value).show('3000');
            $('#view-all').hide(); // Hide the "View All" button for other categories
        }
    }

    $(".filter-button-article").click(function(){
        var value = $(this).attr('data-filter');
        filterArticles(value);

        // Add active class to the clicked button
        $(".filter-button-article").removeClass("active");
        $(this).addClass("active");
    });

    // Initial load - show only the first 3 posts of "all" category
    filterArticles('all');
});

</script>


@endsection