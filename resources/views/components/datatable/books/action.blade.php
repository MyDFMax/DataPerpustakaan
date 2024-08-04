<div class='btn-group'>
  @can('borrow book')
    <a href="{{ route('book.borrow', $book->id) }}" class='btn btn-secondary'>
      <i class="bi bi-file-earmark-arrow-down"></i>
    </a>
  @endcan
  <a href="{{ route('book.show', $book->id) }}" class='btn btn-secondary'>
    <i class="bi bi-eye"></i>
  </a>
  @hasrole('publisher')
  @if(Auth::user()->id == $book->published)
    @can('edit owen book')
      <a href="{{ route('book.edit', $book->id) }}" class='btn btn-'>
        <i class="bi bi-pencil-square"></i>
      </a>
    @endcan
    @can('delete owen book')
      <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBook">
        <i class="bi bi-trash"></i>
      </a>
    @endcan
    
    @can('delete owen book')
      <div class="modal fade" id="deleteBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Buku {{ $book->name }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-center">Apa anda yakin akan menghapus buku ini?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form method="post" action="{{ route('book.destroy',$book->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Yakin</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endcan
    @endhasrole
  @endif
</div>
