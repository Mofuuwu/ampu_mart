@extends('templates.start-html')
@include('components.navbar')

<section class="my-5 px-[5%]">
<div class="w-[100%] m-auto">
        <form class="flex md:flex-row justify-between flex-col">
            <p class="text-md md:text-2xl font-bold text-lightblue font-sour-gummy flex items-center">Detail Produk</p>
            <div class="flex items-center gap-2">
                <input placeholder="Cari barang" type="text" class=" bg-slate-300 py-1 h-full w-full md:w-[300px] rounded-[12px] px-3 focus:outline-lightblue text-lightblue placeholder:font-sour-gummy font-sour-gummy">
                <button type="submit" class="font-semibold text-white shadow-md hover:bg-hoverblue bg-lightblue px-3 py-1 md:px-4 md:py-2 rounded-[12px] font-sour-gummy">Cari</button>
            </div>
        </form>
    </div>
    <div class="w-full flex flex-col-reverse lg:flex-row justify-between mt-8 my-20 gap-4">
        <div id="left-content" class="w-full lg:w-[20%] shadow-md h-fit rounded-[12px]">
        <div class="text-white bg-midblue flex items-center px-3 py-1 rounded-t-[12px] mb-2 md:gap-0 gap-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="md:size-4 size-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                </svg>
                <p class="text-md md:text-xl font-semibold text-white font-sour-gummy flex items-center">Kategori Produk</p>
            </div>
            <div class="pb-4 px-4">
                <!-- @include('components.tag') -->
                <ul class="text-darkblue underline md:text:md text-sm">
                 @foreach ($tags as $tag)
                    <li><a href="/jelajahi-produk/kategori/{{ $tag->name }}">{{ $tag->name }}</a></li>
                 @endforeach
                 </ul>
            </div>

        </div>
        <div id="right-content" class="w-full lg:w-[80%]">
            <div class="card flex gap-2 flex-col md:flex-row">
                <div class="card-left bg-green-500 w-full md:min-w-[300px] min-h-[300px] md:w-[300px] h-[300px] shadow-md rounded-[16px] overflow-hidden flex items-center justify-center bg-center bg-cover " style="background-image: url('{{ asset("storage/" . $product->image_url) }}')" >    
                </div>
                <div class="card-right">
                    <p class="font-bold text-xl md:text-3xl text-darkblue">{{ $product->name }}</p>
                    <p class="font-bold text-lg md:text-xl text-lightblue">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-sm text-slate-500">{{ $product->description }}</p>
                    <p class="font-normal text-darkblue underline cursor-pointer">Kategori : {{ $product->category->name }}</p>
                    <div class="flex gap-2 mt-2">
                        <input type="number" class="bg-slate-200 rounded-[8px] w-[100px] px-3 py-1 text-center font-bold text-lightblue focus:outline-lightblue">
                        <button class="bg-green-500 hover:bg-green-600 transition-colors text-white font-bold px-5 py-2 rounded-[8px]">Tambah ke Keranjang</button>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <p class="text-2xl font-bold text-lightblue font-sour-gummy flex items-center md:mb-0 mb-3">Produk Lainnya</p>
                <div id="card-container" class="grid md:grid-cols-3 lg:grid-cols-4 grid-cols-2 gap-y-5 w-full sm:justify-items-end justify-items-center">
                    @include('components.card-v2')
                    @include('components.card-v2')
                    @include('components.card-v2')
                    @include('components.card-v2')
                    @include('components.card-v2')
                    @include('components.card-v2')
                </div>
            </div>
        </div>

    </div>
</section>

@include('components.footer')
@extends('templates.end-html')