<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>NotionLite</title>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="flex flex-col p-4">
        <!-- Header -->
        <div class="flex flex-row justify-between items-center">
            <!-- Title -->
            <div class="text-3xl font-[Tagesschrift]">NotionLite</div>
            <!-- Links -->
            <div class="flex flex-row space-x-3 text-lg">
                <a href="/login" class="hover:cursor-pointer hover:underline hover:bg-amber-200 rounded-2xl bg-amber-100 px-4 py-2">Login</a>
                <a href="/register" class="hover:cursor-pointer hover:underline hover:bg-amber-200 rounded-2xl bg-amber-100 px-4 py-2">Register</a>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="flex flex-col  items-center justify-center text-center mt-20 space-y-6">
            <h1 class="text-5xl font-bold">Organize Your Thoughts with NotionLite</h1>
            <p class="text-xl text-gray-600 max-w-xl">A lightweight and fast alternative to heavy note-taking apps. Plan, document, and execute ideas effortlessly.</p>
            <a href="/register" class="mt-6 bg-amber-300 hover:bg-amber-400 text-black font-bold py-3 px-6 rounded-2xl">Get Started for Free</a>
        </div>

    </div>
</body>
</html>
