<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Status::all()->toResourceCollection();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Status::findOrFail($id)->toResource();
    }
}
