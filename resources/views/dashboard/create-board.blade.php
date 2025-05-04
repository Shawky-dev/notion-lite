<!-- filepath: e:\Coding\Laravel\notion-lite\resources\views\dashboard\create-board.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Board</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    
    @if ($errors->any())
       <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
           <ul class="list-disc list-inside">
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
    @endif

    <div class="w-full max-w-lg bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Create a New Board</h1>
        <form action="/dashboard/create-board" method="POST" class="space-y-5">
            @csrf
            <div class="flex flex-col space-y-2">
                <label for="title" class="font-medium">Title</label>
                <input type="text" id="title" name="title" class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400" required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="description" class="font-medium">Description</label>
                <textarea id="description" name="description" rows="3" class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400" required></textarea>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="company" class="font-medium">Company</label>
                <input type="text" id="company" name="company" class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400" required>
            </div>
            <div>
                <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-white font-bold py-2 rounded-xl transition duration-300">
                    Create Board
                </button>
            </div>
        </form>
    </div>
</body>
</html>