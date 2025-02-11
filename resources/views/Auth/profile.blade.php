@extends('templates.start-html')
@include('components.navbar')

<section class="my-5 px-[5%]">
    <div class="w-[100%] m-auto">
        <div class="flex justify-start">
            <p class="text-2xl font-bold text-lightblue font-sour-gummy">Profil Anda</p>
        </div>
    </div>
    <div class="flex">
        <div class="left-content w-[30%]">
            <table class="w-[80%] border-separate border-spacing-0">
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

        <div class="right-content w-[70%] bg-slate-200 border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] h-fit">
            <div id="my-profile-section">
                <p class="font-semibold text-lightblue">Nama : Muhammad Rifqi</p>
                <p class="font-semibold text-lightblue">Kelas : XII PPLG 2</p>
                <p class="font-semibold text-lightblue">Email : Muhammadrifqi@gmail.com</p>
            </div>
            <div id="my-address-section" class="hidden">
                <p class="font-semibold text-lightblue">Alamat</p>
            </div>
            <div id="my-history-section" class="hidden">
                <p class="font-semibold text-lightblue">History</p>
            </div>
            <div id="my-logout-section" class="hidden">
                <p class="font-semibold text-lightblue">Logout</p>
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
        const buttons = document.querySelectorAll('button');
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
