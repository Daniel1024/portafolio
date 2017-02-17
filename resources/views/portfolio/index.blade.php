<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Portafolio</title>
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
</head>
<body>
<div id="message" class="alert alert-success" role="alert" style="position: fixed; width: 100%; text-align: center; display:none;">
    <strong>Mensaje enviado correctamente.</strong> Pronto me comunicare con usted.
</div>
<header>
    <div class="contendor">
        <nav class="menu">
            <a href="#" id="btn-acerca-de">Acerca de</a>
            <a href="#" id="btn-trabajos">Trabajos</a>
            <a href="#" id="btn-contacto">Contacto</a>
        </nav>
        <div class="contenedor-texto">
            <div class="texto">
                <h1 class="nombre">Daniel López</h1>
                <h2 class="profesion">Desarrollador Web</h2>
            </div>
        </div>
    </div>
</header>
<section class="main">
    <section id="acerca-de" class="acerca-de">
        <div class="contenedor">
            <div class="foto">
                <img src="{{ $avatar }}" alt="Daniel López">
            </div>
            <div class="texto">
                <h3 class="titulo">Acerca de</h3>
                <p>Lorem ipsum dolor sit amet, <span class="bold">consectetur adipisicing</span> elit. Necessitatibus reiciendis ullam aut sint ex exercitationem deserunt ipsam perferendis quos, eius labore quia accusantium repellendus <span class="bold">dolor autem</span> consequatur et earum! In!</p>
            </div>
        </div>
    </section>
    <section id="trabajos" class="trabajos">
        <div class="contenedor">
            <h3 class="titulo">Trabajos</h3>
            <div class="contenedor-trabajos">
                @foreach($portfolios as $portfolio)
                <a href="{{ $portfolio['url'] }}" class="trabajo">
                    <div class="thumb">
                        <img src="{{ $portfolio['img'] }}" alt="{{ $portfolio['imgDescription'] }}">
                    </div>
                    <div class="descripcion">
                        <p class="nombre">{{ $portfolio['title'] }}</p>
                        <p class="categoria">{{ $portfolio['tags'] }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</section>

<footer>
    <section class="contacto">
        <div class="contenedor">
            <h3 id="contacto" class="titulo">Contacto</h3>
            {!! Form::open(['route' => 'portfolio.store', 'method' => 'POST', 'class' => 'formulario']) !!}
                {!! Field::text('nombre', old('nombre'), ['ph' => 'Nombre', 'required' => true]) !!}
                {!! Field::email('correo', old('correo'), ['ph' => 'Correo', 'required' => true]) !!}
                {!! Field::textarea('mensaje', old('mensaje'), ['ph' => 'Mensaje:', 'required' => true]) !!}
                <button class="boton" type="submit">Enviar</button>
            {!! Form::close() !!}
        </div>
    </section>
    <section class="redes-sociales">
        <div class="contenedor">
            <a href="https://twitter.com/Daniel1530" target="_blank" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/DaNiEl1024" target="_blank" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/user/Lopezcanzonqwe" target="_blank" class="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="https://github.com/Daniel1024" target="_blank" class="github"><i class="fa fa-github" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/daniel102421/" target="_blank" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
    </section>
</footer>
<script src="{{ asset(mix('js/app.js')) }}"></script>
<script>
    $(function () {
        let errors = {{ $errors->count() }};
        if ( errors > 0) {
            $('html, body').animate({
                scrollTop: $('#contacto').offset().top
            }, 500);
        }
        @if(session()->has('message'))
            $('#message').slideDown('slow').delay(5000).slideUp('slow');
        @endif
    });
</script>
</body>
</html>
