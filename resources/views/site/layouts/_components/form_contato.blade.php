{{ $slot }}
    
<form action="{{ route('site.contato') }}" method="POST">
    <!--CROSS-SITE REQUEST FORGERY ou FALSIFICAÇÃO DE SOLICITAÇÃO ENTRE SITES-->
    @csrf <!--TOKEN DE VALIDACAO DO BLADE-->
    <input type="text" placeholder="Nome" class="{{ $classe }}" name="nome">
    <br>
    <input type="text" placeholder="Telefone" class="{{ $classe }}" name="telefone">
    <br>
    <input type="text" placeholder="E-mail" class="{{ $classe }}" name="email">
    <br>
    <select class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea class="{{ $classe }}" name="mensagem">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
