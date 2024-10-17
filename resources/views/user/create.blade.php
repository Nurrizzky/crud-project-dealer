@extends('layouts.sidebar')

@section('title')
   ADD User
@endsection

@section('content')

   <form action="{{ route('users.store') }}" method="POST" class="text-white flex flex-col justify-center items-center flex-1 w-full h-screen py-5 px-2 font-Poppins">
      @csrf
      @if (Session::get('success'))
         <div class="bg-green-500 p-5 rounded">{{ Session::get('success') }}</div>
      @endif
         <div class=" w-full flex flex-col justify-center items-center h-full p-7 max-xl:h-max border border-white border-opacity-20 rounded-md bg-[#1e1e1e]">
            <h3 class="text-3xl font-semibold mb-5">TAMBAH USER.</h3>
               <div class="w-full h-full bg-black p-5 flex flex-col gap-5 rounded-md">
                  <div class="flex gap-3">
                     <i class="ph-light ph-identification-badge text-4xl"></i>
                     <input type="text" name="name" id="name" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan nama">
                  </div>
                  <div class="flex gap-3">
                     <i class="ph-light ph-envelope text-4xl"></i>
                     <input type="email" name="email" id="email" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Email">
                  </div>
                  <div class="flex gap-3">
                     <i class="ph-light ph-address-book-tabs text-4xl"></i>
                     <select name="role" id="role" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none">
                        <option hidden disabled selected>Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="karyawan">Karyawan</option>
                        <option value="user">User</option>
                     </select>
                  </div>
                  <div class="flex gap-3">
                     <i class="ph-light ph-password text-4xl"></i>
                     <input type="password" name="password" id="password" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Password">
                  </div>
                  <button type="submit" class="bg-[#111111] text-white px-4 py-2 w-full rounded">Tambah</button>
               </div>
         </div>
   </form>

@endsection