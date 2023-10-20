<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="{{ asset('plugins/glider/glider.min.js') }}"></script>
<script>
    var settingsGliderProducts = {

        slidesToScroll: 'auto',
        itemWidth: undefined,
        exactWidth: false,
        duration: .5,
        draggable: true,
        dragVelocity: 3.3,
        dots: '.dots',
        margin:5,
        easing: function(x, t, b, c, d) {
            return c * (t /= d) * t + b;
        },
        arrows: {
            prev: ".glider-prev",
            next: ".glider-next"
        },
        scrollPropagate: false,
        eventPropagate: true,
        scrollLock: false,
        scrollLockDelay: 150,
        resizeLock: true,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 4.3,
                slidesToScroll: 4
            }
        },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2.5,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2.5,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 567,
                settings: {
                    slidesToShow: 1.5,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1.5,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 300,
                settings: {
                    slidesToShow: 1.5,
                    slidesToScroll: 1
                }
            }
        ]
    };

    setTimeout(function() {
        settingsGliderProducts.arrows = {
            prev: document.querySelector('.nav-products-prev'),
            next: document.querySelector('.nav-products-next')
        };
        new Glider(document.querySelector('.glider-products'), settingsGliderProducts);
    }, 100);


    $(document).on("click", '.quantity button', function (e) {
        e.preventDefault();
        var input = $(this).parent().find('input[type="number"]');
        var quantity = parseInt(input.val());

        if ($(this).hasClass('btn-plus')){
            input.val(quantity+1);
            if(input.val() >= 1000){
                input.val(999);
                alert("Maximum je 999 ks");
            }
        } else if ($(this).hasClass('btn-minus')) {
            if (quantity > 0){
                input.val(quantity-1);
                if(input.val() >= 1000){
                    input.val(999);
                    alert("Maximum je 999 ks");
                }
            }
        }
    });
</script>
