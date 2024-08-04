<?php

namespace App\Http\Controllers\Book;

use App\DataTables\BooksDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{


  /**
   * Display a listing of the resource.
   */
  public function borrow(BooksDataTable $dataTable)
  {
//    // Get the currently logged-in user's ID
//    $user_id = Auth::user()->id;
//
//    // Get all the books borrowed by the user
//    $datas = User::find($user_id)->pinjams;

    // Return the library page view with library data borrowed
    return $dataTable->render('pages.library.index');
  }

  /**
   * Display a listing of the resource.
   */
  public function index(BooksDataTable $dataTable)
  {
//    // Get the currently logged-in user's ID
//    $user_id = Auth::user()->id;
//
//    // Get all the books borrowed by the user
//    $datas = User::find($user_id)->pinjams;

    // Return the library page view with library data borrowed
    return $dataTable->render('pages.library.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    // Return the form view to create a new library
    return view('pages.library.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreBookRequest $request)
  {
    // Validate the input data
    $request->validate([
      'nama_buku' => 'required',
      'penerbit' => 'required',
    ]);

    // Try to create a new library
    try {
      Book::create([
        'nama_buku' => $request->nama_buku,
        'penerbit' => $request->penerbit,
        'user_id' => Auth::user()->uuid,
      ]);

      // Redirect back to the library page with a success message
      return redirect()->route('library.index')->with('success', 'Store created successfully');
    } catch (\Throwable $e) {
      // Log error message if failed to create a library
      Log::error($e->getMessage());

      // Redirect back to the library page with an error message
      return redirect()->route('library.index')->with('error', 'Store created fail');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    // Get library data with connected user information
    $data = Book::with('user')->find($id);

    // Return the library page view with library data
    return view('pages.library.show')->with('data', $data);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    // Find a library based on the id
    $data = Book::findOrFail($id);

    // Return the form view edit with the library data
    return view('pages.library.edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateBookRequest $request, string $id)
  {
    // Validate the input data
    $request->validate([
      'nama_buku' => 'required',
      'penerbit' => 'required',
    ]);

    // Try to update the library
    try {
      // Find a library based on the id
      $buku = Book::findOrFail($id);

      // Update the library name and publisher
      $buku->nama_buku = $request->nama_buku;
      $buku->penerbit = $request->penerbit;

      // Save the changes
      $buku->save();

      // Redirect back to the library page with a success message
      return redirect()->route('library.index')->with('success', 'Resource updated successfully');
    } catch (\Throwable $e) {
      // Log error message if failed to update library
      Log::error($e->getMessage());

      // Redirect back to the library page with an error message
      return redirect()->route('library.index')->with('error', 'Store created fail');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // Try to delete the library
    try {
      // Find a library based on the id
      $buku = Book::findOrFail($id);

      // Delete the library
      $buku->delete();

      // Redirect back to the library page with a success message
      return redirect()->route('library.index')->with('success', 'Resource deleted successfully');
    } catch (\Throwable $e) {
      // Log error message if failed to delete library
      Log::error($e->getMessage());

      // Go back to the previous page with an error message
      return back()->withErrors(['error' => 'Resource deleted fail!']);
    }
  }
}
