@extends('templates.start-html')
@include('components.navbar')
<section class="my-5 px-[5%]">
    <div class="w-[100%] m-auto">
        <div class="flex justify-start">
            <p class="text-2xl font-bold text-lightblue font-sour-gummy flex items-center">Keranjang</p>
        </div>
    </div>

    <div class="mt-4">
        <div class="flex flex-col-reverse md:flex-row justify-between gap-4">
            <div class="w-full md:w-[70%]">
                <div class="flex justify-between font-sour-gummy text-darkblue">
                    <p>Produk</p>
                    <p>Total</p>
                </div>
                <div class="underline min-h-[1px] bg-gray-200 w-full">
                </div>
                <div class="container-card">
                    @include('components.cart-card')
                    @include('components.cart-card')
                    @include('components.cart-card')
                    @include('components.cart-card')
                    @include('components.cart-card')
                    @include('components.cart-card')
                </div>
            </div>
            <div class="w-full md:w-[30%]">
                <div class="flex justify-between font-sour-gummy text-darkblue">
                    <p>Info keranjang</p>
                </div>
                <div class="bg-slate-200 h-fit p-5">
                    <div>
                        <p class="flex justify-between text-darkblue font-sour-gummy">Total Barang :</p>
                        <p class="flex justify-between text-darkblue font-bold text-xl">98</p>
                    </div>
                    <div class="min-w-full h-[2px] bg-opacity-80 bg-darkblue my-2"></div>
                    <div>
                        <p class="flex justify-between text-darkblue font-sour-gummy">Total Harga :</p>
                        <p class="flex justify-between text-darkblue font-bold text-2xl">1.300.000</p>
                    </div>
                </div>
                <a href="/checkout" class="bg-lightblue h-fit px-3 py-2 mt-2 cursor-pointer flex justify-center items-center text-white hover:bg-hoverblue font-semibold font-sour-gummy">
                    Checkout Sekarang
                </a>
            </div>
        </div>
        <div>

        </div>
    </div>
</section>
@include('components.footer')
@extends('templates.end-html')