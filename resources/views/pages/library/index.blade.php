<x-app-layout>
  <x-slot name="header">
    <h2 class="fs-2 font-semibold text-xl text-gray-800 leading-tight">
      {{ __('pages/library.header') }}
    </h2>
  </x-slot>
  
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
        <div class="container p-1">
          <div class="row align-items-center pt-2 pb-4">
            <div class="col">
              <h2 class="fs-4 fw-bold">{{ __('pages/library.list_books') }}</h2>
            </div>
            <div class="col text-end">
              <a class="btn btn-info" href="{{ route('book.create') }}">Buat buku</a>
            </div>
          </div>
{{--          <table class="table table-bordered table-responsive">--}}
{{--            <thead class="text-center">--}}
{{--            <tr>--}}
{{--              <th scope="col">ID</th>--}}
{{--              <th scope="col">Nama buku</th>--}}
{{--              <th scope="col">Penerbit</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @php--}}
{{--              $counter = 0--}}
{{--            @endphp--}}
{{--            @if($datas != null)--}}
{{--              @foreach ($datas as $data)--}}
{{--                @php--}}
{{--                  $counter ++--}}
{{--                @endphp--}}
{{--                <tr>--}}
{{--                  <th scope="row" class="text-center">--}}
{{--                    <a href="{{ route('book.show',$data['uuid']) }}">--}}
{{--                      <p>--}}
{{--                        {{ $counter }}--}}
{{--                      </p>--}}
{{--                    </a>--}}
{{--                  </th>--}}
{{--                  <td>--}}
{{--                    <p>--}}
{{--                      {{ $data['nama_buku'] }}--}}
{{--                    </p>--}}
{{--                  </td>--}}
{{--                  <td>--}}
{{--                    <p>--}}
{{--                      {{ $data['penerbit'] }}--}}
{{--                    </p>--}}
{{--                  </td>--}}
{{--                </tr>--}}
{{--              @endforeach--}}
{{--            @else--}}
{{--              <tr>--}}
{{--                <td colspan="3" class="text-center">--}}
{{--                  <p>--}}
{{--                    {{ __('pages/library.book_not_fond') }}--}}
{{--                  </p>--}}
{{--                </td>--}}
{{--              </tr>--}}
{{--            @endif--}}
{{--            </tbody>--}}
{{--          </table>--}}
          {{ $dataTable->table() }}
        </div>
      </div>
    </div>
  </div>
  
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
</x-app-layout>
