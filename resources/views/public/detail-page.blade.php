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
                    <li><a href="/jelajahi-produk/kategori/{{ $tag->name }}">{{ $tag->name }} ({{ $tag->products_count }})</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div id="right-content" class="w-full lg:w-[80%]">
            <div class="card flex gap-2 flex-col md:flex-row">
                <div class="relative card-left bg-green-500 w-full md:min-w-[300px] min-h-[300px] md:w-[300px] h-[300px] shadow-md rounded-[16px] overflow-hidden flex items-center justify-center bg-center bg-cover " style="background-image: url('{{ asset("storage/" . $product->image_url) }}')">
                    <p class="absolute py-2 px-5 rounded-br-[16px] bg-customorange bg-opacity-80 text-white text-lg shadow-md top-0 left-0"><span id="remaining-stock" data-remaining_stock="{{$product->stock}}" class=" font-semibold">{{ $product->stock }}</span><span class=" font-sour-gummy"> Tersisa</span></p>
                </div>
                <div class="card-right">
                    <p class="font-bold text-xl md:text-3xl text-darkblue">{{ $product->name }}</p>
                    <p class="font-bold text-lg md:text-xl text-customorange">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-sm text-slate-500">{{ $product->description }}</p>
                    <p class="font-normal text-darkblue underline cursor-pointer">Kategori : {{ $product->category->name }}</p>

                    <div class="flex gap-2 mt-2">
                        <input id="quantity-input" type="number" class="bg-slate-200 rounded-[8px] w-[100px] px-3 py-1 text-center font-bold text-lightblue focus:outline-lightblue">
                        <button onclick="addToCart(this)" id="add-to-cart-btn" data-price="{{ $product->price }}" data-product="{{ $product->id }}" data-id="{{ Auth::user()->id }}" class="bg-green-500 h-fit p-2 rounded-[8px] text-white hover:bg-green-600 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <p class="text-2xl font-bold text-lightblue font-sour-gummy flex items-center md:mb-0 mb-3">Produk Lainnya</p>
                <div id="card-container" class="grid md:grid-cols-3 lg:grid-cols-4 grid-cols-2 gap-y-5 w-full sm:justify-items-end justify-items-center">
                    @foreach ($related_products as $product)
                    <x-card-v2
                    :id="$product->id"
                    :image_url="$product->image_url"
                    :stock="$product->stock"
                    :name="$product->name"
                    :price="$product->price" />
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function addToCart(element) {
    var quantity = $('#quantity-input').val();
    var remain = $('#remaining-stock').data('remaining_stock');
    var id = $(element).data('id');  
    var product = $(element).data('product');  
    var price = $(element).data('price') * quantity;  

    if (remain === 0) {
        return alert('produk telah habis')
    }

    if (!quantity || isNaN(quantity) || quantity <= 0) {
        return alert('harap masukkan nilai yg valid')
    }

    if (quantity > remain) {
        return alert('tidak bisa menambahkan produk melebihi jumlah stok')
    } 

    $.ajax({
        url: '{{ route("add_to_cart") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: id,
            product: product,
            price: price,
            quantity: quantity,
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
                $('#quantity-input').val('');
            } else {
                alert('Error: ' + response.message);  // Menampilkan pesan error
                $('#quantity-input').val('');
            }
        },
        error: function() {
            alert('Terjadi kesalahan pada server.');
            $('#quantity-input').val('');
        }
    });
  }
</script>

@include('components.footer')
@extends('templates.end-html')