<div class="mt-4 mx-2 h-35 w-65 flex flex-col-reverse bg-[#FFF1D5] border-[#90C67C] border-3 rounded-2xl hover:cursor-pointer transition delay-75 duration-75 ease-in-out hover:-translate-y-1"
     onclick="window.location.href='/board/{{ $id }}'">

    {{-- Board Title --}}
    <div class="w-full text-center p-1 border-t-1">
        <h1>{{ $title }}</h1>
    </div>
    <div class="flex flex-row text-sm p-2 justify-between">
        <div class="space-y-2">
            <p>Company:</p>
            <p>Unfinished tasks: </p>
            <p>Members: </p>
        </div>
        <div class="">
            <p>{{ $company }}</p>
            <p></p>
            <p></p>
        </div>
    </div>
</div>
