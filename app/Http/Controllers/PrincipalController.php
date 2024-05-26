<?php

namespace App\Http\Controllers;

use App\Models\Auxaparelho;
use App\Models\Termos;
use Dompdf\Dompdf; // Importa a classe Dompdf
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
    public function show(Termos $termos)
    {
        return view('show', ['termos' => $termos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Termos $termos)
    {

        $Allaparelhos = Auxaparelho::all();
        return view('edit', ['termos' => $termos, 'Allaparelhos' => $Allaparelhos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Novotermo = [
            'usuario' => $request->input('usuario'),
            'filial' => $request->input('filial'),
            'cpf' => $request->input('cpf'),
            'serie' => $request->input('serie'),
            'auxaparelho' => $request->input('auxaparelho'),
            'modelo' => $request->input('modelo')
        ];

        // Atualização de resultado

        Termos::where('id', $id)->update($Novotermo);

        return redirect()->route('index.termos')->with('success', 'Guia de recolhimento alterado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Termos $termos)
    {
        $termos->delete();

        return redirect()->route('index.termos')->with('danger', 'Excluido com sucesso.');
    }

    public function exibirPagina()
    {
        $Alltermos = Termos::all();
    
        return view('view_pdf', ['Alltermos' => $Alltermos]);
    }
    
    public function gerarPDF(Request $request)
    {
        $search = $request->input('search', ''); 

        $query = Termos::query();  // Faz uma busca no CADASTRO

        if (!empty($search)) {
            $query->where('name', 'LIKE', "%$search%");
        }

        $Alltermos = $query->get();

        // Utilize a classe Dompdf
        $dompdf = new Dompdf();
        
        // Carregue a view e passe os dados
        $html = view('view_pdf', compact('Alltermos'))->render();
        
        $dompdf->loadHtml($html);

        // (Opcional) Defina o tamanho do papel e a orientação
        $dompdf->setPaper('A4', 'portrait');

        // Renderize o HTML como PDF
        $dompdf->render();

        // Envie o PDF gerado para o navegador
        return $dompdf->stream('lista_de_dados.pdf', ["Attachment" => false]);
    }
}
