<?php 
   /** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
 ?>
 <x-app-layout :meta-title="'merakitechlabs - Posts by category '. $category->title" meta-description="merakitechlabs coding tutorials">
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
        @foreach($posts as $post)
        <x-post-item :post="$post"></x-post-item>
        @endforeach
     </div>
    <!-- Pagination -->
    {{$posts->onEachSide(1)->links()}}
    </section>

<x-sidebar />
</x-app-layout>
