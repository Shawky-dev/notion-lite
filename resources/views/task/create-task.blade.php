<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 flex justify-center items-center p-6">

    <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-teal-700">Create New Task</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('tasks.create', ['board_id' => $board_id, 'section_id' => $section_id]) }}" class="space-y-4">

            @csrf

            {{-- Task Name --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Task Name</label>
                <input type="text" name="name" required class="w-full border-gray-300 rounded p-2" placeholder="e.g. Write docs" />
            </div>

            {{-- Section ID (hidden or select) --}}
            <input type="hidden" name="section_id" value="{{ $section_id }}" />
            <input type="hidden" name="board_id" value="{{ $board_id }}" />

            

            {{-- Submit --}}
            <button type="submit" class="w-full bg-teal-600 text-white rounded p-2 hover:bg-teal-700">
                Create Task
            </button>
        </form>
    </div>

</body>
</html>
