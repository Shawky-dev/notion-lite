<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Settings</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-2xl bg-white p-10 rounded-xl shadow-lg space-y-8">
        @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
        <h1 class="text-4xl font-bold text-center mb-6">Profile Settings</h1>

        <!-- Update Name and Email -->
        <form action="/profile/update" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col space-y-2">
                <label for="name" class="text-left font-medium">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" 
                    class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400">
            </div>

            <div class="flex flex-col space-y-2">
                <label for="email" class="text-left font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" 
                    class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400">
            </div>

            <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-white font-bold py-2 rounded-xl transition duration-300">
                Update Profile
            </button>
        </form>


        <!-- Update Password -->

            <button onclick="window.location.href='/reset-password'" class="w-full bg-amber-400 hover:bg-amber-500 text-white font-bold py-2 rounded-xl transition duration-300">
                Change Password
            </button>

        <!-- Logout -->
        <form action="/logout" method="POST" class="text-center">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-xl transition duration-300">
                Logout
            </button>
        </form>

    </div>
</body>
</html>
