@extends('templates.start-html')

<section class="my-20 px-[5%] md:px-[10%]">
    <form action="" method="post" id="registration-form" class="w-full md:w-[60%] mx-auto bg-customgray p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold font-inter text-lightblue text-center mb-5">Register Ampu Mart</h1>
        @csrf
        <!-- Step 1 -->
        <div id="step-1" class="form-step">
            <div class="mb-4">
                <label for="name" class="block text-lightblue font-bold mb-2">Nama</label>
                <input type="text" required id="name" name="name" value="{{ old('name') }}" class="w-full px-3 py-2 rounded bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-lightblue">
                @error('name')
                    <div class="text-red-500 text-sm font-inter font-bold mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-lightblue font-bold mb-2">Email</label>
                <input type="email" required id="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 rounded bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-lightblue">
                @error('email')
                <div class="text-red-500 text-sm font-inter font-bold mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-lightblue font-bold mb-2">Password</label>
                <input type="password" required id="password" name="password" value="{{ old('password') }}" class="w-full px-3 py-2 rounded bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-lightblue">
                @error('password')
                <div class="text-red-500 text-sm font-inter font-bold mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-lightblue font-bold mb-2">Confirm Password</label>
                <input type="password" required id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" class="w-full px-3 py-2 rounded bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-lightblue">
                @error('password_confirmation')
                <div class="text-red-500 text-sm font-inter font-bold mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block text-lightblue font-bold mb-2">Nomor Telepon</label>
                <input type="number" required id="phone_number" name="phone_number" value="{{ old('phone_number') }}" class="w-full px-3 py-2 rounded bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-lightblue">
                @error('phone_number')
                <div class="text-red-500 text-sm font-inter font-bold mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" id="submit-button" class="w-full bg-lightblue text-white font-bold py-3 px-5 rounded-lg hover:bg-blue-700 transition">Submit</button>
            <p class="text-lightblue font-medium text-center mt-2">sudah memiliki akun? silahkan <a class="font-bold underline" href="/login">login</a></p>
        </div>
        </div>
    </form>
</section>

@include('components.footer')

@extends('templates.end-html')
