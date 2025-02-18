<!-- <a href="/jelajahi-produk/detail" class="card lg:w-[95%] md:w-[95%] sm:400px w-[95%] shadow-md rounded-[16px] bg-lightblue hover:bg-hoverblue transition-colors">
    <div class="sm:min-h-[220px] min-h-[100px] w-full bg-slate-300 rounded-t-[16px] overflow-hidden bg-[url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLdqePwHjw5GzIMqF32e2wbzeXbSlMea8BYg&s')] bg-cover bg-center relative">
        <p class="absolute py-1 px-5 rounded-br-[16px] bg-gray-500 bg-opacity-80 text-white font-normal"><span class=" font-semibold">200</span><span class=" font-sour-gummy"> Tersisa</span></p>
        <div class="absolute right-0 bottom-0 bg-green-500 h-fit p-2 rounded-tl-[12px] text-white hover:opacity-80 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </div>
    </div>
    <div class="px-4 py-2 md:p-4 flex justify-between">
        <div>
            <p class="text-sm md:text-lg font-bold text-white font-sour-gummy">Susu Segar 600ml</p>
            <p class="text-sm font-bold text-yellow-300">Rp. 16.000</p>
        </div>
    </div>
</a> -->
@props([
    'image_url' => 'default_image.jpg',  
    'stock' => 0,                        
    'name' => 'Produk Tanpa Nama',       
    'price' => 0,
    'id' => 0
])

<div class="card lg:w-[95%] md:w-[95%] sm:400px w-[95%] shadow-md rounded-[16px] bg-gray-500 hover:bg-hoverblue hover:opacity-90 transition-colors">
    <div class="sm:min-h-[220px] min-h-[100px] w-full bg-slate-300 rounded-t-[16px] overflow-hidden bg-cover bg-center relative" style="background-image: url('{{ asset("storage/" . $image_url) }}')">
        <p class="absolute py-1 px-5 rounded-br-[16px] bg-gray-500 bg-opacity-80 text-white font-normal"><span class=" font-semibold">{{ $stock }}</span><span class=" font-sour-gummy"> Tersisa</span></p>
        <button onclick="addToCart(this)" id="add-to-cart-btn" data-price="{{ $price }}" data-product="{{ $id }}" data-id="{{ Auth::user()->id }}" class="absolute right-0 bottom-0 bg-green-500 h-fit p-2 rounded-tl-[12px] text-white hover:bg-green-600 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </button>
    </div>
    <a href="/jelajahi-produk/{{ $id }}" class="px-4 py-2 md:p-4 flex justify-between">
        <div>
            <p class="text-lg font-bold text-white font-sour-gummy">{{ Illuminate\Support\Str::limit($name, 25) }}</p>
            <p class="text-sm font-bold text-yellow-300">Rp. {{ number_format($price, 0, ',', '.') }}</p>
        </div>
    </a>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Fungsi AJAX untuk menambahkan produk ke keranjang
  function addToCart(element) {
    // Ambil data dari elemen (tombol) yang diklik
    var id = $(element).data('id');  // Ambil data id user dari tombol
    var product = $(element).data('product');  // Ambil data id produk dari tombol
    var price = $(element).data('price');  // Ambil harga produk dari tombol

    $.ajax({
        url: '{{ route("add_to_cart") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: id,
            product: product,
            price: price,
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);  // Menampilkan pesan sukses
            } else {
                alert('Error: ' + response.message);  // Menampilkan pesan error
            }
        },
        error: function() {
            alert('Terjadi kesalahan pada server.');
        }
    });
  }
</script>