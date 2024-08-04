<?php

namespace App\DataTables;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\SearchPane;
use Yajra\DataTables\Services\DataTable;

class BooksDataTable extends DataTable
{
  /**
   * Build the DataTable class.
   *
   * @param QueryBuilder $query Results from query() method.
   */
  public function dataTable(QueryBuilder $query): EloquentDataTable
  {
    return (new EloquentDataTable($query))
      ->addColumn('no', function () {
        $counter = 1;
        return $counter++;
      })
      ->addColumn('published', function (Book $book) {
        return $book->published->name;
      })
      ->addColumn('action', function (Book $book) {
        return view('components.datatable.books.action', compact('book'));
      })
      ->setRowId('id');
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(Book $model): QueryBuilder
  {
    return $model->newQuery()->with('published');
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('books-table')
      ->searchPanes(SearchPane::make())
      ->columns($this->getColumns())
      ->minifiedAjax()
      ->dom('<"wrapper"<"row align-items-center"<"col"l><"col text-end"f>rtip>>')
      ->orderBy(1);
  }

  /**
   * Get the dataTable columns definition.
   */
  public function getColumns(): array
  {
    return [
      Column::make('no')
        ->title('NO')
        ->searchable(false)
        ->orderable(false),
      Column::make('name')
        ->title('NAMA BUKU'),
      Column::make('description')
        ->title('DESKRIPSI'),
      Column::make('author')
        ->title('PENULIS'),
      Column::make('published')
        ->title('PENERBIT'),
      Column::computed('action')
        ->exportable(false)
        ->printable(false)
        ->width(60)
        ->addClass('text-center')
        ->title(''),
    ];
  }

  /**
   * Get the filename for export.
   */
  protected function filename(): string
  {
    return 'Books_' . date('YmdHis');
  }
}
