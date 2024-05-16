<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

 <title>Maqcampo | John Deere</title>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Termos') }}
        </h2>
    </x-slot>

    <div class="card shadow" id="container_show">
    <div class="card-body text-center shadow">
        <h4 class="card-title ">Vencimentos</h4><br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table" id="show_show">
                        <tbody>
                            <tr>
                                <th><b>Nome do usuario:</b></th>
                                <td>{{ $termos->usuario }}</td>
                                
                            </tr>
                            <tr>
                                <th><b>Filial:</b></th>
                                <td>{{ $termos->filial }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container_voltar_tabela_show">
            <br><a class="btn btn-primary" href="{{ route('index.termos')}}" role="button"><img src="{{ asset('img/voltar.png')}}" class="img_voltar" alt="img"></a>
        </div>
    </div>
</div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
