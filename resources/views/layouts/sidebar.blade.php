<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   {{-- Vite / tailwindcss --}}
   @vite('resources/css/app.css')
   {{-- Phosphor Icons --}}
   <script src="https://unpkg.com/@phosphor-icons/web"></script>
   {{-- yield title --}}
   <title>@yield('title')</title>

</head>

<body class=" w-full h-screen flex" style="background-image: url('{{ asset('img/mono_dark_bg.png') }}'); background-size: cover; background-position: center">
   
   @if (Auth::check())
      {{-- Container Sidebar --}}
      <div class="w-80 h-screen flex flex-col justify-center items-center p-5 overflow-hidden ">
         {{-- Content Sidebar --}}
         <div class="w-full h-full rounded-md flex flex-col justify-start gap-2  bg-[#ffffff] backdrop-blur-2xl bg-opacity-5 border-opacity-20 border border-white p-3 font-Poppins">
            {{-- navigation --}}
            {{-- Card Profile --}}
            <div class="w-full h-16 p-3 flex gap-2 bg-[#111111] rounded-md items-center text-white shadow-md">
               <img src="{{ asset('img/user.jpeg') }}" class="rounded-full w-11 h-11" alt="user">
               <div class="info">
                  <h3>{{ Auth::user()->name }}</h3>
                  <p>{{ Auth::user()->role }}</p>
               </div>
            </div>
               <div class="flex flex-col">
                  <div class="flex flex-col p-3 gap-2">
                     <a href="{{ route('home') }}" class="text-white">
                        <div class="bg-[#111111] py-2 px-3 w-full rounded-md shadow-sm">
                           <i class="ph ph-house mr-2"></i> Dashboard
                        </div>
                     </a>
                     <a href="{{ route('profile') }}" class="text-white">
                        <div class="bg-[#111111] py-2 px-3 w-full rounded-md shadow-sm">
                           <i class="ph ph-user-circle mr-2"></i> Profile
                        </div>
                     </a>
                     <a href="{{ route('logout') }}" class="text-white">
                        <div class="bg-[#111111] py-2 px-3 w-full rounded-md shadow-sm">
                           <i class="ph ph-sign-out mr-2"></i> Logout
                        </div>
                     </a>
                  </div>
                  <div class="bg-[#111111] h-1 w-full my-3 rounded-md shadow-sm"></div>
                  <div class="flex flex-col p-3 text-white">
                     <h3 class="text-lg font-semibold "> Manage </h3>
                     <div class="flex flex-col pl-3 pt-2 gap-1 text-base">
                        <a href="{{ route('cars.index') }}" class="text-white bg-[#111111] px-3 py-2 rounded-md">
                           <div class="flex justify-between items-center">
                              <div class="">
                                 <i class="ph ph-arrow-elbow-down-right mr-1"></i> 
                                 Data Mobil 
                              </div>
                              <i class="ph ph-car text-xl"></i>
                           </div>
                        </a>
                        @if (Auth::user()->role == 'admin') 
                           <a href="{{ route('users.index') }}" class="text-[#fff] bg-[#111111] px-3 py-2 rounded-md">
                              <div class="flex justify-between items-center">
                                 <div class="">
                                    <i class="ph ph-arrow-elbow-down-right mr-1"></i> Data Account 
                                 </div>
                                 <i class="ph ph-user-list text-xl"></i>
                              </div>
                           </a>
                        @endif
                     </div>
                  </div>
               </div>
         </div>
      </div>

   @endif

      {{-- Content Main --}}
      <div class="text-white flex flex-1 w-full h-screen py-5 px-2 font-Poppins">
         <div class=" w-full flex flex-col justify-center h-full max-xl:bg-transparent p-10 rounded-md bg-[#1e1e1e] backdrop-blur-2xl bg-opacity-40 border border-white border-opacity-20">
            @yield('content')
         </div>
      </div>

   @stack('script')
   
</body>

</html>