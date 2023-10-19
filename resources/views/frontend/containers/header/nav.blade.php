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
        <a href="" class="user ml-auto mr-4">
            <img src="{{ asset('images/ecommerce/user.png') }}" alt="" height="54px">
            <span>
               Účet
            </span>
        </a>
        <a href="" class="cart d-flex">
            <img src="{{ asset('images/ecommerce/cart.png') }}" alt="" height="54px">
            <p class="d-flex flex-column justify-content-center mb-0">
                <span>
                    Košík
                </span>
                <strong>0.00 CZK</strong>
            </p>
        </a>
    </div>
</header>
