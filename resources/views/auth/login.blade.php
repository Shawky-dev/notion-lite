<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-6">Login to Your Account</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/login" method="POST" class="flex flex-col space-y-5">
            @csrf

            <div class="flex flex-col space-y-2">
                <label for="email" class="text-left font-medium">Email</label>
                <input type="text" name="email" id="email" value="{{old('email')}}" class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400">
            </div>

            <div class="flex flex-col space-y-2">
                <label for="password" class="text-left font-medium">Password</label>
                <input type="password" name="password" id="password" value="{{old('password')}}" class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400">
            </div>

            <div class="flex items-center space-x-2">
                <input type="checkbox" name="remember" id="remember" class="accent-amber-400">
                <label for="remember" class="text-sm">Remember Me</label>
            </div>

            <div>
                <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-white font-bold py-2 rounded-xl transition duration-300">
                    Login
                </button>
            </div>
        </form>
    </div>
</body>
</html>
