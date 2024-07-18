<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-4 max-w-7xl m-auto">
        {{-- Kas --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <p class="pt-6 pl-6 text-gray-900 dark:text-gray-400">
                    Total Kas
                </p>
                <p class="pb-6 pl-6 text-gray-900 dark:text-gray-100 text-5xl font-bold">
                    Rp100.000
                </p>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <p class="pt-6 pl-6 text-gray-900 dark:text-gray-400">
                    Pemasukan Terakhir
                </p>
                <p class="pb-6 pl-6 text-gray-900 dark:text-gray-100 text-5xl font-bold">
                    +Rp100.000
                </p>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <p class="pt-6 pl-6 text-gray-900 dark:text-gray-400">
                    Pengeluaran Terakhir
                </p>
                <p class="pb-6 pl-6 text-gray-900 dark:text-gray-100 text-5xl font-bold">
                    -Rp100.000
                </p>
            </div>
        </div>

        {{-- Anggota --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-6">
                <p class="pb-4 text-gray-900 dark:text-gray-100">
                    Anggota
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div class="w-96 h-96 dark:bg-gray-900 rounded-lg p-4 flex flex-col items-center justify-center">
                        <img src="https://placehold.co/200x200" alt="profile image" class="rounded-full" >
                        <p class="text-gray-900 dark:text-gray-100">Nama Anggota</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
