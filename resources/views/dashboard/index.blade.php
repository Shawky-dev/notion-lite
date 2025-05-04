<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <title>NotionLite Dashboard</title>
</head>
<body class="p-4 bg-[#F8F9FA] text-[#1F2937]">
    <!-- Header -->
    <div class="flex flex-row justify-between items-center bg-[#0D9488] rounded-2xl p-3 text-white">
        <!-- Title -->
        <div class="text-3xl font-[Tagesschrift]">NotionLite</div>
        <div class="text-3xl font-[Noto]">{{$name}}'s Dashboard</div>
        <!-- Profile -->
        <div class="h-10 w-10 hover:cursor-pointer" onclick="window.location.href='{{ url('/profile') }}'">
            <x-mdi-account />
        </div>
    </div>

    <div class="py-10">
        <h1 class="text-2xl mb-4 font-semibold">Boards:</h1>

        <!-- Boards -->
        <div class="flex flex-row flex-wrap gap-4">
            @foreach ($boards as $board)
                <x-board-card 
                    :title="$board->title"
                    :company="$board->company" 
                />  
            @endforeach

            <!-- Board Create Button -->
            <div class="h-36 w-64 flex flex-row justify-center items-center bg-[#0D9488] border-2 border-[#0D9488] rounded-2xl text-white text-3xl hover:bg-[#2DD4BF] hover:cursor-pointer transition-transform duration-150 ease-in-out hover:-translate-y-1">
                +
            </div>
        </div>
    </div>
</body>
</html>
