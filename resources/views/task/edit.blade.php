<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Edit Task</title>
</head>
<body class="min-h-screen bg-gray-100 flex justify-center items-center p-6">

    <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg">
        <!-- Back Button and Title -->
        <div class="flex items-center justify-between mb-6">
            <button 
                onclick="window.history.back()"
                class="text-sm text-teal-600 hover:underline font-medium flex items-center gap-1"
            >
                ← Back
            </button>
            <h2 class="text-2xl font-bold text-teal-700">Edit Task</h2>
        </div>

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
        <form id="editTaskForm" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Task Name Field -->
            <div class="flex flex-col space-y-2">
                <label for="name" class="font-medium text-sm">Task Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name"
                    value="{{ $task->name }}"
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400"
                    required
                >
            </div>

            <!-- Status Field -->
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-sm">Status</label>
                <div class="flex items-center space-x-2">
                    <label class="inline-flex items-center">
                        <input 
                            type="radio" 
                            name="status" 
                            value="0" 
                            {{ $task->status ? '' : 'checked' }} 
                            class="text-teal-600 focus:ring-teal-500"
                        >
                        <span class="ml-2">In Progress</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input 
                            type="radio" 
                            name="status" 
                            value="1" 
                            {{ $task->status ? 'checked' : '' }} 
                            class="text-teal-600 focus:ring-teal-500"
                        >
                        <span class="ml-2">Completed</span>
                    </label>
                </div>
            </div>

            <!-- Section Dropdown -->
            <div class="flex flex-col space-y-2">
                <label for="section_id" class="font-medium text-sm">Section</label>
                <select 
                    id="section_id" 
                    name="section_id" 
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400"
                >
                    @foreach($sections as $section)
                        <option 
                            value="{{ $section->id }}" 
                            {{ $task->section_id == $section->id ? 'selected' : '' }}
                        >
                            {{ $section->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button 
                    type="submit"
                    class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 rounded-lg transition duration-300"
                >
                    Save Changes
                </button>
            </div>

            <!-- Delete Button -->
            <div class="pt-2">
                <button 
                    type="button"
                    onclick="confirmDelete()"
                    class="w-full bg-white border border-red-500 text-red-500 hover:bg-red-50 font-semibold py-2 rounded-lg transition duration-300"
                >
                    Delete Task
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('editTaskForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const taskId = {{ $task->id }};
            
            // Frontend demo only - normally this would be a real form submission
            alert('Task updated successfully! (This is just a frontend demo)');
            window.history.back();
        });
        
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this task? This action cannot be undone.')) {
                // Frontend demo only
                alert('Task deleted! (This is just a frontend demo)');
                window.location.href = '{{ url("/board/{$task->section->board_id}") }}';
            }
        }
    </script>
</body>
</html>