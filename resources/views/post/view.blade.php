
<x-app-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">
    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a class="hover:opacity-75">
                <img src="{{ $post->getThumbnailUrl() }}" class="w-full h-auto" alt="Thumbnail Image">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <div class="flex gap-4">
                        @foreach($post->categories as $category)
                            <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $category->title }}</a>
                        @endforeach
                    </div>
                    <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">
                        {{ $post->title }}
                    </h1>
                    <p href="#" class="text-sm pb-8">
                        By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{ $post->getformattedDate() }} | {{ $post->human_read_time }}
                    </p>
                    
                    <div>
                        {!! preg_replace('/<img(.*?)src="(.*?)"(.*?)>/', '<a href="$2" data-fancybox="gallery"><img$1src="$2"$3></a>', $post->body) !!}
                    </div>

                    <livewire:upvote-downvote :post="$post" />
                </div>
            </article>

            <div class="w-full flex pt-6">
                <div class="w-1/2">
                    @if($prev)
                        <a href="{{ route('view', $prev) }}" class="block w-full bg-white shadow hover:shadow-md text-left p-6">
                        
                            <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                            <p class="pt-2">{{ \Illuminate\Support\Str::words($prev->title, 10) }}</p>
                        </a>
                    @endif
                </div>
                <div class="w-1/2">
                @if($next)
                    <a href="{{ route('view', $next) }}" class="block w-full bg-white shadow hover:shadow-md text-right p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                        <p class="pt-2">{{ \Illuminate\Support\Str::words($next->title, 10) }}</p>
                    </a>
                @endif
                </div>
            </div>
             
            @if ($post)
                <livewire:comments :model="$post" />
            @else
                <p>No post found.</p>
            @endif
            
            <!-- <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
                <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                    <img src="https://source.unsplash.com/collection/1346951/150x150?sig=1" class="rounded-full shadow h-32 w-32">
                </div>
                <div class="flex-1 flex flex-col justify-center md:justify-start">
                    <p class="font-semibold text-2xl">David</p>
                    <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero suscipit suscipit eu eu urna.</p>
                    <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                        <a class="" href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div> -->

    </section>
    <x-sidebar />
    
</x-app-layout>