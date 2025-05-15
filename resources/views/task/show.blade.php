<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Task Details</title>
</head>
<body class="min-h-screen bg-gray-100 flex justify-center items-center p-6">

    <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg">
        <!-- Back Button and Title -->
        <div class="flex items-center justify-between mb-6">
            <button 
                onclick="window.history.back()"
                class="text-sm text-teal-600 hover:underline font-medium flex items-center gap-1"
            >
                ← Back to Board
            </button>
            <h2 class="text-2xl font-bold text-teal-700">Task Details</h2>
        </div>

        <!-- Task Content -->
        <div class="space-y-6">
            <!-- Task Name -->
            <div class="bg-teal-50 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 mb-1">Task</h3>
                <p class="text-xl font-semibold text-gray-800">{{ $task->name }}</p>
            </div>

            <!-- Task Status -->
            <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Status</h3>
                    <p class="font-medium {{ $task->status ? 'text-green-600' : 'text-amber-600' }}">
                        {{ $task->status ? 'Completed' : 'In Progress' }}
                    </p>
                </div>
                <div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" {{ $task->status ? 'checked' : '' }} id="statusToggle">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-teal-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-teal-600"></div>
                    </label>
                </div>
            </div>

            <!-- Section Info -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 mb-1">Section</h3>
                <p class="font-medium text-gray-800 capitalize">{{ $task->section->name ?? 'Unknown' }}</p>
            </div>

            <!-- Created / Updated Info -->
            <div class="bg-gray-50 p-4 rounded-lg grid grid-cols-2 gap-4">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Created</h3>
                    <p class="text-sm text-gray-700">{{ $task->created_at->format('M d, Y') }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Last Updated</h3>
                    <p class="text-sm text-gray-700">{{ $task->updated_at->format('M d, Y') }}</p>
                </div>
            </div>

            <!-- Created By -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 mb-1">Created By</h3>
                <p class="text-sm text-gray-700">{{ $task->user->name ?? 'Unknown' }}</p>
            </div>

            <!-- Edit / Archive Buttons -->
            <div class="flex gap-3 pt-2">
                <a href="{{ url('/tasks/edit/'.$task->id) }}" 
                   class="flex-1 bg-teal-600 text-white rounded-lg py-2 text-center font-medium hover:bg-teal-700 transition">
                    Edit Task
                </a>
                <button 
                    class="px-4 border border-red-300 text-red-600 rounded-lg hover:bg-red-50 transition"
                    type="button"
                    onclick="archiveTask({{ $task->id }})"
                >
                    Archive
                </button>
            </div>
        </div>
    </div>

    <script>
        // Toggle status with JS
        document.getElementById('statusToggle').addEventListener('change', function() {
            const taskId = {{ $task->id }};
            
            fetch(`/tasks/${taskId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ is_completed: this.checked })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        });
        
        function archiveTask(taskId) {
            if (confirm('Are you sure you want to archive this task?')) {
                // Frontend only - you would implement the backend for this
                alert('Task archived! (This is just a frontend demo)');
            }
        }
    </script>
</body>
</html>