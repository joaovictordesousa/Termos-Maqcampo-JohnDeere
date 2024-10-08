<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="icon" href="{{ asset('img/download.jpg') }}">
<head>
    <!-- Outros links -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    th {
        width: 10%;
    }

    .container_baixo {
        width: 10%;
    }

    .section .quantidade {
        width: 15%;
    }
    .section .descricao {
        width: 85%;
    }

    .div_descricao {
        margin: 0 10px 0 0;
    }

</style>

<title>Maqcampo | John Deere</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Termos') }}
        </h2>
    </x-slot>

    <div class="card shadow" id="container_show">
        
        <h1>Termo de Responsabilidade pela Guarda e Uso de Equipamentos</h1>
        
        <div class="section">
            <h2>1. Informações do colaborador</h2>
            <table>
                <tr>
                    <th>Nome Completo:</th>
                    <td>{{ $termos->usuario }}</td>
                </tr>
                <tr>
                    <th>CPF:</th>
                    <td>{{ $termos->cpf }}</td>
                </tr>
                <tr>
                    <th>Localidade:</th>
                    <td>{{ $termos->filial }}</td>
                </tr>
            </table>
        </div>
        
        <div class="section">
            <h2>2. Descrição do(s) equipamento(s) recebido(s):</h2>
            <table>
                <tr>
                    <th class="quantidade">Quantidade</th>
                    <th class="descricao">Descrição</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>{{$termos->Aparelho->aparelho}} <b class="div_descricao">Modelo:</b>{{ $termos->modelo }}</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Fonte (DELL) – IMPUT/ENTRADA: 100-240V</td>
                </tr>
            </table>
        </div>
        
        <div class="section">
            <h2>3. Declaração</h2>
            <p>Recebi da empresa MAQCAMPO SOLUÇÕES AGRÍCOLAS SA CNPJ: 00.970.771/0003-73 a título de empréstimo para meu uso exclusivo conforme determinado na lei os equipamentos especificados neste termo de responsabilidade no item 2 comprometendo-me a mantê-los em perfeito estado de conservação ficando ciente de que:</p>
            <ol>
                <li>Se o equipamento for alterado, danificado ou inutilizado por emprego inadequado, mau uso, negligência ou extravio, a empresa me fornecerá novo equipamento e cobrará o valor de um equipamento da mesma marca ou equivalente.</li>
                <li>Em caso de dano, inutilização ou extravio do equipamento, deverei comunicar imediatamente ao setor competente.</li>
                <li>Terminando os serviços ou no caso de rescisão do contrato de trabalho, devolverei o equipamento completo e em perfeito estado de conservação, considerando-se o tempo do uso do mesmo ao setor competente.</li>
                <li>Estou ciente de que não devo alterar o sistema operacional, bem como instalar softwares sem autorização do setor competente.</li>
                <li>Estando os equipamentos em minha posse, estarei sujeito a inspeções sem prévio aviso.</li>
            </ol>
        </div>
        
        <div class="section">
            <h2>4. Data e Assinaturas</h2>
            <div class="signature-section">
                <div class="signature">
                    <p>Data</p>
                    <div class="signature-line">Assinatura do Colaborador</div>
                </div>
                <div class="signature">
                    <p>Data</p>
                    <div class="signature-line">Assinatura do Gerente</div>
                </div>
            </div>
        </div>
    
        </div>
        <div class="container_voltar_tabela_show">
            <br><a class="btn btn-primary" href="{{ route('index.termos')}}" role="button" id="butão_voltar"><svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z" />
                </svg></a>

            <a href="#" class="btn btn-primary" id="btn">Gerar PDF</a>
        </div>
    </div>
    <br>
    <br>
    <br>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
