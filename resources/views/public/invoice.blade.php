@extends('templates.start-html')
@include('components.navbar')

<section class="w-full min-h-screen  py-[5%] px-[10%] space-y-2">
    <div class="w-full bg-lightblue p-5 rounded-lg">
        <p class="text-white font-bold">Invoice Pembelian</p>
    </div>
    <div class="w-full p-5 rounded-lg ">
        <div class="w-full">
            <div class="text-green-400 w-full flex flex-col  items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-[250px]">
                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                </svg>
                <div class="text-green-500 font-bold text-lg">
                    Transaksi Selesai
                </div>
            </div>
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
                    <div class=" rounded-[8px] relative min-w-[100px] min-h-[100px] overflow-hidden bg-cover bg-center" style=" background-image: url('{{ asset("storage/" . $product->product->image_url) }}');">
                    </div>
                    <div>
                        <p class="text-darkblue font-semibold">{{ $product->product->name }}</p>
                        <p class="text-lightblue font-semibold">Rp. {{ number_format($product->product->price, '0', ',', '.' )}}</p>
                    </div>
                </div>
                <div>
                    <p class="text-darkblue font-semibold">Rp. {{ number_format($product->total_price, '0', ',', '.' )}}</p>
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
            @if ($invoice->payment_option === 'pay_on_site')
                <p class="text-darkblue font-semibold font-sm">Status Pembayaran : <span class="text-lightblue">{{ $invoice->completion_date === null? 'Belum Dibayar' : 'Sudah Dibayar'}}</span></p>
            @else
            <p class="text-darkblue font-semibold font-sm">Status Pembayaran : <span class="text-lightblue">Sudah Dibayar</span></p>
            @endif
        </div>
    </div>
</section>

@include('components.footer')
@extends('templates.end-html')