<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="icon" href="{{ asset('img/download.jpg')}}">

<style>
    .teste {
        color: dodgerblue;
    }

    .acoes {
        width: 15px;
    }
</style>

<title>Maqcampo | John Deere</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Termos') }}
        </h2>
    </x-slot>
    <!-- -----------------ALERTAR-------------------------------------------------- -->
    @if (session('danger'))
        <div class="alert alert-danger" id="alert_container">
            {{ session('danger') }}
        </div>
        <script>
            setTimeout(function () {
                document.querySelector('.alert-danger').style.display = 'none';
            }, {{ session('display_time', 3000) }});
        </script>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning" id="alert_container">
            {{ session('warning') }}
        </div>
        <script>
            setTimeout(function () {
                document.querySelector('.alert-warning').style.display = 'none';
            }, {{ session('display_time', 3000) }});
        </script>
    @endif
    <!-- -----------------ALERTAR-------------------------------------------------- -->
    <div class="container_pesquisa">
        <form class="row g-3" method="GET" action="{{ url('termos') }}" id="formulario_filtro">
            <h1 class="titulo_pesquisa"><b>Pesquisar</b></h1>
            <hr>
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" id="campo_pesquisa"
                    value="{{ request('usuario') }}">
            </div>

            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Filial</label>
                <input type="text" class="form-control" name="filial" id="campo_pesquisa"
                    value="{{ request('filial') }}">
            </div>

            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf" id="campo_pesquisa" value="{{ request('cpf') }}">
            </div>
            <br>
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Serie</label>
                <input type="text" class="form-control" name="serie" id="campo_pesquisa" value="{{ request('serie') }}">
            </div>

            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" id="campo_pesquisa"
                    value="{{ request('modelo') }}">
            </div>

            <div class="container_butoes_filtro">
                <button type="submit" class="btn btn-success">Filtrar</button>
                <a href="{{ route('index.termos') }}" class="btn btn-danger" id="btn">Cancelar pesquisa</a>
            </div>
            <br>
        </form>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Filial</th>
                                <th>CPF</th>
                                <th>Aparelho</th>
                                <th>Modelo</th>
                                <th>Status</th>
                                <th class="acoes">Editar</th>
                                <th class="acoes">Visualizar</th>
                                @can('level')
                                    <th class="acoes">Excluir</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($Alltermos as $termos)
                                <tr>
                                    <td>{{ $termos->usuario }}</td>
                                    <td>{{ $termos->filial }}</td>
                                    <td>{{ $termos->cpf }}</td>
                                    <td>{{ $termos->Aparelho->aparelho }}</td>
                                    <td>{{ $termos->modelo }}</td>
                                    <td class="teste"><b>{{ $termos->situacaoTermo->name  }}</b></td>
                                    <td><a class="btn btn-warning" href="{{ route('index.edit', ['termos' => $termos])}}"
                                            role="button">Editar</a></td>
                                    <td><a class="btn btn-primary"
                                            href="{{ route('index.show', ['termos' => $termos->id]) }}"
                                            role="button">Imprimir</a></td>
                                    @can('level')
                                        <td>
                                            <form action="{{ route('index.destroy', ['termos' => $termos->id]) }}" method="POST"
                                                onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $Alltermos->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>