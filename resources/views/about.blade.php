<x-app-layout meta-title="merakitechlabs - About Us Page" :meta-description="'At MerakiTechLabs, we are passionate about empowering developers and tech enthusiasts through high-quality tutorials and project guides'">
<div class="sm:flex items-center max-w-screen-xl">
    <div class="sm:w-1/2 p-10">
        <div class="image object-center text-center">
            <img src="/storage/{{$widget->image}}" class="w-3/4 h-auto mx-auto" alt="about-us img">
        </div>
    </div>
    <div class="sm:w-1/2 p-5">
        <div class="text">
            <span class="text-gray-500 border-b-2 border-indigo-600 uppercase">{{ $widget->title }}</span>
            <h1 class="my-4 font-bold text-3xl  sm:text-4xl "><span class="text-indigo-600">merakitechlabs</span>
            </h1>
            <p class="text-gray-700">
            {!! $widget->content !!}
            </p>
        </div>
    </div>
</div>
</x-app-layout>

