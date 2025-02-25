@extends('templates.start-html')
@include('components.navbar')
<section class="my-5 px-[5%] min-h-screen">
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
                    @if ($products_in_cart->isNotEmpty())
                    @foreach ($products_in_cart as $product )
                    @php
                    $productStock = $product->product->stock;
                    @endphp
                    <div class="card w-full flex my-2 justify-between">
                        <div class="left-content flex">
                            <a href="{{ route('detail', ['id' => $product->product->id]) }}" class=" bg-center bg-cover hover:shadow-md md:w-[150px] md:h-[150px] w-[100px] h-[100px] overflow-hidden bg-slate-300 rounded-[16px] relative shadow-sm" style=" background-image: url('{{ asset("storage/" . $product->product->image_url) }}');">
                                <p class="absolute py-1 px-2 text-sm md:text-base md:px-5 rounded-br-[16px] bg-lightyellow bg-opacity-80 text-white font-normal"><span class="font-semibold">{{ $product->product->stock }}</span><span class=" font-sour-gummy"> Tersisa</span></p>
                            </a>
                            <div class="ml-2">
                                <div>
                                    <p class="text-md md:text-xl font-semibold md:font-bold text-darkblue font-sour-gummy">{{ $product->product->name }}</p>
                                    <p class="text-sm md:text-md font-semibold md:font-bold text-customorange">Rp. {{ number_format($product->product->price, '0', ',', '.') }}</p>
                                </div>
                                <div class="mt-2 flex gap-1 md:flex-row">
                                    <button onclick="addQuantity(this)" data-quantity="{{ $product->quantity }}" data-product_id="{{ $product->product->id }}" data-product_price="{{ $product->product->price }}" data-stock="{{ $product->product->stock }}" class="block text-sm md:text-base font-sour-gummy bg-green-500 hover:bg-green-600 font-semibold text-white px-3 py-1 rounded-[10px]">+</button>
                                    <button onclick="delQuantity(this)" data-quantity="{{ $product->quantity }}" data-product_id="{{ $product->product->id }}" data-product_price="{{ $product->product->price }}" class="block font-semibold font-sour-gummy bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-[10px]">-</button=>
                                </div>
                            </div>
                        </div>
                        <div class="right-content flex-col justify-between py-2">
                            <div>
                                @if ($product->quantity > $productStock)
                                @php
                                $product->quantity = $productStock;
                                $product->save();
                                @endphp
                                <div class="flex flex-col items-end">
                                    <p id="total-quantity" class="quantity-product-display text-darkblue font-semibold text-right md:text-base text-sm">{{ $product->quantity }}</p>
                                    <p class="text-red-600 font-semibold text-right md:text-base text-xs">Jumlah produk telah disesuaikan karena melebihi stok yang tersedia</p>
                                </div>
                                @else
                                <p id="total-quantity" class="quantity-product-display text-darkblue font-semibold text-right md:text-base text-sm">{{ $product->quantity }}</p>
                                @endif
                                <p id="total-price" class="total-price-product-display text-darkblue font-bold text-right md:text-base text-sm">Rp. {{ number_format($product->total_price, '0', ',', '.' )}}</p>
                            </div>
                            <div class="flex justify-end w-full">
                                <button onclick="delProduct(this)" data-quantity="{{ $product->quantity }}" data-product_id="{{ $product->product->id }}" data-product_price="{{ $product->product->price }}" class="block font-semibold font-sour-gummy bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-[10px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="min-h-[1px] bg-gray-200 w-full"></div>
                    @endforeach
                    @else
                    <div class="card w-full flex my-2 justify-center items-center bg-gray-400 bg-opacity-50 text-white font-bold font-sour-gummy py-2">
                        <p>Tidak Ada Produk Di Keranjang</p>
                    </div>
                    @endif
                </div>
            </div>
            <div class="w-full md:w-[30%]">
                <div class="flex justify-between font-sour-gummy text-darkblue">
                    <p>Info keranjang</p>
                </div>
                <div class="bg-slate-200 h-fit p-5">
                    <div>
                        <p class="flex justify-between text-darkblue font-sour-gummy">Total Barang :</p>
                        <p id="total_products" data-total_products="{{ $products_in_cart->sum('quantity') }}" class="flex justify-between text-darkblue font-bold text-xl">{{ $products_in_cart->sum('quantity') }}</p>
                    </div>
                    <div class="min-w-full h-[2px] bg-opacity-80 bg-darkblue my-2"></div>
                    <div>
                        <p class="flex justify-between text-darkblue font-sour-gummy">Total Harga :</p>
                        <p id="total_prices" data-total_prices="{{ $products_in_cart->sum('total_price') }}" class="flex justify-between text-darkblue font-bold text-2xl">{{ 'Rp ' . number_format($products_in_cart->sum('total_price'), 0, ',', '.') }}</p>
                    </div>
                </div>
                <button id="btn_checkout" onclick="cart_check()" data-products_in_cart="{{ $products_in_cart }}" href="/checkout" class="bg-lightblue w-full h-fit px-3 py-2 mt-2 cursor-pointer flex justify-center items-center text-white hover:bg-hoverblue font-semibold font-sour-gummy">
                    Checkout Sekarang
                </button>
            </div>
        </div>
        <div>

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function cart_check() {
        var products_in_cart = $('#btn_checkout').data('products_in_cart');
        if (!products_in_cart || products_in_cart.length === 0) {
            return alert('Tidak ada produk di keranjang');
        }
        location.href = '/checkout';
    }

    function addQuantity(element) {
        var quantity = $(element).data('quantity');
        var product_id = $(element).data('product_id');
        var product_price = $(element).data('product_price');
        var stock = $(element).data('stock');

        var total_products = $('#total_products').data('total_products');
        var total_prices = $('#total_prices').data('total_prices');

        var new_quantity = quantity + 1;
        if (new_quantity > stock) {
            return alert('Jumlah Barang Di Keranjang Tidak Bisa Melebihi Jumlah Stok');
        }
        var new_total_products = total_products + 1;
        var new_total_prices = parseFloat(total_prices) + parseFloat(product_price);

        $.ajax({
            url: '{{ route("cart.add_quantity") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                quantity: new_quantity,
                product_id: product_id,
                product_price: product_price,
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);

                    $(element).attr('data-quantity', new_quantity); // Update quantity di data-* attribute
                    $(element).closest('.card').find('.quantity-product-display').text(new_quantity); // Update quantity di card
                    $(element).closest('.card').find('.total-price-product-display').text('Rp. ' + (new_quantity * product_price).toLocaleString('id-ID')); // Update harga produk per item

                    // Update total produk dan total harga di halaman
                    $('#total_products').data('total_products', new_total_products).text(new_total_products); // Update total products
                    $('#total_prices').data('total_prices', new_total_prices).text('Rp. ' + new_total_prices.toLocaleString('id-ID')); // Update total prices
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan pada server.');
            }
        });
    }

    function delQuantity(element) {
        var quantity = $(element).data('quantity');
        var product_id = $(element).data('product_id');
        var product_price = $(element).data('product_price');

        var total_products = $('#total_products').data('total_products');
        var total_prices = $('#total_prices').data('total_prices');

        var new_quantity = quantity - 1;
        var new_total_products = total_products - 1;
        var new_total_prices = parseFloat(total_prices) - parseFloat(product_price);

        $.ajax({
            url: '{{ route("cart.del_quantity") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                quantity: new_quantity,
                product_id: product_id,
                product_price: product_price,
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);

                    $(element).attr('data-quantity', new_quantity);
                    $(element).closest('.card').find('.quantity-product-display').text(new_quantity);
                    $(element).closest('.card').find('.total-price-product-display').text('Rp. ' + (new_quantity * product_price).toLocaleString('id-ID')); // Update harga produk per item

                    $('#total_products').data('total_products', new_total_products).text(new_total_products);
                    $('#total_prices').data('total_prices', new_total_prices).text('Rp. ' + new_total_prices.toLocaleString('id-ID')); // Update total prices
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan pada server.');
            }
        });
    }

    function delProduct(element) {
        var quantity = $(element).data('quantity');
        var product_id = $(element).data('product_id');
        var product_price = $(element).data('product_price');
        var total_products = $('#total_products').data('total_products');
        var total_prices = $('#total_prices').data('total_prices');
        var new_total_products = total_products - quantity;
        var new_total_prices = total_prices - (product_price * quantity);

        $.ajax({
            url: '{{ route("cart.del_product") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: product_id,
                product_price: product_price,
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    $(element).closest('.card').remove();
                    $('#total_products').data('total_products', new_total_products).text(new_total_products);
                    $('#total_prices').data('total_prices', new_total_prices).text('Rp. ' + new_total_prices.toLocaleString('id-ID')); // Update total prices
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan pada server.');
            }
        });
    }
</script>

@include('components.footer')
@extends('templates.end-html')