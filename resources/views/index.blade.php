@extends('templates.start-html')
@include('components.navbar')


<section class="my-5 px-[5%] flex justify-center items-center">
    <div class="min-w-[80%] relative">
        <img src="{{asset('images/Frame 1.png')}}" alt="">
        <div class="absolute text-center left-[50%] top-[50%] transform -translate-x-1/2 -translate-y-1/2 w-full px-[10%]">
            <p class="font-semibold text-sm sm:text-lg md:text-2xl lg:text-4xl xl:text-5xl text-white mb-4 font-sour-gummy">Sistem Toko Online Universitas Amikom Purwokerto Mudah Dan Praktis</p>
            <a href="/jelajahi-produk" class="font-bold lg:text-lg md:text-md sm:text-sm text-sm text-blue-300 shadow-md hover:text-lightblue hover:bg-slate-200 transition-colors bg-darkblue md:px-5 md:py-2 px-3 py-1 md:rounded-[14px] rounded-lg font-sour-gummy">Jelajahi Produk > </a>
        </div>
    </div>
</section>

<section class="my-10 md:my-36">
    <div class="w-full bg-lightblue flex justify-around md:py-8 py-4 shadow-md">
        <div class="flex items-center md:gap-4 gap-2 md:flex-row flex-col">
            <div class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 md:size-14 sm:size-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
            </div>
            <div class="flex-col flex items-center md:items-start">
                <p class="text-white text-lg font-semibold font-sour-gummy lg:text-2xl md:text-xl sm:text-sm">100+</p>
                <p class="text-white text-sm font-bold font-sour-gummy md:text-md md:text-sm">Produk</p>
            </div>
        </div>
        <div class="flex items-center md:gap-4 gap-2 md:flex-row flex-col">
            <div class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 md:size-14 sm:size-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>
            </div>
            <div class="flex-col flex items-center md:items-start">
                <p class="text-white text-lg font-semibold font-sour-gummy lg:text-2xl md:text-xl sm:text-sm">400+</p>
                <p class="text-white text-sm font-bold font-sour-gummy md:text-md md:text-sm">Penjualan</p>
            </div>
        </div>
        <div class="flex items-center md:gap-4 gap-2 md:flex-row flex-col">
            <div class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 md:size-14 sm:size-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>

            </div>
            <div class="flex-col flex items-center md:items-start">
                <p class="text-white text-lg font-semibold font-sour-gummy lg:text-2xl md:text-xl sm:text-sm">20</p>
                <p class="text-white text-sm font-bold font-sour-gummy md:text-md md:text-sm">User</p>
            </div>
        </div>
    </div>
</section>

<section class=" my-10 md:my-36 px-[5%]">
    <!-- <div class="absolute -left-40 bg-opacity-50 min-w-[500px] min-h-[500px] rounded-full -z-10 bg-lightblue"></div> -->
    <!-- <div class="left-[30%] bottom-0 absolute bg-opacity-50 min-w-[240px] min-h-[240px] rounded-full -z-10"></div> -->
    <div class="flex flex-row max-[1000px]:flex-col-reverse max-[1000px]:gap-5">
        <div class="max-[1000px]:w-full w-[50%] px-[5%] flex flex-col items-start justify-between">
            <p class="text-2xl font-bold text-lightblue font-sour-gummy flex items-center">Tentang Kami</p>
            <p class="text-semibold font-sour-gummy text-darkblue">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel consequat nunc. Cras ut mattis tellus. Aenean eu ante vitae est consequat venenatis vel id lacus. Nam faucibus odio in sapien lacinia porttitor. Donec porta quam at dui lobortis, bibendum laoreet purus hendrerit. Nam nisi nunc, auctor id euismod auctor, tristique nec erat. In dignissim placerat egestas. Ut volutpat non libero et malesuada. Aenean ligula urna, vulputate sit amet lectus nec, porttitor dictum tellus.
            </p>
            <div class="w-full flex justify-end">
                <a href="" class="font-semibold text-white shadow-md hover:bg-hoverblue bg-lightblue px-4 py-2 rounded-[12px] font-sour-gummy">Selengkapnya ></a>
            </div>
        </div>
        <div class="max-[1000px]:w-full w-[50%] px-[5%] min-h-[300px] max-h-[300px] flex justify-center items-center">
            <div class="rounded-[16px] max-[1000px]:w-full max-[1000px]:h-[300px] w-[90%] h-[90%] bg-[url('https://fbis.amikompurwokerto.ac.id/assets/img/bglogin.webp')] bg-cover bg-center"></div>
        </div>
    </div>
</section>

<section class="md:my-36 my-10 px-[5%] w-full bg-lightblue">
    Anda Memiliki 618 Barang Yang Belum DI Checkout
</section>

<section class="md:my-36 my-10 px-[5%] w-full">
    <p class="text-2xl text-center font-bold text-lightblue font-sour-gummy">Produk Kami</p>
    <div class="w-full flex justify-center gap-2 mt-2">
        <p id="tab-terlaris" onclick="switchTab('terlaris')" class=" hover:opacity-80 cursor-pointer text-md font-semibold text-lightblue font-sour-gummy underline">Terlaris</p>
        <p id="tab-terbaru" onclick="switchTab('terbaru')" class="hover:opacity-80 cursor-pointer text-md font-semibold text-lightblue font-sour-gummy">Terbaru</p>
    </div>
    <div id="fav-card-container" class="grid gap-4 mt-4 justify-items-center w-full grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6">
    @include('components.card')
    @include('components.card')
    @include('components.card')
    @include('components.card')
    @include('components.card')
    @include('components.card')
</div>


    <div id="newest-card-container" class="grid gap-4 mt-4 justify-items-center w-full grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 hidden">
            @include('components.card')
            @include('components.card')
            @include('components.card')
            @include('components.card')
    </div>
    <div class="w-full flex justify-center mt-4">
        <a href="/jelajahi-produk" class="font-semibold text-white shadow-md hover:bg-hoverblue bg-lightblue px-4 py-2 rounded-[12px] font-sour-gummy">Semua Produk ></a>
    </div>
</section>
<script>
    // Fungsi untuk men-switch antara tab Terlaris dan Terbaru
    function switchTab(tab) {
        // Menyembunyikan semua kontainer produk
        const favContainer = document.getElementById('fav-card-container');
        const newestContainer = document.getElementById('newest-card-container');
        const tabTerlaris = document.getElementById('tab-terlaris');
        const tabTerbaru = document.getElementById('tab-terbaru');

        // Menampilkan kontainer sesuai dengan tab yang dipilih
        if (tab === 'terlaris') {
            favContainer.classList.remove('hidden');
            newestContainer.classList.add('hidden');
            tabTerlaris.classList.add('underline');
            tabTerbaru.classList.remove('underline');
        } else if (tab === 'terbaru') {
            favContainer.classList.add('hidden');
            newestContainer.classList.remove('hidden');
            tabTerlaris.classList.remove('underline');
            tabTerbaru.classList.add('underline');
        }
    }

    // Menetapkan tab "Terlaris" aktif secara default
    window.onload = function() {
        switchTab('terlaris');
    }
</script>
@include('components.footer')
@extends('templates.end-html')