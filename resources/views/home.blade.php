@extends('layout/navbar')

@section("TituloPagina", "Home")

@section('contenido')
    <!-- Hero Background Wrapper -->
    <div class="hero-background">
        <!-- Sección Hero -->
        <section class="hero">
            <div>
                <h1 class="text-dark">Diseños Creativos Elegantes.</h1>
                <a href="#services" class="btn">Desplazar</a>
            </div>
        </section>
    </div>

    <!-- Sección de Servicios -->
    <section id="services" class="text-start py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h6 class="text-muted">01. PRODUCCIÓN DE VIDEO</h6>
                    <h3 class="font-weight-bold">Secuencias de video impresionantes e ideas innovadoras están aquí.</h3>
                    <p class="text-muted">Vivamus a ligula quam. Ut blandit eu leo non. Duis sed dolor amet ipsum primis in faucibus orci dolor sit et amet.</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h6 class="text-muted ">02. DISEÑO DE MARCA</h6>
                    <h3 class="font-weight-bold">El reflejo perfecto de tu marca, logrado por los mejores diseñadores.</h3>
                    <p class="text-muted">Vivamus a ligula quam. Ut blandit eu leo non. Duis sed dolor amet ipsum primis in faucibus orci dolor sit et amet.</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h6 class="text-muted">03. DISEÑO GRÁFICO</h6>
                    <h3 class="font-weight-bold">Creación de diseños gráficos impresionantes que cumplen con las necesidades de los clientes.</h3>
                    <p class="text-muted">Vivamus a ligula quam. Ut blandit eu leo non. Duis sed dolor amet ipsum primis in faucibus orci dolor sit et amet.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Gallery Section -->
    <section class="gallery py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="{{ asset('img/cafe.jpg') }}" alt="Cup Design" class="img-fluid rounded" style="height: 500px; width: 100%; object-fit: cover;">
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="{{ asset('img/piña.jpg') }}" alt="Pineapple Design" class="img-fluid rounded" style="height: 500px; width: 100%; object-fit: cover;">
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="{{ asset('img/zapatilla.jpg') }}" alt="Shoes Design" class="img-fluid rounded" style="height: 500px; width: 100%; object-fit: cover;">
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="{{ asset('img/auriculares.jpg') }}" alt="Headphones Design" class="img-fluid rounded" style="height: 500px; width: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>

@endsection
