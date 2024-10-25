{{ $slot }}

<form action="{{ route('site.contato') }}" method="POST">
    <!--CROSS-SITE REQUEST FORGERY ou FALSIFICAÇÃO DE SOLICITAÇÃO ENTRE SITES-->
    @csrf <!--TOKEN DE VALIDACAO DO BLADE-->
    <input type="text" value="{{old('nome')}}" placeholder="Nome" class="{{ $classe }}" name="nome">
    <br>
    <input type="text" value="{{old('telefone')}}" placeholder="Telefone" class="{{ $classe }}" name="telefone">
    <br>
    <input type="text" value="{{old('email')}}" placeholder="E-mail" class="{{ $classe }}" name="email">
    <br>
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{$key}}" {{ (old('motivo_contato') == $key) ? 'selected' : ''}}>{{$motivo_contato}}</option>
        @endforeach
    </select>
    <br>
    <textarea class="{{ $classe }}" name="mensagem">{{ (old('mensagem') != '') ? old('mensagem') : "Preencha aqui a sua mensagem" }}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
