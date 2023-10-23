@extends('frontend.layout')

@section('content')
    <section class="carousel">
        <div class="container">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img
                            src="https://www.mojelekarna.cz/uploads/media/1400x442/04/12004-G9032_GS%20banner%20Sanovia_z%C3%A1%C5%99%C3%AD2023.webp?v=1-0"
                            class="d-block w-100"
                            alt="https://www.mojelekarna.cz/uploads/media/1400x442/04/12004-G9032_GS%20banner%20Sanovia_z%C3%A1%C5%99%C3%AD2023.webp?v=1-0">
                    </div>
                    <div class="carousel-item">
                        <img
                            src="https://www.mojelekarna.cz/uploads/media/1400x442/04/12004-G9032_GS%20banner%20Sanovia_z%C3%A1%C5%99%C3%AD2023.webp?v=1-0"
                            class="d-block w-100"
                            alt="https://www.mojelekarna.cz/uploads/media/1400x442/04/12004-G9032_GS%20banner%20Sanovia_z%C3%A1%C5%99%C3%AD2023.webp?v=1-0">
                    </div>
                    <div class="carousel-item">
                        <img
                            src="https://www.mojelekarna.cz/uploads/media/1400x442/04/12004-G9032_GS%20banner%20Sanovia_z%C3%A1%C5%99%C3%AD2023.webp?v=1-0"
                            class="d-block w-100"
                            alt="https://www.mojelekarna.cz/uploads/media/1400x442/04/12004-G9032_GS%20banner%20Sanovia_z%C3%A1%C5%99%C3%AD2023.webp?v=1-0">
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

    <section class="products ">
        <div class="container">
            <div class="d-flex align-items-center position-relative">
                <h2 class="d-flex align-items-center mr-auto">
                    <strong class="bg-red">
                        <i class="bi bi-bookmark-fill"></i>
                    </strong>
                    <span class="ml-3">Akční nabídka</span>
                </h2>
                <div class="arrows ml-auto">
                    <a class="products-prev-1">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <a class="products-next-1">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div class="products-list glider-products glider-products-1">
                @for($i = 1; $i < 20; $i++)
                    @include('frontend.components.product')
                @endfor
            </div>
        </div>
    </section>

    <section class="products mt-30">
        <div class="container">
            <div class="d-flex align-items-center position-relative">
                <h2 class="d-flex align-items-center mr-auto">
                    <strong class="bg-green">
                        <i class="bi bi-heart-fill"></i>
                    </strong>
                    <span class="ml-3">Doporučené produkty</span>
                </h2>
                <div class="arrows ml-auto">
                    <a class="products-prev-2">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <a class="products-next-2">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div class="products-list glider-products glider-products-2">
                @for($i = 1; $i < 20; $i++)
                    @include('frontend.components.product')
                @endfor
            </div>
        </div>
    </section>
@endsection
