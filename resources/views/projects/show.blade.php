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

    <!-- Projects Listing -->
    <div class="min:h-[420px] bg-green-50 py-14">
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-4xl font-bold mb-8 text-blue-600">{{ $project->project_title }}</h1>

        </div>



        <div class="max-w-4xl mx-auto py-10">

            <img src="{{ asset('storage/' . $project->project_image) }}" class="w-full h-96 object-cover mb-6" alt="{{ $project->project_title }}">
            <div class="my-6">
                <label class="text-sm font-medium text-gray-700">Project Progress</label>
                <div class="w-full bg-gray-200 rounded-full h-4 mt-1">
                    <div class="bg-green-500 h-4 rounded-full" style="width: {{ $project->progress }}%"></div>
                </div>
                <p class="text-sm text-gray-500 mt-1">{{ $project->progress }}% Complete</p>
            </div>


            <p class="text-lg leading-relaxed text-gray-700">{!! nl2br(e($project->project_details)) !!}
            </p>

            <div class="mt-8">
                <a href="{{ url('/') }}" class="text-blue-500 hover:underline">&larr; Back to home</a>
            </div>
        </div>




    </div>
    <div class="max-w-4xl  mx-auto py-10">

        <!-- Comment Form -->
        <div class="mt-10 bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-semibold mb-4">Leave a Comment</h2>

            @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('projects.addComment', $project->id) }}" method="POST">
                @csrf
                <textarea name="comment" rows="4" class="w-full border border-gray-300 p-2 rounded" placeholder="Write your comment..."></textarea>
                @error('comment')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Post Comment</button>
            </form>
        </div>

        <!-- Display Comments -->
        @if (!empty($project->comments))
        <div class="mt-10">
            <h3 class="text-xl font-semibold mb-4">Comments</h3>
            <ul class="space-y-4">
                @foreach ($project->comments as $comment)
                <li class="bg-gray-100 p-4 rounded shadow">
                    <p class="text-gray-700">{{ $comment['text'] }}</p>
                    <p class="text-sm text-gray-500 mt-1">Posted on {{ \Carbon\Carbon::parse($comment['created_at'])->format('F j, Y g:i A') }}</p>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

</main
    </html>