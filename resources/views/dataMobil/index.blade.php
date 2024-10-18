@extends('layouts.sidebar')

@section('title')

   Mobil

@endsection

@section('content')

   <div class="flex justify-end items-center">
      <a href="{{ route('cars.create') }}" class="bg-green-600 hover:bg-green-800 transition-all duration-150 py-2 px-3 my-5 rounded-md shadow-lg border border-white border-opacity-50"">Tambah Baru</a>
   </div>

   

   <div class="w-full h-full rounded-md overflow-y-auto bg-[#1e1e1e] p-5 shadow-md border-white border-opacity-20">
    @if (Session::get('success'))
      <div class="bg-green-700 p-5 rounded my-3">{{ Session::get('success') }}</div>
    @endif  
    <table class="table-auto w-full text-left">
        <thead>
          <tr class="bg-[#111111] text-white">
            <th class="p-3 rounded-md border border-[#373737]">No</th>
            <th class="p-3 rounded-md border border-[#373737]">Brand</th>
            <th class="p-3 rounded-md border border-[#373737]">From</th>
            <th class="p-3 rounded-md border border-[#373737]">Model</th>
            <th class="p-3 rounded-md border border-[#373737]">Color</th>
            <th class="p-3 rounded-md border border-[#373737]">transmission</th>
            <th class="p-3 rounded-md border border-[#373737]">Years</th>
            <th class="p-3 rounded-md border border-[#373737]">Action</th>
          </tr>
        </thead>
        <tbody>

          @if (count($cars) == 0)
            <tr>
              <td colspan="8" class="bg-[#111111] rounded-md p-4 text-center text-white border border-[#373737]">Data Mobil Kosong!</td>
            </tr>
          @endif
        
           @foreach ($cars as $index => $car)
           <tr>
             <td class="border border-[#373737] p-3">{{ $index + 1 }}</td>
             <td class="border border-[#373737] p-3">{{ $car['brand'] }}</td>
             <td class="border border-[#373737] p-3">{{ $car['from'] }}</td>
             <td class="border border-[#373737] p-3">{{ $car['model'] }}</td>
             <td class="border border-[#373737] p-3">{{ $car['color'] }}</td>
             <td class="border border-[#373737] p-3">{{ $car['transmission'] }}</td>
             <td class="border border-[#373737] p-3">{{ $car['years'] }}</td>
             <td class="border border-[#373737] p-3 gap-3 flex justify-center items-center h-full">
              <a href="{{ route('cars.edit', $car->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800 transition-all duration-100">
                <i class="ph ph-pencil-simple-line text-xl"></i> 
                Edit
              </a>
               <button class= "bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800 transition-all duration-100" onclick="showModalDeleteMobil('{{ $car->id }}', '{{ $car->brand }}')">
                <i class="ph ph-trash-simple text-xl"></i>
                Delete</button>
             </td>
           </tr>
         @endforeach

        </tbody>
      </table>
    </div>

    <!-- Modal -->
    <div id="myModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-70 backdrop-blur-sm hidden">
      <form action="" method="POST" class="mt-4" id="formDelete">
        @csrf
        @method('DELETE')

        <div class="bg-[#373737] text-white p-8 rounded-lg shadow-lg w-[100%]">
          <!-- Modal Header -->
          <div class="flex justify-between items-center border-b pb-2">
            <h2 class="text-2xl font-semibold">Hapus Data Mobil</h2>
          </div>
            <!-- Modal Body -->
                <div class="mt-5">
                  Apakah anda yakin ingin menghapus seluruh data Mobil dengan Brand : 
                  <b id="nama_user" class=" text-lg"></b>
                  ini ?
                </div>
              <!-- Modal Footer -->
              <div class="mt-6 text-right">
                <a id="closeModalFooter" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600 transition-all duration-100" onclick="closeModal()" style="cursor: pointer"><i class="ph ph-x"></i> Close</a>
                <button type="submit" class="bg-blue-500  px-4 py-2 rounded hover:bg-blue-600 ransition-all duration-100"><i class="ph ph-trash"></i> Delete</button>               
              </div>
          </div>
      </form>
    </div>
    
    @push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
      function showModalDeleteMobil(id, brand) {
        $('#myModal').removeClass('hidden');
        $('#myModal').addClass('flex');
        $('#nama_user').text(brand);

        let url = "{{ route('cars.delete', ':id') }}";

        url = url.replace(':id', id);
        $('#formDelete').attr('action', url);
      }

      function closeModal() {
        $('#myModal').addClass('hidden');
      }
    </script>
  @endpush

@endsection