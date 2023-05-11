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
                    <a href="/market" class="ml-1 text-sm font-medium text-gray-700 hover:text-leaf md:ml-2 dark:text-gray-400 dark:hover:text-white">Product</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-leaf md:ml-2 dark:text-gray-400 dark:hover:text-white">{{$data->nama_product}}</a>
                </div>
            </li>
        </ol>
    </nav>
    <div class="m-10 my-5 md:mx-20 py-5">
        <div class="grid md:grid-cols-4 grid-cols-1">
            <div class="col-span-3 grid grid-cols-1 sm:grid-cols-5 sm:gap-5">
                <div class="col-span-2">
                    <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="productimg">
                </div>
                <div class="col-span-3 mr-5">
                    <p class="text-lg font-bold">{{ $data->nama_product }}</p>
                    <p class="my-5 text-3xl font-bold">Rp {{ $data->harga }}</p>
                    <p class="my-5 text-md font-bold">Deskripsi</p>
                    <p class="my-1 text-md">{{ $data->deskripsi }}</p>
                </div>
            </div>
            <div class="border border-gray-100 rounded-xl shadow-lg p-3 w-full mt-5 md:mt-0">
                <form method="POST" action="/keranjang/addkeranjang">
                    @csrf
                    <div>
                        <p class="font-bold">Atur jumlah dan catatan</p>
                    </div>
                    <div>
                        <div class="flex gap-5 my-2">
                            <p class="text-black font-bold">Jumlah</p>
                            <div class="flex border w-1/2 border-gray rounded-lg">
                                <button type="button" onClick="removeJumlah()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="gray" class="w-6 h-6 p-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                    </svg>
                                </button>
                                <input id="jumlahBarang" name="jumlah" class="w-full h-6 border-0 focus:ring-transparent text-center" value="1" type="text">
                                <button type="button" onClick="addJumlah()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="gray" class="w-6 h-6 p-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <input hidden name="product_id" value="{{$data->id}}">
                        <div class="w-full">
                            <p class="text-black font-bold">Catatan</p>
                            <textarea name="catatan" class="rounded-xl h-28 w-full"></textarea>
                        </div>
                    </div>
                    <div class="py-2 px-3 bg-leaf hover:bg-green-800 rounded-xl">
                        <button class="w-full text-white flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-6 h-6 p-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <p class="font-bold">Keranjang</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function addJumlah(){
            var jumlah = document.getElementById("jumlahBarang").value;
            document.getElementById("jumlahBarang").value = +jumlah+1;
        }

        function removeJumlah(){
            var jumlah = document.getElementById("jumlahBarang").value;
            if(jumlah-1 < 1){
                document.getElementById("jumlahBarang").value = 1;
            }else{
                document.getElementById("jumlahBarang").value = +jumlah-1;
            }
            
        }
    </script>
@endsection
