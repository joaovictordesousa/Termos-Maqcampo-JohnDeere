<?php

namespace App\Http\Controllers;

use App\Models\Auxaparelho;
use App\Models\Termos;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Allaparelhos = Auxaparelho::all();

        return view('dashboard', ['Allaparelhos' => $Allaparelhos]);
    }

    public function termos()
    {
        $Alltermos = Termos::all();

        return view('termos', ['Alltermos' => $Alltermos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $termos = new Termos();
        $termos->fill($request->all());
        $termos->save();

        return redirect()->route('dashboard')->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
