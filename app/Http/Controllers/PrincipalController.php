<?php

namespace App\Http\Controllers;

use App\Models\Anexo;
use App\Models\Auxaparelho;
use App\Models\Termos;
use Dompdf\Dompdf; // Importa a classe Dompdf
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function __construct() 
    // {
    //     // $this->middleware('can:level')->only('index'); Bloquear uma view
    //     // $this->middleware('can:level')->only('index', 'create'); para colocar mais
    // }

    public function index()
    {
        $Allaparelhos = Auxaparelho::all();

        return view('dashboard', ['Allaparelhos' => $Allaparelhos]);
    }

    public function termos(Request $request)
    {
        $query = Termos::query();

        // Obtém os valores dos filtros do request
        $usuario = $request->input('usuario', '');
        $filial = $request->input('filial', '');
        $cpf = $request->input('cpf', '');
        $serie = $request->input('serie', '');
        $auxaparelho = $request->input('auxaparelho', '');
        $modelo = $request->input('modelo', '');

        // Aplica os filtros à query
        if (!empty($usuario)) {
            $query->whereRaw('lower(usuario) LIKE ?', ["%" . mb_strtolower($usuario, 'UTF-8') . "%"]);
        }
        if (!empty($filial)) {
            $query->whereRaw('lower(filial) LIKE ?', ["%" . mb_strtolower($filial, 'UTF-8') . "%"]);
        }
        if (!empty($cpf)) {
            $query->whereRaw('lower(cpf) LIKE ?', ["%" . mb_strtolower($cpf, 'UTF-8') . "%"]);
        }
        if (!empty($serie)) {
            $query->whereRaw('lower(serie) LIKE ?', ["%" . mb_strtolower($serie, 'UTF-8') . "%"]);
        }
        if (!empty($auxaparelho)) {
            $query->whereRaw('lower(auxaparelho) LIKE ?', ["%" . mb_strtolower($auxaparelho, 'UTF-8') . "%"]);
        }
        if (!empty($modelo)) {
            $query->whereRaw('lower(modelo) LIKE ?', ["%" . mb_strtolower($modelo, 'UTF-8') . "%"]);
        }

        $Alltermos = $query->orderBy('id', 'desc')->paginate(10);

        return view('termos', [
            'Alltermos' => $Alltermos,
            'usuario' => $usuario,
            'filial' => $filial,
            'cpf' => $cpf,
            'serie' => $serie,
            'auxaparelho' => $auxaparelho,
            'modelo' => $modelo,
        ]);

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
        // Validação dos dados
        $request->validate([
            'file' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
        ]);
    
        // Encontrar o registro
        $termo = Termos::findOrFail($id);
    
        // Atualizar outros campos
        $termo->usuario = $request->input('usuario');
        $termo->filial = $request->input('filial');
        $termo->cpf = $request->input('cpf');
        $termo->serie = $request->input('serie');
        $termo->auxaparelho = $request->input('auxaparelho');
        $termo->modelo = $request->input('modelo');
    
        // Processar e salvar o arquivo, se fornecido
        if ($request->hasFile('file')) {
            // Remove o arquivo antigo se existir
            if ($termo->anexo && Storage::exists($termo->anexo)) {
                Storage::delete($termo->anexo);
            }
    
            // Salvar o novo arquivo
            $filePath = $request->file('file')->store('termos', 'public');
            $termo->anexo = $filePath;
    
            // Atualizar a situação para "Anexada"
            $termo->situacao_termo_id = 1; // 1 corresponde à situação "Anexada"
        }
    
        // Salvar o registro atualizado
        $termo->save();
    
        return redirect()->route('index.termos')->with('success', 'Registro atualizado com sucesso.');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Termos $termos)
    {
        // Verificar se o registro tem um arquivo associado
        if ($termos->anexo) {
            $filePath = $termos->anexo;

            // Verificar se o arquivo existe antes de tentar excluir
            if (Storage::disk('public')->exists($filePath)) {
                // Excluir o arquivo do armazenamento público 
                Storage::disk('public')->delete($filePath);
            } else {
                // Log de erro ou mensagem de aviso se o arquivo não for encontrado
                \Log::warning("O arquivo $filePath não foi encontrado para exclusão.");
            }
        }

        // Excluir o registro da base de dados
        $termos->delete();

        // Redirecionar com mensagem de sucesso
        return redirect()->route('index.termos')->with('danger', 'Registro excluído com sucesso.');
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
