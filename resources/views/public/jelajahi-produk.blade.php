@extends('templates.start-html')
@include('components.navbar')
<section class="my-5 px-[5%]">
    <div class="w-[80%] m-auto">
        <form class="flex justify-between">
            <p class="text-2xl font-bold text-lightblue font-sour-gummy flex items-center">Jelajahi Produk</p>
            <div class="flex items-center gap-2">
                <input placeholder="Cari nama barang" type="text" class=" bg-slate-300 h-full w-[300px] rounded-[12px] px-3 focus:outline-lightblue text-lightblue placeholder:font-sour-gummy font-sour-gummy">
                <button type="submit" class="font-semibold text-white shadow-md hover:text-slate-200 hover:bg-blue-600 bg-lightblue px-4 py-2 rounded-[12px] font-sour-gummy">Cari</button>
            </div>
        </form>
    </div>

    <div class="w-full flex justify-between mt-8">
        <div id="left-content" class="w-[20%]">
            <div class="text-white bg-darkblue flex items-center px-3 py-1 rounded-tr-[12px] rounded-bl-[12px] mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                </svg>
                <p class="text-xl font-normal text-white font-sour-gummy flex items-center">Tagar</p>
            </div>
        @include('components.tag')

        </div>
        <div id="right-content" class="w-[80%]">
            <div id="card-container" class="grid grid-cols-4 gap-y-5 w-full justify-items-end">
                @include('components.card')
                @include('components.card')
                @include('components.card')
                @include('components.card')
                @include('components.card')
                @include('components.card')
                @include('components.card')
            </div>
        </div>
    </div>

</section>

@include('components.footer')
@extends('templates.end-html')