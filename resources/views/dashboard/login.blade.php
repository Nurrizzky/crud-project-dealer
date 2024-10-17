@extends('layouts.sidebar')

@section('title')
   Login
@endsection

@section('content')

<form action="{{ route('login.user') }}" method="POST" class="text-white flex w-full h-full py-5 px-2 font-Poppins ">
   @csrf
   <div class=" w-full flex flex-col justify-center items-center h-full max-xl:h-max rounded-md bg-[#1e1e1e] bg-opacity-50 backdrop-blur-lg shadow-lg">
      <h1 class="text-3xl font-semibold mb-10 tracking-widest shadow-md">Login.</h1>
         <div class="w-[50%] h-max bg-black p-5 flex  flex-col gap-5 rounded-md">
            @if (Session::get('success'))
               <div class="bg-green-500 px-5 w-full py-2 my-8 rounded-md">{{ Session::get('success') }}</div>
            @endif
            @if (Session::get('failed'))
               <div class="bg-red-700 px-5 w-full py-3 my-8 rounded-md">{{ Session::get('failed') }}</div>
            @endif

            <div class="flex flex-col gap-3">
               <label for="name" class="text-white" >Name : </label>
               <input type="text" name="name" id="name" class="w-full px-4 py-2 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan nama">
               @error('name')
                  <small>{{ $message }}</small>
               @enderror
            </div>
            <div class="flex flex-col gap-3">
               <label for="email" class="text-white" >Email : </label>
               <input type="email" name="email" id="email" class="w-full px-4 py-2 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Email">
               @error('email')
                  <small>{{ $message }}</small>
               @enderror
            </div>
            <div class="flex flex-col gap-3">
               <label for="password" class="text-white" >Password : </label>
               <input type="password" name="password" id="password" class="w-full px-4 py-2 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Password">
               @error('password')
                  <small>{{ $message }}</small>
               @enderror
            </div>
            <button type="submit" class="bg-[#111111] text-white px-4 py-2 rounded">Login</button>
         </div>
   </div>
</form>
         

@endsection