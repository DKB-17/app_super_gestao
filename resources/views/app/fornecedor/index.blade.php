<h3>fornecedor</h3>

{{-- Fica o comentario que sera descartado pelo interpretador do blade --}}

@php
    // Para comentarios de uma linha
    /*
        Para comentarios de multiplas linhas
    */

@endphp

{{--@dd($fornecedores)--}}
{{--
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Exitem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem varios fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif
--}}

{{--
Fornecedores : {{$fornecedores[0]['nome']}}
</br>
Status : {{$fornecedores[0]['status']}}
</br>

@if(!($fornecedores[0]['status'] == 'S'))
    Fornecedor inativo
@endif

</br>
@unless($fornecedores[0]['status'] == 'S') <!-- Se o retorna da condição for false -->
    Fornecedor inativo
@endunless
--}}

{{--
@isset($fornecedores)
    Fornecedores : {{$fornecedores[0]['nome']}}
    </br>
    Status : {{$fornecedores[0]['status']}}
    </br>
    CNPJ : {{$fornecedores[0]['cnpj']}}

    </br>
    
    Fornecedores : {{$fornecedores[1]['nome']}}
    </br>
    Status : {{$fornecedores[1]['status']}}
    </br>
    @isset($fornecedores[1]['cnpj'])
        CNPJ : {{$fornecedores[1]['cnpj']}}
    @endisset

    </br>
    
    Fornecedores : {{$fornecedores[2]['nome']}}
    </br>
    Status : {{$fornecedores[2]['status']}}
    </br>
    @isset($fornecedores[2]['cnpj'])
        CNPJ : {{$fornecedores[2]['cnpj']}}
    @endisset

@endisset
--}}

{{--
    valores empty ou null ou vazios
    -''
    -0
    -0.0
    -"0"
    -null
    -false
    -array()
    -$var  sem ter declarado valor a ela
--}}


{{--
@isset($fornecedores)
    Fornecedores : {{$fornecedores[0]['nome']}}
    </br>
    Status : {{$fornecedores[0]['status']}}
    </br>
    CNPJ : {{$fornecedores[2]['cnpj'] ?? 'Dado nao informado'}}

    <!--
        $variavel testada nao estiver definida (isset)
        ou 
        $variavel testada possuir o valor null
    -->

    </br>
    
    Fornecedores : {{$fornecedores[1]['nome']}}
    </br>
    Status : {{$fornecedores[1]['status']}}
    </br>
    @isset($fornecedores[1]['cnpj'])
        CNPJ : {{$fornecedores[1]['cnpj']}}
        @empty($fornecedores[1]['cnpj'])
            -Vazio
        @endempty
    @endisset

    </br>
    
    Fornecedores : {{$fornecedores[2]['nome']}}
    </br>
    Status : {{$fornecedores[2]['status']}}
    </br>
    @isset($fornecedores[2]['cnpj'])
        CNPJ : {{$fornecedores[2]['cnpj']}}
    @endisset

@endisset

--}}

{{--
@isset($fornecedores)
    @foreach($fornecedores as $indice => $fornecedor)
        Fornecedores : {{$fornecedor['nome']}}
        </br>
         Status : {{$fornecedor['status']}}
        </br>
        CNPJ : {{$fornecedor['cnpj'] ?? 'Dado nao informado'}}
        </br>
        Telefone : {{$fornecedor['ddd'] ?? ''}} {{$fornecedor['telefone']??''}}
        </br>
        @switch($fornecedor['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @case('85')
                Fortaleza - case
                @break
            @default
                Estado nao identificado
        @endswitch
        <hr>
    @endforeach   
@endisset
--}}

{{--
@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        Fornecedores : {{$fornecedor['nome']}}
        </br>
         Status : {{$fornecedor['status']}}
        </br>
        CNPJ : {{$fornecedor['cnpj'] ?? 'Dado nao informado'}}
        </br>
        Telefone : {{$fornecedor['ddd'] ?? ''}} {{$fornecedor['telefone']??''}}
        </br>
        @switch($fornecedor['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @case('85')
                Fortaleza - case
                @break
            @default
                Estado nao identificado
        @endswitch
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse   
@endisset
--}}

<!--@{{Escapa da tag de impressao do blade}}-->

@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        Iteração atual: {{ $loop->iteration}}
        <br>
        Fornecedores : {{$fornecedor['nome']}}
        <br>
         Status : {{$fornecedor['status']}}
        <br>
        CNPJ : {{$fornecedor['cnpj'] ?? 'Dado nao informado'}}
        <br>
        Telefone : {{$fornecedor['ddd'] ?? ''}} {{$fornecedor['telefone']??''}}
        <br>
        @if($loop->first)
            Primeira iteracao do loop
            <br>
        @endif
        @if($loop->last)
            Ultima iteracao do loop
            Total de registros: {{$loop->count}}
            <br>
        @endif
        
        @switch($fornecedor['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @case('85')
                Fortaleza - case
                @break
            @default
                Estado nao identificado
        @endswitch
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse   
@endisset