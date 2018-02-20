<!DOCTYPE html>
<html>
    <head>
        <title>Front Homepage</title>
        <style type="text/css">
            
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

            header nav > ul > li:nth-child(3), header nav > ul > li:nth-child(4), header nav > ul > li:nth-child(5), header nav > ul > li:nth-child(6)
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

            header nav li:first-child > img
            {
                width: 30px;
                vertical-align: middle;
            }

            header nav > ul > li:nth-child(2)
            {
                margin-left: 10px;
                margin-right: 7%;
                padding-top: 2px;
            }

            header nav li:nth-child(4) img
            {
                width: 10px;
                fill: white;
                margin-left: 5px;
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
                left: 10px;
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

        </style>
    </head>
    <body>
        <header>
            <img src="background-img.jpg" alt="background-image">
            <section class="headerTop">
                <nav>
                    <ul>
                        <li><img src="logo.svg" alt="logo"></li>
                        <li>CREATIVE EDUCATION</li>
                        <li><a href="#onglet1">Accueil<span class="hoverBorder"></span></a></li>
                        <li class="item-list">
                            <a href="#onglet2">Onglet 2 Liste<img src="arrow-down.svg" alt="arrow-down"><span class="hoverBorder"></span></a>
                            <div class="dropdown-container">
                                <div class="triangle"></div>
                                <ul class="dropdown-list">
                                    <li><a href="#onglet2-item1">item 1</a></li>
                                    <li><a href="#onglet2-item2">item 2</a></li>
                                    <li><a href="#onglet2-item3">item 3</a></li>
                                    <li><a href="#onglet2-item4">item 4</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="active"><a href="#onglet3">Onglet 3 .active<span class="hoverBorder"></span></a></li>
                        <li><a href="#onglet4">Onglet 4<span class="hoverBorder"></span></a></li>
                    </ul>
                </nav>
            </section>
            <section class="headerBottom">
                <div>Bienvenue, Quentin.</div>                
            </section>
        </header>
    </body>
</html>