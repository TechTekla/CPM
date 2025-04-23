<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>County projects Management </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style>

    </style>
    @endif

</head>

<body>

</body>
<!-- <body class="font-sans antialiased dark:bg-black dark:text-white/50"> -->

<main>
    <!-- Hero section -->
    <div class="">

        <header class="absolute  top-0 right-0 left-0 z-50">
            <nav class=" bg-white  flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5 flex">
                        <span class="text-red-500 text-4xl">C</span>
                        <span class="text-blue-400 text-lg">P</span>
                        <span class="text-blue-400 text-lg">M</span>
                        <img src="{{asset('office-svgrepo-com.svg')}}" class="h-10 w-10" alt="">
                    </a>
                </div>



                <div class=" lg:flex lg:flex-1 justify-end space-x-8">

                    @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                        <a
                            href="{{ url('/projects') }}">
                            Dashboard
                        </a>
                        @else
                        <a
                            href="{{ route('login') }}"
                            class="mr-6">
                            Log in
                        </a>

                        <!-- @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}">
                            Register

                        </a>
                        @endif -->
                        @endauth
                    </nav>
                    @endif
                </div>

            </nav>

        </header>

        <div class=" bg-blue-200 relative isolate px-6 pt-14 lg:px-8">


            <div class="flex flex-col justify-center  mx-auto max-w-2xl min-h-screen">
                <!-- <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                                    <div class="relative rounded-full px-3 py-1 text-sm/6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                                        Announcing our next round of funding. <a href="#" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true"></span>Read more <span aria-hidden="true">&rarr;</span></a>
                                    </div>
                                </div> -->
                <div class="text-center">
                    <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">Projects Running in the county</h1>
                    <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">Listed are various projects that are active in various places across the county. view and give feedback on projects you are intrested in </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <!-- <a href="#" class="bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a> -->
                        <a href="#" class="text-sm/6 font-semibold text-gray-900">Learn more <span aria-hidden="true">→</span></a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Projects Listing -->
    <div class="min:h-[420px] bg-green-50 py-14">
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-4xl font-bold mb-8">Our Recent Projects</h1>
            <p>Below are some of the projects undergoing in the county.</p>
        </div>

        <div class="grid grid-cols-3 gap-4 max-w-6xl mx-auto mt-8">
            @foreach ($projects as $project)
            <div class="flex flex-col">
                <div class="h-48">
                    <img class="h-48 w-96 object-cover" src="{{ asset('storage/' . $project->project_image) }}" alt="{{ $project->project_title }}">
                </div>

                <div class="my-6">
                    <label class="text-sm font-medium text-gray-700">Project Progress</label>
                    <div class="w-full bg-gray-200 rounded-full h-4 mt-1">
                        <div class="bg-green-500 h-4 rounded-full" style="width: {{ $project->progress }}%"></div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">{{ $project->progress }}% Complete</p>
                </div>
                
                <div class="mt-4">
                    <h2 class="text-xl font-semibold text-blue-500">{{ $project->project_title }}</h2>
                    <br>
                    <p>{{ Str::limit($project->project_details, 150) }}</p>
                    <a href="{{ route('projects.show', $project->id) }}" class="text-sm/6 font-semibold text-gray-900">
                        Read more <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>


    </div>

</main
    </html>