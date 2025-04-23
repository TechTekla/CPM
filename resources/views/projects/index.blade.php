<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="min:h-[420px] bg-green-50 py-14">
                    <div class="flex flex-col justify-center items-center">
                        <h1 class="text-4xl font-bold mb-8">Our Recent Projects</h1>
                        <p>Below are some of the projects undergoing in the county.</p>
                    </div>

                    <div class="grid grid-cols-3 gap-4 max-w-6xl mx-auto mt-8">

                        @foreach ($projects as $project)
                        <div class="flex flex-col">
                            <div class="h-48">
                                <img class="h-48 w-96 object-cover" src="{{ asset('storage/' . $project->project_image) }}" alt="">
                            </div>
                            <div class="mt-4">
                                <h2 class="text-xl font-semibold text-blue-500">{{ $project->project_title }}</h2>
                                <p class="mt-2">{{ $project->project_details }}</p>

                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('projects.edit', $project) }}" class="text-sm font-semibold text-yellow-600">Edit</a>

                                    <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm font-semibold text-red-600">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>