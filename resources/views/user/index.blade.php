@extends('layouts.sidebar')

@section('title')

   Account

@endsection

@section('content')

  <div class="flex justify-between items-center mb-5">
   
       <form action="{{ route('users.index') }}">
         <input type="text" name="search_user" placeholder="Cari user..." class="bg-[#111111] py-2 px-3 my-5 rounded-md shadow-lg border border-white bg-opacity-60 backdrop-blur-sm border-opacity-50">
         <button type="submit" class="bg-blue-600 hover:bg-blue-800 transition-all duration-150 py-2 px-3 my-5 rounded-md shadow-lg border border-white border-opacity-50">Cari</button>
       </form>
    <div class="flex justify-end items-center">
       <a href="{{ route('users.create') }}" class="bg-green-600 hover:bg-green-800 transition-all duration-150 py-2 px-3 my-5 rounded-md shadow-lg border border-white border-opacity-50">Tambah Baru</a>
    </div>
  </div>

   <div class="w-full h-full rounded-md overflow-y-auto bg-[#1e1e1e] p-5 shadow-md border-white border-opacity-20">
    @if (Session::get('success'))
      <div class="bg-green-700 p-5 rounded my-3">{{ Session::get('success') }}</div>
    @endif
    
      <table class="table-auto w-full text-left border border-white border-opacity-20">
        <thead>
          <tr class="bg-[#111111] text-white text-center">
            <th class="p-3 rounded-md border border-[#373737] ">No</th>
            <th class="p-3 rounded-md border border-[#373737]">Nama</th>
            <th class="p-3 rounded-md border border-[#373737]">Email</th>
            <th class="p-3 rounded-md border border-[#373737]">Role</th>
            <th class="p-3 rounded-md border border-[#373737]">Action</th>
            <th class="p-3 rounded-md border border-[#373737]">Last Update</th>
          </tr>
        </thead>
        <tbody>
           @if (count($users) == 0)   
             <tr>
               <td colspan="6" class="bg-[#111111] rounded-md p-4 text-center text-white border border-[#373737]">Data user Kosong!</td>
             </tr>
           @endif

          @foreach ($users as $index => $user)
            <tr>
              <td class="border border-[#373737] p-3 text-center">
                {{ ($users->currentPage()-1) * ($users->perPage()) + ($index + 1) }}
              </td>
              <td class="border border-[#373737] p-3"> {{ $user['name'] }} </td>
              <td class="border border-[#373737] p-3"> {{ $user['email'] }} </td>
              <td class="border border-[#373737] p-3"> {{ $user['role'] }} </td>

              <td class="border border-[#373737] p-3 gap-3 flex justify-center items-center h-full">
                <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800 transition-all duration-100">
                  <i class="ph ph-pencil-simple-line text-xl"></i> 
                  Edit
                </a>
                <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800 transition-all duration-100" onclick="showModalDelete('{{ $user->id }}', '{{ $user->email }}')">
                  <i class="ph ph-trash-simple text-xl"></i>
                   Delete
                </button>
              </td>
              <td class="border border-[#373737] p-3 text-center">{{ $user->updated_at->diffForHumans() }}</td>
            </tr>
          @endforeach

        </tbody>
      </table>
      <div class="flex justify-end items-end my-5 text-black gap-5">
        {{ $users->links() }}
      </div>
    </div>
    
    <!-- Modal -->
    <div id="myModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-70 backdrop-blur-sm hidden">
      <form action="" method="POST" class="mt-4" id="formDelete">
        @csrf
        @method('DELETE')

        <div class="bg-[#373737] text-white p-8 rounded-lg shadow-lg w-[100%]">
          <!-- Modal Header -->
          <div class="flex justify-between items-center border-b pb-2">
            <h2 class="text-2xl font-semibold">Hapus Akun</h2>
          </div>
            <!-- Modal Body -->
                <div class="mt-5">
                  Apakah anda yakin ingin menghapus data : 
                  <b id="nama_user" class=" text-lg"></b>
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
        function showModalDelete(id, email) {
          $('#myModal').removeClass('hidden');
          $('#myModal').addClass('flex');
          $('#nama_user').text(email);

          let url = "{{ route('users.delete', ':id') }}";

          url = url.replace(':id', id);
          $('#formDelete').attr('action', url);
        }

        function closeModal() {
          $('#myModal').addClass('hidden');
        }
      </script>
    @endpush

@endsection