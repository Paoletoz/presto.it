<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Exo+2:wght@400;700&family=Nanum+Pen+Script&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="/media/Presto-logo.png" type="image/x-icon">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    {{-- FontAwesome --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Presto.it</title>
    @livewireStyles
</head>

<body class="bg-custom">

    <x-navbar/>
    
    <main class="main-custom">
        <div class="fixedSidebarBtn dropLetSidebar">
            <button class="btn btnSidebarCustom border-0 my-0 py-2 px-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><img class="py-0 my-0 imgSidebarCustom" src="/media/expandSidebar.png" alt=""></button>
        </div>  
        {{ $slot }}
    </main>

    <x-footer />


    @livewireScripts

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>

</body>

</html>
