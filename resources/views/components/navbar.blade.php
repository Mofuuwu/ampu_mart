<nav class="sticky z-[1000] top-0 left-0 right-0 text-white items-center py-[1%] px-[5%]">
    <div class="flex justify-between px-[5%] py-3 bg-lightblue rounded-[16px]">
    <ul class="w-[30%] flex justify-around font-semibold text-md">
        <a class="{{ Request::is('/') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/"><li>Home</li></a>
        <a class="{{ Request::is('jelajahi-produk') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/jelajahi-produk"><li>Jelajahi Produk</li></a>
    </ul>
    <div>
        <p class="text-lg font-bold ">
            Ampu Mart
        </p>
    </div>
    <ul class="w-[30%] flex justify-around font-semibold text-md">
        <a class="{{ Request::is('keranjang') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/keranjang"><li>Keranjang</li></a>
        <a class="{{ Request::is('profile') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/profile"><li>Akun Saya</li></a>

    </ul>
    </div>
</nav>