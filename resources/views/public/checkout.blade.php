@extends('templates.start-html')
@include('components.navbar')
<section class="my-5 px-[5%]">
    <div class="w-[100%] m-auto">
        <form class="flex justify-start">
            <p class="text-2xl font-bold text-lightblue font-sour-gummy flex items-center">Checkout</p>
        </form>
    </div>

    <div class="w-full flex flex-col md:flex-row justify-between mt-8 my-20 gap-2">
        <div id="left-content" class="w-full md:w-[60%]">
            <div class=" bg-gray-200 p-5 rounded-[12px]">
                <div class="mb-10">
                    <p class="text-darkblue font-bold">Informasi Kontak</p>
                    <p class="text-slate-500 text-sm">Kami akan menggunakan email ini untuk mengirimkan rincian dan pembaruan mengenai pesanan Anda</p>
                    <input class="w-full px-3 py-1 outline-none rounded-md mt-1 font-semibold text-lightblue border-slate-400 border-2 border-opacity-50" type="text" placeholder="Email Address">
                </div>
                <div class="mb-10">
                    <p class="text-darkblue font-bold">Pengiriman</p>
                    <p class="text-slate-500 text-sm">Tentukan cara penerimaan pesanan Anda.</p>
                    <div class="flex w-full gap-2 mt-1">
                        <!-- Bagian Pengiriman -->
                        <div class=" cursor-pointer w-1/2 border-lightblue bg-lightblue text-white font-semibold gap-1 border-2 rounded-md py-3 flex justify-center items-center" id="pickup-button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 0 0 7.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 0 0 4.902-5.652l-1.3-1.299a1.875 1.875 0 0 0-1.325-.549H5.223Z" />
                                <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 0 0 9.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 0 0 2.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3Zm3-6a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75v-3Zm8.25-.75a.75.75 0 0 0-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-5.25a.75.75 0 0 0-.75-.75h-3Z" clip-rule="evenodd" />
                            </svg>
                            <p class="">Ambil Di Toko</p>
                        </div>

                        <!-- Bagian Kirim -->
                        <div class=" cursor-pointer w-1/2 border-lightblue bg-white text-lightblue font-semibold gap-1 border-2 rounded-md py-3 flex justify-center items-center" id="delivery-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>
                            <p class="">Kirim</p>
                        </div>
                    </div>
                </div>
                <div id="send-section" class="send hidden">
                    <div>
                        <p class="text-darkblue font-bold">Alamat Pengiriman</p>
                        <p class="text-slate-500 text-sm">Masukkan alamat penerima pesanan</p>
                        <div class=" bg-white p-4 mt-1 rounded-md flex justify-between border-slate-400 border-2 border-opacity-50 mb-10">
                            <div class="w-[90%] flex flex-col flex-wrap">
                                <p class="text-darkblue font-semibold text-sm">Muhammad Rifqi</p>
                                <p class="text-slate-500 text-sm">Babakan, KalimanahPurbalinggaJawa Tengah53371Indonesia Babakan, KalimanahPurbalinggaJawa Tengah53371Indonesia</p>
                                <p class="text-slate-500 text-sm">02819179272</p>
                            </div>
                            <div class="w-[10%] flex justify-end items-center">
                                <p class="text-lightblue underline font-semibold cursor-pointer">Edit</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="text-darkblue font-bold">Opsi pembayaran</p>
                        <div class="bg-white p-4 mt-1 rounded-md border-slate-400 border-2 border-opacity-50 mb-10">
                            <p class="text-darkblue font-semibold text-sm">Bayar di tempat</p>
                            <p class="text-slate-500 text-sm">Bayar di tempat saat penyerahan produk</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-darkblue font-bold">Tambah Catatan Ke Pesanan (Opsional)</p>
                        <textarea class="w-full font-semibold text-lightblue outline-none bg-white py-1 px-3 mt-1 rounded-md border-slate-400 border-2 border-opacity-50 mb-10" type="text" placeholder="Tambah Catatan"></textarea>
                    </div>
                    <button class="bg-lightblue text-center w-full font-bold text-white py-2 rounded-md">Lakukan Pemesanan</button>
                    <p class="mt-1 text-slate-500 text-sm px-2 md:px-20 text-center">Dengan melanjutkan pembelian, artinya anda menyetujui syarat dan ketentuan serta kebijakan dan privasi kami</p>
                </div>
                <div id="take-section" class="take">
                    <p class="text-darkblue font-bold">Lokasi Pengambilan</p>
                    <div class="bg-white p-4 mt-1 rounded-md border-slate-400 border-2 border-opacity-50 mb-10">
                        <div class="flex justify-between">
                            <p class="text-darkblue font-semibold text-sm">Ampu mart</p>
                            <p class="text-slate-500 text-sm">Gratis</p>
                        </div>
                        <p class="text-slate-500 text-sm">Babakan, KalimanahPurbalinggaJawa Tengah53371Indonesia Babakan, KalimanahPurbalinggaJawa Tengah53371Indonesia</p>
                        <p class="text-lightblue text-sm font-semibold">Jadwal pengambilan akan diumumkan kemudian</p>
                    </div>
                    <div>
                        <p class="text-darkblue font-bold">Opsi pembayaran</p>
                        <div class="bg-white p-4 mt-1 rounded-md border-slate-400 border-2 border-opacity-50 mb-10">
                            <p class="text-darkblue font-semibold text-sm">Bayar di tempat</p>
                            <p class="text-slate-500 text-sm">Bayar di tempat saat penyerahan produk</p>
                        </div>
                    </div>
                    <button class="bg-lightblue text-center w-full font-bold text-white py-2 rounded-md">Lakukan Pemesanan</button>
                    <p class="mt-1 text-slate-500 text-sm px-2 md:px-20 text-center">Dengan melanjutkan pembelian, artinya anda menyetujui syarat dan ketentuan serta kebijakan dan privasi kami</p>
                </div>

            </div>
        </div>
        <div id="right-content" class="w-full md:w-[40%]">
            <div class=" bg-white p-4 rounded-[12px] w-full border-slate-400 border-2 border-opacity-50 mb-10">
                <div class="flex justify-between text-darkblue ">
                    <p class="font-bold">Order Summary</p>
                    <svg id="arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 transform transition-transform duration-300 cursor-pointer">
                        <path fill-rule="evenodd" d="M11.47 7.72a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 0 1-1.06-1.06l7.5-7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div id="card-container" class="card-container max-h-0 overflow-hidden transition-all duration-500">
                    @include('components.checkout-card')
                    @include('components.checkout-card')
                    @include('components.checkout-card')
                    @include('components.checkout-card')
                    @include('components.checkout-card')
                    @include('components.checkout-card')
                    @include('components.checkout-card')
                    @include('components.checkout-card')
                </div>
            </div>
        </div>
    </div>

</section>
@include('components.footer')
<script>
    document.getElementById('pickup-button').addEventListener('click', function() {
        document.getElementById('take-section').classList.remove('hidden');
        document.getElementById('send-section').classList.add('hidden');
        this.classList.add('bg-lightblue', 'text-white');
        this.classList.remove('bg-white', 'text-lightblue');
        document.getElementById('delivery-button').classList.add('bg-white', 'text-lightblue');
        document.getElementById('delivery-button').classList.remove('bg-lightblue', 'text-white');
    });

    document.getElementById('delivery-button').addEventListener('click', function() {
        document.getElementById('send-section').classList.remove('hidden');
        document.getElementById('take-section').classList.add('hidden');
        this.classList.add('bg-lightblue', 'text-white');
        this.classList.remove('bg-white', 'text-lightblue');
        document.getElementById('pickup-button').classList.add('bg-white', 'text-lightblue');
        document.getElementById('pickup-button').classList.remove('bg-lightblue', 'text-white');
    });

    const arrow_icon = document.getElementById('arrow-icon');
    const cardContainer = document.getElementById('card-container');
    const arrowIcon = document.getElementById('arrow-icon');

    arrow_icon.addEventListener('click', () => {
        cardContainer.classList.toggle('max-h-0');
        cardContainer.classList.toggle('max-h-screen');
        arrowIcon.classList.toggle('rotate-180');
    });
</script>


@extends('templates.end-html')