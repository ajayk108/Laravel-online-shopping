    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Online Shopping</title>
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        {{-- owl carousel --}}
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    </head>

    <body>

        @include('layouts/navbar')

        <div class="container-fluid p-0">
            @yield('main')
        </div>

        @include('layouts/footer')
        <!-- jQuery (required by Owl Carousel) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- Owl Carousel JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var owl = $('.owl-carousel');

                owl.owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    dots: false,
                    autoplay: true,
                    autoplayTimeout: 1000,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 6
                        }
                    },
                    autoplayHoverPause: true,
                });

                // Custom navigation buttons
                $('.custom-next').click(function() {
                    owl.trigger('next.owl.carousel');
                });

                $('.custom-prev').click(function() {
                    owl.trigger('prev.owl.carousel');
                });
            });
        </script>


    </body>

    </html>
