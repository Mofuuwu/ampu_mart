<nav class="sticky z-[1000] top-0 left-0 right-0 text-white items-center py-[1%] px-[5%]">
    <div class="flex justify-between px-[5%] py-3 bg-lightblue rounded-[16px]">
        <ul class="w-[30%] justify-around font-bold text-md hidden md:flex">
            <a class="{{ Request::is('/') ? 'text-yellow-400 underline' : '' }} hover:opacity-80 flex justify-center items-center gap-1" href="/">
                <li>Home</li>
            </a>
            <a class="{{ Request::is('jelajahi-produk') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/jelajahi-produk">
                <li>Jelajahi Produk</li>
            </a>
        </ul>
        <div class="flex justify-center items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
            </svg>

            <p class="text-sm font-bold md:text-lg">
                Ampu Mart
            </p>
        </div>
        <div id="logo" class="flex justify-center items-center gap-1 md:hidden block">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>

        <ul class="w-[30%] justify-around font-bold text-md hidden md:flex">
            <a class="{{ Request::is('keranjang') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/keranjang">
                <li>Keranjang</li>
            </a>
            <a class="{{ Request::is('profile') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/profile">
                <li>Akun Saya</li>
            </a>

        </ul>
    </div>
    <div id="side-menu" class="fixed top-0 left-0 w-2/3 h-full bg-darkblue p-6 transform -translate-x-full transition-transform ease-in-out duration-300">
        <div class="flex flex-col text-white font-inter font-semibold gap-4">
            <a class="{{ Request::is('/') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/">
                Home
            </a>
            <a class="{{ Request::is('jelajahi-produk') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/jelajahi-produk">
                Jelajahi Produk
            </a>
            <a class="{{ Request::is('keranjang') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/keranjang">
                Keranjang
            </a>
            <a class="{{ Request::is('profile') ? 'text-yellow-400 underline' : '' }} hover:opacity-80" href="/profile">
                Akun Saya
            </a>
        </div>
    </div>
</nav>

<script>
const logo = document.getElementById('logo');
const sideMenu = document.getElementById('side-menu');
const body = document.body;

function isMobile() {
    return window.innerWidth < 1024; 
}

logo.addEventListener('click', function(event) {
    if (!isMobile()) return; 
    
    event.stopPropagation(); 
    const isOpen = sideMenu.classList.contains('translate-x-0');
    
    if (isOpen) {
        sideMenu.classList.remove('translate-x-0');
        sideMenu.classList.add('-translate-x-full');
    } else {
        sideMenu.classList.remove('-translate-x-full');
        sideMenu.classList.add('translate-x-0');
    }
});

body.addEventListener('click', function(event) {
    if (!sideMenu.contains(event.target) && !logo.contains(event.target)) {
        sideMenu.classList.remove('translate-x-0');
        sideMenu.classList.add('-translate-x-full');
    }
});

</script>