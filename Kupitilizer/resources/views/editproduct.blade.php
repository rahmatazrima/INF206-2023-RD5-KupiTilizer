editproduct.blade.php
@extends('layouts.dashboardLayout')

@section('breadcrumb')
<li>
    <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <a href="/<?php echo Auth::user()->role?>" class="ml-1 text-sm font-medium text-gray-700 hover:text-leaf md:ml-2 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
    </div>
</li>
<li>
    <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-leaf md:ml-2 dark:text-gray-400 dark:hover:text-white">Manage Product</a>
    </div>
</li>
@endsection


@section('content')
 <!-- Success Alert  -->
    @if(session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{session('success')}}
        </div>
    @endif
    
<div class="relative overflow-x-auto shadow -md sm:rounded-lg sm:p-4 text-gray-700 border border-gray-200 bg-gray-50">
    @foreach ($products as $item)
    <form method="post" action="/<?php echo Auth::user()->role?>/product/updateproduct/{{$item->id}}" class="mb-5">
        @method('patch')
        @csrf
        <div class="sm:grid">
                    <!-- nama product -->
                    <div class="sm:mr-5">
                        <x-input-label for="nama_product" :value="__('Nama Product')" />
                        <x-text-input id="nama_product" class="w-full block mt-1" type="text" name="nama_product" required value="{{ old('nama_product', $item->nama_product) }}"/>
                        <x-input-error :messages="$errors->get('nama_product')" class="mt-2" />
                    </div>
                    <!-- harga product -->
                    <div class="sm:mr-5">
                        <x-input-label for="harga" :value="__('Harga Product')" />
                        <x-text-input id="harga" class="w-full block mt-1" type="text" name="harga" required value="{{ old('harga', $item->harga) }}"/>
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>
                    <!-- deskripsi product -->
                    <div class="sm:mr-5">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <x-text-input id="deskripsi" class="w-full block mt-1" type="text" name="deskripsi" required value="{{ old('deskripsi', $item->deskripsi) }}"/>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <!-- <div class="sm:mr-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Upload Gambar</div>
                    </div> -->
            <button type="submit" class="mt-4 mb-px w-3/12 text-white bg-leaf focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Product</button>
        </div>
    </form>
@endforeach
</div>
@endsection