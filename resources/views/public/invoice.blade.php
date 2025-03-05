@extends('templates.start-html')
@include('components.navbar')
@include('components.alert-success')

<section class="w-full min-h-screen  py-[5%] px-[10%] space-y-2">
    <div class="w-full bg-lightblue p-5 rounded-lg">
        <p class="text-white font-bold">Invoice Pembelian</p>
    </div>
    <div class="w-full p-5 rounded-lg ">
        <div class="w-full">
            @switch($invoice->status)
            @case('selesai')
            <div class="text-green-400 w-full flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-[250px]">
                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                </svg>
                <div class="text-green-500 font-bold text-lg">
                    Transaksi Selesai
                </div>
            </div>
            @break

            @case('diproses')
            <div class="text-orange-400 w-full flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-[250px]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
                <div class="text-orange-500 font-bold text-lg">
                    Transaksi Diproses
                </div>
            </div>
            @break
            @case('dibatalkan')
            <div class="text-red-400 w-full flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-[250px]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <div class="text-red-500 font-bold text-lg">
                    Transaksi Dibatalkan
                </div>
            </div>
            @break
            @default
            <div class="text-gray-400 font-bold text-lg">
                Status Tidak Diketahui
            </div>
            @endswitch
        </div>
    </div>
    <div class="w-full h-fit">
        <div class="w-full p-5 bg-lightblue rounded-t-lg">
            <p class="text-white font-bold">Rincian Pesanan :</p>
        </div>
        <div class="w-full p-5 bg-slate-200 rounded-b-lg">
            <p class="text-darkblue font-semibold font-sm">Kode Unik : <span class=" text-lightblue">{{ $invoice->order_id }}</span></p>
            <p class="text-darkblue font-semibold font-sm">Tanggal Pembelian : <span class=" text-lightblue">{{ \Carbon\Carbon::parse($invoice->order_date)->translatedFormat('l, d F Y - H:i') }}</span></p>
            <p class="text-darkblue font-semibold font-sm">Email : <span class=" text-lightblue">{{ $invoice->email }}</span></p>
            <p class="text-darkblue font-semibold font-sm">Metode Pemesanan : <span class=" text-lightblue">{{ $invoice->delivery_method === 'pickup'? 'Ambil Di Toko' : "Diantar Ke Rumah" }}</span></p>
            @if ($invoice->delivery_method === 'delivery')
            <p class="text-darkblue font-semibold font-sm">Alamat : <span class=" text-lightblue">{{ $invoice->address->name }}</span></p>
            @endif
            <p class="text-darkblue font-semibold font-sm">Nomor Telepon : <span class=" text-lightblue">{{ $invoice->address->phone_number }}</span></p>
        </div>
    </div>

    <div class="w-full h-fit">
        <div class="w-full p-5 bg-lightblue rounded-t-lg">
            <p class="text-white font-bold">Rincian Item : </p>
        </div>
        <div class="w-full p-5 bg-slate-200 rounded-b-lg">
            @foreach ($invoice->order_items as $product)
            <div class="card flex justify-between my-1">
                <div class="flex gap-2">
                    <div class=" rounded-[8px] relative min-w-[100px] min-h-[100px] overflow-hidden bg-cover bg-center" style=" background-image: url('{{ $product->product? asset("storage/" . $product->product->image_url) : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg' }}');">
                    </div>
                    <div>
                        <p class="text-darkblue font-semibold">{{ $product->product_name }}</p>
                        <p class="text-lightblue font-semibold">Rp. {{ number_format($product->product_price, '0', ',', '.' )}}</p>
                    </div>
                </div>
                <div>
                    <p class="text-darkblue font-semibold">Rp. {{ number_format($product->total_price, '0', ',', '.' )}}</p>
                    <p class="text-darkblue font-semibold text-right">{{ $product->amount }}x</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="w-full h-fit">
        <div class="w-full p-5 bg-lightblue rounded-t-lg">
            <p class="text-white font-bold">Rincian Pembayaran : </p>
        </div>
        <div class="w-full p-5 bg-slate-200 rounded-b-lg">
            <p class="text-darkblue font-semibold font-sm">Harga Awal : <span class=" text-lightblue">Rp. {{ number_format($invoice->price, '0', ',', '.' )}}</span></p>
            @if ($invoice->delivery_method === 'delivery')
            <p class="text-darkblue font-semibold font-sm">Ongkos Kirim : <span class="text-lightblue">Rp. 20.000</span></p>
            <p class="text-darkblue font-semibold font-sm">
                Voucher :
                <span class="text-lightblue">
                    @if ($invoice->voucher_usage)
                    Rp. {{ number_format($invoice->final_price - $invoice->price - 20000, 0, ',', '.') }}
                    @else
                    -
                    @endif
                </span>
            </p>
            @else
            <p class="text-darkblue font-semibold font-sm">
                Voucher :
                <span class="text-lightblue">
                    @if ($invoice->voucher_usage)
                    Rp. {{ number_format($invoice->final_price - $invoice->price, 0, ',', '.') }}
                    @else
                    -
                    @endif
                </span>
            </p>
            @endif
            <p class="text-darkblue font-semibold font-sm">Harga Akhir : <span class=" text-lightblue">Rp. {{ number_format($invoice->final_price, '0', ',', '.' )}}</span></p>
            <p class="text-darkblue font-semibold font-sm">Metode Pembayaran : <span class="text-lightblue">{{ $invoice->payment_option === 'use_balance'? 'Saldo Ampu Mart' : 'Bayar Di tempat' }}</span></p>
            <p class="text-darkblue font-semibold font-sm">Status Pembayaran : <span class="text-lightblue">{{ $invoice->billing === 'dibayar' ? 'Dibayar' : 'Belum Dibayar' }}</span></p>
        </div>
    </div>
    @if($invoice->status != 'dibatalkan')
    <form class="w-full h-fit" method="post" action="{{ route('cancel.transaction') }}">
        @csrf
        <input type="hidden" name="order_id" value="{{ $invoice->order_id }}">
        <button type="submit" class="bg-red-500 py-3 w-full rounded-lg text-white font-bold">
            Batalkan Pesanan
        </button>
    </form>
    @endif
</section>

@include('components.footer')
@extends('templates.end-html')