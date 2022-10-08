<x-app-layout>

    {{-- Portada y Buscador --}}

    <section class="bg-cover" style="background-image: url({{asset('img/home/students.jpg')}})">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">{{__('Home title text')}}</h1>
                <p class="text-white text-lg mt-2">{{__('Home content text')}}</p>
                    
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input
                        class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="search" name="search" placeholder="{{__('Home Search')}}">

                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-r-lg absolute right-0 top-0 mt-2">
                        {{__('Search')}}
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6 uppercase">{{__('Content Home')}}</h1>

        <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/lesson.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
                </header>
    
                <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum possimus, fuga dolore delectus facere quibusdam voluptatibus, officiis aut similique porro labore dignissimos!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/lesson.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
                </header>
    
                <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum possimus, fuga dolore delectus facere quibusdam voluptatibus, officiis aut similique porro labore dignissimos!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/lesson.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
                </header>
    
                <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum possimus, fuga dolore delectus facere quibusdam voluptatibus, officiis aut similique porro labore dignissimos!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/lesson.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
                </header>
    
                <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum possimus, fuga dolore delectus facere quibusdam voluptatibus, officiis aut similique porro labore dignissimos!</p>
            </article>
        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">{{__('¿You don\'t know what courses to take?')}}</h1>
        <p class="text-center text-white">
            {{__('Go to the course catalog and filter them by category or level')}}
        </p>

        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                {{__('Course Catalog')}}
            </a>
        </div>
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600 uppercase">{{__('Last courses')}}</h1>
        <p class="text-center text-gray-500 text-sm mb-6">{{__('Courses recently published')}}</p>

        <div class="container grid-courses gap-courses">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        </div>
    </section>
</x-app-layout>