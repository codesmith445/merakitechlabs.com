<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

<!-- and it's easy to individually load additional languages -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"></script>

<script>hljs.highlightAll();</script>
<style>
   
   pre code.hljs {
    background: #1a202c !important; /* Darker background for better contrast */
    border: 1px solid #292929;
    color: #dcdcdc !important; /* Light gray text for better visibility */
    position: relative;
    border-radius: 0.5rem;
    }

    pre {
    white-space: pre-wrap !important;
    overflow-x: auto !important;
}

    .hljs-selector-class {
    color: #ffcc00 !important; /* Change to a brighter yellow or another color */
    }

    .hljs-selector-id {
        color: #00e5ff !important; /* Change to a brighter cyan or another color */
    }

    .hljs-tag {
    color: #ff9800 !important; /* Bright orange for HTML tags */
    }

    .hljs-name {
        color: #42a5f5 !important; /* Lighter blue for tag names */
    }

    .hljs-attribute {
        color: #ff9800 !important; /* Bright orange for attributes like 'class' */
    }

    .hljs-variable {
        color: #ffcc00 !important; /* Brighter yellow for variables */
    }

    .hljs-built_in {
        color: #00e5ff !important; /* Brighter cyan for built-in types */
    }

    .hljs-keyword, .hljs-selector-tag, .hljs-title {
        color: #ff9800 !important; /* Bright orange for keywords */
    }

    .hljs-string, .hljs-literal, .hljs-symbol, .hljs-bullet {
        color: #8bc34a !important; /* Bright green for strings */
    }

    .hljs-comment, .hljs-quote {
        color: #757575 !important; /* Darker gray for comments */
    }

    .hljs-string {
    color: #8bc34a !important; /* Bright green for attribute values */
    }

    .hljs-symbol, .hljs-bullet {
        color: #d32f2f !important; /* Bright red for symbols and bullets */
    }

    .hljs-number, .hljs-meta {
        color: #42a5f5 !important; /* Brighter blue for numbers */
    }

    .hljs {
        filter: brightness(1) contrast(1.2); /* Further adjustment for contrast */
    }
</style>
<x-app-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">
    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
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
                        By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{ $post->getformattedDate() }}
                    </p>
                    <div>
                        {!! $post->body !!}
                    </div>
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
    <script>
    document.querySelectorAll('pre').forEach(function(preElement) {
        if (!preElement.querySelector('code')) {
            const codeElement = document.createElement('code');
            codeElement.innerHTML = preElement.innerHTML;
            preElement.innerHTML = '';
            preElement.appendChild(codeElement);
        }
    });

    // Trigger Highlight.js on all code blocks
    hljs.highlightAll();
</script>
</x-app-layout>