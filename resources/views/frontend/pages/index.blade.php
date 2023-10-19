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
                <div class="advantage d-flex align-items-center">
                    <div class="image">
                        <img src="{{ asset("images/advantages/delivery-box.png") }}" height="64px" alt="">
                    </div>
                    <div class="text">
                        <span>Vyřízení objednávky</span>
                        <strong>do 24 hodin</strong>
                    </div>
                </div>
                <div class="advantage d-flex align-items-center">
                    <div class="image">
                        <img src="{{ asset("images/advantages/phone-call.png") }}" height="64px" alt="">
                    </div>
                    <div class="text">
                        <span>Zákaznická podpora</span>
                        <strong>Po-Pá 9:00 - 17:00</strong>
                    </div>
                </div>
                <div class="advantage d-flex align-items-center">
                    <div class="image">
                        <img src="{{ asset("images/advantages/location.png") }}" height="64px" alt="">
                    </div>
                    <div class="text">
                        <span>Doprava zdarma</span>
                        <strong>od 2400 Kč</strong>
                    </div>
                </div>
                <div class="advantage d-flex align-items-center">
                    <div class="image">
                        <img src="{{ asset("images/advantages/christmas-present.png") }}" height="64px" alt="">
                    </div>
                    <div class="text">
                        <span>Dárek k objednávce</span>
                        <strong>od 2000 Kč</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <div class="products-list">
                @for($i = 1; $i < 20; $i++)
                    <div class="product">
                        <picture>
                            <source
                                data-srcset="https://www.mojelekarna.cz/uploads/media/sulu-400x400-inset/06/12706-GS_Mamavit_Prefolin%2BDHA_30%2B30_CZ.webp?v=1-0"
                                type="image/webp"
                                srcset="https://www.mojelekarna.cz/uploads/media/sulu-400x400-inset/06/12706-GS_Mamavit_Prefolin%2BDHA_30%2B30_CZ.webp?v=1-0">
                            <img loading="lazy"
                                 data-src="https://www.mojelekarna.cz/uploads/media/sulu-400x400-inset/06/12706-GS_Mamavit_Prefolin%2BDHA_30%2B30_CZ.jpg?v=1-0"
                                 alt="GS_Mamavit_Prefolin+DHA_30+30_CZ.jpg"
                                 class="h-56 w-full object-scale-down entered loaded" data-ll-status="loaded"
                                 src="https://www.mojelekarna.cz/uploads/media/sulu-400x400-inset/06/12706-GS_Mamavit_Prefolin%2BDHA_30%2B30_CZ.jpg?v=1-0">
                        </picture>

                        <h2>
                            {{ fake()->text(rand(25,45)) }}
                        </h2>
                        <small>1x 20 tablet</small>
                        <p>
                            {{ fake()->text(100) }}
                        </p>
                        <form action="">
                            <div class="quantity">
                               <span class="price">
                                    <del> {{ fake()->numberBetween(100,200) }} Kč</del>
                                    <strong>{{ fake()->numberBetween(100,200) }} Kč</strong>
                                </span>
                                <input type="number" value="1">
                            </div>
                            <button class="btn btn-success">Do košíku <i class="fa fa-shopping-basket"></i></button>
                        </form>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
