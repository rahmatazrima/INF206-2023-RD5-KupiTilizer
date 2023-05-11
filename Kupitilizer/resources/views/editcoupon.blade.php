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
        <a href="/admin/coupon" class="ml-1 text-sm font-medium text-gray-700 hover:text-leaf md:ml-2 dark:text-gray-400 dark:hover:text-white">Manage Coupon</a>
    </div>
</li>
<li>
    <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-leaf md:ml-2 dark:text-gray-400 dark:hover:text-white">Edit</a>
    </div>
</li>
@endsection


@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg sm:p-4 text-gray-700 border border-gray-200 bg-gray-50">  
@foreach ($coupons as $item)
    <form method="post" action="/admin/coupon/update/{{$item->id}}" class="mb-5">
        @method('patch')
        @csrf
        <div class="px-6 py-4 w-full md-:w-1/2 ">
            <!-- Name -->
            <div class = "mt-4">

                <!-- Label form -->
                <x-input-label for="nama_coupon" :value="__('Nama')" />
                
                <!-- Input serta diberikan value berupa data yg telah ada sebelumnya -->
                <x-text-input id="nama_coupon" class="w-full block mt-1" type="text" name="nama_coupon" required value="{{ old('nama_coupon', $item->nama_coupon) }}"/>

            </div>

            <!-- Poin -->
            <div class = "mt-4">

                <!-- Label form -->
                <x-input-label for="poin" :value="__('Poin')" />
                
                <!-- Input serta diberikan value berupa data yg telah ada sebelumnya -->
                <x-text-input id="poin" class="w-full block mt-1" type="text" name="poin" required value="{{ old('poin', $item->poin) }}"/>

 
            </div>

            <!-- Deskripsi -->
            <div class = "mt-4">

                <!-- Label form -->
                <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                
                <!-- Input serta diberikan value berupa data yg telah ada sebelumnya -->
                <x-text-input id="deskripsi" class="w-full block mt-1" type="text" name="deskripsi" required value="{{ old('deskripsi', $item->deskripsi) }}"/>

            </div>

            
            <!-- Button Submit -->
            <button type="submit" class="mt-4 mb-px w-3/12 text-white bg-leaf focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
        
        </div>
        
    </form>
    @endforeach

</div>
@endsection