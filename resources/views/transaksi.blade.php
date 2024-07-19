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

        <!-- table -->
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 pt-4 w-full">
            <div class="flex flex-col w-full">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-6">
                    <div class="flex justify-between pb-4">
                        <p class="text-gray-900 dark:text-gray-400 text-xl">
                            Total Kas
                        </p>
                        <button id="buttonTambahTransaksi"
                                onclick="edit('tambahTransaksi', 'buttonTambahTransaksi', 'close-tambahTransaksi')"
                                data-modal-target="tambahTransaksi" data-modal-toggle="tambahTransaksi"
                                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-center text-base font-medium text-indigo-200 hover:text-indigo-300 transition duration-150 ease-in-out rounded-lg">
                            Tambah
                        </button>
                        {{-- MODAL TAMBAH DATA --}}
                        <div id="tambahTransaksi" tabindex="-1" aria-hidden="true"
                             class="fixed top-0 left-0 z-50 w-full p-4 overflow-x-hidden hidden overflow-y-auto h-screen backdrop-blur-md bg-white/30 items-center justify-center">
                            <div
                                class="relative w-full max-w-md max-h-full">
                                {{-- Modal Content --}}
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button id="close-tambahTransaksi" type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="authentication-modal">
                                        <svg class="w-3 h-3" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"
                                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                            Tambah Transaksi</h3>
                                        {{-- FORM TAMBAH DATA TRANSAKSI --}}
                                        <form action="{{url('transaksi/tambahTransaksi')}}" method="post"
                                              class="space-y-6">
                                            @csrf
                                            <div>
                                                <label for=""
                                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai
                                                    Transaksi</label>
                                                <input type="text" name="nilai_transaksi"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                       required>
                                            </div>
                                            <div>
                                                <label for=""
                                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                                                <select name="id_jenis" id=""
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                        required>
                                                    <option value="1">Uang Masuk</option>
                                                    <option value="2">Uang Keluar</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for=""
                                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                                <input type="text" name="keterangan"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                       required>
                                            </div>
                                            <div class="">
                                                <button type="submit"
                                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Tambah
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- End Modal Content --}}
                            </div>
                        </div>
                        {{-- END MODAL TAMBAH DATA --}}
                    </div>
                    <table class="border-collapse border border-slate-500 w-full text-white">
                        <thead class="text-sm lg:text-xl bg-indigo-500">
                        <th class="border border-slate-600 p-2 lg:p-4">Nilai Transaksi</th>
                        <th class="border border-slate-600 p-2 lg:p-4">Jenis</th>
                        <th class="border border-slate-600 p-2 lg:p-4">Keterangan</th>
                        <th class="border border-slate-600 p-2 lg:p-4">Tanggal</th>
                        <th class="border border-slate-600 p-2 lg:p-4">Aksi</th>
                        </thead>
                        @foreach ($data_transaksi as $item)
                            <tr class="text-xs lg:text-lg
                                @if($loop->odd) dark:bg-gray-800 bg-gray-100 text-black dark:text-white
                                @else text-black dark:bg-gray-900 bg-gray-200 dark:text-white
                                @endif">
                                <td class="p-2 border border-slate-700">{{$item->nilai_transaksi}}</td>
                                <td class="p-2 border border-slate-700">{{$item->nama_jenis}}</td>
                                <td class="p-2 border border-slate-700">{{$item->keterangan}}</td>
                                <td class="p-2 border border-slate-700">{{$item->created_at}}</td>
                                <td class="p-2 border border-slate-700">

                                    <button id="buttonEditTransaksi{{$item->id_transaksi}}"
                                            onclick="edit('editTransaksi{{$item->id_transaksi}}', 'buttonEditTransaksi{{$item->id_transaksi}}', 'close-editTransaksi{{$item->id_transaksi}}')"
                                            data-modal-target="editTransaksi" data-modal-toggle="editTransaksi"
                                            type="button"
                                            class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-center text-xs lg:text-base font-medium text-white transition duration-150 ease-in-out rounded-lg">
                                        Edit
                                    </button>

                                    {{-- MODAL EDIT DATA --}}
                                    <div id="editTransaksi{{$item->id_transaksi}}" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 z-50 w-full p-4 overflow-x-hidden hidden overflow-y-auto h-screen backdrop-blur-md bg-white/30 items-center justify-center">
                                        <div
                                            class="relative w-full max-w-md max-h-full">
                                            {{-- Modal Content --}}
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button id="close-editTransaksi{{$item->id_transaksi}}" type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="authentication-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-6 py-6 lg:px-8">
                                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                        Edit Transaksi</h3>
                                                    <form class="space-y-6"
                                                          action="{{ url('/editTransaksi/'.$item->id_transaksi) }}"
                                                          method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <div>
                                                            <label for=""
                                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                                                            <select name="id_transaksi" disabled
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                    required>
                                                                <option value="{{$item->id_transaksi}}"
                                                                        selected>{{$item->id_transaksi}}</option>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label for=""
                                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                                                            <select name="id_jenis"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                    required>
                                                                <option value="{{$item->id_jenis}} name=id_jenis
                                                                " selected disabled
                                                                        hidden><{{$item->nama_jenis}}</option>
                                                                <option value="1"
                                                                        name="id_jenis">Uang Masuk
                                                                </option>
                                                                <option value="2" name="id_jenis">Uang Keluar</option>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label for=""
                                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai
                                                                Transaksi</label>
                                                            <input type="text" value="{{$item->nilai_transaksi}}"
                                                                   name="nilai_transaksi" id=""
                                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                   required>
                                                        </div>
                                                        <div>
                                                            <label for=""
                                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                                            <input type="text" value="{{$item->keterangan}}"
                                                                   name="keterangan" id=""
                                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                   required>
                                                        </div>

                                                        <button type="submit"
                                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            Simpan
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            {{-- End Modal Content --}}
                                        </div>
                                    </div>
                                    {{-- END MODAL EDIT DATA --}}


                                    <button id="buttonHapusTransaksi{{$item->id_transaksi}}"
                                            onclick="edit('hapusTransaksi{{$item->id_transaksi}}', 'buttonHapusTransaksi{{$item->id_transaksi}}', 'close-hapusTransaksi{{$item->id_transaksi}}')"
                                            data-modal-target="hapusTransaksi" data-modal-toggle="hapusTransaksi"
                                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-center text-base font-medium text-white transition duration-150 ease-in-out rounded-lg text-xs lg:text-base">
                                        Delete
                                    </button>

                                    {{-- MODAL HAPUS DATA --}}
                                    <div id="hapusTransaksi{{$item->id_transaksi}}" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 z-50 w-full p-4 overflow-x-hidden hidden overflow-y-auto h-screen backdrop-blur-md bg-white/30 items-center justify-center">
                                        <div class="relative w-full max-w-md max-h-full">
                                            {{-- Modal Content --}}
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button id="close-hapusTransaksi{{$item->id_transaksi}}" type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="authentication-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-6 py-6 lg:px-8">
                                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                        Hapus Transaksi</h3>
                                                    <form class="space-y-6"
                                                          action="{{ url('/hapusTransaksi/'.$item->id_transaksi) }}"
                                                          method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <div class="text-white">
                                                            Apakah Anda yakin ingin menghapus transaksi?
                                                        </div>
                                                        <div class="flex justify-center mt-4">
                                                            <button id="close-hapusTransaksiForm{{$item->id_transaksi}}"
                                                                    type="button"
                                                                    class="text-white w-36 bg-sky-400 rounded-sm mx-2 hover:bg-sky-600 py-1">
                                                                Tidak
                                                            </button>
                                                            <button type="submit"
                                                                    class="text-white w-36 bg-red-400 rounded-sm mx-2 hover:bg-red-600 py-1">
                                                                Ya
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{-- End Modal Content --}}
                                        </div>
                                    </div>
                                    {{-- END MODAL EDIT DATA --}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>

<script>
    // Modal Edit
    function edit(modalId, btnId, closeId) {
        let modalEdit = document.getElementById(modalId);

        let btnEditData = document.getElementById(btnId);

        let btnCloseEditData = document.getElementById(closeId);


        btnEditData.onclick = function () {
            modalEdit.style.display = "flex";
        }
        btnCloseEditData.onclick = function () {
            modalEdit.style.display = "none";
        }
    }
</script>
