@extends('layouts.sidebar')

@section('title')
   Change user
@endsection

@section('content')

   <form action="{{ route('cars.update', $cars->id) }}" method="POST" class="text-white flex flex-col justify-center items-center flex-1 w-full h-screen py-5 px-2 font-Poppins">
      
      @csrf
      @method('PATCH')

      @if (Session::get('success'))
         <div class="bg-green-700 p-5 rounded">{{ Session::get('success') }}</div>
      @endif
      @if (Session::get('failed'))
         <div class="bg-red-700 p-5 rounded">{{ Session::get('failed') }}</div>
      @endif

         <div class=" w-full flex flex-col justify-center items-center h-full p-7 max-xl:h-max border border-white border-opacity-20 rounded-md bg-[#1e1e1e]">
            <h3 class="text-3xl font-semibold mb-5">Edit Data Mobil.</h3>
               <div class="w-full h-full bg-black p-5 flex flex-col gap-5 rounded-md">
                  <div class="flex gap-3">
                     <i class="ph-light ph-car text-4xl"></i>
                     <input type="text" name="brand" id="brand" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan nama" 
                     value="{{ $cars->brand }}">
                  </div>
                  @error('brand')
                     <div class="bg-red-700 p-5 rounded">{{ $message }}</div>
                  @enderror

                  <div class="flex gap-3">
                     <i class="ph-light ph-flag text-4xl"></i>
                     <input type="text" name="from" id="from" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Email" 
                     value="{{ $cars->from }}">
                  </div>
                  @error('from')
                     <div class="bg-red-700 p-5 rounded">{{ $message }}</div>
                  @enderror

                  <div class="flex gap-3">
                     <i class="ph-light ph-sphere text-4xl"></i>
                     <input type="text" name="model" id="model" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Email" 
                     value="{{ $cars->model }}">
                  </div>
                  @error('model')
                     <div class="bg-red-700 p-5 rounded">{{ $message }}</div>
                  @enderror
                  <div class="flex gap-3">
                     <i class="ph-light ph-palette text-4xl"></i>
                     <input type="text" name="color" id="color" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Email" 
                     value="{{ $cars->color }}">
                  </div>
                  @error('color')
                     <div class="bg-red-700 p-5 rounded">{{ $message }}</div>
                  @enderror
                  
                  <div class="flex gap-3">
                     <i class="ph-light ph-timer text-4xl"></i>
                     <input type="text" name="years" id="years" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none" placeholder="Masukkan Password Baru "
                     value="{{ $cars->years }}">
                     >
                  </div>
                  @error('years')
                     <div class="bg-red-700 p-5 rounded">{{ $message }}</div>
                  @enderror

                  <div class="flex gap-3">
                     <i class="ph-light ph-gear text-4xl"></i>
                     <select name="transmission" id="transmission" class="w-full px-4 py-3 bg-[#111111] text-white rounded-lg border border-[#212121] focus:shadow-sm focus:shadow-gray-500 focus:outline-none">
                        <option hidden disabled selected>Pilih Role</option>
                        <option value="manual" {{ $cars->transmission == 'manual' ? 'selected' : '' }} >Manual</option>
                        <option value="automatic" {{ $cars->transmission == 'automatic' ? 'selected' : '' }} >Automatic</option>
                     </select>
                  </div>
                  @error('transmission')
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
          <h2 class="text-2xl font-semibold">Update data</h2>
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