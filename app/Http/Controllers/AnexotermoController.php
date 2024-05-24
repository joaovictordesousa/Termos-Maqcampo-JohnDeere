<?php

namespace App\Http\Controllers;

use App\Models\Anexotermo;
use App\Models\Termos;
use Illuminate\Http\Request;

class AnexotermoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Termos $termos)
    {
        return view("termo_assinado", ['termos' => $termos,]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Anexotermo $anexotermo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anexotermo $anexotermo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anexotermo $anexotermo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anexotermo $anexotermo)
    {
        //
    }
}
