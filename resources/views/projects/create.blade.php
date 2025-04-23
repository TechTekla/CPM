<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2> -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <form method="post" action="{{route('projects.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="project_title" class="block text-sm/6 font-medium text-gray-900">Projects Title</label>
                                        <div class="mt-2">
                                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                                <input type="text" value="{{old('project_title')}}" name="project_title" id="project_name" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="">

                                            </div>
                                            <x-input-error :messages="$errors->get('project_title')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Projects photo</label>
                                        <input type="file" name="project_image" id="project_image" class="block w-full mt-1">
                                    </div>

                                    <div class="col-span-full">
                                        <label for="progress" class="block text-sm font-medium text-gray-900">Progress (%)</label>
                                        <input type="number" name="progress" id="progress" min="0" max="100"
                                            value="{{ old('progress', 0) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <x-input-error :messages="$errors->get('progress')" class="mt-2" />
                                    </div>
                                  


                                    <div class="col-span-full">
                                        <label for="about" class="block text-sm/6 font-medium text-gray-900">About project</label>
                                        <div class="mt-2">
                                            <textarea name="project_details" id="about" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>