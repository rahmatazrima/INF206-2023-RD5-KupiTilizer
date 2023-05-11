@extends('layouts.app')

@section('content')
<div>
    <h1 class="text-center font-bold text-dark mt-20 text-5xl font-sans">My Coupon</h1>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:p-10 p-3 border border-gray shadow-xl md:mx-10 mx-2 my-5 rounded-xl">
    @foreach($coupons as $item)
        <div class="relative shadow-md sm:rounded-lg p-4 text-gray-700 border border-gray-200 bg-gray-50 hover:bg-green-100">
            <img class="h-auto max-w-6/12 justify-item-center rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="productimg">
            <h1 class="text-left font-bold md:text-xl my-2">{{ $item->nama_coupon }}</h1>
            <p class="md:h-20 truncate">{{ $item->deskripsi }}</p>
        </div>
    @endforeach
</div>
@endsection