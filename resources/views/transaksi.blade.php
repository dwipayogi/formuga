<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- kas -->
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-4 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <p class="pt-6 pl-6 pb-2 text-gray-900 dark:text-gray-400 text-xl">
                    Total Kas
                </p>
                <p class="pb-6 pl-6 text-gray-900 dark:text-gray-100 text-5xl font-bold">
                    Rp{{$total_kas}}
                </p>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <p class="pt-6 pl-6 pb-2 text-green-500 text-xl">
                    Pemasukan Terakhir
                </p>
                <p class="pb-6 pl-6 text-gray-900 dark:text-gray-100 text-5xl font-bold">
                    +@foreach ($pemasukan_terakhir as $masuk)
                        Rp{{$masuk->nilai_transaksi}}
                    @endforeach
                </p>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <p class="pt-6 pl-6 pb-2 text-red-500 text-xl">
                    Pengeluaran Terakhir
                </p>
                <p class="pb-6 pl-6 text-gray-900 dark:text-gray-100 text-5xl font-bold">
                    -@foreach ($pengeluaran_terakhir as $keluar)
                        Rp{{$keluar->nilai_transaksi}}
                    @endforeach
                </p>
            </div>
        </div>

        <!-- table -->
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 pt-4 w-full">
            <div class="flex flex-col w-full">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-6">
                    <div class="flex justify-between pb-4">
                        <p class="text-gray-900 dark:text-gray-400 text-xl">
                            Total Kas
                        </p>
                        <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-center text-base font-medium text-indigo-800 hover:text-indigo-300 transition duration-150 ease-in-out rounded-lg">Tambah</button>
                    </div>
                    <table class="border-collapse border border-slate-500 w-full text-white">
                        <thead class="text-xl ">
                        <th class="border border-slate-600 p-4">Nilai Transaksi</th>
                        <th class="border border-slate-600 p-4">Jenis</th>
                        <th class="border border-slate-600 p-4">Keterangan</th>
                        <th class="border border-slate-600 p-4">Aksi</th>
                        </thead>
                        @foreach ($data_transaksi as $item)
                            <tr class="@if($loop->odd) bg-gray-600 @else bg-gray-700 @endif">
                                <td class="p-2 border border-slate-700">{{$item->nilai_transaksi}}</td>
                                <td class="p-2 border border-slate-700">{{$item->nama_jenis}}</td>
                                <td class="p-2 border border-slate-700">{{$item->keterangan}}</td>
                                <td class="p-2 border border-slate-700">
                                    <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-center text-base font-medium text-indigo-800 hover:text-indigo-300 transition duration-150 ease-in-out rounded-lg">Edit</button>
                                    <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-center text-base font-medium text-indigo-800 hover:text-indigo-300 transition duration-150 ease-in-out rounded-lg">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
