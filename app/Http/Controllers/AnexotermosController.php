<?php

namespace App\Http\Controllers;

use App\Models\Anexotermos;
use App\Models\Termos;
use Illuminate\Http\Request;

class AnexotermosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Allarquivos = Anexotermos::all();


        return view('termo_assinado', [ 'Allarquivos' => $Allarquivos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('termo_assinado');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $anexotermos = new Anexotermos();
        $anexotermos->fill($request->all());
        $anexotermos->save();

        return redirect()->route('index.termos')->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $arquivo = AnexotermosController::findOrFail($id);
        $conteudo = file_get_contents(storage_path('app/' . $arquivo->arquivo));
        return view('anexos.show', compact('arquivo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anexotermos $anexotermos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anexotermos $Anexotermos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anexotermos $Anexotermos)
    {
        //
    }
}
