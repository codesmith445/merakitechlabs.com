<?php 
   /** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
 ?>
 <x-app-layout>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
    <div class="flex flex-col">
        @foreach($posts as $post)
        <div>
            <a href="{{ route('view', $post) }}">
            <h2 class="text-blue-500 font-bold text-lg sm:text-xl mb-2">{!! str_replace(request()->get('q'), '<span class="bg-yellow-300">'.request()->get('q').'</span>', $post->title) !!} </h2>
            </a>
            <div>
                {{ $post->shortBody() }}
            </div>
        </div>
        <hr class="my-6">
        @endforeach
     </div>
    <!-- Pagination -->
    {{$posts->onEachSide(1)->links()}}
    </section>

<x-sidebar />
</x-app-layout>
