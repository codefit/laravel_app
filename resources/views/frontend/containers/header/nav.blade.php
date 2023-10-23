<!-- Header nav - status: In progress -->
<!-- Todo: popup login/register, popup cart, autocomplete search, responsive menu -->

<header>
    <div class="container d-flex align-items-center">
        <a href="" class="logo d-flex align-items-center">
            <img src="{{ asset("images/mojelekarna.svg") }}" alt="" width="220px">
        </a>
        <form action="" class="search m-auto">
            <input type="text" placeholder="Vyhledat produkt, kategorii" class="form-control">
            <button type="submit" class="submit">
                <img src="{{ asset('images/ecommerce/search.png') }}" alt="" height="32px">
            </button>
        </form>
        <div class="user d-flex align-items-center ml-auto">
            <img src="{{ asset('images/ecommerce/user.png') }}" alt="" height="54px">
            <a href="" class="d-flex flex-column justify-content-center mb-0">
                <span>Účet</span>
            </a>
        </div>
        <div class="cart d-flex align-items-center">
            <img src="{{ asset('images/ecommerce/cart.png') }}" alt="" height="54px">
            <a href="" class="d-flex flex-column justify-content-center mb-0">
                <span>
                    Košík
                </span>
                <strong><b>3 ks </b>55 Kč</strong>
            </a>
            <div class="cart-list">
                <p>
                    lorem ipsum
                </p>
            </div>
        </div>
    </div>
</header>
