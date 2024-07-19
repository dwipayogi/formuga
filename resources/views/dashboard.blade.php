<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-4 max-w-7xl m-auto">
        {{--  kas  --}}
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-4 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <p class="pt-6 pl-6 pb-2 text-gray-900 dark:text-gray-400 text-xl">
                    Total Kas
                </p>
                <p class="pb-6 pl-6 text-gray-900 dark:text-gray-100 text-5xl font-bold">
                    Rp. {{$total_kas}}
                </p>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <p class="pt-6 pl-6 pb-2 text-green-500 text-xl">
                    Pemasukan Terakhir
                </p>
                <p class="pb-6 pl-6 text-gray-900 dark:text-gray-100 text-5xl font-bold">
                    @foreach ($pemasukan_terakhir as $masuk)
                        +Rp. {{$masuk->nilai_transaksi}}
                    @endforeach
                </p>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <p class="pt-6 pl-6 pb-2 text-red-500 text-xl">
                    Pengeluaran Terakhir
                </p>
                <p class="pb-6 pl-6 text-gray-900 dark:text-gray-100 text-5xl font-bold">
                    @foreach ($pengeluaran_terakhir as $keluar)
                        -Rp. {{$keluar->nilai_transaksi}}
                    @endforeach
                </p>
            </div>
        </div>

        {{-- Anggota --}}
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 flex gap-4 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-6">
                <p class="pb-4 text-gray-900 dark:text-gray-100">
                    Anggota
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">
                    <div
                        class="w-[90%] h-max bg-gray-100 dark:bg-gray-900 rounded-lg p-4 flex flex-col items-center justify-center">
                        <img src="https://placehold.co/150x150" alt="profile image" class="rounded-full m-4">
                        <p class="text-gray-900 dark:text-gray-100 font-bold text-lg">Nama Panggilan</p>
                        <p class="text-gray-900 dark:text-gray-100 text-lg">Nama Lengkap</p>
                        <p class="text-gray-900 dark:text-gray-100 text-lg">Tanggal Lahir</p>
                        <p class="text-gray-900 dark:text-gray-100 text-lg">No_HP</p>
                    </div>
                    <div
                        class="w-[90%] h-max bg-gray-100 dark:bg-gray-900 rounded-lg p-4 flex flex-col items-center justify-center">
                        <img src="https://placehold.co/150x150" alt="profile image" class="rounded-full m-4">
                        <p class="text-gray-900 dark:text-gray-100 font-bold text-lg">Nama Panggilan</p>
                        <p class="text-gray-900 dark:text-gray-100 text-lg">Nama Lengkap</p>
                        <p class="text-gray-900 dark:text-gray-100 text-lg">Tanggal Lahir</p>
                        <p class="text-gray-900 dark:text-gray-100 text-lg">No_HP</p>
                    </div>
                    <div
                        class="w-[90%] h-max bg-gray-100 dark:bg-gray-900 rounded-lg p-4 flex flex-col items-center justify-center">
                        <img src="https://placehold.co/150x150" alt="profile image" class="rounded-full m-4">
                        <p class="text-gray-900 dark:text-gray-100 font-bold text-lg">Nama Panggilan</p>
                        <p class="text-gray-900 dark:text-gray-100 text-lg">Nama Lengkap</p>
                        <p class="text-gray-900 dark:text-gray-100 text-lg">Tanggal Lahir</p>
                        <p class="text-gray-900 dark:text-gray-100 text-lg">No_HP</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
