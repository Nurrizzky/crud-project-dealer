@extends('layouts.sidebar')

@section('title')

   Dashboard

@endsection

@section('content')

   @if (Session::get('failed'))
      <div class="bg-red-700 p-5 rounded mt-5 font-semibold">{{ Session::get('failed') }}</div>
   @endif
   <div class=" w-full h-screen py-5 px-2 font-Poppins">
      <div class="card w-full flex flex-col h-full max-xl:h-max p-7 rounded-md bg-[#1e1e1e]">
         <div class="">
            <h1 class="text-3xl font-bold">
               <div class="flex items-center">
                  <i class="ph ph-warehouse mr-3 mt-2"></i> Dealer Manage.
               </div>
            </h1>
         </div>
         <hr class="my-5">
         <div class="bg-[#111111] h-56 flex flex-col gap-3 justify-center items-center p-5 w-full my-3 rounded-md shadow-md">
            <h3 class="text-2xl">Selamat datang <span class="font-bold">{{ Auth::user()->name }}.</span> </h3>
            <p>Selamat datang di Website dealer yang lengkap. anda dapat memanage data mobil, motor, dan account</p>
         </div>
         <div class="w-full h-full flex flex-col justify-center items-start">
            <h1 class="text-2xl font-bold mt-5">FITUR</h1>
               <div class="w-full h-full flex justify-center items-center gap-3 -mt-5 max-xl:flex-col">
                  <div class="bg-[#111111] flex flex-col gap-3 justify-center items-center p-5 w-full h-96 rounded-md shadow-lg">
                     <h3 class="text-xl font-bold"><i class="ph ph-car"></i> Manage Data Mobil</h3>
                     <p>Bagian ini bertanggung jawab untuk mengelola semua informasi yang terkait dengan mobil dalam sistem. Fitur-fitur yang tersedia termasuk penambahan data mobil baru ke dalam database, mengedit detail mobil yang sudah ada seperti merek, model, tahun produksi, dan nomor registrasi, serta penghapusan mobil dari database jika sudah tidak relevan. Pengelolaan data ini sangat penting untuk memastikan informasi yang tersedia selalu up-to-date dan akurat, sehingga memudahkan proses administrasi dan pencarian data kendaraan</p>
                  </div>
                  <div class="bg-[#111111] flex flex-col gap-3 justify-center items-center p-5 w-full h-96 rounded-md shadow-lg">
                     <h3 class="text-xl font-bold"><i class="ph ph-motorcycle"></i> Manage Data Motor</h3>
                     <p>Pada bagian ini, pengguna dapat melakukan pengelolaan informasi terkait motor, seperti menambah data motor baru yang akan dicatat dalam sistem. Pengguna juga dapat memperbarui data motor yang sudah ada, misalnya mengubah rincian seperti merek, tipe, warna, atau nomor pelat. Selain itu, jika data motor sudah tidak diperlukan, pengguna memiliki opsi untuk menghapus data tersebut. Bagian ini membantu dalam menjaga data motor tetap terorganisir dan dapat diakses dengan mudah saat diperlukan.</p>
                  </div>
                  <div class="bg-[#111111] flex flex-col gap-3 justify-center items-center p-5 w-full h-96 rounded-md shadow-lg">
                     <h3 class="text-xl font-bold"><i class="ph ph-user-list"></i> Manage Data Account</h3>
                     <p>Bagian ini menyediakan fitur untuk mengelola data akun pengguna yang terdaftar dalam sistem. Di sini, pengguna dapat membuat akun baru untuk anggota atau staf yang memerlukan akses ke sistem, mengubah informasi akun seperti nama, alamat email, dan peran pengguna, serta menghapus akun yang tidak lagi diperlukan. Pengelolaan akun yang efektif memastikan bahwa hanya pengguna yang berwenang yang memiliki akses ke data penting, serta memberikan kontrol penuh atas hak akses dan keamanan informasi dalam sistem.</p>
                  </div>
            </div>           
         </div>
      </div>
   </div>

@endsection