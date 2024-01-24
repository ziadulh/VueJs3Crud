<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\CreateData;
use Illuminate\Http\Request;

class CreateDataController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'test_text' => 'required | max: 50',
            'test_select' => 'required',
            'radio_option' => 'required'
        ]);
        CreateData::create([
            'test_text' => $request->test_text,
            'test_text_area' => $request->test_text_area,
            'test_select' => $request->test_select,
            'radio_option' => $request->radio_option,
            'test_check' => $request->test_check ? $request->test_check : 0
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(c $c)
    {
        //
    }
}
