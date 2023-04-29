@extends('layouts.app')

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
                    <tr class="bg-white hover:bg-gray-50 rounded-xl">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            378573284019741
                        </th>
                        <td class="px-6 py-4">
                            Yahdina Ahsya
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-yellow-400 mr-2"></div> 
                                <span>Waiting</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 flex gap-1">
                            <!-- Modal toggle -->
                            <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="bg-blue-300 text-white font-bold rounded-md px-4 py-2">Detail</a>
                            <a href="#" type="button" class="bg-leaf text-white font-bold rounded-md px-4 py-2">Accept</a>
                            <a href="#" type="button" class="bg-red-400 text-white font-bold rounded-md px-4 py-2">Decline</a>                    
                        </td>
                    </tr>
                    
                    <tr class="bg-white hover:bg-gray-50 rounded-xl">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            378573284650952
                        </th>
                        <td class="px-6 py-4">
                            Yahdina Ahsya
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> 
                                <span>Accepted</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 flex gap-1">
                            <!-- Modal toggle -->
                            <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="bg-blue-300 text-white font-bold rounded-md px-4 py-2">Detail</a>
                            
                            <!-- <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="bg-leaf text-white font-bold rounded-md px-4 py-2">Accept</a>
                            <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="bg-red-400 text-white font-bold rounded-md px-4 py-2">Decline</a>                     -->
                        </td>
                    </tr>
    
                    <tr class="bg-white hover:bg-gray-50 rounded-xl">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            378573284065025
                        </th>
                        <td class="px-6 py-4">
                            Yahdina Ahsya
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div> 
                                <span>Declined</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 flex gap-1">
                            <!-- Modal toggle -->
                            <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="bg-blue-300 text-white font-bold rounded-md px-4 py-2">Detail</a>
                            <!-- <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="bg-leaf text-white font-bold rounded-md px-4 py-2">Accept</a>
                            <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="bg-red-400 text-white font-bold rounded-md px-4 py-2">Decline</a>                     -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Edit user modal -->
        <div id="editUserModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <form action="#" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Detail Permintaan Penjemputan
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editUserModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="name" id="first-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-leaf  block w-full p-2.5 " placeholder="Nama" disabled>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Handphone</label>
                                <input type="text" name="last-name" id="last-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-leaf  block w-full p-2.5 " placeholder="0823xxxxxxxx" disabled>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <textarea name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-leaf  block w-full p-2.5 " placeholder="Alamat"disabled></textarea>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="phone-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Sampah</label>
                                <input type="number" name="phone-number" id="phone-number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-leaf  block w-full p-2.5 " placeholder="Ampas Kopi"disabled>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Sampah</label>
                                <input type="text" name="department" id="department" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-leaf  block w-full p-2.5 " placeholder="10 Kg"disabled>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Penjemputan</label>
                                <input type="number" name="company" id="company" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-leaf  block w-full p-2.5 " placeholder="4 September 2023"disabled>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Penjemputan</label>
                                <input type="password" name="current-password" id="current-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-leaf  block w-full p-2.5 " placeholder="10 AM"disabled>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                    <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                    <span>Accepted</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection