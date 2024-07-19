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
</style>
<div class="container bootstrap snippets bootdey">
  
  <div class="row">
        <!-- Articles Content -->
    <div class="col-lg-8 border-shadow-bottom" style="margin-top: 7rem;">
    
    <h4 style="font-weight: 500; font-size: 40px; padding-left: 15px;">{{ $article->title }}</h4>
            <div class="panel blog-container">
              <div class="panel-body" style="padding-left: 15px;">
                <div class="image-wrapper">
                  <a class="image-wrapper image-zoom cboxElement" style="margin-bottom: 0.2rem;" href="#">
                    <img class="img-fluid" src="{{ asset('storage/' .$article->image) }}" alt="Photo of Project" style="max-width: 1000px; max-height: 380px; min-width: 780px; min-height: 250px; border-radius: 5px;">
                    <!-- <div class="image-overlay"></div>  -->
                  </a>
                </div>
                <div>
                <p class="m-top-sm m-bottom-sm" style="width: 49rem; margin-bottom: 2rem; margin-top: 1rem; line-height: 32px;">
                {!! autoLinkUrls($article->paragraph) !!}
                </p>
                </div>
              </div>
            </div>  

            @foreach($article->steps as $step)
            <!-- <h4><i class="fa fa-angle-double-right"></i>Step: {{ $step->step_number }}</h4> -->
            <div class="panel blog-container" style="padding-left: 15px;">
              <div class="panel-body">
                <div class="image-wrapper">
                  <a class="image-wrapper image-zoom cboxElement" href="#">
                    @if($article->image)
                    <a class="image-wrapper image-zoom cboxElement" style="margin-bottom: 0.2rem;" href="#">
                    <img class="img-fluid" src="{{ asset('storage/' .$step->image) }}" alt="Photo of Project" style="max-width: 1000px; max-height: 380px; min-width: 780px; min-height: 250px; border-radius: 5px;">
                    <!-- <div class="image-overlay"></div>  -->
                  </a>
                    @endif
                    <!-- <div class="image-overlay"></div>  -->
                  </a>
                </div>
                
                
                <!-- <small class="text-muted">By <a href="#"><strong> John Doe</strong></a> |  Post on Jan 8, 2013  | 58 comments</small> -->
                
                <div style="width: 43.9rem; margin-bottom: 2rem; margin-top: 1rem;" >
                <p class="m-top-sm m-bottom-sm" style="line-height: 32px; font-weight: 700;">
                {!! autoLinkUrls($step->step_header) !!}
                </p>
                </div>
                
                <p class="m-top-sm m-bottom-sm" style="width: 49rem; margin-bottom: 2rem; margin-top: 1rem; line-height: 32px;">
                {!! autoLinkUrls($step->paragraph) !!}
                </p>
              </div>
            </div>    
            @endforeach   
             
    </div>
      <!-- End Articles Content -->
        <div class="col-sm-4" style="margin-top: 7rem;">
        @include('articles.recent-articles')
        </div>
  </div>
</div>

@endsection