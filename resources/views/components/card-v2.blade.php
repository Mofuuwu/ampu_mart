
@props([
    'image_url' => 'default_image.jpg',  
    'stock' => 0,                        
    'name' => 'Produk Tanpa Nama',       
    'price' => 0,
    'id' => 0
])

<a href="/jelajahi-produk/{{ $id }}" class="card lg:w-[95%] md:w-[95%] sm:400px w-[95%] shadow-md rounded-[16px] bg-lightblue hover:bg-hoverblue hover:opacity-90 transition-colors">
    <div class="sm:min-h-[220px] min-h-[100px] w-full bg-slate-300 rounded-t-[16px] overflow-hidden bg-cover bg-center relative" style="background-image: url('{{ asset("storage/" . $image_url) }}')">
        <p class="absolute py-1 px-5 rounded-br-[16px] bg-lightyellow bg-opacity-80 text-white font-normal"><span class=" font-semibold">{{ $stock }}</span><span class=" font-sour-gummy"> Tersisa</span></p>
    </div>
    <div class="px-4 py-2 md:p-4 flex justify-between">
        <div>
            <p class="text-lg font-bold text-white font-sour-gummy">{{ Illuminate\Support\Str::limit($name, 25) }}</p>
            <p class="text-sm font-bold text-yellow-300">Rp. {{ number_format($price, 0, ',', '.') }}</p>
        </div>
    </div>
</a>
