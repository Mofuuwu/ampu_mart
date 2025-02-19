@props([
'image_url' => 'default_image.jpg',
'stock' => 0,
'name' => 'Produk Tanpa Nama',
'price' => 0,
'id' => 0,
'quantity' => 0,
'total_price' => 0
])

<div class="card w-full flex my-2 justify-between">
    <div class="left-content flex">
        <div class=" bg-center bg-cover hover:shadow-md md:w-[150px] md:h-[150px] w-[100px] h-[100px] overflow-hidden bg-slate-300 rounded-[16px] relative shadow-sm" style=" background-image: url('{{ asset("storage/" . $image_url) }}');">
            <p class="absolute py-1 px-2 text-sm md:text-base md:px-5 rounded-br-[16px] bg-lightyellow bg-opacity-80 text-white font-normal"><span class="font-semibold">{{ $stock }}</span><span class=" font-sour-gummy"> Tersisa</span></p>
        </div>
        <div class="ml-2">
            <div>
                <p class="text-md md:text-xl font-semibold md:font-bold text-darkblue font-sour-gummy">{{ $name }}</p>
                <p class="text-sm md:text-md font-semibold md:font-bold text-customorange">Rp. {{ number_format($price, '0', ',', '.') }}</p>
            </div>
            <form class="mt-2 flex gap-1 md:flex-row">
                <!-- dekstop -->
                <input type="number" class="hidden md:inline-block bg-slate-200 outline-none rounded-[10px] px-3 font-semibold text-sm text-lightblue hover:outline-lightblue outline-offset-0 w-[100px] text-center">
                <button type="submit" class="hidden md:block text-sm md:text-base font-sour-gummy bg-green-500 hover:bg-green-600 font-semibold text-white px-3 py-1 rounded-[10px]">Simpan</button>
                <!-- handphone -->
                <button type="submit" class="block md:hidden text-sm md:text-base font-sour-gummy bg-green-500 hover:bg-green-600 font-semibold text-white px-3 py-1 rounded-[10px]">+</button>
                <button type="submit" class="block md:hidden font-semibold font-sour-gummy bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-[10px]">-</button>
            </form>
        </div>
    </div>
    <div class="right-content flex-col justify-between py-2">
        <div>
            <p class="text-darkblue font-semibold text-right">{{ $quantity }}</p>
            <p class="text-darkblue font-bold text-right">Rp. {{ number_format($total_price, '0', ',', '.' )}}</p>
        </div>
        <div class="flex w-full justify-end">
            <button type="submit" class="hidden md:block font-semibold font-sour-gummy bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-[10px]">Hapus</button>
        </div>
    </div>
</div>

<div class="min-h-[1px] bg-gray-200 w-full"></div>