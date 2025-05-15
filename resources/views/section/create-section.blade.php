<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Section</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 flex justify-center items-center p-6">

    <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-teal-700">Create Section</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sections.create.store',['board_id'=>$board_id]) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700">Section Name</label>
                <input type="text" class="w-full border-gray-300 rounded p-2" id="name" name="name" required placeholder="e.g. Planning" />
                <input type="hidden" name="board_id" value="{{ $board_id }}" />
            </div>
            <button type="submit" class="w-full bg-teal-600 text-white rounded p-2 hover:bg-teal-700">Create</button>
        </form>
    </div>

</body>
</html>