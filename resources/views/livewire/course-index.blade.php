<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700" wire:click="resetFilters">
                <i class="fas fa-book text-xs mr-2"></i>
                {{__('All courses')}}
            </button>

            <!-- Categories Dropdown -->
            <div class="ml-3 relative">
                <x-jet-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700">
                            <i class="fas fa-tags text-xs mr-2"></i>
                            {{__('Categories')}}
                            <i class="fas fa-angle-down text-sm ml-2"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @foreach ($categories as $category)
                            <x-dropdown-link wire:click="$set('category_id', {{$category->id}})">
                                {{$category->name}}
                            </x-dropdown-link>                            
                        @endforeach
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <!-- Levels Dropdown -->
            <div class="ml-3 relative">
                <x-jet-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700">
                            <i class="fab fa-buffer text-sm mr-2"></i>
                            {{__('Levels')}}
                            <i class="fas fa-angle-down text-sm ml-2"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @foreach ($levels as $level)
                            <x-dropdown-link wire:click="$set('level_id', {{$level->id}})">
                                {{$level->name}}
                            </x-dropdown-link>
                        @endforeach
                    </x-slot>
                </x-jet-dropdown>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course"/>
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
    </div>
</div>