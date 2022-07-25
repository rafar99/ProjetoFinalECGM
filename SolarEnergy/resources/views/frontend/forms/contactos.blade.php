@extends('layouts.main')

@section('title', 'SolarEnergy')
@section('imgcontacto', '/img/contacto.svg')
@section('imgfacebook', '/img/facebook.svg')
@section('imglinkedin', '/img/facebook.svg')

@section('content')
<div id="mapa">
    <iframe
        src="{{$mapa[0]->mapa}}"
        width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-6">
            <h3>Entre em contacto connosco!</h3>
            <div class="contactos-texto">
                @foreach ($contactos as $contacto)
                <p><img src="img/phone.svg" class="image-icone">{{$contacto->num_telefone}}</p>
                <p><img src="img/location.svg" class=" image-icone">{{$contacto->morada}}</p>
                <p><img src="img/email.svg" class=" image-icone">{{$contacto->email}}</p>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="formulario-contactos">
                <h4>Enviar mensagem</h4>
                <form action="/contactos" method="POST" class="form mt-5" name="Form">
                    @csrf
                    <div class="mb-3">
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="assunto" name="assunto" class="form-control" placeholder="Assunto">
                    </div>
                    <div class="mb-3">
                        <input type="email" id="email" name ="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="3"
                            placeholder="Mensagem"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success botao-form">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<hr class="divisor-rodape">
@endsection
