<div class="product">
    <picture>
        <source
            data-srcset="https://www.mojelekarna.cz/uploads/media/sulu-400x400-inset/06/12586-gs_imunostim_prevent_tbl._20_crsk.webp?v=1-0"
            type="image/webp"
            srcset="https://www.mojelekarna.cz/uploads/media/sulu-400x400-inset/06/12586-gs_imunostim_prevent_tbl._20_crsk.webp?v=1-0">
        <img loading="lazy"
             data-src="https://www.mojelekarna.cz/uploads/media/sulu-400x400-inset/06/12706-GS_Mamavit_Prefolin%2BDHA_30%2B30_CZ.jpg?v=1-0"
             alt="GS_Mamavit_Prefolin+DHA_30+30_CZ.jpg"
             class="h-56 w-full object-scale-down entered loaded" data-ll-status="loaded"
             src="https://www.mojelekarna.cz/uploads/media/sulu-400x400-inset/06/12706-GS_Mamavit_Prefolin%2BDHA_30%2B30_CZ.jpg?v=1-0">
    </picture>
    <small>1x 20 tablet</small>
    <h3>
        {{ fake()->text(rand(25,45)) }}
    </h3>

    <p>
        {{ fake()->text(100) }}
    </p>
    <form action="">
        <div class="info">
           <span class="price">
                <del> {{ fake()->numberBetween(100,200) }} Kč</del>
                <strong>{{ fake()->numberBetween(100,200) }} Kč</strong>
            </span>
            <div class="quantity">
                <input type="number" value="1" class="form-control">
                <button class="btn-plus" type="button">
                    <i class="bi bi-plus"></i>
                </button>
                <button class="btn-minus" type="button">
                    <i class="bi bi-dash"></i>
                </button>
            </div>
        </div>
        <button class="btn btn-success">
            <span>Koupit</span>
            <img src="{{ asset("images/ecommerce/cart.png") }}" class="ml-3" alt="Přidat do košíku" height="28Px">
        </button>
    </form>
</div>
