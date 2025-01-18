<x-app-layout meta-title="merakitechlabs - About Us Page" :meta-description="'At MerakiTechLabs, we are passionate about empowering developers and tech enthusiasts through high-quality tutorials and project guides'">
<section class="w-full flex flex-col items-center px-3">

<div class="m-4 max-w-6xl mx-auto overflow-hidden bg-white shadow-md">
    <div class="md:flex">
        <!-- Image Section -->
        <div class="md:w-1/2 w-full">
            <img class="object-cover object-center h-full w-full" alt="About Us image" src="/storage/{{$widget->image}}">
        </div>
        <!-- Content Section -->
        <div class="md:w-1/2 w-full p-10">
            <h1 class="block mt-1 text-2xl leading-tight font-medium text-black hover:underline">{{ $widget->title }}</h1>
            <div class="mt-5 text-lg text-gray-900 leading-relaxed">{!! $widget->content !!}</div>
        </div>
    </div>
</div>
</section>
</x-app-layout>