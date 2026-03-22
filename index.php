<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UA ACADEMY - Excellence & Beyond</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --ua-blue: #0b132b;
            --ua-blue-light: #1c2541;
            --ua-gold: #f4d35e;
            --ua-gold-hover: #ee9b00;
            --ua-light: #f8f9fa;
        }
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--ua-light);
            scroll-behavior: smooth;
        }
        h1, h2, h3, h4, h5, h6, .brand-text {
            font-family: 'Montserrat', sans-serif;
        }
        
        /* Modern Navbar */
        .navbar {
            background-color: rgba(11, 19, 43, 0.95);
            backdrop-filter: blur(10px);
            padding: 10px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .navbar-brand img {
            height: 40px;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .navbar-brand:hover img {
            transform: scale(1.05) rotate(-5deg);
        }
        .navbar-brand .brand-text {
            font-size: 1.3rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }
        .navbar-brand .brand-text span {
            color: var(--ua-gold);
        }
        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            font-weight: 500;
            font-size: 0.85rem;
            margin: 0 10px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'Montserrat', sans-serif;
        }
        .nav-link:hover {
            color: var(--ua-gold) !important;
            transform: translateY(-2px);
        }

        /* Hero Section - Clean & Cinematic */
        .hero-section {
            background: linear-gradient(to bottom, rgba(11, 19, 43, 0.7), rgba(11, 19, 43, 0.9)), url('assets/img/hero.png') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            height: 80vh;
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding-top: 60px; /* offset navbar */
        }
        .hero-content {
            max-width: 800px;
            padding: 0 20px;
            animation: fadeIn 1.2s ease-out;
        }
        .hero-tag {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: var(--ua-gold);
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 0.9rem;
            margin-bottom: 15px;
            display: block;
        }
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 20px;
            color: #ffffff;
            text-transform: uppercase;
            line-height: 1.1;
            letter-spacing: -1px;
        }
        .hero-content p {
            font-size: 1.05rem;
            margin-bottom: 35px;
            color: rgba(255,255,255,0.85);
            font-weight: 400;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.5;
        }

        /* Modern Buttons */
        .btn-custom-primary {
            background-color: var(--ua-gold);
            color: var(--ua-blue);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 12px 28px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            box-shadow: 0 8px 15px rgba(244, 211, 94, 0.2);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        .btn-custom-primary:hover {
            background-color: #fff;
            color: var(--ua-blue);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.2);
        }
        .btn-custom-outline {
            background-color: transparent;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 10px 28px;
            border-radius: 50px;
            border: 2px solid rgba(255,255,255,0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            backdrop-filter: blur(5px);
        }
        .btn-custom-outline:hover {
            border-color: #fff;
            background-color: rgba(255,255,255,0.1);
            transform: translateY(-3px);
        }

        /* Sections General */
        section {
            padding: 80px 0;
            position: relative;
        }
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }
        .section-header h2 {
            color: var(--ua-blue);
            font-weight: 800;
            font-size: 2.2rem;
            text-transform: uppercase;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }
        .section-header p {
            color: #6c757d;
            font-size: 0.95rem;
            max-width: 500px;
            margin: 0 auto;
        }

        /* Features Section */
        .features-section {
            background-color: #ffffff;
        }
        .feature-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 35px 25px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.02);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(244, 211, 94, 0.05) 0%, rgba(255,255,255,0) 100%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.06);
            border-color: rgba(244, 211, 94, 0.2);
        }
        .feature-card:hover::before {
            opacity: 1;
        }
        .feature-icon {
            font-size: 1.8rem;
            color: var(--ua-gold-hover);
            margin-bottom: 20px;
            background: #fff;
            width: 60px;
            height: 60px;
            line-height: 60px;
            border-radius: 16px;
            margin: 0 auto 20px auto;
            position: relative;
            box-shadow: 0 8px 15px rgba(244, 211, 94, 0.15);
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            background: var(--ua-gold);
            color: var(--ua-blue);
        }
        .feature-card h3 {
            font-weight: 800;
            color: var(--ua-blue);
            margin-bottom: 12px;
            font-size: 1.2rem;
        }
        .feature-card p {
            color: #555;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Call to Action Container */
        .cta-container {
            background: var(--ua-blue);
            border-radius: 24px;
            padding: 50px 40px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(11, 19, 43, 0.2);
        }
        .cta-container::after {
            content: '';
            position: absolute;
            top: -50%; left: -10%;
            width: 50%; height: 200%;
            background: linear-gradient(to right, rgba(244, 211, 94, 0.08), transparent);
            transform: rotate(-15deg);
            pointer-events: none;
        }
        .cta-image {
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            width: 100%;
            height: 280px;
            object-fit: cover;
            border: 3px solid rgba(255,255,255,0.05);
        }

        /* Footer */
        footer {
            background-color: #050914;
            color: #fff;
            padding: 50px 0 25px;
            border-top: 4px solid var(--ua-gold);
        }
        .footer-brand img {
            width: 45px;
            margin-bottom: 15px;
            filter: grayscale(100%) brightness(200%);
            transition: filter 0.3s ease;
        }
        .footer-brand:hover img {
            filter: none;
        }
        .footer-brand h2 {
            font-weight: 900;
            font-size: 1.4rem;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .social-link {
            display: inline-flex;
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.05);
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #fff;
            font-size: 1rem;
            margin: 0 8px;
            transition: all 0.3s ease;
        }
        .social-link:hover {
            background: var(--ua-gold);
            color: var(--ua-blue);
            transform: translateY(-3px);
        }
        .footer-bottom {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.05);
            font-size: 0.85rem;
            color: rgba(255,255,255,0.5);
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Custom Portal Button in Navbar */
        .nav-portal-btn {
            background-color: var(--ua-gold);
            color: var(--ua-blue) !important;
            padding: 8px 20px !important;
            border-radius: 50px;
            font-weight: 700 !important;
            font-size: 0.8rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            transition: all 0.3s ease !important;
        }
        .nav-portal-btn:hover {
            background-color: #fff !important;
            transform: translateY(-2px) !important;
        }
        
        @media (max-width: 991px) {
            .hero-section { height: auto; min-height: 80vh; padding: 120px 0 60px; }
            .hero-content h1 { font-size: 2.5rem; }
            .cta-image { margin-top: 30px; }
            .section-header h2 { font-size: 1.8rem; }
            .footer-bottom { flex-direction: column; text-align: center; gap: 10px; }
        }
    </style>
</head>
<body>

    <!-- Transparent Sleek Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <img src="assets/img/logo.png" alt="UA ACADEMY Logo">
                <span class="brand-text">UA <span>ACADEMY</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <i class="fas fa-bars text-white fs-4"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#excellence">Excellence</a></li>
                    <li class="nav-item"><a class="nav-link" href="#programs">Programs</a></li>
                </ul>
                <div class="d-flex mt-3 mt-lg-0">
                    <a href="login.php" class="nav-link nav-portal-btn">
                        <i class="fas fa-fingerprint me-2"></i>Portal Access
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Cinematic Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="hero-content mx-auto">
                <span class="hero-tag">Welcome to the top</span>
                <h1>Forge Your Path.<br>Become Extraordinary.</h1>
                <p>Enter the world's most prestigious academy. Where the leaders, heroes, and innovators of tomorrow are forged through unwavering discipline and Plus Ultra spirit.</p>
                
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mt-4">
                    <a href="login.php" class="btn-custom-primary">
                        <i class="fas fa-shield-alt me-2"></i> Employee Login
                    </a>
                    <a href="#excellence" class="btn-custom-outline">
                        Discover UA <i class="fas fa-arrow-down ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Excellence / Features Section -->
    <section id="excellence" class="features-section">
        <div class="container">
            <div class="section-header">
                <h2>Our Standard of Excellence</h2>
                <p>Pioneering education with state-of-the-art facilities, elite faculty, and a curriculum designed to push beyond human limits.</p>
            </div>
            
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3>Unmatched Rigor</h3>
                        <p>Our curriculum is famously intense, filtering only the dedicated. We push students to surpass their conceptualized limits every single day.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3>Pro Faculty</h3>
                        <p>Learn directly from industry masters and top-ranking professionals who bring real-world, high-stakes experience into the classroom.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h3>Elite Facilities</h3>
                        <p>Train in hyper-advanced simulation zones ranging from theoretical labs to fully functioning multi-terrain city replicas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Immersive Programs / CTA Section -->
    <section id="programs" class="bg-light" style="padding-top: 40px;">
        <div class="container">
            <div class="cta-container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0 text-white position-relative" style="z-index: 2;">
                        <h2 class="mb-3" style="font-family: 'Montserrat', sans-serif; font-weight:800; font-size: 2.2rem; line-height: 1.2;">World Class<br><span style="color:var(--ua-gold);">Programs</span></h2>
                        <p class="mb-4" style="color: rgba(255,255,255,0.8); font-size:0.95rem; max-width: 90%;">From advanced theoretical academics to specialized tactical training, our courses are tailored to awaken your ultimate potential. Step into the future.</p>
                        <a href="login.php" class="btn-custom-primary">
                            Enter Secured Portal <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                    <div class="col-lg-6 position-relative" style="z-index: 2;">
                        <img src="assets/img/hero.png" alt="Campus Life" class="cta-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Premium Footer -->
    <footer>
        <div class="container">
            <div class="row text-center text-lg-start">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="footer-brand">
                        <img src="assets/img/logo.png" alt="UA ACADEMY">
                        <h2>UA Academy</h2>
                    </div>
                    <p style="color: rgba(255,255,255,0.6); max-width: 350px; margin: 0 auto 0 0; font-size: 0.85rem;">
                        123 Musutafu City, Shizuoka Prefecture, Japan.<br>Building the future, one student at a time.
                    </p>
                </div>
                <div class="col-lg-6 text-center text-lg-end d-flex flex-column justify-content-end">
                    <div class="mb-2">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom flex-column flex-md-row">
                <div>&copy; <?php echo date('Y'); ?> UA Academy. All Rights Reserved.</div>
                <div class="mt-2 mt-md-0 fw-bold" style="color: var(--ua-gold); letter-spacing: 1.5px; font-size: 0.8rem;">PLUS ULTRA!</div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple script to add background to navbar on scroll for a more premium feel
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.backgroundColor = 'rgba(11, 19, 43, 0.98)';
                navbar.style.boxShadow = '0 8px 25px rgba(0,0,0,0.2)';
                navbar.style.padding = '8px 0';
            } else {
                navbar.style.backgroundColor = 'rgba(11, 19, 43, 0.95)';
                navbar.style.boxShadow = '0 4px 15px rgba(0,0,0,0.1)';
                navbar.style.padding = '10px 0';
            }
        });
    </script>
</body>
</html>
