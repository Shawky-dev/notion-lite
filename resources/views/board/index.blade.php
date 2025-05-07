<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $board->title }}</title>
    </head>
    
<body class="flex flex-col min-h-screen bg-gray-100 p-6">
    
    {{-- Header --}}
    <header class="flex justify-between items-center bg-teal-600 text-white p-4 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold">{{ $board->title }}</h1>
    </header>

    {{-- Sections --}}
    <main class="flex flex-row flex-wrap gap-6 mt-6">
        @foreach($board->sections as $section)
            <div class="flex flex-col w-72 bg-white shadow-md rounded-xl p-4">
                {{-- Section Title --}}
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-teal-700 capitalize">{{ $section->name }}</h2>
                    <button class="text-red-500 hover:text-red-700">✕</button>
                </div>

                {{-- Tasks --}}
                <div class="flex flex-col gap-3 overflow-y-auto max-h-80">
                    @forelse($section->tasks as $task)
                    <div class="flex items-center gap-3 bg-teal-400 rounded-lg p-3 shadow-sm">
                        <div class="text-amber-50 0">
                        </div>
                        <input
                        type="checkbox"
                        onchange="toggleTask({{ $task->id }}, this.checked)"
                        {{ $task->status ? 'checked' : '' }}
                        class="form-checkbox h-5 w-5 text-teal-600"
                    />
                    
                    <div class="font-medium {{ $task->status ? 'line-through text-gray-500' : 'text-gray-800' }}">
                        {{ $task->name }}
                    </div>
                    <div class="text-sm text-white italic pl-8">
            Created by: {{ $task->user_id ?? 'Unknown' }}
        </div>
                    </div>
                @empty
                    <div class="text-sm text-gray-500 italic">No tasks yet</div>
                @endforelse
                <div class="flex flex-row justify-center items-center gap-3 bg-teal-200 rounded-lg p-3 shadow-sm cursor-pointer "
                 onclick="window.location.href='/tasks/create/{{$board->id}}/{{ $section->id }}'"
                >
                    +
                </div>
                </div>
            </div>
        @endforeach
        <div class="flex flex-row justify-center items-center w-72 bg-teal-200 shadow-md rounded-xl p-4 text-black text-3xl cursor-pointer">
            +
        </div>
    </main>

</body>
</html>

<script>
    function toggleTask(taskId, isChecked) {
        fetch(`/tasks/${taskId}/status`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                is_completed: isChecked
            })
        })
        .then(response => {
            if (!response.ok) throw new Error('Server error');
            
            return response.json();
        })
        .then(data => {
            console.log('Task updated:', data);
        })
        .catch(err => {
            console.error('Update failed:', err);
            alert('Failed to update task');
        });
    }
    </script>
    
