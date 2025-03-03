@extends('templates.start-html')
@include('components.navbar')
@if ($products_in_cart->isEmpty())
<script>
    alert('Mohon tambahkan produk ke keranjang terlebih dahulu');
    location.href = '/keranjang';
</script>
@endif
@if ($addresses->isEmpty())
<script>
    alert('Tambahkan Minimal 1 Lokasi Untuk Pengiriman Pesanan Di Profil');
    location.href = '/keranjang';
</script>
@endif

@foreach ($products_in_cart as $product )
    @php
    $productStock = $product->product->stock;
    $product->total_price = $product->quantity * $product->product->price;
    $product->save();
    @endphp

    @if ($product->quantity > $productStock)
        @php
            $product->quantity = $productStock;
            $product->total_price = $product->quantity * $product->product->price;
            $product->save();
        @endphp
    @endif

@endforeach

<section class="my-5 px-[5%] relative">
    <div class="w-[100%] m-auto">
        <form class="flex justify-start">
            <p class="text-2xl font-bold text-lightblue font-sour-gummy flex items-center">Checkout</p>
        </form>
    </div>

    <div class="w-full flex flex-col md:flex-row justify-between mt-8 my-20 gap-2">
        <form action="" method="post" id="left-content" class="w-full md:w-[60%]">
            @csrf
            <div class=" bg-gray-200 p-5 rounded-[12px]">
                <div class="mb-10">
                    <p class="text-darkblue font-bold">Informasi Kontak</p>
                    <p class="text-slate-500 text-sm">Kami akan menggunakan email ini untuk mengirimkan rincian dan pembaruan mengenai pesanan Anda</p>
                    <input id="email-input" required type="text" placeholder="Email Address" name="email" class="w-full px-3 py-1 outline-none rounded-md mt-1 font-semibold text-lightblue border-slate-400 border-2 border-opacity-50">
                </div>
                <div class="mb-10">
                    <p class="text-darkblue font-bold">Pengiriman</p>
                    <p class="text-slate-500 text-sm">Tentukan cara penerimaan pesanan Anda.</p>
                    <div class="flex w-full gap-2 mt-1">
                        <!-- Bagian Pengiriman -->
                        <div class="w-1/2">
                            <label id="pickup-label" class="cursor-pointer w-full border-lightblue bg-lightblue text-white font-semibold gap-1 border-2 rounded-md py-3 flex justify-center items-center">
                                <input checked type="radio" name="delivery_method" id="pickup-button" class="hidden" value="pickup">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 0 0 7.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 0 0 4.902-5.652l-1.3-1.299a1.875 1.875 0 0 0-1.325-.549H5.223Z" />
                                    <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 0 0 9.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 0 0 2.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3Zm3-6a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75v-3Zm8.25-.75a.75.75 0 0 0-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-5.25a.75.75 0 0 0-.75-.75h-3Z" clip-rule="evenodd" />
                                </svg>
                                <p class="">Ambil Di Toko</p>
                            </label>
                        </div>


                        <!-- Bagian Kirim -->
                        <div class="w-1/2">
                            <label id="delivery-label" class="cursor-pointer w-full border-lightblue bg-white text-lightblue font-semibold gap-1 border-2 rounded-md py-3 flex justify-center items-center">
                                <input type="radio" name="delivery_method" id="delivery-button" class="hidden" value="delivery">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                </svg>
                                <p class="">Kirim</p>
                            </label>
                        </div>
                    </div>
                </div>
                <div id="send-section" class="send hidden">
                    <div>
                        <p class="text-darkblue font-bold">Alamat Pengiriman</p>
                        <p class="text-slate-500 text-sm">Pilih alamat penerima pesanan</p>
                        <Select name="alamat" class="w-full px-3 py-1 mt-1  bg-white p-4 rounded-md flex justify-between border-slate-400 border-2 border-opacity-50 mb-10">
                            @if ($addresses->isNotEmpty())
                            @foreach ($addresses as $address)
                            <option value="{{ $address->id }}" class="text-darkblue font-semibold text-sm">
                                {{ $address->name }}
                            </option>
                            @endforeach
                            @else
                            <option value="" disabled selected class="text-darkblue font-semibold text-sm">
                                Belum Menambahkan Alamat Rumah
                            </option>
                            @endif
                        </Select>
                    </div>
                    <!-- Tambah Catatan -->
                    <div>
                        <p class="text-darkblue font-bold">Tambah Catatan Ke Pesanan (Opsional)</p>
                        <textarea name="note" class="w-full font-semibold text-lightblue outline-none bg-white py-1 px-3 mt-1 rounded-md border-slate-400 border-2 border-opacity-50 mb-10" type="text" placeholder="Tambah Catatan"></textarea>
                    </div>
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
                </div>
                <div class="mb-10">
                    <p class="text-darkblue font-bold">Voucher</p>
                    <p class="text-slate-500 text-sm">Gunakan voucher untuk mendapatkan potongan harga</p>
                    <p id="voucher-text-info" class="text-sm font-semibold hidden">Voucher Ditemukan</p>
                    <div class="flex justify-between gap-1 items-center mt-1">
                        <input id="voucher-usage-input" class="w-full h-full outline-none rounded-md px-3 py-1 font-semibold text-lightblue border-slate-400 border-2 border-opacity-50" type="text" placeholder="Voucher">
                        <input id="voucher-val" type="hidden" name="voucher_code" value="">
                        <button type="button" id="check-voucher-usage-btn" onclick="checkVoucher()" class="bg-lightblue text-white px-3 py-1 font-semibold rounded-md">Gunakan</button>
                        <button type="button" id="del-voucher-usage-btn" onclick="delVoucherUsage()" class="bg-red-500 text-white px-3 py-1 font-semibold rounded-md hidden">Hapus</button>
                    </div>
                    <p id="voucher-text-value" class="text-sm font-semibold text-lightblue hidden"></p>
                </div>

                <div class="mb-10">
                    <p class="text-darkblue font-bold">Opsi pembayaran</p>
                    <p class="text-slate-500 text-sm">Pilih opsi pembayaran yang anda.</p>

                    <!-- Bayar di tempat -->
                    <div class="flex items-center gap-2 mt-1">
                        <input checked type="radio" id="pay-on-site-btn" name="payment_option" value="pay_on_site" class="h-5 w-5 text-lightblue border-slate-400 border-2 focus:ring-0 hidden">
                        <label id="pay-on-site-label" for="pay-on-site-btn" class="flex-1 bg-lightblue p-4 rounded-md border-slate-400 border-2 border-opacity-50 cursor-pointer">
                            <p id="pay-on-site-header" class="text-white font-semibold text-sm">Bayar di tempat</p>
                            <p id="pay-on-site-subheader" class="text-slate-200 text-sm">Bayar di tempat saat penyerahan produk</p>
                        </label>
                    </div>

                    <!-- Gunakan Saldo Ampu Mart -->
                    <div class="flex items-center gap-2 mt-1">
                        <input type="radio" id="use-balance-btn" name="payment_option" value="use_balance" class="h-5 w-5 text-lightblue border-slate-400 border-2 focus:ring-0 hidden">
                        <label for="use-balance-btn" id="use-balance-label" class="flex-1 bg-white p-4 rounded-md border-slate-400 border-2 border-opacity-50 cursor-pointer">
                            <p id="use-balance-header" class="text-darkblue font-semibold text-sm">Gunakan Saldo Ampu Mart</p>
                            <p id="use-balance-subheader" class="text-slate-500 text-sm">Saldo Anda {{ Auth::user()->balance }}</p>
                        </label>
                    </div>
                </div>
                <div class="mb-10">
                    <p class="text-darkblue font-bold">Rincian Pembelian</p>
                    <p class="text-slate-500 text-sm">Ringkasan pembelian anda.</p>
                    <div class="bg-white p-4 mt-1 rounded-md border-slate-400 border-2 border-opacity-50">
                        <p class="text-slate-500 text-sm">Metode Pembayaran : <span class="text-darkblue font-semibold">Bayar Di Tempat</span></p>
                        <p class="text-slate-500 text-sm">Harga Awal : <span id="starting_price" class="text-darkblue font-semibold">Rp. {{ number_format($products_in_cart->sum('total_price'), '0', ',', '.' ) }}</span></p>
                        <p class="text-slate-500 text-sm">Subtotal Pengiriman : <span id="delivery-price" class="text-darkblue font-semibold">-</span></p>
                        <p class="text-slate-500 text-sm">Diskon : <span id="discount-text" class="text-darkblue font-semibold">-</span></p>
                        <p class="text-slate-500 text-sm">Total Harga : <span id="final_price" class="text-darkblue font-semibold">-</span></p>
                    </div>
                </div>
                <input type="hidden" name="products" value="{{ $products_in_cart }}">
                <input type="hidden" name="starting_price" value="{{ $products_in_cart->sum('total_price')  }}">

                <div class="mb-10">
                    <button id="btn_checkout" data-products_in_cart="{{ $products_in_cart }}" onclick="showConfirmModal(event)" class="bg-lightblue text-center w-full font-bold text-white py-2 rounded-md">Lakukan Pemesanan</button>
                    <p class="mt-1 text-slate-500 text-sm px-2 md:px-20 text-center">Dengan melanjutkan pembelian, artinya anda menyetujui syarat dan ketentuan serta kebijakan dan privasi kami</p>
                </div>

            </div>
            <!-- <div id="confirm-modal" class="hidden fixed w-[100%] bg-black bg-opacity-70 top-0 left-0 h-full flex items-center justify-center flex-col gap-2">
                <div class=" bg-slate-200 p-3 w-[50%] rounded-md">
                        <p class="text-slate-500 text-sm">Metode Pembayaran : <span class="text-darkblue font-semibold">Bayar Di Tempat</span></p>
                        <p class="text-slate-500 text-sm">Harga Awal : <span id="starting_price" class="text-darkblue font-semibold">Rp. {{ number_format($products_in_cart->sum('total_price'), '0', ',', '.' ) }}</span></p>
                        <p id="delivery-" class="text-slate-500 text-sm">Subtotal Pengiriman : <span id="delivery-price" class="text-darkblue font-semibold">-</span></p>
                        <p class="text-slate-500 text-sm">Diskon : <span id="discount-text" class="text-darkblue font-semibold">-</span></p>
                        <p class="text-slate-500 text-sm">Total Harga : <span id="final_price" class="text-darkblue font-semibold">-</span></p>
                </div>
                <div class="w-[50%]">
                    <button type="submit" class="bg-lightblue text-center w-full font-bold text-white py-2 rounded-md">Konfirmasi Pembelian</button>
                </div>
            </div> -->
        </form>

        <div id="right-content" class="w-full md:w-[40%]">
            <div class=" bg-white p-4 rounded-[12px] w-full border-slate-400 border-2 border-opacity-50 mb-10">
                <div class="flex justify-between text-darkblue ">
                    <p class="font-bold">Order Summary</p>
                    <svg id="arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 transform transition-transform duration-300 cursor-pointer">
                        <path fill-rule="evenodd" d="M11.47 7.72a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 0 1-1.06-1.06l7.5-7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div id="card-container" class="card-container max-h-0 overflow-hidden transition-all duration-500">
                    @foreach ($products_in_cart as $product)
                    <div class="card flex justify-between my-1">
                        <div class="flex gap-2">
                            <div class=" rounded-[8px] relative min-w-[100px] min-h-[100px] overflow-hidden bg-cover bg-center" style=" background-image: url('{{ asset("storage/" . $product->product->image_url) }}');">
                                <p class="absolute right-0 top-0 bg-lightblue rounded-bl-[8px] px-2 py-0.5 text-white font-semibold text-sm">{{ $product->quantity }}</p>
                            </div>
                            <div>
                                <p class="text-darkblue font-semibold text-sm">{{ $product->product->name }}</p>
                                <p class="text-lightblue font-semibold text-sm">Rp. {{ number_format($product->product->price, '0', ',', '.' )}}</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-darkblue font-semibold text-sm">Rp. {{ number_format($product->total_price, '0', ',', '.' )}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>
@include('components.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let discountType = "";
    let discountValue = 0;

    function showConfirmModal(event) {
        event.preventDefault();
        email_input = $('#email-input').val().trim(); 
        if(!email_input) {
            return alert('silahkan isi email terlebih dahulu')
        }

        let isConfirmed = confirm('Konfirmasi Pembelian');
        if (!isConfirmed) {
            return
        }

        var products_in_cart = $('#btn_checkout').data('products_in_cart');
        $.ajax({
        url: '{{ route("check.stock") }}',
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            products: products_in_cart,
        },
        success: function(response) {
            console.log(response); 
            if (response.success) {
                $('#left-content').submit();
            } else {
                alert('Beberapa stok produk telah habis, halaman akan direfresh dan jumlah produk akan disesuaikan'); 
                location.reload();
            }
        },
        error: function() {
            alert('Terjadi kesalahan pada server.');
        }
    });
    }


    function checkVoucher() {
        let voucher_code = $('#voucher-usage-input').val()
        let text_info = $('#voucher-text-info').val()
        $.ajax({
            url: '{{ route("check.voucher") }}',
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                voucher_code: voucher_code
            },
            success: function(response) {
                if (response.success) {
                    discountType = response.voucher_type;
                    discountValue = response.voucher_value;

                    let startingPrice = parseInt($('#starting_price').text().replace(/[^\d]/g, '')) || 0;
                    let deliveryPrice = parseInt($('#delivery-price').text().replace(/[^\d]/g, '')) || 0;
                    let finalPrice = startingPrice + deliveryPrice;

                    let discount = 0;

                    if (discountType === 'percentage') {
                        discount = (discountValue / 100) * finalPrice;
                    } else if (discountType === 'fixed') {
                        discount = discountValue;
                    }

                    if (discount > finalPrice) {
                        discount = finalPrice;
                    }

                    let formattedDiscount = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(discount);

                    $('#voucher-text-info').removeClass('hidden text-red-500').addClass('text-green-500').text('Voucher Tersedia');
                    $('#voucher-text-value').removeClass('hidden').text('Mendapatkan potongan harga sebesar : ' + formattedDiscount);
                    $('#check-voucher-usage-btn').addClass('hidden')
                    $('#del-voucher-usage-btn').removeClass('hidden')
                    $('#discount-text').text(formattedDiscount)
                    $('#voucher-val').val(voucher_code)
                    updateFinalPrice();
                } else {
                    $('#voucher-text-info').removeClass('hidden text-green-500').addClass('text-red-500').text(response.message);
                    $('#check-voucher-usage-btn').addClass('hidden')
                    $('#del-voucher-usage-btn').removeClass('hidden')
                }
            },
            error: function(xhr, status, err) {
                console.log("Error:", err);
                console.log("Response:", xhr.responseText);
                $('#voucher-usage-input').val('');
            }
        })
    }

    function delVoucherUsage() {
        $('#discount-text').text('-');
        $('#check-voucher-usage-btn').removeClass('hidden');
        $('#del-voucher-usage-btn').addClass('hidden');
        $('#voucher-usage-input').val('');
        $('#voucher-text-info').addClass('hidden');
        $('#voucher-text-value').addClass('hidden');
        $('#voucher-val').val('')
        discountType = "";
        discountValue = 0;
        updateFinalPrice();
    }

    $(document).ready(function() {
        $('#pickup-button').on('click', function() {
            $('#take-section').removeClass('hidden');
            $('#send-section').addClass('hidden');
            $('#pickup-label').addClass('bg-lightblue text-white').removeClass('bg-white text-lightblue');
            $('#delivery-label').addClass('bg-white text-lightblue').removeClass('bg-lightblue text-white');
        });

        $('#delivery-button').on('click', function() {
            $('#send-section').removeClass('hidden');
            $('#take-section').addClass('hidden');
            $('#delivery-label').addClass('bg-lightblue text-white').removeClass('bg-white text-lightblue');
            $('#pickup-label').addClass('bg-white text-lightblue').removeClass('bg-lightblue text-white');
        });

        $('#arrow-icon').on('click', function() {
            $('#card-container').toggleClass('max-h-0 max-h-screen');
            $(this).toggleClass('rotate-180');
        });

        $('#pay-on-site-btn').on('change', function() {
            $('#pay-on-site-label').addClass('bg-lightblue').removeClass('bg-white');
            $('#pay-on-site-header').addClass('text-white').removeClass('text-darkblue');
            $('#pay-on-site-subheader').addClass('text-slate-200').removeClass('text-slate-500');

            $('#use-balance-label').addClass('bg-white').removeClass('bg-lightblue');
            $('#use-balance-header').addClass('text-darkblue').removeClass('text-white');
            $('#use-balance-subheader').addClass('text-slate-500').removeClass('text-slate-200');
        });

        $('#use-balance-btn').on('change', function() {
            $('#use-balance-label').addClass('bg-lightblue').removeClass('bg-white');
            $('#use-balance-header').addClass('text-white').removeClass('text-darkblue');
            $('#use-balance-subheader').addClass('text-slate-200').removeClass('text-slate-500');

            $('#pay-on-site-label').addClass('bg-white').removeClass('bg-lightblue');
            $('#pay-on-site-header').addClass('text-darkblue').removeClass('text-white');
            $('#pay-on-site-subheader').addClass('text-slate-500').removeClass('text-slate-200');
        });

    });

    function updateFinalPrice() {
        let startingPrice = parseInt($('#starting_price').text().replace(/[^\d]/g, '')) || 0;
        let deliveryPrice = parseInt($('#delivery-price').text().replace(/[^\d]/g, '')) || 0;
        let secondPrice = startingPrice + deliveryPrice;

        let discountAmount = 0;

        if (discountType === 'percentage') {
            discountAmount = Math.floor((discountValue / 100) * secondPrice);
        } else {
            discountAmount = discountValue;
        }

        let formattedDiscount = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(discountAmount);

        $('#discount-text').text(formattedDiscount);
        $('#voucher-text-value').text('Mendapatkan potongan harga sebesar : ' + formattedDiscount);

        let finalPrice = secondPrice - discountAmount;

        let formattedPrice = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(finalPrice);

        $('#final_price').text(formattedPrice);
    }


    $(document).ready(function() {
        updateFinalPrice();
    });

    $('input[name="delivery_method"]').on('change', function() {
        if ($('#delivery-button').is(':checked')) {
            $('#delivery-price').text('Rp 20.000');
        } else if ($('#pickup-button').is(':checked')) {
            $('#delivery-price').text('Rp 0');
        }
        updateFinalPrice();
    });
</script>


@extends('templates.end-html')