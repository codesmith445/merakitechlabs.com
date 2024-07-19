@extends('layouts.layout')
@section('content')
<section id="hero" class="portfolio" style="height: 100vh !important;">
   <div class="container">
      <div class="section-title">
         <h2>Download Free Ebooks</h2>
      </div>
      
      <div class="row">
      <div class="col-auto">
        <input type="text" style="width: 15rem;" class="form-control mb-5" placeholder="Search Free Ebooks...">
    </div>
    
      </div>
      <div class="row portfolio-container">
         <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-php ml-lg-3 ml-md-2 ml-sm-1">
            <div style="width: 19rem; height: 12rem; overflow: hidden; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
               <img src="assets/img/1_5uma8k_N98q1IgjZ_CYQUA.webp" style="width: 100%; height: 100%; object-fit: cover;" data-gallery="portfolioGallery" class="portfolio-lightbox" alt="">
            </div>
            <div>
               <div class="text-center">
               <a href="assets/ebooks/JavaScript.pdf" download="javascript.pdf">Javascript</a>

               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-javascript ">
            <div style="width: 19rem; height: 12rem; overflow: hidden; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
               <img src="assets/img/javascript.jpg" style="width: 100%; height: 100%; object-fit: cover;" data-gallery="portfolioGallery" class="portfolio-lightbox" alt="">
            </div>
            <div>
               <div class="text-center">
                  <a href="{{ url('project-details') }}" title="More Details" class="text-dark">Javascript API</a>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-javascript ml-lg-3 ml-md-2 ml-sm-1">
            <div style="width: 19rem; height: 12rem; overflow: hidden; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
               <img src="assets/img/1_5uma8k_N98q1IgjZ_CYQUA.webp" style="width: 100%; height: 100%; object-fit: cover;" data-gallery="portfolioGallery" class="portfolio-lightbox" alt="">
            </div>
            <div>
               <div class="text-center">
                  <a href="{{ url('project-details') }}" title="More Details" class="text-dark">Crud PHP</a>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-javascript ml-lg-3 ml-md-2 ml-sm-1">
            <div style="width: 19rem; height: 12rem; overflow: hidden; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
               <img src="assets/img/1_5uma8k_N98q1IgjZ_CYQUA.webp" style="width: 100%; height: 100%; object-fit: cover;" data-gallery="portfolioGallery" class="portfolio-lightbox" alt="">
            </div>
            <div>
               <div class="text-center">
                  <a href="{{ url('project-details') }}" title="More Details" class="text-dark">Crud PHP</a>
               </div>
            </div>
         </div>
         <!-- <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
            </div> -->
      </div>
   </div>
</section>
@endsection