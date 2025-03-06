@extends('templates.start-html')
@include('components.navbar')
@include('components.alert-success')
@include('components.alert-error')

<section class="my-5 px-[5%]">
    <div class="w-[100%] m-auto">
        <div class="flex justify-start">
            <p class="text-2xl font-bold text-lightblue font-sour-gummy">Profil Anda</p>
        </div>
    </div>
    <div class="flex md:flex-row flex-col gap-4 md:gap-0">
        <div class="left-content md:w-[30%] w-full" id="navbar">
            <table class="w-full md:w-[80%] border-separate border-spacing-0">
                <tbody>
                    <tr>
                        <td>
                            <button id="btn-akun" class="text-white bg-lightblue px-5 font-bold border-b-2 w-full text-start py-2" onclick="showSection('my-profile-section', this)">Akun Saya</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="btn-alamat" class="text-lightblue px-5 font-bold border-b-2 w-full text-start py-2" onclick="showSection('my-address-section', this)">Alamat Saya</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="btn-riwayat_order" class="text-lightblue px-5 font-bold border-b-2 w-full text-start py-2" onclick="showSection('my-history_order-section', this)">Riwayat Pesanan</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="btn-riwayat_balance" class="text-lightblue px-5 font-bold border-b-2 w-full text-start py-2" onclick="showSection('my-history_balance-section', this)">Riwayat Saldo</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="btn-logout" class="text-lightblue px-5 font-bold border-b-2 w-full text-start py-2" onclick="showSection('my-logout-section', this)">Logout</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="md:w-[70%] w-full">
            <section id="my-profile-section" class="w-full flex flex-col gap-2">
                <div class="flex justify-between gap-2">
                    <div class="w-[25%] bg-lightblue border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    <div class="right-content w-[75%] md:w-[full] bg-lightblue border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] h-fit">
                        <p class="font-semibold text-white">Halooo,</p>
                        <p class="font-semibold text-white">{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <div class="right-content w-full md:w-[full] bg-slate-200 border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] h-fit">
                    <p class="font-semibold text-lightblue">Saldo Anda : Rp. {{ number_format(Auth::user()->balance, 0, ',', '.') }}</p>
                </div>
                <form action="{{ route('change.password') }}" method="post" class="w-full bg-lightblue border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] text-white">
                    @csrf
                    <p class="font-semibold text-white">Data Akun Anda</p>
                    <div class="flex flex-col my-2">
                        <p class="font-semibold text-lightyellow">Email :</p>
                        <input type="text" name="email" class="w-full bg-opacity-30 bg-slate-200 outline-none text-white px-3 py-1 font-semibold rounded-[4px]" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    <div class="flex flex-col my-2">
                        <p class="font-semibold text-lightyellow">Password :</p>
                        <input required type="password" name="password" class="w-full bg-opacity-30 bg-slate-200 outline-none text-white px-3 py-1 font-semibold rounded-[4px] placeholder:text-gray-300 " placeholder="Masukkan Password Baru">
                    </div>
                    <div class="flex flex-col my-2">
                        <p class="font-semibold text-lightyellow">Konfirmasi Password :</p>
                        <input required type="password" name="password_confirmation" class="w-full bg-opacity-30 bg-slate-200 outline-none text-white px-3 py-1 font-semibold rounded-[4px] placeholder:text-gray-300" placeholder="Komfirmasi Password Baru">
                    </div>
                    <button type="submit" class="bg-lightyellow hover:bg-yellow-500 px-5 py-2 text-white w-full my-2 font-bold rounded-[4px]">Ubah Data</button>
                </form>
            </section>
            <div id="my-address-section" class="hidden">
                <div class="flex justify-between items-center mb-2">
                    <p class="font-semibold text-lightblue">Alamat Saya</p>
                    <button id="show-address-modal" onclick="showAddAddress()" class="text-white font-semibold bg-green-500 hover:bg-green-600 rounded-[4px] px-3 py-1">Tambah Alamat</button>
                    <button id="close-address-modal" onclick="closeAddAddress()" class="hidden text-white font-semibold bg-red-500 hover:bg-red-600 rounded-[4px] px-3 py-1">Tutup</button>
                </div>
                <div id="address-modal-1">
                    @if ($addresses->isNotEmpty())
                    @foreach ($addresses as $address )
                    <div class="w-full bg-slate-200 rounded-[8px] p-4 flex justify-between border-slate-400 border-2 border-opacity-50 mb-2">
                        <div class="w-[90%] flex flex-col flex-wrap">
                            <p class="text-darkblue font-semibold text-sm">{{ $address->name }}</p>
                            <p class="text-slate-500 text-sm">{{ $address->address }}</p>
                            <p class="text-slate-500 text-sm">{{ $address->phone_number }}</p>
                        </div>
                        <div class="w-[10%] flex justify-end items-center">
                            <a href="/profile/del_address/{{ $address->id }}" class="text-red-500 underline font-semibold cursor-pointer text-sm">Hapus</a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="w-full bg-slate-200 rounded-[8px] p-4 flex justify-center items-center border-slate-400 border-2 border-opacity-50 mb-2">
                        <p class="text-lightblue font-semibold text-sm">Belum Menambahkan Alamat</p>
                    </div>
                    @endif
                </div>
                <div id="address-modal-2" class="hidden">
                    <form action="{{ route('add.address') }}" method="post" class="w-full bg-slate-200 rounded-[8px] p-4 flex flex-col border-slate-400 border-2 border-opacity-50 mb-2 space-y-2">
                        @csrf
                        <label for="" class="font-semibold text-lightblue">Nama Alias : <span class="opacity-70">(Contoh : Rumah)</span></label>
                        <input required type="text" name="name" class="w-full h-fit text-wrap rounded-[8px] px-3 py-2 focus:outline-lightblue">
                        <label for="" class="font-semibold text-lightblue">Alamat :</label>
                        <input required type="text" name="address" class="w-full h-fit text-wrap rounded-[8px] px-3 py-2 focus:outline-lightblue">
                        <label for="" class="font-semibold text-lightblue">Nomor Telepon :</label>
                        <input required type="number" name="phone_number" class="w-full h-fit text-wrap rounded-[8px] px-3 py-2 focus:outline-lightblue">
                        <button type="submit" class="bg-lightblue hover:bg-blue-500 px-5 py-2 text-white w-full my-2 font-bold rounded-[4px]">Tambah Alamat</button>
                    </form>
                </div>
            </div>
            <div id="my-history_order-section" class="hidden">
                <p class="font-semibold text-lightblue">Riwayat Pesanan</p>
                <ul class="mt-4 flex justify-between font-semibold text-lightblue">
                    <li>Kode Unik</li>
                    <li>Info</li>
                </ul>
                <div class="min-w-full min-h-[2px] bg-lightblue">
                </div>

                <div class="card-container w-full gap-2 cursor-pointer">
                    @foreach ($orders_history as $order)
                    <a href="{{ route('view.invoice', $order->order_id)  }}" class="bg-lightblue flex justify-between my-1 px-2 py-1">
                        <div class="flex items-center">
                            <div class="flex justify-center items-center p-2 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-white">{{ $order->order_id }}</p>
                                <p class="font-normal text-gray-200 text-sm text-left justify-end md:hidden flex">
                                    {{ \Carbon\Carbon::parse($order->order_date)->translatedFormat('l, d F Y / H:i') }}
                                </p>
                                <p class="font-semibold text-yellow-300 text-sm">
                                    Rp {{ number_format($order->final_price, 0, ',', '.') }}
                                </p>

                            </div>
                        </div>
                        <div class="flex items-center">
                            <div>
                                <p class="font-normal text-gray-200 text-sm text-left justify-end md:flex hidden">
                                    {{ \Carbon\Carbon::parse($order->order_date)->translatedFormat('l, d F Y / H:i') }}
                                </p>
                                <p class="font-semibold text-white flex justify-end">{{ $order->status}}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div id="my-history_balance-section" class="hidden">
                <p class="font-semibold text-lightblue">Riwayat Saldo</p>
                <ul class="mt-4 flex justify-between font-semibold text-lightblue">
                    <li>Keterangan</li>
                    <li>Jumlah</li>
                </ul>
                <div class="min-w-full min-h-[2px] bg-lightblue">
                </div>

                <div class="card-container w-full space-y-1 cursor-pointer mt-1">
                    @foreach ($balance_histories as $b)
                    @if ($b->type === 'increase')
                    <div>
                    <p class="text-sm text-gray-400">{{ \Carbon\Carbon::parse($b->created_at)->translatedFormat('l, d - F - Y / H:i') }}</p>
                        <div class="bg-green-400 w-full text-white font-semibold px-3 py-1">
                            <div class="flex justify-between">
                                <div class="flex-col flex justify-center">
                                    <p>{{ $b->desc === 'deposit' ? 'Deposit' : 'Transaksi' }}</p>
                                    <p class="text-sm"></p>
                                </div>
                                <div class="text-right flex-col flex justify-center">
                                <p>+ Rp. {{ number_format($b->amount, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif ($b->type === 'decrease')
                    <div>
                    <p class="text-sm text-gray-400">{{ \Carbon\Carbon::parse($b->created_at)->translatedFormat('l, d - F - Y / H:i') }}</p>
                        <div class="bg-red-400 w-full text-white font-semibold px-3 py-1">
                            <div class="flex justify-between">
                                <div class="flex-col flex justify-center">
                                    <p>{{ $b->desc === 'deposit' ? 'Deposit' : 'Transaksi' }}</p>
                                    <p class="text-sm">{{ $b->order_id }}</p>
                                </div>
                                <div class="text-right flex-col flex justify-center">
                                    <p>- Rp. {{ number_format($b->amount, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div id="my-logout-section" class="hidden right-content w-full md:w-[full] bg-slate-200 border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] h-fit">
                <p class="font-semibold text-lightblue">Logout</p>
                <a class="underline text-darkblue" href="/logout">Klik untuk Logout</a>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function showSection(sectionId, button) {
        $('[id^="my-"]').addClass('hidden');
        $('#' + sectionId).removeClass('hidden');
        $('#navbar button').removeClass('bg-lightblue text-white').addClass('text-lightblue');
        $(button).addClass('bg-lightblue text-white');
    }

    $(document).ready(function() {
        const firstButton = $('#btn-akun');
        const firstSection = $('#my-profile-section');

        if (firstButton.length && firstSection.length) {
            firstSection.removeClass('hidden');
            firstButton.addClass('bg-lightblue text-white');
        }
    });

    function showAddAddress() {
        $('#address-modal-1').hide();
        $('#address-modal-2').show();
        $('#show-address-modal').hide();
        $('#close-address-modal').removeClass('hidden');
    }

    function closeAddAddress() {
        $('#address-modal-1').show();
        $('#address-modal-2').hide();
        $('#show-address-modal').show();
        $('#close-address-modal').addClass('hidden');
    }
</script>


@extends('templates.end-html')