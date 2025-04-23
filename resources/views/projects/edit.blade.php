<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Project</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="space-y-4">
                            <div>
                                <label for="project_title" class="block text-sm font-medium">Project Title</label>
                                <input type="text" name="project_title" id="project_title" value="{{ old('project_title', $project->project_title) }}" class="block w-full mt-1 border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label for="project_details" class="block text-sm font-medium">Project Details</label>
                                <textarea name="project_details" id="project_details" class="block w-full mt-1 border-gray-300 rounded-md">{{ old('project_details', $project->project_details) }}</textarea>
                            </div>

                            <div>
                                <label for="project_image" class="block text-sm font-medium">Project Image</label>
                                <input type="file" name="project_image" id="project_image" class="block w-full mt-1">
                                @if ($project->project_image)
                                <img src="{{ asset('storage/' . $project->project_image) }}" class="mt-2 h-24">
                                @endif
                            </div>
                            <div>
                                <label for="progress" class="block text-sm font-medium">Progress (%)</label>
                                <input type="number" name="progress" id="progress"
                                    value="{{ old('progress', $project->progress) }}"
                                    class="block w-full mt-1 border-gray-300 rounded-md" min="0" max="100">
                            </div>


                            <div class="mt-4">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Update Project</button>
                                <a href="{{ route('projects.index') }}" class="ml-2 text-gray-500">Cancel</a>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('projects.destroy', $project) }}" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="px-4 py-2 bg-red-600 text-white rounded-md">Delete Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>