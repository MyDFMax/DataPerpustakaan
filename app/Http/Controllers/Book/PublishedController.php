<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StorePublishedRequest;
use App\Http\Requests\Book\UpdatePublishedRequest;
use App\Models\Published;

class PublishedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublishedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Published $published)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Published $published)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublishedRequest $request, Published $published)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Published $published)
    {
        //
    }
}
