@extends('layouts.sidebar')

@section('title')
   Change user
@endsection

@section('content')

   <form action="{{ route('users.update', $users->id) }}" method="POST" class="text-white flex flex-col justify-center items-center flex-1 w-full h-screen py-5 px-2 font-Poppins">
      
      @csrf
      @method('PATCH')

      @if (Session::get('success'))
         <div class="bg-green-700 p-5 rounded">{{ Session::get('success') }}</div>
      @endif
      @if (Session::get('failed'))
         <div class="bg-red-700 p-5 rounded">{{ Session::get('failed') }}</div>
      @endif

         <div class=" w-full flex flex-col justify-center items-center h-full p-7 max-xl:h-max border border-white border-opacity-20 rounded-md bg-[#1e1e1e]">
            <h3 class="text-3xl font-semibold mb-5">Edit User Data.</h3>
               <div class="w-full h-full bg-black p-5 flex flex-col gap-5 rounded-md">
                  <div class="flex gap-3">
                     <i class="ph-light ph-identification-badge text-4xl"></i>
                     <input type="text" name="name" id="name" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan nama" 
                     value="{{ $users->name }}">
                  </div>
                  @error('name')
                     <div class="bg-red-700 p-5 rounded">{{ $message }}</div>
                  @enderror

                  <div class="flex gap-3">
                     <i class="ph-light ph-envelope text-4xl"></i>
                     <input type="email" name="email" id="email" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Email" 
                     value="{{ $users->email }}">
                  </div>
                  @error('email')
                     <div class="bg-red-700 p-5 rounded">{{ $message }}</div>
                  @enderror

                  <div class="flex gap-3">
                     <i class="ph-light ph-address-book-tabs text-4xl"></i>
                     <select name="role" id="role" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none">
                        <option hidden disabled selected>Pilih Role</option>
                        <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }} >Admin</option>
                        <option value="karyawan" {{ $users->role == 'karyawan' ? 'selected' : '' }} >Karyawan</option> }}>Karyawan</option>
                        <option value="user" {{ $users->role == 'user' ? 'selected' : '' }}>User</option>
                     </select>
                  </div>
                  @error('role')
                     <div class="bg-red-700 p-5 rounded">{{ $message }}</div>
                  @enderror

                  <div class="flex gap-3">
                     <i class="ph-light ph-password text-4xl"></i>
                     <input type="password" name="password" id="password" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Password Baru">
                  </div>
                  @error('password')
                     <div class="bg-red-700 p-5 rounded">{{ $message }}</div>
                  @enderror

                  <button type="submit" class="bg-[#111111] font-semibold text-lg tracking-wider text-white px-4 py-2 w-full rounded">Simpan</button>
               </div>
         </div>
   </form>

   <!-- Modal -->
   <div id="myModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden">
      <div class="bg-[#373737] text-white p-8 rounded-lg shadow-lg w-[100%]">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b pb-2">
          <h2 class="text-2xl font-semibold">Update Akun</h2>
        </div>
          <!-- Modal Body -->
              <div class="mt-3">
                Apakah anda yakin ingin meng-Update data : <b id="nama_user"></b>
              </div>
            <!-- Modal Footer -->
            <div class="mt-6 text-right">
              <a id="closeModalFooter" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600 transition-all duration-100" onclick="closeModal()" style="cursor: pointer"><i class="ph ph-x"></i> Close</a>
              <button type="submit" class="bg-blue-500  px-4 py-2 rounded hover:bg-blue-600 ransition-all duration-100"><i class="ph ph-trash"></i> Update</button>               
            </div>
      </div>
   </div>

   @push('script')
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   <script>
      function showModalTrue() {
         $('#myModal').removeClass('hidden');
         $('#myModal').addClass('flex');
      }
   </script>
   @endpush

@endsection