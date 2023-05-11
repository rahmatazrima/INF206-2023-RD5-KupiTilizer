@extends('layouts.app')


@section('content')
     <!-- Breadcrumb -->
    <nav class="flex text-gray-700 border border-gray-200 rounded-lg overflow-x-auto mx-10 my-5 md:mx-20 py-5 px-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/coupon" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-leaf dark:text-gray-400 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                    <p class="ml-5">Coupon</p>
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="/coupon" class="ml-1 text-sm font-medium text-gray-700 hover:text-leaf md:ml-2 dark:text-gray-400 dark:hover:text-white">Coupon</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="mx-10 md:mx-20 py-5 grid md:grid-cols-5 grid-cols-1 gap-5">
        <div class="md:col-span-1 mb-5 w-full">
            <div class="">
                <a href="/mycoupon" class="flex p-3 border border-gray-200 rounded-xl shadow-lg hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <p class="ml-2 text-md font-medium">My Coupon</p>
                </a>
            </div>
        </div>
        <div class="md:col-span-4 grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($coupons as $item)
                <div class="relative shadow-md sm:rounded-lg p-4 text-gray-700 border border-gray-200 bg-gray-50">
                    <img class="h-auto max-w-6/12 justify-item-center rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="productimg">
                    <h1 class="text-left font-bold md:text-xl my-2">{{ $item->nama_coupon }}</h1>
                    <p class="font-semibold md:text-xl text-left">{{ $item->poin }} Poin</p>
                    <p class="md:h-20 truncate">{{ $item->deskripsi }}</p>
                    <div class="flex justify-end">
                        <form action="/coupon/add" method="post">
                            @csrf
                            <input hidden name="kodeCoupon" value="{{$item->id}}"  >
                        <button type="submit" class="text-white bg-leaf font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Redeem</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
