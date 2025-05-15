<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>NotionLite Dashboard</title>
</head>
<body class="min-h-screen bg-gray-100 text-gray-800 p-4">

    <!-- Header -->
    <header class="bg-teal-600 text-white rounded-2xl p-5 flex justify-between items-center shadow-md">
        <!-- Left Brand -->
        <div class="text-3xl font-extrabold tracking-wide">NotionLite</div>

        <!-- Center User Dashboard -->
        <div class="text-2xl font-medium">{{ $name }}'s Dashboard</div>

        <!-- Right Profile Icon -->
        <div class="h-10 w-10 hover:cursor-pointer hover:scale-105 transition-transform duration-150"
             onclick="window.location.href='{{ url('/profile') }}'">
            <x-mdi-account />
        </div>
    </header>

    <!-- Boards Section -->
    <main class="py-10 max-w-7xl mx-auto">
        <h1 class="text-2xl font-semibold mb-6">Your Boards</h1>

        
        <div class="flex flex-wrap gap-6">
            <!-- Boards List -->
            @foreach ($boards as $board)
                <x-board-card
                    :title="$board->title"
                    :company="$board->company"
                    :id="$board->id"
                />
            @endforeach

            <!-- Create New Board -->   
            <div class="w-64 h-40 bg-white border-2 border-dashed border-teal-400 rounded-2xl flex items-center justify-center text-4xl font-bold text-teal-500 hover:bg-teal-50 cursor-pointer transition-all hover:-translate-y-0.5"
                 onclick="window.location.href='{{ url('/dashboard/create-board') }}'">
                +
            </div>
        </div>
    </main>

</body>
</html>
