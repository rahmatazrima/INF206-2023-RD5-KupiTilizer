@extends('layouts.app')

@section('content')
<div class="m-10 py-5 shadow-2xl border-2 border-gray rounded-xl">
    <div class="flex justify-center pt-12">
        <div class="flex justify-center rounded">
            <h1 class="text-center text-3xl font-bold text-leaf">Form Permintaan Penjemputan</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('penjemputan.create') }}" class="my-10">
        @csrf
        
        <div class="grid md:grid-cols-2 grid-cols-1 md:mx-20 mx-5 gap-5">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium">Nama</label>
            <input type="text" name="name" id="name" class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Name" required>
        </div>
        <div>
            <label for="hp" class="block mb-2 text-sm font-medium text-black dark:text-white">Nomor Handphone</label>
            <input type="text" name="hp" id="hp" class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-black-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0823xxxxxxxx" required>
        </div>
        <div class="md:col-span-2">
            <label for="alamat" class="block mb-2 text-sm font-medium text-black dark:text-white">Alamat</label>
            <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-sm text-black bg-white rounded-lg border border-black focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-black-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Alamat..." required></textarea>
        </div>
        <div>
            <label for="jenisSampah" class="block mb-2 text-sm font-medium text-black dark:text-white">Jenis Sampah</label>
            <select id="jenisSampah" name="jenisSampah" class="border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Pilih Jenis Sampah</option>
                <option value="AmpasKopi">Ampas Kopi</option>
            </select>
        </div>
        <div>
            <label for="totalSampah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Sampah</label>
            <div class="flex">
                <input type="text" id="totalSampah" name="totalSampah" class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Total Sampah">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-r-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        Kg
                </span>
            </div>
        </div>
        <div>
            <label for="tanggalJemput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Jemput</label>
            <input type="date" id="tanggalJemput" name="tanggalJemput" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
        </div>
        <div>
            <label for="waktuJemput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Jemput</label>
            <input type="time" id="waktuJemput" name="waktuJemput" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
        </div>
        <div class="flex justify-center md:col-span-2 pt-12 mx-5 ">
            <button type="submit"
                class="flex justify-center text-white bg-leaf hover:bg-leaf-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-16 py-2.5 text-center dark:bg-leaf-600 dark:hover:bg-leaf-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>
</div>
@endsection
