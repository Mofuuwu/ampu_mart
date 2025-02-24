@extends('templates.start-html')
@include('components.navbar')
<section class="my-5 px-[5%]">
    <div class="w-[100%] m-auto">
        <div class="flex md:flex-row justify-between flex-col">
            <p class="text-md md:text-2xl font-bold text-lightblue font-sour-gummy flex items-center">Jelajahi Produk</p>
            <form action="{{ route('search.product') }}" method="get" class="flex items-center gap-2">
                <a href="/jelajahi-produk" class="font-semibold text-white shadow-md hover:bg-hoverblue bg-lightblue px-3 py-1 md:px-4 md:py-2 rounded-[12px] font-sour-gummy">Clear</a>
                <input name="keyword" placeholder="Cari barang" type="text" class=" bg-slate-300 py-1 h-full w-full md:w-[300px] rounded-[12px] px-3 focus:outline-lightblue text-lightblue placeholder:font-sour-gummy font-sour-gummy" value="{{ request()->get('keyword') }}">
                <input type="hidden" name="category" value="{{ request()->get('category') }}"> <!-- Menambahkan kategori di form -->
                <button type="submit" class="font-semibold text-white shadow-md hover:bg-hoverblue bg-lightblue px-3 py-1 md:px-4 md:py-2 rounded-[12px] font-sour-gummy">Cari</button>
            </form>

        </div>
    </div>

    <div class="w-full md:gap-0 gap-5 flex md:flex-row flex-col-reverse justify-between mt-8 my-20">
        <div id="left-content" class="w-full md:w-[20%] shadow-md h-fit rounded-[12px]">
            <div class="text-white bg-customorange flex items-center px-3 py-1 rounded-t-[12px] mb-2 md:gap-0 gap-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="md:size-4 size-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                </svg>
                <p class="text-md md:text-xl font-semibold text-white font-sour-gummy flex items-center">Kategori Produk</p>
            </div>
            <div class="pb-4 px-4">
                <!-- @include('components.tag') -->
                <ul class="text-darkblue underline md:text:md text-sm">
                    @foreach ($tags as $tag)
                    <li><a href="?category={{ $tag->name }}&keyword={{ request()->get('keyword') }}">{{ $tag->name }} ({{ $tag->products_count }})</a></li>
                    @endforeach
                </ul>

            </div>

        </div>
        @if ($products->isNotEmpty())
        <div id="right-content" class="md:w-[80%] w-full">
            <div id="card-container" class="grid lg:grid-cols-3 xl:grid-cols-4 grid-cols-2 gap-y-5 w-full sm:justify-items-end justify-items-center">
                @foreach($products as $product)
                <x-card-v2
                    :id="$product->id"
                    :image_url="$product->image_url"
                    :stock="$product->stock"
                    :name="$product->name"
                    :price="$product->price" />
                @endforeach
            </div>
        </div>
        @else
        <div class="w-full flex items-center justify-center md:min-h-0 min-h-[50vh]">
            <p class="text-slate-400 font-semibold text-2xl text-center">Tidak Ada Produk Yang Ditemukan</p>
        </div>
        @endif
    </div>

</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@include('components.footer')
@extends('templates.end-html')