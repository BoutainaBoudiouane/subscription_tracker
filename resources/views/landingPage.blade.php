<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
     <link rel="icon" type="image/png" href="{{ asset('images/logo_fenetre.png') }}">
    <title> SubTracker - Manage Your Subscriptions</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, rgb(142,30,251) 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            padding: 20px 0;
            position: relative;
            z-index: 100;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 10px 20px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 10px 20px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .cta-button {
            background: white !important;
            color: rgb(142,30,251) !important;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .cta-button:hover {
            background: rgba(255, 255, 255, 0.95) !important;
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .hero {
            text-align: center;
            padding: 100px 0;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        .hero-content {
            position: relative;
            z-index: 10;
        }

        .hero h1 {
            font-size: 4rem;
            color: white;
            margin-bottom: 20px;
            font-weight: 700;
            line-height: 1.2;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 35px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: white;
            color: rgb(142,30,251);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        .features {
            padding: 100px 0;
            background: white;
            position: relative;
        }

        .features::before {
            content: '';
            position: absolute;
            top: -2px;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, transparent, rgb(142,30,251), transparent);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .feature-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(142,30,251,0.1);
            border: 1px solid rgba(142,30,251,0.1);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(142,30,251,0.2);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgb(142,30,251), #667eea);
            border-radius: 20px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .stats {
            padding: 80px 0;
            background: linear-gradient(135deg, rgb(142,30,251), #667eea);
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 3rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .stat-item p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            width: 40px;
            height: 40px;
            top: 80%;
            left: 80%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        footer {
            background: #1a1a1a;
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-links {
            display: flex;
            gap: 30px;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: rgb(142,30,251);
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .nav-links {
                display: none;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }

            .mobile-auth {
                display: block;
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 1000;
            }

            .mobile-auth a {
                display: inline-block;
                margin-left: 10px;
                padding: 8px 16px;
                background: rgba(255, 255, 255, 0.9);
                color: rgb(142,30,251);
                text-decoration: none;
                border-radius: 20px;
                font-size: 0.9rem;
                font-weight: 600;
            }
        }

        .mobile-auth {
            display: none;
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <header>
        <div class="container">
            <nav>
                <a href="#" class="logo">
                      <img src="{{ asset('images/land_logo2.png') }}" alt="Logo" style="height: 60px;">
                </a>
                <div class="nav-links">
                    <a href="#features">Features</a>
                    <a href="/login" class="nav-link">Login</a>
                    <a href="/register" class="cta-button">Register</a>
                </div>
            </nav>
        </div>

        <!-- Mobile Auth Links -->
        <div class="mobile-auth">
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Master Your Subscriptions</h1>
                <p>Take control of your recurring payments with our powerful subscription tracking platform. Never miss a payment or lose track of your subscriptions again.</p>
                <div class="hero-buttons">
                    <a href="/register" class="btn btn-primary">Start Free Trial</a>
                    <a href="/login" class="btn btn-secondary">Login to Account</a>
                </div>
            </div>
        </div>
    </section>

    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title">Why Choose SubTracker?</h2>
            <p class="section-subtitle">Powerful features designed to help you manage subscriptions effortlessly</p>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Smart Tracking</h3>
                    <p>Automatically track all your subscriptions from one dashboard. Get insights into your spending patterns and subscription lifecycle.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🔔</div>
                    <h3>Smart Alerts</h3>
                    <p>Never miss a payment or renewal date. Get customizable notifications via email, SMS, or push notifications.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Cost Analytics</h3>
                    <p>Visualize your subscription costs with detailed charts and reports. Identify opportunities to save money.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🔗</div>
                    <h3>Easy Integration</h3>
                    <p>Connect with your bank accounts and credit cards for automatic subscription detection and tracking.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Detailed Reports</h3>
                    <p>Generate comprehensive reports on your subscription spending, trends, and savings opportunities.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <h3>Secure & Private</h3>
                    <p>Your data is protected with bank-level encryption and security measures. Your privacy is our priority.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3>20K+</h3>
                    <p>Happy Users</p>
                </div>
                <div class="stat-item">
                    <h3>$1M+</h3>
                    <p>Money Saved</p>
                </div>
                <div class="stat-item">
                    <h3>1M+</h3>
                    <p>Subscriptions Tracked</p>
                </div>
                <div class="stat-item">
                    <h3>99.9%</h3>
                    <p>Uptime</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="logo">
                      <img src="{{ asset('images/land_logo1.png') }}" alt="Logo" style="height: 70px;">
                </div>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Support</a>
                    <a href="#">Documentation</a>
                </div>
               
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add scroll effect to header
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(142,30,251,0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'transparent';
                header.style.backdropFilter = 'none';
            }
        });

        // Animate stats on scroll
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statItems = entry.target.querySelectorAll('.stat-item h3');
                    statItems.forEach(stat => {
                        const finalValue = stat.textContent;
                        const numericValue = parseInt(finalValue.replace(/[^\d]/g, ''));
                        let currentValue = 0;
                        const increment = numericValue / 30;

                        const updateCounter = () => {
                            if (currentValue < numericValue) {
                                currentValue += increment;
                                const suffix = finalValue.replace(/[\d,]/g, '');
                                stat.textContent = Math.floor(currentValue).toLocaleString() + suffix;
                                requestAnimationFrame(updateCounter);
                            } else {
                                stat.textContent = finalValue;
                            }
                        };

                        updateCounter();
                    });
                }
            });
        }, observerOptions);

        observer.observe(document.querySelector('.stats'));
    </script>
</body>
</html>
