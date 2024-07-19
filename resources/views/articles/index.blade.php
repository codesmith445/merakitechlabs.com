@extends('admin-layouts.admin-layout')
<title>@yield('title', 'Articles')</title>
@section('content')
<style>
.blog .date {
    top: -10px;
    z-index: 99;
    width: 65px;
    right: -10px;
    height: 65px;
    padding: 10px;
    position: absolute;
    color:#FFFFFF;
    font-weight:bold;
    background: #5bc0de;
    border-radius: 999px;
}

.blog {
    padding: 15px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    margin-bottom: 0;  /* Ensure no margin at the bottom */
}

.image img {
    width: 100%;
    height: auto;
}

.blog-details {
    padding-left: 10px;
    padding-bottom: 0;  /* Ensure no padding at the bottom */
    margin-bottom: 0;  /* Ensure no margin at the bottom */
}

.blog-details h2 {
    margin-top: 0;
    margin-bottom: 10px;  /* Adjust margin to ensure consistent spacing */
}

.blog-details p {
    margin-bottom: 0;  /* Ensure no margin at the bottom */
}

.well {
    border: 0;
    padding: 20px;
    min-height: 63px;
    background: #fff;
    box-shadow: none;
    border-radius: 3px;
    position: relative;
    max-height: 100000px;
    border-bottom: 2px solid #ccc;
}

.blog .blog-details h2 {
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.blog .date .blog-number {
    color: #fff;
    display: block;
    font-size: 24px;
    text-align: center;
}            
</style>
<div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Welcome to the Dashboard!</h2>
                        <p class="az-dashboard-text">You are logged in as {{ Auth::guard('admin')->user()->email }}</p>
                    </div>
                    <div class="az-content-header-right">
                        <div class="media">
                            <div class="media-body">
                                <label>Start Date</label>
                                <h6>Oct 10, 2018</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>End Date</label>
                                <h6>Oct 23, 2018</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>Event Category</label>
                                <h6>All Categories</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <a href="" class="btn btn-default" style="background-color: #ffc107;" onmouseover="this.style.backgroundColor='#d9a600'" onmouseout="this.style.backgroundColor='#ffc107'" data-toggle="modal" data-target="#createArticleModal">Create New Article</a>
                    </div>
                </div><!-- az-dashboard-one-title -->
                <div>
                <div class="az-dashboard-nav"> 
                    <nav class="nav">
                    @livewire('filter-articles')
                    </nav>

                                <nav class="nav">
                                <a class="nav-link" href="{{ route('articles.index') }}" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.removeProperty('color')"><i class="far fa-save"></i> Articles</a>
                                <a class="nav-link" href="#" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.removeProperty('color')"><i class="far fa-file-pdf"></i> Tutorials</a>
                                <a class="nav-link" href="#" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.removeProperty('color')"><i class="far fa-envelope"></i>Send to Email</a>
                                <a class="nav-link" href="#" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.removeProperty('color')"><i class="fas fa-ellipsis-h"></i></a>
                                </nav>
                  </div>

                </div>
                    <!-- Articles Content -->
                    <div class="container bootstrap snippets bootdey">
    <hr>
  <!-- <ol class="breadcrumb">
    <li><a href="#">Page name</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Blog</a></li>
    <li class="pull-right"><a href="" class="text-muted">
      <i class="fa fa-refresh"></i></a>
    </li>
  </ol> -->
  <div class="row">
    @livewire('show-articles')
    <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well blog">
            <a href="#">
                <div class="date primary">
                    <span class="blog-date">Oct</span>
                    <span class="blog-number">8</span>
                </div>
                <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="image">
                            <img src="https://www.bootdey.com/image/800x300/6495ED/000000" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 blog-details">
                        <h2>Post title 1</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique libero et est iaculis, id placerat nisi luctus. Aenean volutpat risus non fermentum feugiat. Etiam facilisis arcu ante, sed molestie diam mollis vel...
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div> -->
      
</div>                    
                    <!-- End Articles Content -->
                    </div>
                
            </div><!-- az-content-body -->
        </div>
    <!-- Create Article Modal -->
        <div class="modal fade" id="createArticleModal" tabindex="-1" role="dialog" aria-labelledby="createArticleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createArticleModalLabel">Create Article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form fields for the modal -->
                        @livewire('article-form')
                    </div>
                </div>
            </div>
        </div>
   <!-- End Create Article Modal -->
    </div><!-- az-content -->
 
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script>
    document.getElementById('add-step').addEventListener('click', function() {
    // Get the number of existing steps
    var stepCount = document.querySelectorAll('.step').length + 1;

    // Create HTML elements for a new step
    var newStep = document.createElement('div');
    newStep.classList.add('step');
    newStep.innerHTML = `
        <h4>Step ${stepCount}</h4>
        <input type="hidden" name="steps[${stepCount}][step_number]" value="${stepCount}">
        <div class="form-group">
            <label for="step_image_${stepCount}">Step Image</label>
            <input type="file" name="steps[${stepCount}][image]" id="step_image_${stepCount}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="step_instructions_${stepCount}">Instructions</label>
            <textarea class="form-control" name="steps[${stepCount}][instructions]" id="step_instructions_${stepCount}" cols="5" rows="5" placeholder="Instructions for step ${stepCount}"></textarea>
        </div>
        <div class="form-group">
            <label for="step_source_code_${stepCount}">Source Code</label>
            <textarea class="form-control" name="steps[${stepCount}][source_code]" id="step_source_code_${stepCount}" cols="5" rows="5" placeholder="Source Code for step ${stepCount}"></textarea>
        </div>
        `;

        // Append the new step to the steps section
        document.getElementById('steps-section').appendChild(newStep);
    });
</script> -->
@endsection
