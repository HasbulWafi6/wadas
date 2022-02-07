<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>

    <!-- Bootstrap core CSS-->
    
    <link href="<?php echo base_url('assets/css/normalize.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/demo.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/modernizr.custom.63321.js') ?>"></script>
    <script>document.documentElement.className = 'js';</script>
</head>

<body>
    <svg class="hidden">
            <symbol id="icon-arrow" viewBox="0 0 24 24">
                <title>arrow</title>
                <polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
            </symbol>
            <symbol id="icon-drop" viewBox="0 0 24 24">
                <title>drop</title>
                <path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/><path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
            </symbol>
            <symbol id="icon-menu" viewBox="0 0 24 24">
                <title>menu</title>
                <path d="M24,5.8H0v-2h24V5.8z M19.8,11H4.2v2h15.6V11z M24,18.2H0v2h24V18.2z"/>
            </symbol>
            <symbol id="icon-cross" viewBox="0 0 24 24">
                <title>cross</title>
                <path d="M13.4,12l7.8,7.8l-1.4,1.4l-7.8-7.8l-7.8,7.8l-1.4-1.4l7.8-7.8L2.7,4.2l1.4-1.4l7.8,7.8l7.8-7.8l1.4,1.4L13.4,12z"/>
            </symbol>
            <symbol id="icon-info" viewBox="0 0 20 20">
                <title>info</title>
                <circle style="fill:#fff" cx="10" cy="10" r="9.1"/>
                <path d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.6c-4.7,0-8.6-3.9-8.6-8.6S5.3,1.4,10,1.4s8.6,3.9,8.6,8.6S14.7,18.6,10,18.6z M10.7,5C10.9,5.2,11,5.5,11,5.7s-0.1,0.5-0.3,0.7c-0.2,0.2-0.4,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3C9.1,6.2,9,6,9,5.7S9.1,5.2,9.3,5C9.5,4.8,9.7,4.7,10,4.7C10.3,4.7,10.5,4.8,10.7,5z M9.3,8.3h1.4v7.2H9.3V8.3z"/>
            </symbol>
        </svg>
        <div class="container">
            <div class="scroller">
                <div class="room room--current">
                    <div class="room__side room__side--back">
                        <link href="<?php echo base_url('assets/js/modernizr.custom.63321.js') ?>" rel="stylesheet">
                        <img class="room__img" src="<?php echo base_url('assets/img/set4/3.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set4/6.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--left">
                        <img class="room__img" src="<?php echo base_url('assets/img/set4/7.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set4/1.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set4/2.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--right">
                        <img class="room__img" src="<?php echo base_url('assets/img/set4/4.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set4/5.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set4/8.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--bottom"></div>
                </div><!-- /room -->
                <div class="room">
                    <div class="room__side room__side--back">
                        <img class="room__img" src="<?php echo base_url('assets/img/set2/1.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set2/6.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--left">
                        <img class="room__img" src="<?php echo base_url('assets/img/set2/3.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set2/4.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set2/5.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--right">
                        <img class="room__img" src="<?php echo base_url('assets/img/set2/8.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set2/7.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set2/2.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--bottom"></div>
                </div><!-- /room -->
                <div class="room">
                    <div class="room__side room__side--back">
                        <img class="room__img" src="<?php echo base_url('assets/img/set3/1.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set3/6.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--left">
                        <img class="room__img" src="<?php echo base_url('assets/img/set3/3.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set3/4.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set3/5.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--right">
                        <img class="room__img" src="<?php echo base_url('assets/img/set3/8.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set3/7.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set3/2.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--bottom"></div>
                </div><!-- /room -->
                <div class="room">
                    <div class="room__side room__side--back">
                        <img class="room__img" src="<?php echo base_url('assets/img/set1/3.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set1/6.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--left">
                        <img class="room__img" src="<?php echo base_url('assets/img/set1/7.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set1/1.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set1/2.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--right">
                        <img class="room__img" src="<?php echo base_url('assets/img/set1/4.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set1/5.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set1/8.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--bottom"></div>
                </div><!-- /room -->
                <div class="room">
                    <div class="room__side room__side--back">
                        <img class="room__img" src="<?php echo base_url('assets/img/set5/7.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set5/5.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--left">
                        <img class="room__img" src="<?php echo base_url('assets/img/set5/6.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set5/4.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set5/3.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--right">
                        <img class="room__img" src="<?php echo base_url('assets/img/set5/2.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set5/1.jpg') ?>" alt="Some image"/>
                        <img class="room__img" src="<?php echo base_url('assets/img/set5/8.jpg') ?>" alt="Some image"/>
                    </div>
                    <div class="room__side room__side--bottom"></div>
                </div><!-- /room -->
            </div>
        </div><!-- /container -->
        <div class="content">
            <header class="codrops-header">
                <button class="btn btn--info btn--toggle">
                    <svg class="icon icon--info"><use xlink:href="#icon-info"></use></svg>
                    <svg class="icon icon--cross"><use xlink:href="#icon-cross"></use></svg>    
                </button>
                <button class="btn btn--menu btn--toggle">
                </button>
                <div class="overlay overlay--menu">
                    <ul class="menu">
                        <li class="menu__item menu__item--current"><a class="menu__link" href="#">Exhibitions</a></li>
                        <li class="menu__item"><a class="menu__link" href="#">Discover</a></li>
                        <li class="menu__item"><a class="menu__link" href="#">Visit us</a></li>
                        <li class="menu__item"><a class="menu__link" href="#">Shop</a></li>
                    </ul>
                </div>
                <div class="overlay overlay--info">
                    <p class="info">&ldquo;Life in Pieces&rdquo; is the subject of all exhibitions taking place in the Mirai Art Gallery in 2017. Fragments of lost memories, fleeting moments and the breaking apart of human nature are this year's highlighted topics. We welcome you to a exploration space of a unique kind&mdash;the one that will stay with you and impact you on many levels. Come visit us.</p>
                </div>
            </header>
            <h4 class="location">Aplikasi Pengajuan Shop Drawing</h4>
            <div class="slides">
                <div class="slide">
                    <h2 class="slide__name"></h2>
                    <div class="container">
                        <header>
                            <h1><strong>Login Form</strong></h1>
                            <h2>Shop Drawing Application</h2>
                            <div class="support-note">
                                <span class="note-ie">Sorry, only modern browsers.</span>
                            </div>
                        </header>
                        
                        <section class="main">
                            <form class="form-1" action="<?= site_url('login/auth') ?>" method="POST">
                                <p class="field">
                                    <input type="text" name="username" placeholder="Input Username">
                                    <i class="icon-user icon-large"></i>
                                </p>
                                    <p class="field">
                                        <input type="password" name="password" placeholder="Password">
                                        <i class="icon-lock icon-large"></i>
                                </p>
                                <p class="submit">
                                    <button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
                                </p>
                            </form>
                        </section>
                    </div>
                    <h3 class="slide__title">
                        <div class="slide__number">Annisa <strong>Rizky</strong></div>
                    </h3>
                    <p class="slide__date"><?php echo date('l, d-m-Y  h:i:s a'); ?></p>
                </div>
                <div class="slide">
                    <h2 class="slide__name">Aiko <br/>Akiyama</h2>
                    <h3 class="slide__title">
                        <span>&ldquo;Faces of Peace&rdquo;</span>
                        <div class="slide__number">Room <strong>Suijin</strong></div>
                    </h3>
                    <p class="slide__date">31 Mar – 25 Apr 2017</p>
                </div>
                <div class="slide">
                    <h2 class="slide__name">Misako <br/>Shiraishi</h2>
                    <h3 class="slide__title">
                        <span>&ldquo;Instant Gratification&rdquo;</span>
                        <div class="slide__number">Room <strong>Izanami</strong></div>
                    </h3>
                    <p class="slide__date">4 Apr – 30 Apr 2017</p>
                </div>
                <div class="slide">
                    <h2 class="slide__name">Tadashi <br/>Takayama</h2>
                    <h3 class="slide__title">
                        <span>&ldquo;Facts of Blossoms&rdquo;</span>
                        <div class="slide__number">Room <strong>Raijin</strong></div>
                    </h3>
                    <p class="slide__date">15 Apr – 18 May 2017</p>
                </div>
                <div class="slide">
                    <h2 class="slide__name">Etsuko <br/>Hamasaki</h2>
                    <h3 class="slide__title">
                        <span>&ldquo;In Loving Memory&rdquo;</span>
                        <div class="slide__number">Room <strong>Hachiman</strong></div>
                    </h3>
                    <p class="slide__date">5 May – 17 Jun 2017</p>
                </div>
            </div>
            <nav class="nav">
                <button class="btn btn--nav btn--nav-left">
                    <svg class="nav-icon nav-icon--left" width="42px" height="12px" viewBox="0 0 70 20">
                        <path class="nav__triangle" d="M52.5,10L70,0v20L52.5,10z"/>
                        <path class="nav__line" d="M55.1,11.4H0V8.6h55.1V11.4z"/>
                    </svg>
                </button>
                <button class="btn btn--nav btn--nav-right">
                    <svg class="nav-icon nav-icon--right" width="42px" height="12px" viewBox="0 0 70 20">
                        <path class="nav__triangle" d="M52.5,10L70,0v20L52.5,10z"/>
                        <path class="nav__line" d="M55.1,11.4H0V8.6h55.1V11.4z"/>
                    </svg>
                </button>
            </nav>
        </div><!-- /content -->
        <div class="overlay overlay--loader overlay--active">
            <div class="loader">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <script src="<?php echo base_url('assets/js/anime.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/imagesloaded.pkgd.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/main.js') ?>"></script>   
</body>

</html>