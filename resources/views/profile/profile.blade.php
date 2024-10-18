@extends('layouts.sidebar')

@section('title')
   Profile
@endsection

@section('content')

   <div class="w-full h-full rounded-md overflow-y-auto bg-[#1e1e1e] p-5 shadow-md border-white border-opacity-20">
      <div class="w-full h-full p-10 flex flex-col gap-5 bg-[#111111] rounded-md  items-start text-white shadow-md">
         <div class="flex flex-col items-center p-7 gap-3 rounded-md shadow-md bg-neutral-900 w-full">
            <div class="info w-[80%] flex gap-7 items-center bg-[#111] p-5 rounded-md relative overflow-hidden">
               <img src="{{ asset('img/user.jpeg') }}" class="rounded-full shadow-lg w-52 h-5w-52" alt="user">
               <div class="flex w-full relative">
                  <h1 class="text-3xl font-bold ">Profil. </h1>
                  <span class="after:content-[''] after:ml-3 after:bg-white after:h-1 after:rounded after:w-[80%] after:block after:absolute after:mt-6"></span>
               </div>
            </div>
            <div class="info w-[80%] flex flex-col bg-[#111] p-5 rounded-md">
               <div class="flex gap-2 my-2 items-center">
                  <p class="bg-[#111] text-white w-[30%] p-3 rounded-md font-bold border border-white border-opacity-20 shadow-md">Name </p>
                  <p> : </p>
                  <h3 class="bg-[#111] text-white  w-[70%] p-3 rounded-md font-bold border border-white border-opacity-20 shadow-md"> {{ Auth::user()->name }}</h3>
               </div>
               <div class="flex gap-2 my-2 items-center">
                  <p class="bg-[#111] text-white  w-[30%] p-3 rounded-md font-bold border border-white border-opacity-20 shadow-md">Role </p>
                  <p> : </p>
                  <h3 class="bg-[#111] text-white  w-[70%] p-3 rounded-md font-bold border border-white border-opacity-20 shadow-md">{{ Auth::user()->role }}</h3>
               </div>
               <div class="flex gap-2 my-2 items-center">
                  <p class="bg-[#111] text-white  w-[30%] p-3 rounded-md font-bold border border-white border-opacity-20 shadow-md">Email </p>
                  <p> : </p>
                  <h3 class="bg-[#111] text-white  w-[70%] p-3 rounded-md font-bold border border-white border-opacity-20 shadow-md">{{ Auth::user()->email }}</h3>
               </div>
               <div class="flex gap-2 my-2 items-center">
                  <p class="bg-[#111] text-white  w-[30%] p-3 rounded-md font-bold border border-white border-opacity-20 shadow-md">Created at </p>
                  <p> : </p>
                  <h3 class="bg-[#111] text-white  w-[70%] p-3 rounded-md font-bold border border-white border-opacity-20 shadow-md">{{ Auth::user()->created_at->format('l, d F Y') }}</h3>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection