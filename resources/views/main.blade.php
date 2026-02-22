<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/application/rsda-favicon.png') }}" type="image/x-icon">
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,500|Dosis:400,700" rel="stylesheet">
    
    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Template CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welfare-integration.css') }}">
    
    @stack('css')
    
    <style>
        /* Critical CSS - Force navbar to always be visible */
        #ftco-navbar,
        nav#ftco-navbar,
        .ftco_navbar {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 99999 !important;
            visibility: visible !important;
            opacity: 1 !important;
            background: #ffffff !important;
            width: 100% !important;
            transform: none !important;
            overflow: visible !important;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1) !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
        
        .navbar-brand img {
            max-height: 45px !important;
            width: auto !important;
        }
        
        body {
            padding-top: 65px !important;
        }

        /* Ensure dropdowns always render on top */
        .dropdown-menu {
            z-index: 99999 !important;
        }
    </style>
</head>
<body>
    @include('header')

        @yield('content')

        <script>
            (function() {
                var sections = document.querySelectorAll('.scroll-reveal');
                if (!sections.length) return;

                var onIntersect = function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('scroll-reveal-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                };

                if ('IntersectionObserver' in window) {
                    var observer = new IntersectionObserver(onIntersect, {
                        threshold: 0.25
                    });
                    sections.forEach(function(section) {
                        observer.observe(section);
                    });
                } else {
                    sections.forEach(function(section) {
                        section.classList.add('scroll-reveal-visible');
                    });
                }
            })();
        </script>

    @include('footer')

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Popper & Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    {{-- Template JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.stellar/0.6.2/jquery.stellar.min.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'slide',
            once: true
        });
        
        // Ensure navbar is ALWAYS visible
        $(document).ready(function() {
            var navbar = $('#ftco-navbar');
            
            // Force navbar to be visible
            navbar.css({
                'position': 'fixed',
                'top': '0',
                'left': '0',
                'right': '0',
                'z-index': '99999',
                'visibility': 'visible',
                'opacity': '1',
                'display': 'block'
            });
        });
        
        // Sticky Navbar on Scroll - just add shadow
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            var navbar = $('#ftco-navbar');
            
            if (scroll > 50) {
                navbar.addClass('scrolled');
            } else {
                navbar.removeClass('scrolled');
            }
            
            // Always ensure navbar is visible
            navbar.css({
                'position': 'fixed',
                'top': '0',
                'visibility': 'visible',
                'opacity': '1',
                'display': 'block'
            });
        });
    </script>

    @stack('js')

</body>
</html>
