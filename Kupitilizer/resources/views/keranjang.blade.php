@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <nav class="flex text-gray-700 border border-gray-200 rounded-lg overflow-x-auto mx-10 my-5 md:mx-20 py-5 px-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/market" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-leaf dark:text-gray-400 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                    <p class="ml-5">Market</p>
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="/market" class="ml-1 text-sm font-medium text-gray-700 hover:text-leaf md:ml-2 dark:text-gray-400 dark:hover:text-white">Keranjang</a>
                </div>
            </li>
        </ol>
    </nav>
    <div class="mx-10 md:mx-20 py-5 grid md:grid-cols-4 grid-cols-1 gap-5">
        <div class="md:col-span-3 mb-5 p-5 w-full border border-gray rounded-xl shadow-xl">
            @foreach($keranjang as $item)
            <div class="border border-gray rounded-xl mt-2">
                <div class="flex p-2 gap-2 justify-start">
                    <div> 
                        <img class="h-20 justify-item-center rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="productimg"> .
                    </div>
                    <div>
                        <p class="font-bold">{{ $item->nama_product }}</p>
                        <p class="font-bold text-xl">Rp {{ $item->harga }}</p>
                        <p class="font-medium text-xs">Jumlah : {{ $item->jumlah }}</p>
                    </div>
                </div>
                <div class="flex p-2 mr-5  justify-end gap-2">
                    <form action="keranjang/delete/{{$item->id}}" method="POST">
                        @csrf
                        <button type="submit" class="flex bg-red-300 p-2 rounded-xl hover:bg-red-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        <p>Hapus</p>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <div class="w-full h-auto md:col-span-1">
            <div class="border border-gray shadow-xl rounded-xl p-3">
                <div class="">
                    <p class="font-bold">Gunakan Kupon</p>
                    <input type="text" name="kode_kupon" class="rounded-xl">
                </div>
                <hr class="my-3">
                <div class="my-3">
                    <p class="font-bold">Ringkasan Belanja</p>
                    <div class="flex justify-between">
                        <p>Total Harga</p>
                        <p class="">Rp{{$totalBelanja}}</p>
                    </div>
                    <hr class="my-3">
                    <div class="flex justify-between font-bold">
                        <p>Total Harga</p>
                        <p class="">Rp{{$totalBelanja}}</p>
                    </div>
                </div>
                <div>
                    <button class="bg-leaf hover:bg-green-900 p-3 w-full rounded-xl font-bold text-white" type="submit">Beli</button>
                </div>
            </div>
        </div>
    </div>
@endsection