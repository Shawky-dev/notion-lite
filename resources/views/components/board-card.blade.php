<div
    onclick="window.location.href='/board/{{ $id }}'"
    class="w-72 h-40 bg-white rounded-2xl shadow border border-gray-200 p-4 flex flex-col justify-between cursor-pointer transition duration-200 hover:shadow-lg hover:ring-1 hover:ring-teal-400"
>
    <!-- Header -->
    <div>
        <h2 class="text-lg font-semibold text-gray-800 truncate">{{ $title }}</h2>
        <p class="text-sm text-gray-500 italic">{{ $company }}</p>
    </div>

    <!-- Info Rows -->
    <div class="text-sm text-gray-600 space-y-1 mt-2">
        <div class="flex justify-between">
            <span>📋 Tasks:</span>
            <span>{{ $unfinishedTasks ?? '—' }}</span>
        </div>
        <div class="flex justify-between">
            <span>👥 Members:</span>
            <span>{{ $membersCount ?? '—' }}</span>
        </div>
    </div>

    <!-- Footer -->
    <div class="flex justify-end mt-2">
        <span class="text-teal-600 font-medium text-sm hover:underline">View Board →</span>
    </div>
</div>
