@extends('templates.start-html')
@include('components.navbar')
<section class="my-5 px-[5%]">
    <div class="w-[100%] m-auto">
        <form class="flex justify-between">
            <p class="text-2xl font-bold text-lightblue font-sour-gummy flex items-center">Jelajahi Produk</p>
            <div class="flex items-center gap-2">
                <input placeholder="Cari nama barang" type="text" class=" bg-slate-300 h-full w-[300px] rounded-[12px] px-3 focus:outline-lightblue text-lightblue placeholder:font-sour-gummy font-sour-gummy">
                <button type="submit" class="font-semibold text-white shadow-md hover:bg-hoverblue bg-lightblue px-4 py-2 rounded-[12px] font-sour-gummy">Cari</button>
            </div>
        </form>
    </div>

    <div class="w-full flex justify-between mt-8 my-20">
        <div id="left-content" class="w-[20%] shadow-md h-fit rounded-[12px]">
            <div class="text-white bg-midblue flex items-center px-3 py-1 rounded-t-[12px] mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                </svg>
                <p class="text-xl font-semibold text-white font-sour-gummy flex items-center">Kategori Produk</p>
            </div>
            <div class="pb-4 px-4">
                @include('components.tag')
            </div>

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