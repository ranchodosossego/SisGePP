<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rancho do Sossego</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Favicons -->
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }

    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>

    <script src="https://kit.fontawesome.com/10e61a68c4.js" crossorigin="anonymous"></script>

</head>

<body class="antialiased">

    {{-- Novo body --}}

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:ranchodosossego.al20@gmail.com">ranchodosossego.al20@gmail.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+55 82 98161 3742</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <h1 class="text-light"><a href="/">#ProdutorRural</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#hero">Vamos lá</a></li>
                    <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
                    <li><a class="nav-link scrollto" href="#services">O Leite</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Derivados</a></li>
                    <li><a class="nav-link scrollto" href="#team">Equipe</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contato</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a class="nav-link scrollto active" href="{{ url('/home') }}">Home</a></li>
                        @else
                            <li><a class="nav-link scrollto active" href="{{ route('login') }}">Log in</a></li>
                        @endauth
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container" data-aos="fade-up">
            <h1>Bem vindo ao Rancho do Sossego</h1>
            <h2>Gratidão por ser produtor rural.</h2>
            <a href="#about" class="btn-get-started scrollto">Vamos lá</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-xl-6 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                        data-aos="zoom-in">
                        <a href="https://www.youtube.com/watch?v=oLfPm2i-1F0" target="_blank"
                            class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-xl-6 col-lg-6 d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">

                        <div class="box-heading" data-aos="fade-up">
                            <h4>Sobre</h4>
                            <h3>Trazendo o Vale do Paraíba para o mapa</h3>
                            <p>O Rancho do Sossego nasce como uma unidade de produção de leite in natura, instalada no
                                município de Capela, precisamente na CAP-106, na localidade de Fazenda Porto de Canoas,
                                que compõem a região do Vale do Paraíba, no Estado de Alagoas.
                            </p>
                        </div>

                        <div class="icon-box" data-aos="fade-up">
                            <div class="icon"><i class="bx bx-dna"></i></div>
                            <h4 class="title"><a href="">DNA de Sucesso</a></h4>
                            <p class="description">Temos como meta agregar valor ao produto e entregar retorno aos
                                investidores.</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-atom"></i></div>
                            <h4 class="title"><a href="">Nascidos na era digital</a></h4>
                            <p class="description">Nos destacamos por ter uma equipe bem treindada para coletar e
                                interpretar as informações da lida do dia-a-dia e 100% alihada com o planejamento da
                                empresa.</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-check-shield"></i></div>
                            <h4 class="title"><a href="">Nossa Missão</a></h4>
                            <p class="description">Ofereceremos aos nossos clientes leite <i>in natura</i> de
                                excelente qualidade, promovendo altos padrões no manejo e melhoramento genético do nosso
                                rebanho leiteiro.</p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="section-title" data-aos="zoom-in">
                    <h2>Você sabia?</h2>
                    <h3>Mais de <span>6 bilhões</span> de pessoas consomem leite e seus derivados!</h3>
                    <p>O Brasil é o 5º maior consumidor de leite do mundo.</p>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="box" data-aos="fade-up">
                            <span>01</span>
                            <h4>DNA de Sucesso</h4>
                            <p>Girolando completa 25 anos com quase 2 milhões de registros, sendo responsável por 80% do
                                leite no país, a raça acumula indicadores positivos desde que foi reconhecida.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="fade-up" data-aos-delay="100">
                            <span>02</span>
                            <h4>Nutrição</h4>
                            <p>O leite é um alimento completo. Fornece cálcio, é rico em proteína e contém inúmeros
                                nutrientes, como o magnésio e a vitamina B12, que contribuem para a redução de diversas
                                doenças.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <span>03</span>
                            <h4>+ Produção</h4>
                            <p>De acordo com o Censo 2017, o Brasil possui 1,1 milhão de propriedades leiteiras. Juntas,
                                produzem cerca de 35 bilhões de litros de leite por ano, conforme dados do IBGE, de
                                2019.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-4 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="2000000" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Milhões de Registros</p>
                    </div>

                    <div class="col-lg-4 col-6 text-center">
                        <span data-purecounter-start="1" data-purecounter-end="1100000" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Milhão de Propriedades em 2017</p>
                    </div>

                    <div class="col-lg-4 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="35" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Bilhões de litros em 2019</p>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="text-center">
                    <h3>#EstamosJuntos</h3>
                    <p>Teremos a imensa satisfação em atendê-los no que for possível.</p>
                    <a class="cta-btn" href="#">Fale Conosco</a>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title" data-aos="zoom-in">
                    <h2>O Leite</h2>
                    <h3>Conhecendo <span><i class="bx bxs-message-rounded-add"></i></span></h3>
                    <p>
                        Basta dar uma breve olhada nas prateleiras para constatar que existe leite para todos os tipos
                        de
                        gosto e necessidades. Vamos entender um pouco mais!
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box" data-aos="zoom-in">
                            <div class="icon"><i class="fas fa-battery-full"></i></div>
                            <h4><a href="">Integral</a></h4>
                            <p>
                                O leite integral é aquele que contém maior teor de gordura,
                                <a href="" class="fw-bolder initialism">no mínimo 3%.</a> Vale destacar que a gordura do
                                leite é importante para o organismo. Esse nutriente ajuda na absorção de vitaminas
                                lipossolúveis, como a vitamina A e D. Além disso, auxiliam em quadros de desnutrição
                                infantil que apresentam baixo peso.

                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="fas fa-battery-three-quarters"></i></div>
                            <h4><a href="">Semidesnatado</a></h4>
                            <p>Em relação aos seus valores nutricionais, o leite semidesnatado possui uma quantidade
                                maior de
                                vitaminas A, D e E, se comparado ao leite desnatado, passando a ter
                                <a href="" class="fw-bolder initialism">entre 0,6% e 2,9%</a>. Por exemplo, para cada
                                100 g de leite,
                                o leite semidesnatado terá entre 0,6 e 2,9 g de gordura. Por causa disso, ele é uma
                                opção saudável
                                para ser usado no preparo de receitas feitas à base de leite, como bolos,
                                massas, iogurtes e bebidas lácteas.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon"><i class="fas fa-battery-empty"></i></div>
                            <h4><a href="">Desnatado</a></h4>
                            <p>Esse tipo de leite é mais indicado para aqueles que sofrem de alguma doença do sistema
                                cardiovascular ou que estejam em uma dieta alimentar para a perda de peso. O leite
                                desnatado após o processo de industrialização tem seu índice de gordura reduzido a
                                <a href="" class="fw-bolder initialism">no máximo 0,5%.</a> Assim como os outros dois
                                tipos este mantém os mesmos minerais.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="fab fa-autoprefixer"></i></div>
                            <h4><a href="">Tipo A</a></h4>
                            <p>É obtido de um único rebanho e não há contato manual com o leite em nenhuma fase do
                                processo,
                                ou seja, a ordenha é mecânica e o leite segue por tubulações diretamente para o
                                compartimento
                                onde sofre pasteurização, homogeneização e envase. O número máximo de bactérias
                                permitido para
                                este leite é de 500/ml.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                            <div class="icon"><i class="fas fa-bold"></i></div>
                            <h4><a href="">Tipo B</a></h4>
                            <p>É obtido de rebanhos diferentes e sua ordenha pode ser realizada mecânica ou manualmente.
                                O leite deve ser refrigerado no próprio local da ordenha (propriedade rural) por até 48
                                horas em
                                temperatura igual ou inferior a 4 ºC e transportado em tanques até o local apropriado,
                                onde será processado.
                                O número máximo de bactérias permitido para este leite é de 40.000/ml.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
                            <div class="icon"><i class="fab fa-cuttlefish"></i></div>
                            <h4><a href="">Tipo C</a></h4>
                            <p>Tem a mesma origem e tipo de ordenha do leite tipo B. Entretanto, não é refrigerado na
                                fazenda leiteira.
                                Após a ordenha, o leite é transportado em tanques até um local apropriado
                                (estabelecimento industrial)
                                até as 10:00 h do dia de sua obtenção, onde só então é processado, seguindo os prazos
                                estipulados por lei.
                                Este processo eleva bastante o número de bactérias presentes no leite, que pode chegar,
                                por determinação da lei, a 100.000/ml.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="fas fa-thermometer-half"></i></div>
                            <h4><a href="">Pasteurizado</a></h4>
                            <p>
                                É um processo de esterilização, geralmente <a href=""
                                    class="fw-bolder initialism">encontrado em saquinho</a>
                                , é aquecido a mais de 7ºC até 20 segundos, e então resfriado muito rapidamente a -4ºC.
                                Esse método, mata apenas as
                                bactérias que causam doenças
                            <figure>
                                <blockquote class="blockquote">
                                    <p></p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    <cite title="Conserva">e conserva o leite por até sete dias.</cite>
                                </figcaption>
                            </figure>
                            <cite>


                                </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                            <div class="icon"><i class="fas fa-temperature-high"></i></div>
                            <h4><a href="">UHT</a></h4>
                            <p>Outro processo de esterilização, também conhecido como ultrapasteurização, é o processo
                                UHT (ultra high temperature, em inglês),
                                típico do <a href="" class="fw-bolder initialism">leite de caixinha ou longa vida</a>
                                , é mais radical: o leite é aquecido a 140 °C por até 8 segundos. Como praticamente
                                nenhuma bactéria sobrevive,
                            <figure>
                                <blockquote class="blockquote">
                                    <p></p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    <cite title="Conserva">ele dura 4 meses em temperatura ambiente.</cite>
                                </figcaption>
                            </figure>
                            <cite>
                                </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
                            <div class="icon"><i class="fab fa-pagelines"></i></div>
                            <h4><a href="">in Natura</a></h4>
                            <p>Consiste no emprego de tecnologias (boas práticas) e cuidados higiênicos, que envolvem a
                                limpeza
                                e a desinfecção periódica das instalações, dos materiais e dos utensílios utilizados,
                                pela
                                coleta e pelo ordenhador, no transporte, no armazenamento e no processamento, visando à
                                produção
                                de leite de alta qualidade.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title" data-aos="zoom-in">
                    <h2>Derivados</h2>
                    <h3>Para <span>Você</span></h3>
                    <p>Os produtos lácteos, também conhecidos como laticínios, são os derivados do
                        leite que fazem parte do cotidiano alimentar da maioria das pessoas e que são produzidos
                        a partir do uso de leite.</p>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Todos</li>
                            <li data-filter=".filter-fermentado">Fermentados</li>
                            <li data-filter=".filter-creme">Creme de Leite</li>
                            <li data-filter=".filter-manteiga">Manteiga</li>
                            <li data-filter=".filter-requeijao">Requeijão</li>
                            <li data-filter=".filter-queijos">Queijos</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-queijos">
                        <img src="assets/img/portfolio/portfolio-13.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Mozzarella</h4>
                            <p>Queijo Mozzarella</p>
                            <a href="assets/img/portfolio/portfolio-13.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Queijo Mozzarella"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-requeijao">
                        <img src="assets/img/portfolio/portfolio-12.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Requeijão</h4>
                            <p>Requeijão</p>
                            <a href="assets/img/portfolio/portfolio-12.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Requeijão"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-manteiga">
                        <img src="assets/img/portfolio/portfolio-11.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Acidificada</h4>
                            <p>Manteiga acidificada</p>
                            <a href="assets/img/portfolio/portfolio-11.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Manteiga acidificada"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-manteiga">
                        <img src="assets/img/portfolio/portfolio-10.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Ghee</h4>
                            <p>Manteiga clarificada (manteiga ghee)</p>
                            <a href="assets/img/portfolio/portfolio-10.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Manteiga clarificada (manteiga ghee)"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-queijos">
                        <img src="assets/img/portfolio/portfolio-15.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Provolone </h4>
                            <p>Queijo Provolone</p>
                            <a href="assets/img/portfolio/portfolio-15.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Queijo Provolone"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-creme">
                        <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Light</h4>
                            <p>Creme de Leite Light</p>
                            <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Creme de Leite Light"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-creme">
                        <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Chantilly</h4>
                            <p>Creme de Leite para Chantilly</p>
                            <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Creme de Leite para Chantilly"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-queijos">
                        <img src="assets/img/portfolio/portfolio-16.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Prato</h4>
                            <p>Queijo Prato</p>
                            <a href="assets/img/portfolio/portfolio-16.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Queijo Prato"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-creme">
                        <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Buttermilk</h4>
                            <p>Buttermilk ou leitelho</p>
                            <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Buttermilk ou leitelho"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-manteiga">
                        <img src="assets/img/portfolio/portfolio-18.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Manteiga</h4>
                            <p>Manteiga batida</p>
                            <a href="assets/img/portfolio/portfolio-18.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Manteiga batida"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-queijos">
                        <img src="assets/img/portfolio/portfolio-24.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Manteiga</h4>
                            <p>Queijo Manteiga</p>
                            <a href="assets/img/portfolio/portfolio-24.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Queijo Manteiga"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-fermentado">
                        <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Kefir</h4>
                            <p>Kefir</p>
                            <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Kefir"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-queijos">
                        <img src="assets/img/portfolio/portfolio-17.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Minas</h4>
                            <p>Queijo Minas Frescal</p>
                            <a href="assets/img/portfolio/portfolio-17.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Queijo Minas Frescal"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-fermentado">
                        <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Coalhada</h4>
                            <p>Coalhada</p>
                            <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Coalhada"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-queijos">
                        <img src="assets/img/portfolio/portfolio-19.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Gorgonzola</h4>
                            <p>Queijo Gorgonzola</p>
                            <a href="assets/img/portfolio/portfolio-19.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Queijo Gorgonzola"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-creme">
                        <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Sour cream</h4>
                            <p>Sour cream ou creme de leite azedo</p>
                            <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Sour cream ou creme de leite azedo"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-queijos">
                        <img src="assets/img/portfolio/portfolio-23.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Coalho</h4>
                            <p>Queijo Coalho</p>
                            <a href="assets/img/portfolio/portfolio-23.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Queijo Coalho"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-fermentado">
                        <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Leite</h4>
                            <p>Leite Fermentado</p>
                            <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Leite Fermentado"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-manteiga">
                        <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Baratte</h4>
                            <p>Manteiga de baratte ou extrafina</p>
                            <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Manteiga de baratte ou extrafina"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-queijos">
                        <img src="assets/img/portfolio/portfolio-20.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Parmesão</h4>
                            <p>Queijo Parmesão</p>
                            <a href="assets/img/portfolio/portfolio-20.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Queijo Parmesão"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-fermentado">
                        <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Iogurte</h4>
                            <p>Bebida Fermentada</p>
                            <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Iogurte"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-queijos">
                        <img src="assets/img/portfolio/portfolio-21.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Cheddar</h4>
                            <p>Queijo Cheddar</p>
                            <a href="assets/img/portfolio/portfolio-21.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Queijo Cheddar"><i
                                    class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="+ Detalhes"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="zoom-in">
                    <h2>Equipe</h2>
                    <h3>Trabalhamos <span> Duro!</span></h3>
                    <p>Para oferecer aos nossos clientes leite <i>in natura</i> de alta qualidade, com
                        altos padrões de manejo e melhoramento genético.</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Dayana Ferreira</h4>
                                <span>Gerente Geral</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Marcelo Maia</h4>
                                <span>Gerente de Produção e Novas Tecnologias</span>
                            </div>
                        </div>
                    </div>
{{--
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                            </div>
                        </div>
                    </div> --}}

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Testimonials Section ======= -->
        {{-- <section id="testimonials" class="testimonials invisible">
            <div class="container">

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                    veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                    minim.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                    fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                    dolore labore illum veniam.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                    culpa fore nisi cillum quid.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section --> --}}

        <!-- ======= Pricing Section ======= -->
        {{-- <section id="pricing" class="pricing">
            <div class="container">

                <div class="section-title" data-aos="zoom-in">
                    <h2>Equipamentos</h2>
                    <h3>Equipamentos <span>Básicos</span></h3>
                    <p>lsfs sdfsdfg df .</p>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="box" data-aos="zoom-in" data-aos-delay="200">
                            <h3>Free</h3>
                            <h4><sup>$</sup>0<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li class="na">Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                        <div class="box recommended" data-aos="zoom-in" data-aos-delay="100">
                            <span class="recommended-badge">Recommended</span>
                            <h3>Business</h3>
                            <h4><sup>$</sup>19<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="200">
                            <h3>Developer</h3>
                            <h4><sup>$</sup>29<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Pricing Section --> --}}

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container">

                <div class="section-title" data-aos="zoom-in">
                    <h2>F.A.Q</h2>
                    <h3>Dúvidas <span>Frequentes</span></h3>
                    <p>Preparamos algumas respostas para você tirar suas dúvidas de um jeito fácil.
                        Fique por dentro de tudo sobre o Leite!</p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-1" class="collapsed">Qual o tipo de leite que as
                                crianças devem receber – leite semi-desnatado, desnatado, integral? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    A criança de mais de 1 ano precisa tomar leite integral, que contém a gordura
                                    original do leite. Há vitaminas, como a A e D, que precisam da gordura. Crianças até 2 anos devem
                                    tomar leite que tem de conter pelo menos 3% de gordura.
                                </p>
                                <p>
                                    O semidesnatado é o leite que contém parte da gordura natural do leite, numa proporção de 0,6% a 2,9%.
                                    Em situações especiais, pode ser dado a crianças de mais de 2 anos com problema de obesidade, seguindo
                                    orientação do pediatra.
                                </p>
                                <p>
                                    Já o desnatado é aquele que pode ter, no máximo, 0,5% de gordura. Não é recomendado para crianças em nenhuma situação.
                                </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Para quem são indicados os produtos sem lactose? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    O leite é um alimento rico em nutrientes que trazem benefícios a saúde, como proteínas e cálcio. Porém, algumas pessoas podem apresentar
                                    desconfortos intestinais relacionado a ingestão da lactose, que é um açúcar naturalmente presente no leite. A intolerância à lactose é a
                                    condição relacionada a deficiência total ou parcial na produção da enzima lactase pelo organismo.
                                </p>
                                <p>
                                    Essa deficiência é responsável por causar sintomas como dor, distensão abdominal, flatulência e diarreia após o consumo de produtos lácteos tradicionais.
                                    Apesar disso, não há a necessidade de excluir totalmente o leite e seus derivados da alimentação dos intolerantes que assim desejem, pois hoje existem no
                                    mercado diversos produtos que conta com a adição da enzima lactase na sua fórmula.
                                </p>
                                <p>
                                    No processo de fabricação desses produtos, as enzimas adicionadas quebram o açúcar do leite em moléculas menores e de mais fácil digestão: a glicose e a galactose.
                                    Desta forma, eles podem ser consumidos tranquilamente por intolerantes à lactose e aqueles que sentem algum desconforto ao ingerir lácteos. As pessoas que não
                                    apresentam intolerância à lactose não precisam utilizar alimentos sem lactose, entretanto podem fazê-lo se assim desejarem.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Existem conservantes usados no leite UHT?
                                 <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    O tratamento térmico ultra-alto usado na produção do leite UHT mata todos os micro-organismos.
                                    Em seguida, o leite é acondicionado em uma embalagem asséptica que o protege da entrada de quaisquer
                                    micro-organismos, tornando-o seguro por meses sem necessidade de refrigeração. Simplesmente, não há
                                    necessidade de adicionar conservantes em um produto tratado com UHT, pois não há micro-organismos crescendo.
                                    Os recipientes assépticos também protegem o produto do ar e da luz, protegendo assim a qualidade do produto.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">O leite UHT contém cálcio? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Sim, claro. O valor nutricional do leite UHT e do leite fresco é o mesmo quando se trata dos principais
                                    nutrientes do leite, como proteínas, cálcio e vitamina D.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">Queijos amarelos engordam mais que os brancos? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Normalmente, sim. Mas, ao contrário do que muita gente pensa, o teor calórico dos queijos amarelos, como Cheddar, Emental,
                                    Prato e Gruyère, não têm nada a ver com sua cor, mas com a grande quantidade de leite e, consequentemente, de gordura presente
                                    em sua composição. Para produzir 1 quilo de Parmesão, por exemplo, são necessários 12 litros de leite,
                                    ao passo que basta a metade para fazer a mesma quantidade de um Minas Frescal.
                                </p>
                            </div>
                        </li>





                    </ul>
                </div>

            </div>
        </section><!-- End F.A.Q Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="zoom-in">
                    <h2>Contato</h2>
                    <h3>Fale <span>Conosco</span></h3>
                    <p>Seu feedback contribuirá muito. Obrigado por ter dedicado um pouco do seu tempo para nos ajudar. </p>
                </div>

                <div>
                    <iframe style="border:0; width: 100%; height: 270px;" frameborder="0" allowfullscreen
                    src="https://www.google.com/maps/d/embed?mid=1fnrAh1793fSShnc3dsyd1G-bKaP3T6Ou"></iframe>

                </div>

                <div class="row mt-5">

                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Localização:</h4>
                                <p>Santa Efigênia, Capela - AL, 57780-000</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>ranchodosossego.al29@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="fab fa-whatsapp"></i>
                                <h4>Cel:</h4>
                                <p>+55 82 98161 3742</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Seu Nome" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Seu Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Assunto" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Mensagem"
                                    required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Enviar</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        {{-- <div class="footer-top">

            <div class="container">

                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <h3>Remember</h3>
                        <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe
                            commodi placeat.</p>
                    </div>
                </div>

                <div class="row footer-newsletter justify-content-center">
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <input type="email" name="email" placeholder="Enter your Email"><input type="submit"
                                value="Subscribe">
                        </form>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>

            </div>
        </div> --}}

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Rancho do Sossego</span></strong>. Todos os direitos reservados.
            </div>
            <div class="credits invisible">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/remember-free-multipurpose-bootstrap-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    {{-- Fim Novo body --}}

</body>

</html>
