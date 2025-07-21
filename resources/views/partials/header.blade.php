<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome | PPC</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
    
        html,
        body {
            overflow-x: hidden;
            font-family: 'Segoe UI', sans-serif;
            
        }

        img {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 768px) {
            .carousel-item img {
                max-height: 200px !important;
            }

            .navbar-brand img {
                max-height: 30px;
            }

            h1,
            h2,
            h3,
            h4 {
                font-size: 1.25rem;
            }

            .carousel-caption h5 {
                font-size: 1rem;
            }
        }

        .quick-card {
            transition: all 0.3s ease;
            border-radius: 0.75rem;
        }

        .quick-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }
    </style>
    <style>
        .scrolling-text {
            white-space: nowrap;
            overflow: hidden;
            animation: scroll-left 20s linear infinite;
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .quick-card {
            transition: all 0.3s ease;
            border-radius: 0.75rem;
        }

        .quick-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }
        .hover-shadow:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 128, 0, 0.15) !important;
    transform: translateY(-2px);
    transition: 0.3s ease-in-out;
}

.card img:hover {
    transform: scale(1.05);
    transition: 0.3s ease;
}
    </style>
    <style>
    @media (min-width: 1200px) {
        body {
            zoom: 90%;
        }
    }
</style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-2">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center fw-semibold" href="{{ url('/') }}">
                <img src="{{ asset('storage/multiflex/logo/logo.png') }}" alt="Multiflex Logo" class="img-fluid"
                    style="height: 60px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
         

                <ul class="navbar-nav mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link"><i
                                    class="fas fa-user-circle me-1"></i> Dashboard</a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><i
                                    class="fas fa-sign-in-alt me-1"></i> Login</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><i
                                        class="fas fa-user-plus me-1"></i> Register</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>