@extends('layouts.sidebar')

@section('title')
   Profile
@endsection

@section('content')

   <div class="w-full h-full rounded-md overflow-y-auto bg-[#1e1e1e] p-10 shadow-md border-white border-opacity-20">
      <div class="w-full h-full p-3 flex gap-2 bg-[#111111] rounded-md  items-center text-white shadow-md">
         <div class="flex items-center p-7 rounded-md shadow-md bg-neutral-900 w-full">
            <img src="{{ asset('img/user.jpeg') }}" class="rounded-full w-36 h-36" alt="user">
            <div class="info">
               <div class="flex gap-2">
                  <p>Name : </p>
                  <h3>{{ Auth::user()->name }}</h3>
               </div>
               <div class="flex gap-2">
                  <p>Role : </p>
                  <h3>{{ Auth::user()->role }}</h3>
               </div>
               <div class="flex gap-2">
                  <p>Email : </p>
                  <h3>{{ Auth::user()->email }}</h3>
               </div>
               <div class="flex gap-2">
                  <p>Created at : </p>
                  <h3>{{ Auth::user()->created_at->format('l, d F Y') }}</h3>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection