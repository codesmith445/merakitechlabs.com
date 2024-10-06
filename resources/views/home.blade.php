<?php 
   /** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
 ?>
<x-app-layout meta-description="merakitechlabs a blog for coding tutorials">
<!-- Posts Section -->
<section class="w-full md:w-2/3 flex flex-col items-center px-3">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
      @foreach($posts as $post)
      <x-post-item :post="$post"></x-post-item>
      @endforeach
  </div>
    
{{$posts->onEachSide(1)->links()}}
<!-- Pagination -->
</section>

  <!-- Sidebar Section -->
  <x-sidebar />
  
</x-app-layout>