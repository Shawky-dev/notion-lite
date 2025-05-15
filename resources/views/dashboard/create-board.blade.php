<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Board</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#F8F9FA] text-gray-800 flex items-center justify-center px-4">

    <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-lg">

        <!-- Back Button -->
        <div class="mb-6">
            <button onclick="window.location.href='{{ url('/dashboard') }}'"
                    class="text-sm text-teal-600 hover:underline font-medium flex items-center gap-1">
                ← Back to Dashboard
            </button>
        </div>

        <!-- Page Title -->
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Create a New Board</h1>

        <!-- Error Display -->
        @if ($errors->any())
            <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="/dashboard/create-board" method="POST" class="space-y-5">
            @csrf

            <!-- Title Field -->
            <div class="flex flex-col space-y-2">
                <label for="title" class="font-medium text-sm">Title</label>
                <input type="text" id="title" name="title"
                       class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400"
                       required>
            </div>

            <!-- Description Field -->
            <div class="flex flex-col space-y-2">
                <label for="description" class="font-medium text-sm">Description</label>
                <textarea id="description" name="description" rows="3"
                          class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400"
                          required></textarea>
            </div>

            <!-- Company Field -->
            <div class="flex flex-col space-y-2">
                <label for="company" class="font-medium text-sm">Company</label>
                <input type="text" id="company" name="company"
                       class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400"
                       required>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 rounded-xl transition duration-300">
                    Create Board
                </button>
            </div>
        </form>
    </div>

</body>
</html>
