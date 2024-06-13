<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Maqcampo | John Deere</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Termos assinados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="row g-3" action="{{ route('anexos.store') }}"  method="POST">
                        @csrf         

                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Anexar arquivo:</label>
                            <input type="file" class="form-control" name="arquivo" id="arquivo" required>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Conteúdo do Arquivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Allarquivos as $arquivos)
                                <tr>
                                    <td>{{ $arquivos->arquivo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    function load() {
    let inout = document.getElementById('formatcpf');
    let inputValue = input.value.replace(/\d/g, "");
    let formattedValue = "";

    if (inputValue.length === 11) {
        formattedValue = inputValue.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    } else if (inputValue.length == 14) {
        formattedValue = inputValue.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-%5");
    } else {
        formattedValue = inputValue;
    }

    input.value = formattedValue;

}
</script>
