@extends('templates.start-html')

@include('components.navbar')

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
                            <button id="btn-riwayat" class="text-lightblue px-5 font-bold border-b-2 w-full text-start py-2" onclick="showSection('my-history-section', this)">Riwayat Pesanan (Tabel)</button>
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

        <div class="w-[70%]">
            <section id="my-profile-section" class="w-full flex flex-col gap-2">
                <div class="flex justify-between gap-2">
                    <div class="w-[25%] bg-lightblue border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    <div class="right-content w-[75%] md:w-[full] bg-lightblue border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] h-fit">
                        <p class="font-semibold text-white">Nama : Muhammad Rifqi</p>
                        <p class="font-semibold text-white">Kelas : XII PPLG 2</p>
                    </div>
                </div>
                <div class="right-content w-full md:w-[full] bg-slate-200 border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] h-fit">
                    <p class="font-semibold text-lightblue">Saldo Anda : Rp. {{ Auth::user()->balance }}</p>
                </div>
                <form class="w-full bg-lightblue border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] text-white">
                    <p class="font-semibold text-white">Data Akun Anda</p>
                    <div class="flex flex-col my-2">
                        <p class="font-semibold text-lightyellow">Email :</p>
                        <input type="text" name="email" class="w-full bg-opacity-30 bg-slate-200 outline-none text-white px-3 py-1 font-semibold rounded-[4px]" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    <div class="flex flex-col my-2">
                        <p class="font-semibold text-lightyellow">Password :</p>
                        <input type="password" name="password" class="w-full bg-opacity-30 bg-slate-200 outline-none text-white px-3 py-1 font-semibold rounded-[4px] placeholder:text-gray-300 " placeholder="Masukkan Password Baru">
                    </div>
                    <div class="flex flex-col my-2">
                        <p class="font-semibold text-lightyellow">Konfirmasi Password :</p>
                        <input type="password" name="password" class="w-full bg-opacity-30 bg-slate-200 outline-none text-white px-3 py-1 font-semibold rounded-[4px] placeholder:text-gray-300" placeholder="Komfirmasi Password Baru">
                    </div>
                    <button type="submit" class="bg-lightyellow hover:bg-yellow-500 px-5 py-2 text-white w-full my-2 font-bold rounded-[4px]">Ubah Data</button>
                </form>
            </section>
            <div id="my-address-section" class="hidden">
                <div class="flex justify-between items-center mb-2">
                    <p class="font-semibold text-lightblue">Alamat Saya</p>
                    <button class="text-white font-semibold bg-green-500 hover:bg-green-600 rounded-[4px] px-3 py-1">Tambah Alamat</button>
                </div>
                <div>
                    <div class="w-full bg-slate-200 rounded-[8px] p-4 flex justify-between border-slate-400 border-2 border-opacity-50 mb-2">
                        <div class="w-[90%] flex flex-col flex-wrap">
                            <p class="text-darkblue font-semibold text-sm">Muhammad Rifqi</p>
                            <p class="text-slate-500 text-sm">Babakan, KalimanahPurbalinggaJawa Tengah53371Indonesia Babakan, KalimanahPurbalinggaJawa Tengah53371Indonesia</p>
                            <p class="text-slate-500 text-sm">02819179272</p>
                        </div>
                        <div class="w-[10%] flex justify-end items-center">
                            <p class="text-lightblue underline font-semibold cursor-pointer">Edit</p>
                        </div>
                    </div>
                    <div class="w-full bg-slate-200 rounded-[8px] p-4 flex justify-between border-slate-400 border-2 border-opacity-50 mb-2">
                        <div class="w-[90%] flex flex-col flex-wrap">
                            <p class="text-darkblue font-semibold text-sm">Muhammad Rifqi</p>
                            <p class="text-slate-500 text-sm">Babakan, KalimanahPurbalinggaJawa Tengah53371Indonesia Babakan, KalimanahPurbalinggaJawa Tengah53371Indonesia</p>
                            <p class="text-slate-500 text-sm">02819179272</p>
                        </div>
                        <div class="w-[10%] flex justify-end items-center">
                            <p class="text-lightblue underline font-semibold cursor-pointer">Edit</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="my-history-section" class="hidden">
                <p class="font-semibold text-lightblue">Riwayat Pesanan</p>
                <ul class="mt-4 flex justify-between font-semibold text-lightblue">
                    <li>Kode Unik</li>
                    <li>Info</li>
                </ul>
                <div class="min-w-full min-h-[2px] bg-lightblue">
                </div>
                <div class="card-container w-full gap-2">
                    <ul class="bg-lightblue flex justify-between my-1 px-2 py-1">
                        <div class="flex items-center">
                            <div class="flex justify-center items-center p-2 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-white">KSJASNSJ</p>
                                <p class="font-semibold text-yellow-300 text-sm">Rp. 24.000</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div>
                                <p class="font-normal text-gray-200 text-sm text-left flex justify-end">27 Januari 2025</p>
                                <p class="font-semibold text-white flex justify-end">Selesai</p>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <div id="my-logout-section" class="hidden right-content w-full md:w-[full] bg-slate-200 border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] h-fit">
                <p class="font-semibold text-lightblue">Logout</p>
                <a class="underline text-darkblue" href="/logout">Klik untuk Logout</a>
            </div>
        </div>
    </div>
</section>

<script>
    function showSection(sectionId, button) {
        const sections = document.querySelectorAll('[id^="my-"]');
        sections.forEach(function(section) {
            section.classList.add('hidden');
        });

        const sectionToShow = document.getElementById(sectionId);
        if (sectionToShow) {
            sectionToShow.classList.remove('hidden');
        }
        const buttons = document.querySelectorAll('#navbar button');
        buttons.forEach(function(btn) {
            btn.classList.remove('bg-lightblue', 'text-white');
            btn.classList.add('text-lightblue');
        });

        button.classList.add('bg-lightblue', 'text-white');
    }

    window.onload = function() {
        const firstButton = document.getElementById('btn-akun');
        const firstSection = document.getElementById('my-profile-section');

        if (firstButton && firstSection) {
            firstSection.classList.remove('hidden');
            firstButton.classList.add('bg-lightblue', 'text-white');
        }
    }
</script>

@extends('templates.end-html')