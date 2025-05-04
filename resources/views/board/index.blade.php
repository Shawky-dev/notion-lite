<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{$board_title}}</title>
</head>
<body class="flex flex-col p-4 ">
    {{-- Header --}}
    <div class="flex flex-row justify-between items-center bg-[#0D9488] rounded-2xl p-3 text-white">
        <div>
            {{$board->title}}
        </div>
    </div>
    {{-- Body --}}
    <div class="flex flex-row p-5 space-x-7">
        {{-- Card --}}
        <div class="flex flex-col w-64 h-96 rounded-2xl items-center bg-emerald-500">
            {{-- Card Title --}}
            <div class="flex flex-row justify-between w-full p-2">
                <p>title</p>
                <p>x</p>
            </div>
            {{-- Task --}}
            <div class="flex flex-col w-56 h-20 bg-emerald-800 rounded-2xl p-2 text-white">
                <div>
                    task name
                </div>
                <div class="flex justify-end">
                    <div>
                        items
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html> 