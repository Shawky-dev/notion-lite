<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $board->title }}</title>
    <style>
        ::-webkit-scrollbar {
            height: 10px;
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #CBD5E0; /* gray-300 */
            border-radius: 8px;
        }
    </style>
</head>

<body class="min-h-screen bg-[#F8F9FA] text-[#1F2937]">

    <!-- Header -->
    <header class="bg-[#0D9488] text-white shadow sticky top-0 z-10 p-5 rounded-b-2xl">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">{{ $board->title }}</h1>
        </div>
    </header>

    <!-- Main Content -->
        
    <main class="max-w-7xl mt-6 ">
        <div class="flex gap-6 w-svw px-2 overflow-x-auto pb-6">

            @foreach($board->sections as $section)
                <div class="flex-shrink-0 w-72 bg-white rounded-2xl shadow p-4 flex flex-col max-h-[80vh] border border-gray-200">
                    <!-- Section Header -->
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-lg font-semibold text-[#0D9488] capitalize truncate">{{ $section->name }}</h2>
                        <button class="text-2xl text-gray-400 hover:text-gray-600 transition hover:cursor-pointer">...</button>
                    </div>

                    <!-- Tasks -->
                    <div class="flex flex-col gap-3 overflow-y-auto pr-1 h-sv">
                        @forelse($section->tasks as $task)
                            <div class="bg-[#E0F2F1] p-3 rounded-lg flex items-start gap-3 shadow-sm hover:cursor-pointer">
                                <input
                                    type="checkbox"
                                    onchange="toggleTask({{ $task->id }}, this.checked)"
                                    {{ $task->status ? 'checked' : '' }}
                                    class="mt-1 accent-[#0D9488] w-5 h-5"
                                />
                                <div class="flex-1">
                                    <div class="font-medium leading-snug {{ $task->status ? 'line-through text-gray-500' : 'text-gray-800' }}">
                                        {{ $task->name }}
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1 italic">
                                        Created by: {{ $task->user_id ?? 'Unknown' }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-sm text-gray-400 italic">No tasks yet</div>
                        @endforelse

                        <!-- Add Task -->
                        <button
                            onclick="window.location.href='/tasks/create/{{$board->id}}/{{ $section->id }}'"
                            class="bg-[#CFFAFE] hover:bg-[#A5F3FC] text-[#0D9488] text-sm rounded-lg py-2 mt-3 transition text-center shadow font-medium"
                        >
                            + Add Task
                        </button>
                    </div>
                </div>
            @endforeach

            <!-- Add Section -->
            <div
                onclick="window.location.href='/sections/create/{{$board->id}}'"
                class="flex items-center justify-center w-72 min-h-[200px] bg-[#DCFCE7] border-2 border-dashed border-[#0D9488] hover:bg-[#BBF7D0] text-4xl text-[#0D9488] rounded-2xl cursor-pointer transition hover:-translate-y-1"
            >
                +
            </div>

        </div>
    </main>

    <!-- Toggle Task JS -->
    <script>
        function toggleTask(taskId, isChecked) {
            fetch(`/tasks/${taskId}/status`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ is_completed: isChecked })
            })
            .then(response => {
                if (!response.ok) throw new Error('Server error');
                return response.json();
            })
            .then(data => console.log('Task updated:', data))
            .catch(err => {
                console.error('Update failed:', err);
                alert('Failed to update task');
            });
        }
    </script>

</body>
</html>
