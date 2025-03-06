<x-filament-panels::page>
    <x-filament::section>
        <p class="font-bold">Nama User : <span>{{ $record->name }}</span></p>
        <p class="font-normal text-sm" style="opacity: .6;">Saldo Saat Ini : <span>Rp. {{ number_format($record->balance, 0, ',', '.') }}</span></p>
    </x-filament::section>
    <x-filament::section>
        <form action="{{ route('add.balance') }}" method="post">
            @csrf
            <p class="text-slate-200" style="opacity: .6;">Masukkan Nominal Deposit</p>
            <input type="number" name="nominal" class="w-full rounded-lg mt-2 bg-gray-400 font-bold" style="color:black;">
            <input type="hidden" name="user_id" value="{{ $record->id }}">
            <button type="submit" class="mt-2 w-full text-center rounded-lg font-bold" style="background-color: #0295CE; padding: 10px;">Tambahkan</button>
        </form>
    </x-filament::section>
</x-filament-panels::page>