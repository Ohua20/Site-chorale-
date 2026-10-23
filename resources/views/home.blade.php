<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Immaculée Conception | Koumassi</title>

    <meta name="description"
          content="Découvre la Chorale Immaculée Conception de la paroisse Saint Joseph Artisan de Koumassi Nord-Est et rejoins-nous.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bleu: #073568;
            --bleu-fonce: #04264b;
            --bleu-clair: #eaf4ff;
            --or: #ffcc43;
            --blanc: #ffffff;
            --texte: #183454;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: var(--texte);
            background: var(--blanc);
            line-height: 1.7;
        }

        a {
            text-decoration: none;
        }

        button, a {
            -webkit-tap-highlight-color: transparent;
        }

        .container {
            width: min(1160px, 92%);
            margin: auto;
        }

        /* EN-TETE */

        .header {
            background: var(--bleu-fonce);
            color: var(--blanc);
            border-bottom: 2px solid var(--or);
        }

        .navbar {
            min-height: 88px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--blanc);
            min-width: 0;
        }

        .brand img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            flex-shrink: 0;
            border-radius: 0;
            border: none;
            background: transparent;
        }

        .brand h1 {
            font-family: 'Inria Serif', serif;
            font-size: 21px;
            line-height: 1.3;
        }

        .brand p {
            font-size: 12px;
            color: #e0eaff;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 23px;
        }

        .nav-links a {
            color: white;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: var(--or);
        }

        .nav-links .nav-join {
            background: var(--or);
            color: var(--bleu-fonce);
            padding: 11px 17px;
            border-radius: 25px;
        }

        /* CARROUSEL PRINCIPAL */

        .hero {
            position: relative;
            min-height: 600px;
            max-height: 80vh;
            overflow: hidden;
            background: var(--bleu-fonce);
            color: white;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity .7s ease;
            background-size: cover;
            background-position: center center;
        }

        .hero-slide.active {
            opacity: 1;
            visibility: visible;
        }

        .hero-slide::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                90deg,
                rgba(3, 35, 70, .98) 0%,
                rgba(3, 45, 88, .88) 38%,
                rgba(3, 45, 88, .2) 100%
            );
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: min(1160px, 92%);
            min-height: 600px;
            max-height: 80vh;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 55px 60px 75px 0;
        }

        .eyebrow {
            color: var(--or);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .hero-content h2 {
            max-width: 590px;
            font-family: 'Inria Serif', serif;
            font-size: clamp(35px, 4.5vw, 58px);
            line-height: 1.15;
            margin-bottom: 18px;
        }

        .hero-content h2 span {
            color: var(--or);
        }

        .hero-content > p {
            max-width: 490px;
            color: #eef5ff;
            font-size: 16px;
            margin-bottom: 26px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            padding: 14px 24px;
            border-radius: 30px;
            background: var(--or);
            color: var(--bleu-fonce);
            font-weight: bold;
            font-size: 14px;
            transition: transform .2s, background .2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            background: #ffdc76;
        }

        .slide-arrow {
            position: absolute;
            z-index: 3;
            top: 50%;
            transform: translateY(-50%);
            width: 42px;
            height: 42px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.7);
            color: var(--bleu);
            font-size: 25px;
            cursor: pointer;
            backdrop-filter: blur(4px);
        }

        .slide-arrow:hover {
            background: rgba(255, 204, 67, 0.9);
        }

        .slide-prev {
            left: 18px;
        }

        .slide-next {
            right: 18px;
        }

        .slide-dots {
            position: absolute;
            z-index: 3;
            bottom: 22px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .slide-dot {
            width: 11px;
            height: 11px;
            border: none;
            border-radius: 50%;
            background: #dce8f7;
            cursor: pointer;
        }

        .slide-dot.active {
            background: var(--or);
            transform: scale(1.15);
        }

        /* PRESENTATION */

        .section {
            padding: 75px 0;
        }

        .about-grid {
            display: grid;
            grid-template-columns: .85fr 1.4fr;
            align-items: center;
            gap: 48px;
        }

        .about-image {
            width: 100%;
            height: 330px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 12px 35px rgba(5, 42, 81, .12);
        }

        .about-carousel {
            position: relative;
            width: 100%;
            height: 330px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(5, 42, 81, .12);
        }

        .about-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity .7s ease;
            background-size: cover;
            background-position: center center;
        }

        .about-slide.active {
            opacity: 1;
            visibility: visible;
        }

        .about-arrow {
            position: absolute;
            z-index: 3;
            top: 50%;
            transform: translateY(-50%);
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.7);
            color: var(--bleu);
            font-size: 22px;
            cursor: pointer;
            transition: background .2s;
            backdrop-filter: blur(4px);
        }

        .about-arrow:hover {
            background: rgba(255, 204, 67, 0.9);
        }

        .about-prev {
            left: 12px;
        }

        .about-next {
            right: 12px;
        }

        .about-dots {
            position: absolute;
            z-index: 3;
            bottom: 16px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
        }

        .about-dot {
            width: 10px;
            height: 10px;
            border: none;
            border-radius: 50%;
            background: #dce8f7;
            cursor: pointer;
        }

        .about-dot.active {
            background: var(--or);
            transform: scale(1.15);
        }

        .section-label {
            color: #1672c5;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .section-title {
            color: var(--bleu);
            font-family: 'Inria Serif', serif;
            font-size: clamp(27px, 3vw, 37px);
            line-height: 1.3;
            margin-bottom: 14px;
        }

        .about-text {
            margin-bottom: 25px;
            font-size: 15px;
        }

        .values {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .value {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
        }

        .value-icon {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            margin: 0 auto 8px;
            border-radius: 50%;
            background: var(--bleu-clair);
            color: #1472c5;
            font-size: 24px;
        }

        .value small {
            display: block;
            font-weight: normal;
        }

        /* NOTRE EQUIPE : 3 BLOCS ALIGNES */

        .gallery-section {
            background: #edf6ff;
        }

        .gallery-heading {
            text-align: center;
            max-width: 680px;
            margin: 0 auto 42px;
        }

        .team-subtitle {
            color: #5b7190;
            max-width: 650px;
            margin: 0 auto;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 26px;
            align-items: stretch;
        }

        .team-card {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: var(--blanc);
            border-radius: 18px;
            box-shadow: 0 8px 26px rgba(5, 42, 81, .10);
            transition: transform .25s, box-shadow .25s;
        }

        .team-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 32px rgba(5, 42, 81, .16);
        }

        .team-media {
            position: relative;
            width: 100%;
            height: 380px;
            overflow: hidden;
            background: var(--bleu-fonce);
        }

        .team-media > img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .team-body {
            flex: 1;
            padding: 22px 22px 26px;
            text-align: center;
        }

        .team-tag {
            display: inline-block;
            margin-bottom: 8px;
            color: #1672c5;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .team-body h3 {
            color: var(--bleu);
            font-family: 'Inria Serif', serif;
            font-size: 23px;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .team-body p {
            color: #63758c;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Carrousels de la section equipe */

        .team-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity .7s ease;
        }

        .team-slide.active {
            opacity: 1;
            visibility: visible;
        }

        .team-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .team-slide-caption {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 60px 20px 44px;
            text-align: center;
            color: var(--blanc);
            background: linear-gradient(
                to top,
                rgba(4, 38, 75, .92) 0%,
                rgba(4, 38, 75, 0) 100%
            );
        }

        .team-slide-caption strong {
            display: block;
            font-family: 'Inria Serif', serif;
            font-size: 19px;
            line-height: 1.3;
        }

        .team-slide-caption span {
            font-size: 13px;
            color: var(--or);
        }

        .team-arrow {
            position: absolute;
            z-index: 3;
            top: 50%;
            transform: translateY(-50%);
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, .75);
            color: var(--bleu);
            font-size: 22px;
            cursor: pointer;
            backdrop-filter: blur(4px);
            transition: background .2s;
        }

        .team-arrow:hover {
            background: rgba(255, 204, 67, .95);
        }

        .team-prev {
            left: 10px;
        }

        .team-next {
            right: 10px;
        }

        .team-dots {
            position: absolute;
            z-index: 3;
            bottom: 14px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
        }

        .team-dot {
            width: 10px;
            height: 10px;
            padding: 0;
            border: none;
            border-radius: 50%;
            background: #dce8f7;
            cursor: pointer;
        }

        .team-dot.active {
            background: var(--or);
            transform: scale(1.2);
        }

        /* INVITATION */

        .join-section {
            padding: 70px 0;
            text-align: center;
        }

        .join-card {
            background: linear-gradient(135deg, #edf6ff, #ffffff);
            border: 1px solid #e0ecf8;
            border-radius: 20px;
            padding: 45px 24px;
        }

        .join-card p {
            margin: 0 auto 18px;
            max-width: 650px;
        }

        .rehearsal {
            color: var(--bleu);
            font-weight: bold;
            margin-bottom: 25px !important;
        }

        /* PIED DE PAGE */

        .footer {
            background: var(--bleu-fonce);
            color: white;
            padding: 28px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .footer strong {
            font-family: 'Inria Serif', serif;
        }

        .footer p {
            font-size: 12px;
            color: #dce8f7;
        }

        /* PETIT ECRAN D'ORDINATEUR */

        @media (max-width: 1100px) {
            .team-grid {
                gap: 18px;
            }

            .team-media {
                height: 330px;
            }

            .team-body h3 {
                font-size: 20px;
            }
        }

        /* TABLETTE */

        @media (max-width: 1024px) and (min-width: 768px) {
            .hero,
            .hero-content {
                min-height: 500px;
                max-height: 70vh;
            }

            .hero-content {
                padding: 45px 40px 65px 0;
            }

            .hero-content h2 {
                font-size: 42px;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .about-image,
            .about-carousel {
                height: 320px;
            }

            .about-arrow {
                width: 32px;
                height: 32px;
                font-size: 20px;
            }
        }

        /* TABLETTE ET MOBILE : LES 3 BLOCS S'EMPILENT */

        @media (max-width: 900px) {
            .team-grid {
                grid-template-columns: 1fr;
                max-width: 480px;
                margin: auto;
                gap: 28px;
            }

            .team-media {
                height: 380px;
            }
        }

        /* MOBILE */

        @media (max-width: 767px) {
            .navbar {
                flex-wrap: wrap;
            }

            .nav-links {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 15px;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .about-image,
            .about-carousel {
                height: 300px;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                justify-content: center;
                text-align: center;
                gap: 14px;
            }

            .brand {
                width: 100%;
                justify-content: center;
                text-align: left;
            }

            .brand img {
                width: 49px;
                height: 49px;
            }

            .brand h1 {
                font-size: 16px;
            }

            .brand p {
                font-size: 10px;
            }

            .nav-links {
                gap: 12px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .nav-links .nav-join {
                padding: 8px 12px;
            }

            .hero,
            .hero-content {
                min-height: 500px;
                max-height: 60vh;
            }

            .hero-slide {
                background-position: center center;
            }

            .hero-content {
                padding: 45px 28px 65px;
            }

            .hero-content h2 {
                font-size: 37px;
            }

            .hero-content > p {
                font-size: 14px;
            }

            .slide-arrow {
                width: 34px;
                height: 34px;
                font-size: 20px;
            }

            .slide-prev {
                left: 8px;
            }

            .slide-next {
                right: 8px;
            }

            .section {
                padding: 48px 0;
            }

            .about-image,
            .about-carousel {
                height: 250px;
            }

            .about-arrow {
                width: 30px;
                height: 30px;
                font-size: 18px;
            }

            .about-prev {
                left: 8px;
            }

            .about-next {
                right: 8px;
            }

            .values {
                grid-template-columns: repeat(2, 1fr);
                row-gap: 20px;
            }

            .team-media {
                height: 330px;
            }

            .team-body {
                padding: 18px 16px 22px;
            }

            .join-card {
                padding: 32px 18px;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                scroll-behavior: auto !important;
                transition: none !important;
                animation: none !important;
            }
        }
    </style>
</head>

<body>

    <!-- EN-TETE -->
    <header class="header">
        <div class="container navbar">

            <a href="{{ url('/') }}" class="brand">
                <img
                    src="{{ asset('assets/images/logo.png') }}"
                    alt="Logo de la Chorale Immaculée Conception"
                >

                <div>
                    <h1>Chorale Immaculée Conception</h1>
                    <p>Paroisse Saint Joseph Artisan de Koumassi Nord-Est</p>
                </div>
            </a>

        </div>
    </header>

    <main>

        <!-- CARROUSEL PRINCIPAL -->
        <section class="hero" aria-label="Présentation de la chorale">

            <div class="hero-slide active"
                 style="background-image: url('{{ asset('assets/images/Chorale 1.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/Chorale 2.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/Chorale 3.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/Chorale 4.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/Chorale 5.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/chorale 6.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/chorale 7.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/chorale 8.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/chorale 9.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/chorale 10.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/chorale 11.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/chorale 12.jpeg') }}')">
            </div>

            <div class="hero-slide"
                 style="background-image: url('{{ asset('assets/images/chorale 13.jpeg') }}')">
            </div>

            <div class="hero-content">
                <h2>Immaculée Conception</h2>

                <p style="font-size: 24px; font-weight: 600; color: var(--or); margin-top: 8px; font-family: 'Inria Serif', serif;">
                    Conçue sans péché,<br>
                    le charme est sans rival
                </p>

                <a href="/formulaire" class="btn">
                    ♫ &nbsp; S'inscrire à la chorale
                </a>
            </div>

            <button class="slide-arrow slide-prev"
                    type="button"
                    aria-label="Photo précédente">
                &#8249;
            </button>

            <button class="slide-arrow slide-next"
                    type="button"
                    aria-label="Photo suivante">
                &#8250;
            </button>

            <div class="slide-dots" aria-label="Choisir une photo">
                <button class="slide-dot active" type="button" aria-label="Photo 1"></button>
                <button class="slide-dot" type="button" aria-label="Photo 2"></button>
                <button class="slide-dot" type="button" aria-label="Photo 3"></button>
                <button class="slide-dot" type="button" aria-label="Photo 4"></button>
                <button class="slide-dot" type="button" aria-label="Photo 5"></button>
                <button class="slide-dot" type="button" aria-label="Photo 6"></button>
                <button class="slide-dot" type="button" aria-label="Photo 7"></button>
                <button class="slide-dot" type="button" aria-label="Photo 8"></button>
                <button class="slide-dot" type="button" aria-label="Photo 9"></button>
                <button class="slide-dot" type="button" aria-label="Photo 10"></button>
                <button class="slide-dot" type="button" aria-label="Photo 11"></button>
                <button class="slide-dot" type="button" aria-label="Photo 12"></button>
                <button class="slide-dot" type="button" aria-label="Photo 13"></button>
            </div>

        </section>

        <!-- PRESENTATION -->
        <section class="section" id="apropos">
            <div class="container about-grid">

                <div class="about-carousel">
                    <div class="about-slide active"
                         style="background-image: url('{{ asset('assets/images/chorale 17.jpeg') }}')">
                    </div>

                    <div class="about-slide"
                         style="background-image: url('{{ asset('assets/images/chorale 18.jpeg') }}')">
                    </div>

                    <div class="about-slide"
                         style="background-image: url('{{ asset('assets/images/chorale 20.jpeg') }}')">
                    </div>

                    <div class="about-slide"
                         style="background-image: url('{{ asset('assets/images/chorale 19.jpeg') }}')">
                    </div>

                    <div class="about-slide"
                         style="background-image: url('{{ asset('assets/images/chorale 22.jpeg') }}')">
                    </div>

                    <button class="about-arrow about-prev"
                            type="button"
                            aria-label="Photo précédente">
                        &#8249;
                    </button>

                    <button class="about-arrow about-next"
                            type="button"
                            aria-label="Photo suivante">
                        &#8250;
                    </button>

                    <div class="about-dots" aria-label="Choisir une photo">
                        <button class="about-dot active" type="button" aria-label="Photo 1"></button>
                        <button class="about-dot" type="button" aria-label="Photo 2"></button>
                        <button class="about-dot" type="button" aria-label="Photo 3"></button>
                        <button class="about-dot" type="button" aria-label="Photo 4"></button>
                        <button class="about-dot" type="button" aria-label="Photo 5"></button>
                    </div>
                </div>

                <div>
                    <p class="section-label">Présentation de la</p>

                    <h2 class="section-title">
                        Chorale Immaculée Conception
                    </h2>

                    <p class="about-text">
                        La chorale Immaculée Conception est une chorale jeune à caractère marial créée en 2007 lors de la création de la paroisse Saint Joseph Artisan de Koumassi Nord-Est. Elle est constituée de jeunes hommes et femmes qui ont l’amour du chant sacré. Notre mission est d’assurer l’animation des messes, mariages, veillées et d’autres animations sous la sollicitation.
                    </p>

                    <div class="values">
                        <div class="value">
                            <div class="value-icon">♫</div>
                            Louange
                            <small>et adoration</small>
                        </div>

                        <div class="value">
                            <div class="value-icon">🙏</div>
                            Prière
                            <small>et fraternité</small>
                        </div>

                        <div class="value">
                            <div class="value-icon">♡</div>
                            Service
                            <small>de la paroisse</small>
                        </div>

                        <div class="value">
                            <div class="value-icon">✝</div>
                            Foi
                            <small>au quotidien</small>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- NOTRE EQUIPE : 3 BLOCS ALIGNES -->
        <section class="section gallery-section" id="galerie">
            <div class="container">

                <div class="gallery-heading">
                    <p class="section-label">Les personnes qui nous guident</p>

                    <h2 class="section-title">Notre équipe</h2>

                    <p class="team-subtitle">
                        Découvrez les personnes qui contribuent à l'organisation
                        de notre chorale et à la beauté de nos chants au service de Dieu.
                    </p>
                </div>

                <div class="team-grid">

                    <!-- BLOC 1 : LE BUREAU EXECUTIF (UNE PHOTO DE TOUS LES MEMBRES) -->
                    <article class="team-card">

                        <div class="team-media">
                            <img
                                src="{{ asset('assets/images/chorale 21.jpeg') }}"
                                alt="Photo de tous les membres du bureau exécutif"
                                loading="lazy"
                            >
                        </div>

                        <div class="team-body">
                            <span class="team-tag">Ceux qui organisent</span>
                            <h3>Le bureau exécutif</h3>
                            <p>
                                Les responsables qui coordonnent la vie de la chorale
                                et veillent à son bon fonctionnement.
                            </p>
                        </div>

                    </article>

                    <!-- BLOC 2 : CARROUSEL DES DEUX MAITRES DE CHOEUR -->
                    <article class="team-card">

                        <div class="team-media team-carousel"
                             data-interval="5000"
                             aria-label="Carrousel des maîtres de chœur">

                            <div class="team-slide active">
                                <img
                                    src="{{ asset('assets/images/chorale 25.jpeg') }}"
                                    alt="Premier maître de chœur"
                                    loading="lazy"
                                >

                                <div class="team-slide-caption">
                                    <strong>Nom du premier maître de chœur</strong>
                                    <span>Mr NABIL Emmanuel</span>
                                </div>
                            </div>

                            <div class="team-slide">
                                <img
                                    src="{{ asset('assets/images/chorale 11.jpeg') }}"
                                    alt="Deuxième maître de chœur"
                                    loading="lazy"
                                >

                                <div class="team-slide-caption">
                                    <strong>Nom de la deuxième maîtresse de chœur</strong>
                                    <span>Mlle AHUI Mirthe</span>
                                </div>
                            </div>

                            <button class="team-arrow team-prev"
                                    type="button"
                                    aria-label="Maître de chœur précédent">
                                &#8249;
                            </button>

                            <button class="team-arrow team-next"
                                    type="button"
                                    aria-label="Maître de chœur suivant">
                                &#8250;
                            </button>

                            <div class="team-dots" aria-label="Choisir un maître de chœur">
                                <button class="team-dot active" type="button" aria-label="Premier maître de chœur"></button>
                                <button class="team-dot" type="button" aria-label="Deuxième maître de chœur"></button>
                            </div>
                        </div>

                        <div class="team-body">
                            <span class="team-tag">Ceux qui dirigent</span>
                            <h3>Nos maîtres de chœur</h3>
                            <p>
                                Ils dirigent nos voix et nous guident dans
                                l'apprentissage et l'harmonie des chants sacrés.
                            </p>
                        </div>

                    </article>

                    <!-- BLOC 3 : NOTRE FAMILLE CHORALE (CARROUSEL DE PHOTOS) -->
                    <article class="team-card">

                        <div class="team-media team-carousel"
                             data-interval="4000"
                             aria-label="Carrousel de la famille chorale">

                            <div class="team-slide active">
                                <img
                                    src="{{ asset('assets/images/chorale 30.jpeg') }}"
                                    alt="Photo de la famille chorale 1"
                                    loading="lazy"
                                >
                            </div>

                            <div class="team-slide">
                                <img
                                    src="{{ asset('assets/images/chorale 31.jpeg') }}"
                                    alt="Photo de la famille chorale 2"
                                    loading="lazy"
                                >
                            </div>

                            <div class="team-slide">
                                <img
                                    src="{{ asset('assets/images/chorale 32.jpeg') }}"
                                    alt="Photo de la famille chorale 3"
                                    loading="lazy"
                                >
                            </div>

                            <div class="team-slide">
                                <img
                                    src="{{ asset('assets/images/chorale 33.jpeg') }}"
                                    alt="Photo de la famille chorale 4"
                                    loading="lazy"
                                >
                            </div>

                            <div class="team-slide">
                                <img
                                    src="{{ asset('assets/images/chorale 34.jpeg') }}"
                                    alt="Photo de la famille chorale 5"
                                    loading="lazy"
                                >
                            </div>

                            <div class="team-slide">
                                <img
                                    src="{{ asset('assets/images/chorale 35.jpeg') }}"
                                    alt="Photo de la famille chorale 6"
                                    loading="lazy"
                                >
                            </div>

                            <div class="team-slide">
                                <img
                                    src="{{ asset('assets/images/chorale 36.jpeg') }}"
                                    alt="Photo de la famille chorale 7"
                                    loading="lazy"
                                >
                            </div>

                            <button class="team-arrow team-prev"
                                    type="button"
                                    aria-label="Photo précédente">
                                &#8249;
                            </button>

                            <button class="team-arrow team-next"
                                    type="button"
                                    aria-label="Photo suivante">
                                &#8250;
                            </button>

                            <div class="team-dots" aria-label="Choisir une photo">
                                <button class="team-dot active" type="button" aria-label="Photo 1"></button>
                                <button class="team-dot" type="button" aria-label="Photo 2"></button>
                                <button class="team-dot" type="button" aria-label="Photo 3"></button>
                                <button class="team-dot" type="button" aria-label="Photo 4"></button>
                                <button class="team-dot" type="button" aria-label="Photo 5"></button>
                                <button class="team-dot" type="button" aria-label="Photo 6"></button>
                                <button class="team-dot" type="button" aria-label="Photo 7"></button>
                            </div>
                        </div>

                        <div class="team-body">
                            <span class="team-tag">Ensemble</span>
                            <h3>Notre famille chorale</h3>
                            <p>
                                Des moments de prière, de partage et de joie
                                vécus ensemble au service de la paroisse.
                            </p>
                        </div>

                    </article>

                </div>

            </div>
        </section>

        <!-- INVITATION -->
        <section class="join-section">
            <div class="container">
                <div class="join-card">

                    <p class="section-label">Tu aimes chanter ?</p>

                    <h2 class="section-title">
                        Rejoins la Chorale Immaculée Conception
                    </h2>

                    <p>
                        Que tu sois débutant ou expérimenté,
                        tu es le bienvenu. Viens partager ta voix,
                        ta joie et ton talent au service de DIEU !
                    </p>

                    <p class="rehearsal">
                        Répétitions : tous les mardis et vendredis à 19 h 30 sur la paroisse.
                    </p>

                    <a href="/formulaire" class="btn">
                        ♫ &nbsp; S'inscrire à la chorale
                    </a>

                </div>
            </div>
        </section>

    </main>

    <!-- PIED DE PAGE -->
    <footer class="footer">
        <div class="container footer-content">

            <div>
                <strong>Immaculée Conception</strong>
                <p>Paroisse Saint Joseph Artisan de Koumassi Nord-Est</p>
            </div>

            <div>
                <p>Koumassi Nord-Est, Abidjan</p>
                <p>Chanter, c'est prier deux fois.</p>
            </div>

            <div>
                <p>
                    &copy; {{ date('Y') }} Chorale Immaculée Conception
                </p>
                <p>Tous droits réservés.</p>
            </div>

        </div>
    </footer>

    <!-- FONCTIONNEMENT DES CARROUSELS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            /* CARROUSEL PRINCIPAL */
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.slide-dot');
            const previous = document.querySelector('.slide-prev');
            const next = document.querySelector('.slide-next');

            let current = 0;
            let timer;

            function showSlide(index) {
                current = (index + slides.length) % slides.length;

                slides.forEach(function (slide, i) {
                    slide.classList.toggle('active', i === current);
                });

                dots.forEach(function (dot, i) {
                    dot.classList.toggle('active', i === current);
                });
            }

            function startCarousel() {
                clearInterval(timer);

                timer = setInterval(function () {
                    showSlide(current + 1);
                }, 5000);
            }

            if (slides.length > 0 && previous && next) {
                previous.addEventListener('click', function () {
                    showSlide(current - 1);
                    startCarousel();
                });

                next.addEventListener('click', function () {
                    showSlide(current + 1);
                    startCarousel();
                });

                dots.forEach(function (dot, i) {
                    dot.addEventListener('click', function () {
                        showSlide(i);
                        startCarousel();
                    });
                });

                showSlide(0);
                startCarousel();
            }

            /* CARROUSEL DE LA PRESENTATION */
            (function () {
                const aboutSlides = document.querySelectorAll('.about-slide');
                const aboutDots = document.querySelectorAll('.about-dot');
                const aboutPrevious = document.querySelector('.about-prev');
                const aboutNext = document.querySelector('.about-next');

                if (aboutSlides.length === 0) return;

                let aboutCurrent = 0;
                let aboutTimer;

                function showAboutSlide(index) {
                    aboutCurrent =
                        (index + aboutSlides.length) % aboutSlides.length;

                    aboutSlides.forEach(function (slide, i) {
                        slide.classList.toggle('active', i === aboutCurrent);
                    });

                    aboutDots.forEach(function (dot, i) {
                        dot.classList.toggle('active', i === aboutCurrent);
                    });
                }

                function startAboutCarousel() {
                    clearInterval(aboutTimer);

                    aboutTimer = setInterval(function () {
                        showAboutSlide(aboutCurrent + 1);
                    }, 4000);
                }

                if (aboutPrevious) {
                    aboutPrevious.addEventListener('click', function () {
                        showAboutSlide(aboutCurrent - 1);
                        startAboutCarousel();
                    });
                }

                if (aboutNext) {
                    aboutNext.addEventListener('click', function () {
                        showAboutSlide(aboutCurrent + 1);
                        startAboutCarousel();
                    });
                }

                aboutDots.forEach(function (dot, i) {
                    dot.addEventListener('click', function () {
                        showAboutSlide(i);
                        startAboutCarousel();
                    });
                });

                showAboutSlide(0);
                startAboutCarousel();
            })();

            /* CARROUSELS DE LA SECTION EQUIPE (maîtres de chœur + famille chorale) */
            document.querySelectorAll('.team-carousel').forEach(function (carousel) {
                const teamSlides = carousel.querySelectorAll('.team-slide');
                const teamDots = carousel.querySelectorAll('.team-dot');
                const teamPrevious = carousel.querySelector('.team-prev');
                const teamNext = carousel.querySelector('.team-next');
                const interval = parseInt(carousel.dataset.interval, 10) || 5000;

                if (teamSlides.length === 0) return;

                let teamCurrent = 0;
                let teamTimer;

                function showTeamSlide(index) {
                    teamCurrent = (index + teamSlides.length) % teamSlides.length;

                    teamSlides.forEach(function (slide, i) {
                        slide.classList.toggle('active', i === teamCurrent);
                    });

                    teamDots.forEach(function (dot, i) {
                        dot.classList.toggle('active', i === teamCurrent);
                    });
                }

                function startTeamCarousel() {
                    clearInterval(teamTimer);

                    teamTimer = setInterval(function () {
                        showTeamSlide(teamCurrent + 1);
                    }, interval);
                }

                if (teamPrevious) {
                    teamPrevious.addEventListener('click', function () {
                        showTeamSlide(teamCurrent - 1);
                        startTeamCarousel();
                    });
                }

                if (teamNext) {
                    teamNext.addEventListener('click', function () {
                        showTeamSlide(teamCurrent + 1);
                        startTeamCarousel();
                    });
                }

                teamDots.forEach(function (dot, i) {
                    dot.addEventListener('click', function () {
                        showTeamSlide(i);
                        startTeamCarousel();
                    });
                });

                showTeamSlide(0);
                startTeamCarousel();
            });

        });
    </script>

</body>
</html>