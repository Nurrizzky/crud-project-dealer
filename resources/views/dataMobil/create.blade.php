@extends('layouts.sidebar')

@section('title')
   ADD Cars
@endsection

@section('content')
   @if (Session::get('failed'))
   <div class="bg-green-500 p-5 rounded">{{ Session::get('failed') }}</div>
   @endif
   <form action="{{ route('cars.store') }}" method="POST" class="text-white flex flex-col justify-center items-center flex-1 w-full h-screen py-5 px-2 font-Poppins">
      @csrf
      @if (Session::get('success'))
         <div class="bg-green-500 p-5 rounded">{{ Session::get('success') }}</div>
      @endif
         <div class=" w-full flex flex-col justify-center items-center h-full p-7 max-xl:h-max border border-white border-opacity-20 rounded-md bg-[#1e1e1e]">
            <h3 class="text-3xl font-semibold mb-5">Tambah data mobil.</h3>
               <div class="w-full h-full bg-black p-5 flex flex-col gap-5 rounded-md">
                  <div class="flex gap-3">
                     <i class="ph-light ph-car text-4xl"></i>
                     <input type="text" name="brand" id="brand" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan nama brand">
                  </div>
                  <div class="flex gap-3">
                     <i class="ph-light ph-flag text-4xl"></i>
                     <input type="text" name="from" id="from" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Asal Mobil dibuat">
                  </div>
                  <div class="flex gap-3">
                     <i class="ph-light ph-sphere text-4xl"></i>
                     <input type="text" name="model" id="model" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan model mobil">
                  </div>
                  <div class="flex gap-3">
                     <i class="ph-light ph-palette text-4xl"></i>
                     <input type="text" name="color" id="color" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan warna mobil">
                  </div>
                  <div class="flex gap-3">
                     <i class="ph-light ph-timer text-4xl"></i>
                     <input type="number" name="years" id="years" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan tahun mobil dibuat">
                  </div>
                  <div class="flex gap-3">
                     <i class="ph-light ph-gear text-4xl"></i>
                     <select name="transmission" id="transmission" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none">
                        <option hidden disabled selected>Pilih Role</option>
                        <option value="manual">manual</option>
                        <option value="automatic">automatic</option>
                     </select>
                  </div>
                  <button type="submit" class="bg-[#111111] text-white px-4 py-2 w-full rounded">Tambah</button>
               </div>
         </div>
   </form>

@endsection