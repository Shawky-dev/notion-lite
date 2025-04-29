<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <title>Document</title>
</head>
<body class= " p-4 bg-[#E1EEBC]">
     <!-- Header -->
     <div class="flex flex-row justify-between items-center bg-[#90C67C] rounded-2xl p-3">
        <!-- Title -->
        <div class="text-3xl font-[Tagesschrift]">NotionLite</div>
        <div class="text-3xl font-[Noto]">{{$name}} 's Dashboard</div>
        <!-- Profile -->
        <div class="h-10 w-10 hover:cursor-pointer" onclick="window.location.href='{{ url('/profile') }}'">
            <x-mdi-account />
        </div>
    </div>
    <div class="mt-4">
        <h1 class="text-lg">Boards:</h1>
        {{-- Boards --}}
        <div class="flex flex-row flex-wrap space-x-3">
            {{-- Board Template --}}
            <div class="mt-4 h-30 w-50 flex flex-col-reverse bg-[#FFF1D5] border-[#90C67C] border-3 rounded-2xl ">
                {{-- Board Title --}}
                <div class="w-full text-center p-1 border-t-1">
                    <h1>Board Name</h1>
                </div>
                <div class="flex flex-col p-2 text-sm">
                    <p>Company:</p>
                    <p>Unfinished-tasks:</p>
                    <p>Members:</p>
                </div>
            </div>
            {{-- Border Create Button --}}
            <div class="mt-4 h-30 w-50 flex flex-row justify-center items-center bg-[#90C67C] border-[#90C67C] rounded-2xl text-white text-3xl hover:bg-[#b2cca8] hover:cursor-pointer">
                +    
            </div>
            </div>
        </div>
    </div>
</body>
</html>