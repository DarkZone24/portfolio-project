<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Alexis Macarilay - Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            color: #ffffff;
            overflow-x: hidden;
        }

        @keyframes fadeIn {
            from {
        opacity: 0;
        transform: translateY(-15px);
                }
            to {
        opacity: 1;
        transform: translateY(0);
                 }
        }

        /* Enhanced Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 20px 50px;
            background: rgba(15, 15, 35, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 171, 240, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
            animation: fadeIn 0.8s ease forwards;
        }

        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            color: #00abf0;
            animation: fadeIn 1s ease forwards;
        }

        .logo i {
            font-size: 32px;
            color: #00abf0;
        }

        .logo span {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(45deg, #00abf0, #ffffff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 40px;
        }

        .nav-menu li {
            position: relative;
            animation: fadeIn 0.8s ease forwards;
            opacity: 0;
        }

        .nav-menu li:nth-child(1) { animation-delay: 0.5s; }
        .nav-menu li:nth-child(2) { animation-delay: 0.7s; }
        .nav-menu li:nth-child(3) { animation-delay: 0.9s; }
        .nav-menu li:nth-child(4) { animation-delay: 1.1s; }
        .nav-menu li:nth-child(5) { animation-delay: 1.3s; }
        .nav-menu li:nth-child(6) { animation-delay: 1.5s; }

        .nav-menu a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 10px 0;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-menu a::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(45deg, #00abf0, #ffffff);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::before,
        .nav-menu a.active::before {
            width: 100%;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #00abf0;
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: #ffffff;
            font-size: 24px;
            cursor: pointer;
            padding: 5px;
        }

        .mobile-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: rgba(15, 15, 35, 0.98);
            backdrop-filter: blur(20px);
            border-top: 1px solid rgba(0, 171, 240, 0.1);
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .mobile-menu.active {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .mobile-menu ul {
            list-style: none;
            padding: 20px 0;
        }

        .mobile-menu a {
            display: block;
            padding: 15px 50px;
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .mobile-menu a:hover,
        .mobile-menu a.active {
            background: rgba(0, 171, 240, 0.1);
            color: #00abf0;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 80%, rgba(0, 171, 240, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(0, 171, 240, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 50px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-content {
            animation: slideInLeft 1s ease-out;
        }

        .hero-image {
            display: flex;
            justify-content: center;
            animation: pulse 2s ease-in-out infinite;
            padding: 2rem;
        }
        
        @keyframes pulse {
            0%, 100% {
            transform: scale(1);
            }
            50% {
            transform: scale(1.05);
            }
        }

        .profile-image {
        width: 400px;
        height: 400px;
        border-radius: 50%;
        object-fit: cover;
        border: none;
        box-shadow: none;
        transition: all 0.3s ease;
        margin-left: 50px;
        }   

        .profile-image:hover {
            transform: scale(1.05);
            box-shadow: 0 0 80px rgba(0, 171, 240, 0.5);
            opacity: 1;
            filter: brightness(1.0);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px%;
            line-height: 1.2;
            animation: fadeIn 0.8s ease forwards;
        }

        .hero-subtitle {
            font-size: 1.8rem;
            font-weight: 400;
            margin-bottom: 30px;
            background: linear-gradient(45deg, #00abf0, #ffffff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: blink-caret 1s step-end infinite;
        }

        @keyframes blink-caret {
            100% {
                border-color: currentColor;
            }
        }

        .hero-description {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 40px;
            color: rgba(255, 255, 255, 0.8);
            max-width: 500px;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(45deg, #00abf0, #0084c7);
            color: #ffffff;
            border: 2px solid transparent;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 171, 240, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #00abf0;
            border: 2px solid #00abf0;
        }

        .btn-secondary:hover {
            background: #00abf0;
            color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 171, 240, 0.4);
        }

        /* About Section */
        @keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeRight {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeLeft {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Default state (hidden) */
.section-title,
.about-image,
.about-text{
    opacity: 0;
}

.section-title.animate {
    animation: fadeUp 1s ease forwards;
}

.about-image.animate {
    animation: fadeRight 1s ease forwards;
    animation-delay: 0.3s;
}

.section-text.animate {
    animation: fadeLeft 1s ease forwards;
    animation-delay: 0.6s;
}

        .about {
            padding: 120px 0;
            background: linear-gradient(135deg, #1a1a2e 0%, #0f0f23 100%);
            animation: fadeIn 0.8s ease forwards;
        }

        .section-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 50px;
        }

        .section-title {
            text-align: center;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 60px;
            background: linear-gradient(45deg, #00abf0, #ffffff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: fadeUp 1s ease forwards;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 60px;
            align-items: center;
        }

        .about-image {
            text-align: center;
            border-radius: 5%;
            opacity: 0;
            animation: fadeRight 1s ease forwards;
            animation-delay: 0.3s;
        }

        .about-image img {
            width: 350px;
            height: 350px;
            border-radius: 20%;
            object-fit: cover;
            opacity: 0.2; /* Even more transparent */
            border: none;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        .about-image img:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 171, 240, 0.2);
            opacity: 1; /* Makes image fully visible/bright */
            filter: brightness(1.2); /* Increases brightness by 20% */
        }

        .about-text h3 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #00abf0;
            animation: fadeLeft 1s ease forwards;
            opacity: 0;
            animation-delay: 0.6s;
        }

        .about-text p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
            animation: fadeLeft 1s ease forwards;
            animation-delay: 0.6s;
            opacity: 0;
        }

        /* Services Section */
        .services {
            padding: 120px 0;
            background: linear-gradient(135deg, #0f0f23 0%, #16213e 100%);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            border: 1px solid rgba(0, 171, 240, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(0, 171, 240, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .service-card:hover::before {
            opacity: 1;
        }

        .service-card:hover {
            transform: translateY(-10px);
            border-color: rgba(0, 171, 240, 0.5);
            box-shadow: 0 20px 40px rgba(0, 171, 240, 0.2);
        }

        .service-card i {
            font-size: 3rem;
            color: #00abf0;
            margin-bottom: 20px;
        }

        .service-card h4 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .service-card p {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
        }

        /* Skills Section */
        .skills {
            padding: 120px 0;
            background: linear-gradient(135deg, #1a1a2e 0%, #0f0f23 100%);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .skill-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            border: 1px solid rgba(0, 171, 240, 0.1);
            transition: all 0.3s ease;
        }

        .skill-card:hover {
            transform: translateY(-10px);
            border-color: rgba(0, 171, 240, 0.5);
            box-shadow: 0 20px 40px rgba(0, 171, 240, 0.2);
        }

        .skill-card i {
            font-size: 2.5rem;
            color: #00abf0;
            margin-bottom: 15px;
        }

        .skill-card h4 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .skill-card p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* Contact Section */
        .contact {
            padding: 120px 0;
            background: linear-gradient(135deg, #0f0f23 0%, #16213e 100%);
            text-align: center;
        }

        .contact-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .contact p {
            font-size: 1.3rem;
            margin-bottom: 40px;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Footer */
        .footer {
            background: #0a0a1a;
            padding: 60px 0 30px;
            text-align: center;
        }

        .footer h3 {
            font-size: 2rem;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #00abf0, #ffffff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .footer p {
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 30px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, #00abf0, #0084c7);
            color: #ffffff;
            border-radius: 50%;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 30px rgba(0, 171, 240, 0.5);
        }

        /* Scroll to Top Button */
        .scroll-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, #00abf0, #0084c7);
            color: #ffffff;
            border: none;
            border-radius: 50%;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .scroll-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-to-top:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 30px rgba(0, 171, 240, 0.5);
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

       /* Enhanced Mobile Responsiveness */
       @media (max-width: 1024px) {
            .navbar {
                padding: 15px 30px;
            }
            
            .section-container {
                padding: 0 30px;
            }
            
            .hero-container {
                padding: 0 30px;
                gap: 60px;
            }
            
            .profile-image {
                width: 350px;
                height: 350px;
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }

            .nav-menu {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .mobile-menu {
                display: block;
            }
            .hero-container {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
                padding: 0 20px;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.3rem;
            }

            .profile-image {
                width: 280px;
                height: 280px;
            }

            .about-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .section-container {
                padding: 0 20px;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .skills-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 480px) {
            .skills-grid {
                grid-template-columns: 1fr;
            }

            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.8rem;
            }
        }
        .portfolio-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 50px;
            padding-bottom: 30px;
    }
    
    .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-top: 1rem;
            justify-content: center;
    }

        .portfolio-card {
      position: relative;
      overflow: hidden;
      border-radius: 10px;
      width: 400px;   /* control width */
      height: 400px;  /* control height */
      cursor: pointer;
      margin: auto;
    }

    .project-image {
      width: 100%;
      height: 100%; /* katamtamang size */
      object-fit: cover; /* para puno ang image box */
      display: block;
      transition: transform 0.5s ease;
    }

    .project-image:hover {
      transform: scale(1.1);
      filter: brightness(1.0);
    }

    .portfolio-card-content {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        transform: translateY(100%);
        opacity: 0;
        transition: all 0.4s ease-in-out;
        padding: 20px;
    }

    .portfolio-card:hover .portfolio-card-content {
        transform: translateY(0);
        opacity: 1;
    }

    .portfolio-card:hover {
        transform: translateY(-10px);
        border-color: rgba(0, 171, 240, 0.5);
        box-shadow: 0 20px 40px rgba(0, 171, 240, 0.2);
    }

    .portfolio-card h4 {
      font-size: 1.2rem;
      margin-bottom: 10px;
    }

    .portfolio-card p {
      font-size: 0.9rem;
      margin-bottom: 15px;
      color: rgba(255, 255, 255, 0.8);
    }

    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="navbar-content">
            <a href="#home" class="logo">
                <i class="fas fa-code"></i>
                <span>Portfolio</span>
            </a>
            <ul class="nav-menu">
                <li><a href="#home" class="active">HOME</a></li>
                <li><a href="#about">ABOUT</a></li>
                <li><a href="#services">SERVICES</a></li>
                <li><a href="#skills">SKILLS</a></li>
                <li><a href="#portfolio">PORTFOLIO</a></li>
                <li><a href="#contact">CONTACT</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">Hi! I'm<br><span style="background: linear-gradient(45deg, #00abf0, #ffffff); -webkit-background-clip: text; background-clip: text; color: transparent;"> Mark Alexis Macarilay</span></h1>
                <h2 class="hero-subtitle" id="typewriter"></h2>
                <p class="hero-description">I am a passionate Software Developer who creates innovative websites, desktop applications, and web applications with seamless API integration. Let's build something amazing together!</p>
                <div class="cta-buttons">
                    <a href="{{ asset('documents/Mark_Alexis_Macarilay_Resume_Final.pdf') }}"class="btn btn-primary" download="Mark_Alexis_Macarilay_CV.pdf">Download CV</a>
                    <a href="#contact" class="btn btn-secondary">Let's Talk</a>
                </div>
            </div>
        <div class="hero-image profile-image" 
            style="background-image: url('{{ asset('images/dev.jpg') }}'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;"
             role="img" 
            aria-label="Mark Alexis Macarilay">
        </div>
    </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="section-container">
            <h2 class="section-title">About Me</h2>
            <div class="about-content">
                <div class="about-image profile-image"
                    style="background-image: url('{{ asset('images/dev.jpg') }}');
                    background-size: cover; 
                    background-position: center; 
                    background-repeat: no-repeat;
                    padding:45%"
                     role="img"   
                    alt="About Mark" loading="lazy">
                </div>
                <div class="about-text">
                    <h3>Software Developer</h3>
                    <p>I am a dedicated Software Developer with a passion for creating innovative digital solutions. My expertise spans across web development, desktop applications, and seamless API integrations that bring ideas to life.</p>
                    <p>With a strong foundation in modern technologies and a keen eye for detail, I strive to deliver high-quality solutions that not only meet but exceed client expectations. I believe in continuous learning and staying updated with the latest industry trends.</p>
                    <a href="#contact" class="btn btn-primary">Let's Talk</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="section-container">
            <h2 class="section-title">Our Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <i class="fas fa-laptop-code"></i>
                    <h4>Web Development</h4>
                    <p>Creating responsive and modern websites with cutting-edge technologies and best practices for optimal user experience.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-desktop"></i>
                    <h4>Desktop Applications</h4>
                    <p>Building robust desktop applications tailored to your specific needs with intuitive interfaces and powerful functionality.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-plug"></i>
                    <h4>API Integration</h4>
                    <p>Seamless integration of third-party APIs and development of custom APIs to connect your applications with external services.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-database"></i>
                    <h4>Database Design</h4>
                    <p>Efficient database architecture and optimization to ensure your applications run smoothly and scale effectively.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-tools"></i>
                    <h4>Technical Support</h4>
                    <p>Comprehensive technical support and maintenance services to keep your applications running at peak performance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="skills">
        <div class="section-container">
            <h2 class="section-title">My Skills</h2>
            <div class="skills-grid">
                <div class="skill-card">
                    <i class="fab fa-html5"></i>
                    <h4>HTML5</h4>
                    <p>Semantic markup</p>
                </div>
                <div class="skill-card">
                    <i class="fab fa-css3-alt"></i>
                    <h4>CSS3</h4>
                    <p>Modern styling</p>
                </div>
                <div class="skill-card">
                    <i class="fab fa-js-square"></i>
                    <h4>JavaScript</h4>
                    <p>Dynamic functionality</p>
                </div>
                <div class="skill-card">
                    <i class="fab fa-php"></i>
                    <h4>PHP</h4>
                    <p>Server-side scripting</p>
                </div>
                <div class="skill-card">
                    <i class="fab fa-laravel"></i>
                    <h4>Laravel</h4>
                    <p>PHP framework</p>
                </div>
                <div class="skill-card">
                    <i class="fas fa-database"></i>
                    <h4>MySQL</h4>
                    <p>Database management</p>
                </div>
                <div class="skill-card">
                    <i class="fab fa-git-alt"></i>
                    <h4>Git</h4>
                    <p>Version control</p>
                </div>
                <div class="skill-card">
                    <i class="fas fa-server"></i>
                    <h4>REST APIs</h4>
                    <p>API development</p>
                </div>
                <div class="skill-card">
                    <i class="fas fa-file-code"></i>
                    <h4>C-Sharp</h4>
                    <p>Desktop development</p>
                </div>
                <div class="skill-card">
                    <i class="fab fa-microsoft"></i>
                    <h4>.Net</h4>
                    <p>Desktop application framework</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio">
        <div class="portfolio-container">
            <h2 class="section-title" style="text-align: center; margin-top:1em;">My Projects</h2>
           
            <div class="portfolio-grid">
                <div class="portfolio-card">
                    <img src="images/f6322501-1e20-4cbc-97f9-a1edeff506cf.png" alt="Inventory Management System" class="project-image">
                    
                         <div class="portfolio-card-content">
                    <h4>Inventory Management System</h4>
                    <p>
                      Is a web-based application designed to help businesses efficiently manage their stock, sales, and suppliers.
                      It provides real-time tracking of product quantities, automates stock level monitoring, and streamlines reporting for better decision-making.
                    </p>
                </div>
            </div>

            <div class="portfolio-card">
                <img src="images/4121bd13-50ed-439f-af8e-301bbf13649a.jpg" alt="Mobile Collector System" class="project-image">

                     <div class="portfolio-card-content">
                <h4>Mobile Collector System</h4>
                <p>
                  Is a web-based application designed to help businesses efficiently manage their collections on loans, sharecapital, savings etc.
                  It is also design to lessen the paper works and to make it easily collecting payments. </p>
            </div>
        </div>

        <div class="portfolio-card">
            <img src="images/water.png" alt="Automated Water Billing System" class="project-image">

                 <div class="portfolio-card-content">
            <h4>Automated Water Billing System</h4>
            <p>
              Is a desktop application designed to help businesses efficiently manage their collections water billing.
              It is also design to lessen the paper works and to make it easily collecting payments with automated computations. </p>
        </div>
    </div>
        </div>   
        </div>     
        </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="section-container">
            <div class="contact-content">
                <h2 class="section-title">Let's Work Together</h2>
                <p>Ready to bring your ideas to life? Let's collaborate and create something amazing together!</p>
                <a href="{{ route('hire-me.index') }}" class="btn btn-primary">Hire Me</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="section-container">
            <h3>Mark Alexis Macarilay</h3>
            <p>Software Developer</p>
            <div class="social-links">
                <a href="https://www.facebook.com/sphinx0224/" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/kraken022400/" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://github.com/DarkZone24" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/mark-alexis-macarilay-654287359/" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <p style="font-size: 0.9rem; opacity: 0.6;">© 2025. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        function downloadCV(url, filename) {
    // Create temporary link element
    const link = document.createElement('a');
    link.href = url;
    link.download = filename;
    link.style.display = 'none';
    
    // Add to document and trigger click
    document.body.appendChild(link);
    link.click();
    
    // Clean up
    document.body.removeChild(link);
}
        // Enhanced navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            const scrollToTopBtn = document.querySelector('.scroll-to-top');
            
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(10, 10, 26, 0.98)';
                navbar.style.boxShadow = '0 5px 30px rgba(0, 171, 240, 0.1)';
            } else {
                navbar.style.background = 'rgba(15, 15, 35, 0.95)';
                navbar.style.boxShadow = 'none';
            }
            
            // Scroll to top button
            if (window.scrollY > 300) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Active navigation highlighting
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-menu a');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.add('active');
                }
            });
        });

        // Enhanced card hover effects
        document.querySelectorAll('.service-card, .skill-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-15px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.service-card, .skill-card, .about-content > *').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Typing effect for hero title (optional enhancement)
        function typeWriter(element, text, speed = 50) {
            let i = 0;
            element.innerHTML = '';
            
            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }
            type();
        }

    const text = "Software Developer";
    const typewriter = document.getElementById("typewriter");
    let i = 0;
    let isDeleting = false;
    let speed = 150; // typing speed per character

    function typeEffect() {
        if (!isDeleting && i < text.length) {
            // Add letters
            typewriter.innerHTML = text.substring(0, i + 1);
            i++;
            speed = 150;
        } 
        else if (isDeleting && i > 0) {
            // Remove letters
            typewriter.innerHTML = text.substring(0, i - 1);
            i--;
            speed = 100;
        }

        if (i === text.length && !isDeleting) {
            // Word is fully typed, now pause before deleting
            isDeleting = true;
            speed = 1000; 
        } 
        else if (i === 0 && isDeleting) {
            // Word is fully deleted, pause before typing again
            isDeleting = false;
            speed = 500;
        }

        setTimeout(typeEffect, speed);
    }

    // Start immediately
    typeEffect();

    document.addEventListener("DOMContentLoaded", () => {
  const aboutElements = document.querySelectorAll(
    ".section-title, .about-image, .about-text"
  );

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Play animation
          entry.target.classList.add("animate");
        } else {
          // Reset immediately when scrolled out
          entry.target.classList.remove("animate");
        }
      });
    },
    {
      threshold: 0.2, // Trigger when 20% visible
    }
  );

  aboutElements.forEach((el) => observer.observe(el));
});
    </script>
</body>
</html>