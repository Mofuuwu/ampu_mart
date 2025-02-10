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
                            <button class="text-white bg-lightblue px-5 font-bold border-b-2 w-full text-start py-2">Akun Saya</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="text-lightblue px-5 font-bold border-b-2 w-full text-start py-2">Alamat Saya</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="text-lightblue px-5 font-bold border-b-2 w-full text-start py-2">Riwayat Pesanan (Tabel)</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="text-lightblue px-5 font-bold border-b-2 w-full text-start py-2">Logout</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="right-content w-[70%] bg-slate-200 border-2 border-slate-400 border-opacity-50 p-5 rounded-[8px] h-fit">
            <div class="my-profile">
                <p class="font-semibold text-lightblue">Nama : Muhammad Rifqi</p>
                <p class="font-semibold text-lightblue">Kelas : XII PPLG 2</p>
                <p class="font-semibold text-lightblue">Email : Muhammadrifqi@gmail.com</p>
            </div>
        </div>
    </div>
</section>
@extends('templates.end-html')