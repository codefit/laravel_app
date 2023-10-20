@extends('frontend.layout')

@section('content')
    <section class="carousel">
        <div class="container">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img
                            src="https://www.mojelekarna.cz/uploads/media/1400x442/06/12016-Homepage_banner_desktop_1400x442_5%20%281%29.webp?v=1-0"
                            class="d-block w-100"
                            alt="https://www.mojelekarna.cz/uploads/media/1400x442/06/12016-Homepage_banner_desktop_1400x442_5%20%281%29.webp?v=1-0">
                    </div>
                    <div class="carousel-item">
                        <img
                            src="https://www.mojelekarna.cz/uploads/media/1400x442/06/12016-Homepage_banner_desktop_1400x442_5%20%281%29.webp?v=1-0"
                            class="d-block w-100"
                            alt="https://www.mojelekarna.cz/uploads/media/1400x442/06/12016-Homepage_banner_desktop_1400x442_5%20%281%29.webp?v=1-0">
                    </div>
                    <div class="carousel-item">
                        <img
                            src="https://www.mojelekarna.cz/uploads/media/1400x442/06/12016-Homepage_banner_desktop_1400x442_5%20%281%29.webp?v=1-0"
                            class="d-block w-100"
                            alt="https://www.mojelekarna.cz/uploads/media/1400x442/06/12016-Homepage_banner_desktop_1400x442_5%20%281%29.webp?v=1-0">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="advantages">
        <div class="container">
            <div class="advantages-list">
                @include('frontend.components.advantage')
            </div>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <div class="d-flex align-items-center position-relative">
                <h2 class="d-flex align-items-center mr-auto">
                    <strong>
                        <i class="bi bi-percent"></i>
                    </strong>
                    <span class="ml-3">Akční nabídka</span>
                </h2>
                <div class="arrows ml-auto">
                    <a class="nav-products-prev">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <a class="nav-products-next">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div class="products-list glider-products">
                @for($i = 1; $i < 20; $i++)
                    @include('frontend.components.product')
                @endfor
            </div>
        </div>
    </section>
@endsection
