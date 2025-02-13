@extends('templates.start-html')

@include('components.navbar')


<section class="px-[5%] md:px-[10%] my-20">
    <form action="" method="post" class="w-full md:w-[50%] max-w-md mx-auto bg-customgray p-6 rounded-lg shadow-md">
        @csrf
        <h1 class="text-3xl font-bold text-lightblue text-center mb-5">Login</h1>
        <div class="mb-4">
            <label for="email_login" class="block text-lightblue font-bold mb-2">Email</label>
            <input type="email" id="email_login" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 rounded bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-lightblue">
            @error('email')
                <div class="text-red-500 text-sm font-inter font-bold mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password_login" class="block text-lightblue font-bold mb-2">Password</label>
            <input type="password" id="password_login" name="password" class="w-full px-3 py-2 rounded bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-lightblue">
            @error('password')
                <div class="text-red-500 text-sm font-inter font-bold mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="w-full bg-lightblue text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition">Login</button>
        <p class="text-lightblue font-medium text-center mt-2">belum memiliki akun? silahkan <a class="font-bold underline" href="/register">register</a></p>
    </form>
</section>

@include('components.footer')

@extends('templates.end-html')