<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Front Homepage</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style-front-tpl.css">
        <link rel="stylesheet" type="text/css" href="grid.css">
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