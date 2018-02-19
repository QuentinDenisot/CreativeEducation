<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Front Homepage</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style-front-tpl.css">
        <link rel="stylesheet" type="text/css" href="grid.css">
        <!-- <style type="text/css">
            
            @font-face
            {
                font-family: "Philosopher-Regular";
                src: url("philosopher/Philosopher-Regular.ttf");
            }
            
            @font-face
            {
                font-family: "Philosopher-Bold";
                src: url("philosopher/Philosopher-Bold.ttf");
            }
        
            *
            {
                margin: 0px;
                padding: 0px;
                font-family: "Philosopher-Bold";
            }
        
            header
            {
                height: 400px;
                width: 100%;
            }
        
            header > img
            {
                height: 400px;
                width: 100%;
                filter: brightness(40%);
                object-fit: cover;
                object-position: center;
            }
        
            .headerTop
            {
                position: absolute;
                top: 0px;
                height: 44px;
                width: 100%;
                padding-left: 2%;
                margin-top: 20px;
                box-sizing: border-box;
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: stretch;
            }
        
            .headerBottom
            {
                position: absolute;
                top: 64px;
                height: 336px;
                width: 100%;
            }
        
            .headerBottom > div
            {
                color: white;
                font-size: 36pt;
                font-family: "Philosopher-Regular";
                vertical-align: middle;
                text-align: center;
                position: relative;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        
            header nav > ul
            {
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: stretch;
                max-height: 44px;
            }
        
            header nav li
            {
                list-style-type: none;
                line-height: 40px;
                color: white;
            }
        
            header nav > ul > li
            {
                padding: 0px 30px;
            }
            
            .hoverBorder
            {
                width: 100%;
                height: 2px;
                background-color: white;
                display: block;
                position: relative;
                top: -7px;
                opacity: 0;
                transition: all 0.3s ease;
            }
        
            header nav li a:hover .hoverBorder
            {
                opacity: 1;
            }
        
            header nav li.active
            {
                background-color: white;
                border-radius: 25px;
            }
        
            header nav li.active > a
            {
                color: black;
            }
            
            header nav li > a
            {
                text-decoration: none;
                color: white;
                display: block;
                padding-top: 2px;
                /* width: auto; */
            }
        
            .logo-container
            {
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: stretch;
                margin-right: 5%;
                height: 44px;
            }
        
            .logo-container > img
            {
                width: 30px;
                vertical-align: middle;
            }
        
            .logo-container > p
            {
                margin-left: 10px;
                line-height: 44px;
                color: white;
            }
        
            header nav li img
            {
                width: 10px;
                fill: white;
                margin-left: 5px;
                vertical-align: middle;
            }
        
            .dropdown-container
            {
                transition: all 0.5s ease;
                visibility: hidden;
                opacity: 0;
                position: relative;
                z-index: 1;
            }
        
            .triangle
            {
                width: 0;
                height: 0;
                border: 0 solid transparent;
                border-right-width: 7px;
                border-left-width: 7px;
                border-bottom: 12px solid rgba(0, 0, 0, 0.5);
                position: relative;
                right: 10px;
                margin-left: auto;
                z-index: 1;
            }
        
            .dropdown-list
            {
                position: relative;
                width: inherit;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: stretch;
                z-index: 1;
            }
        
            .dropdown-list > li
            {
                background-color: rgba(0, 0, 0, 0.5);
                text-align: center;
                padding: 0% 25%;
                width: auto;
            }
        
            .dropdown-list > li:first-child
            {
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }
        
            .dropdown-list > li:last-child
            {
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
            }
        
            .item-list > a:hover + .dropdown-container, .dropdown-container:hover
            {
                visibility: visible;
                opacity: 1;
            }
        
            .burger-container
            {
                margin-left: auto;
                margin-right: 20px;
                z-index: 1;
            }
        
            .burger:hover
            {
                cursor: pointer;
            }
        
            .burger
            {
                position: relative;
                top: 8px;
            }
        
            .burger-top, .burger-middle, .burger-bottom
            {
                display: block;
                height: 5px;
                width: 36px;
                border-radius: 3px;
                background-color: white;
                transition: all 0.3s ease;
            }
        
            .burger-top, .burger-middle
            {
                margin-bottom: 7px;
            }
        
            .burger-top, .burger-middle
            {
                margin-bottom: 7px;
            }
        
            .animation-top
            {
                transform: rotate(-45deg) translate(-8px, 9px);
            }
        
            .animation-middle
            {
                opacity: 0;
            }
        
            .animation-bottom
            {
                transform: rotate(45deg) translate(-8px, -9px);
            }
        
            footer
            {
                height: 50px;
                line-height: 50px;
                font-size: 10pt;
                padding: 0% 3%;
                text-align: right;
                vertical-align: middle;
                background-color: #F5F5F5
            }
        
            footer > span
            {
                color: #29B6F6;
            }
        
            h1
            {
                font-size: 28pt;
            }
        
            h2
            {
                text-align: left;
                margin-top: 30px;
                font-size: 18pt;
            }
        
            main article > p
            {
                font-family: "Philosopher-Regular";
                text-align: justify;
                margin: 25px 0px;
                font-size: 12pt;
            }
        
            @media all and (min-width: 769px)
            {
                .burger-container
                {
                    display: none;
                }
            }
        
            @media all and (max-width: 1024px)
            {
                .headerTop
                {
                    font-size: 10pt;
                }
        
                header nav > ul > li
                {
                    padding: 0px 20px;
                }
            }
        
            @media all and (max-width: 768px)
            {
                header
                {
                    height: 264px;
                }
        
                header > img
                {
                    height: 264px;
                }
        
                header nav > ul
                {
                    flex-direction: column;
                }
        
                header nav li img
                {
                    width: 20px;
                }
        
                .headerTop nav
                {
                    position: absolute;
                    width: 100%;
                    height: 100vh;
                    background-color: #252525;
                    left: 0%;
                    top: -20px;
                    padding-top: 20px;
                    box-sizing: border-box;
                    text-align: center;
                    z-index: 1;
                }
        
                .visible-nav
                {
                    display: initial;
                }
        
                .hidden-nav
                {
                    display: none;
                }
        
                .headerTop > nav > ul
                {
                    max-height: unset;
                }
                
                .headerTop > nav > ul > li
                {
                    font-size: 16pt;
                    border-top: 1px solid #606060;
                }
        
                .headerTop > nav > ul > li:last-child
                {
                    border-bottom: 1px solid #606060;
                }                
        
                .headerTop > nav > ul > li.active
                {
                    border-radius: 0px;
                    background-color: #3e3e3e;
                }
        
                .headerTop > nav > ul > li.active > a
                {
                    color: white;
                }
        
                header nav li a:hover .hoverBorder
                {
                    opacity: 0;
                }
        
                .dropdown-container > .triangle
                {
                    display: none;
                }
        
                .dropdown-container
                {
                    visibility: visible;
                    opacity: 1;
                }
        
                .dropdown-container > .dropdown-list > li
                {
                    background-color: initial;
                }
        
                .dropdown-container > .dropdown-list > li > a
                {
                    font-size: 12pt;
                }
        
                .dropdown-arrow
                {
                    transition: all 0.3s ease;
                }
        
                .dropdown-arrow-reversed
                {
                    transform: rotate(180deg);
                    transition: all 0.3s ease;
                }
        
                .visible-dropdown
                {
                    display: initial;
                }
        
                .hidden-dropdown
                {
                    display: none;
                }
        
                .headerBottom
                {
                    height: 200px;
                    top: 64px;
                }
        
                .headerBottom > div
                {
                    font-size: 16pt;
                }
            
                h1
                {
                    font-size: 22pt;
                }
        
                h2
                {
                    font-size: 14pt;
                }
        
                footer
                {
                    font-size: 8pt;
                }
            }
        
        </style> -->
    </head>
    <body>
        <header>
            <img src="background-img.jpg" alt="background-image">
            <section class="headerTop">
                <div class="logo-container">
                    <img src="logo.svg" alt="logo">
                    <p>CREATIVE EDUCATION</p>
                </div>
                <nav class="hidden-nav">
                    <ul>
                        <li class="active"><a href="#onglet1">Accueil<span class="hoverBorder"></span></a></li>
                        <li class="item-list">
                            <a href="#onglet2">Onglet 2<img src="arrow-down.svg" alt="arrow-down" class="dropdown-arrow"><span class="hoverBorder"></span></a>
                            <div class="dropdown-container">
                                <div class="triangle"></div>
                                <ul class="dropdown-list hidden-dropdown">
                                    <li><a href="#onglet2-item1">item 1</a></li>
                                    <li><a href="#onglet2-item2">item 2</a></li>
                                    <li><a href="#onglet2-item3">item 3</a></li>
                                    <li><a href="#onglet2-item4">item 4</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#onglet3">Onglet 3<span class="hoverBorder"></span></a></li>
                        <li><a href="#onglet4">Onglet 4<span class="hoverBorder"></span></a></li>
                    </ul>
                </nav>
                <div class="burger-container">
                    <div class="burger">
                        <span class="burger-top"></span>
                        <span class="burger-middle"></span>
                        <span class="burger-bottom"></span>
                    </div>
                </div>
            </section>
            <section class="headerBottom">
                <div>Bienvenue, Quentin.</div>
            </section>
        </header>
        <main>
            <?php
                include 'front-home.view.php';
            ?>
        </main>
        <footer>
            <?php
                $firstYear = 2018;
                $currentYear = date('Y');
                $message = "© ";

                $message .= ($firstYear < $currentYear)?$firstYear.' - '.$currentYear:$firstYear;
                $message .= ' Créé par <span>Théo Senoussaoui</span>, <span>Julien Roux</span>, <span>Quentin Denisot</span> et <span>Arnaud Bost</span>';

                echo $message;
            ?>
        </footer>
    </body>
</html>

<script>

    //Fixed footer on bottom
    function setFooter()
    {
        var footer = $('footer');
        var offset = footer.offset();
        var windowHeight = $(window).height();

        if((offset.top + footer.height()) < windowHeight)
        {
            footer.css('position', 'absolute');
            footer.css('bottom', '0px');
            footer.css('width', '-webkit-fill-available');
        }
    }

    $(document).ready(function()
    {
        //Calls function on page load
        setFooter();

        //Calls function on page resizing
        $(window).resize(function()
        {
            setFooter();
        });

        //Sidebar open + burger menu icon animation
        $('.burger').click(function()
        {
            var nav = $('nav');
            var burgerTop = $('.burger-top');
            var burgerMiddle = $('.burger-middle');
            var burgerBottom = $('.burger-bottom');
            
            if(nav.hasClass('hidden-nav'))
            {
                burgerTop.addClass('animation-top');
                burgerMiddle.addClass('animation-middle');
                burgerBottom.addClass('animation-bottom');
                nav.removeClass('hidden-nav');
                nav.addClass('visible-nav');
            }
            else
            {
                burgerTop.removeClass('animation-top');
                burgerMiddle.removeClass('animation-middle');
                burgerBottom.removeClass('animation-bottom');
                nav.removeClass('visible-nav');
                nav.addClass('hidden-nav');
            }
        });

        //Expands submenu on item menu click
        $('.item-list').click(function()
        {
            var img = $(this).find('.dropdown-arrow');

            if($(this).find('.dropdown-list').hasClass('hidden-dropdown'))
            {
                img.addClass('dropdown-arrow-reversed');
                $(this).find('.dropdown-list').removeClass('hidden-dropdown');
                $(this).find('.dropdown-list').addClass('visible-dropdown');
            }
            else
            {
                img.removeClass('dropdown-arrow-reversed');
                $(this).find('.dropdown-list').removeClass('visible-dropdown');
                $(this).find('.dropdown-list').addClass('hidden-dropdown');
            }
        });

        $('.dropdown-list').click(function(e)
        {
            e.stopPropagation();
        });
    });

</script>