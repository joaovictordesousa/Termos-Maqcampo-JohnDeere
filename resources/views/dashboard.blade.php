<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Maqcampo | John Deere</title>
<link rel="stylesheet" href="{{ asset('css/style.css')}}">
<link rel="icon" href="{{ asset('img/download.jpg')}}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar termo') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success" id="alert_container">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function () {
                document.querySelector('.alert-success').style.display = 'none';
            }, {{ session('display_time', 3000) }});
        </script>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="row g-3" action="{{ route('index.store') }}" method="POST">
                        @csrf
                        <div class="col-md-4">
                            <label for="validationDefault01" class="form-label">Usuário</label>
                            <input type="text" class="form-control" name="usuario" id="campo" required>
                        </div>

                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Filial</label>
                            <input type="text" class="form-control" name="filial" id="campo" required>
                        </div>

                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">CPF</label>
                            <input type="text" onkeydown="load()" class="form-control" name="cpf" maxlength="11"
                                id="campo" required>
                        </div>

                        <div class="col-md-3">
                            <label for="validationDefault02" class="form-label">Numero de serie</label>
                            <input type="text" class="form-control" name="serie" id="campo" required>
                        </div>

                        <div class="col-md-3">
                            <label for="validationDefault04" class="form-label">Aparelho</label>
                            <select class="form-select" name="auxaparelho" id="campo" required>
                                <option selected disabled value="">Selecione...</option>
                                @foreach ($Allaparelhos as $aparelho)
                                    <option value="{{$aparelho->id }}">{{$aparelho->aparelho}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Modelo</label>
                            <input type="text" class="form-control" name="modelo" id="campo" required>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success" type="submit" id="button_salvar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-floppy" viewBox="0 0 16 16">
                                    <path d="M11 2H9v3h2z" />
                                    <path
                                        d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                </svg>
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>