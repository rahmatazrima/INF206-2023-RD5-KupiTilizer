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
        <a href="/<?php echo Auth::user()->role?>/requestjemput" class="ml-1 text-sm font-medium text-gray-700 hover:text-leaf md:ml-2 dark:text-gray-400 dark:hover:text-white">Request Penjemputan</a>
    </div>
</li>
@endsection

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg sm:p-4 text-gray-700 border border-gray-200 bg-gray-50">
    <div class="flex items-center justify-between py-4 px-4 sm:px-0">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Request Penjemputan">
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-lg sm:rounded-xl border-gray-50 border-3">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        IDPenjemputan
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/4">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataRequest as $item)
                <tr class="bg-white hover:bg-gray-50 rounded-xl">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->name}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if($item->status == "waiting" || $item->status == "process")
                            <div class="h-2.5 w-2.5 rounded-full bg-yellow-400 mr-2"></div>
                            @else
                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                            @endif
                            <span class="capitalize">{{$item->status}}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 flex gap-1">
                        <form action="/<?php echo Auth::user()->role?>/requestjemput/detail/{{$item->id}}" method="get" class='d-inline'>
                            <button type="submit" class="bg-blue-300 text-white font-bold rounded-md px-4 py-2">Detail</button>
                        </form>
                        @if($item->status == "process")
                        <form action="/<?php echo Auth::user()->role?>/requestjemput/done/{{$item->id}}" method="get" class='d-inline'>
                            <button type="submit" class="bg-leaf text-white font-bold rounded-md px-4 py-2">Done</button>
                        </form>    
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection