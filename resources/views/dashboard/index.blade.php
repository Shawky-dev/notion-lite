<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <title>Document</title>
</head>
<body class= "p-4">
     <!-- Header -->
     <div class="flex flex-row justify-between items-center bg-amber-200 rounded-2xl p-3">
        <!-- Title -->
        <div class="text-3xl font-[Tagesschrift]">NotionLite</div>
        <div class="text-3xl font-[Noto]">{{$name}} 's Dashboard</div>
        <!-- Profile -->
        <div class="h-10 w-10 hover:cursor-pointer">
                <x-mdi-account />
        </div>
    </div>
    
    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>