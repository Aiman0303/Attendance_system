<?php

namespace App\Http\Controllers;

use App\Models\Schoolclass;
use Illuminate\Http\Request;

class SchoolclassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Schoolclass::all();
        return view('index', compact('data'));
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
        Schoolclass::create([
            'Classes' => $request->class
        ]);
        return redirect()->route('class.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schoolclass $schoolclass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schoolclass $schoolclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schoolclass $schoolclass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schoolclass $schoolclass)
    {
        //
    }
}
