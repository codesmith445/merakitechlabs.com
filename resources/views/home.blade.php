<?php 
   /** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
 ?>
<x-app-layout meta-description="merakitechlabs a blog for coding tutorials">
    <div class="container max-w-6xl mx-auto py-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full">
        <!-- latest post -->
        <div class="col-span-2 mb-4">
           <h2 class="text-lg sm:text-xl font-bold text-gray-900 uppercase pb-1 border-b-2 border-blue-500 mb-3">
            Latest Post
           </h2>
           <div>
           <x-post-item :post="$latestPost"></x-post-item>
           </div>
        </div>
        <!-- Popular 3 post -->
        <div class="cols-span-1 mb-4">
          <h2 class="text-lg sm:text-xl font-bold text-gray-900 uppercase pb-1 border-b-2 border-blue-500 mb-3">
            Popular Post
          </h2>
          @foreach($popularPosts as $post)
          <div class="grid grid-cols-4 gap-2 mb-3">
            <a href="{{ route('view', $post) }}" class="pt-2">
              <img src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}">
            </a>
            <div class="col-span-3">
              <a href="{{ route('view', $post) }}">
                <h3 class="text-sm uppercase whitespace-nowrap truncate">
                  {{ $post->title }}
                </h3>
              </a>
              <div class="flex gap-4 mb-2">
                @foreach($post->categories as $category)
                    <a href="#" class="bg-blue-500 text-white text-xs font-bold uppercase p-1 rounded">{{ $category->title }}</a>
                @endforeach
              </div>
              <div class="text-sm">
                {{ $post->shortBody(10) }}
              </div>
              <a href="{{ route('view', $post) }}" class="text-xs uppercase text-gray-800 hover:text-black">Continue Reading<i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
          @endforeach
        </div>
    </div>

    <!-- Recomended Post -->
    <div class="mb-4">
        <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
            Recommended Post
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 items-stretch">
          @foreach($recommendedPosts as $post)
           <x-post-item :post="$post" :show-author="false" />
          @endforeach
        </div>
    </div>

    <!-- Latest Categories -->
    @foreach($categories as $category)
    <div>
        <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
        Category :{{ $category->title }}
        <a href="{{ route('by-category', $category) }}">
          <i class="fas fa-arrow-right pl-1"></i>
        </a>
        </h2>
        <div class="mb-6">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            @foreach($category->publishedPosts()->limit(3)->get() as $post)
             <div>
               <x-post-item :post="$post" :show-author="false" />
             </div>
            @endforeach
          </div>
        </div>
        
    </div>
    @endforeach
    </div>

</x-app-layout>