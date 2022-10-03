<x-app-layout>
    {{-- Portada y Buscador --}}

    <section class="bg-cover" style="background-image: url({{asset('img/courses/code.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">{{__('Course title text')}}</h1>
                <p class="text-white text-lg mt-2">{{__('Course content text')}}</p>
                    
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input
                        class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="search" name="search" placeholder="{{__('Search in courses')}}">

                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-r-lg absolute right-0 top-0 mt-2">
                        {{__('Search')}}
                    </button>
                </div>
            </div>
        </div>
    </section>

    @livewire('course-index')
    
</x-app-layout>