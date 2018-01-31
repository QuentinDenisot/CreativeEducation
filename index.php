<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            *
            {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            main
            {
                background-color: #e4e4e4;
                padding: 0.25% 0%;
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: stretch;
                flex: 0;
            }

            .row
            {
                /*height: 65px;*/
                width: 100%;
                padding: 0% 0.5%;
                box-sizing: border-box;
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: stretch;
            }

            .col-wd-1
            {
                width: 7.33%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-2
            {
                width: 15.66%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-3
            {
                width: 24%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-4
            {
                width: 32.33%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-5
            {
                width: 40.65%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-6
            {
                width: 49%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-7
            {
                width: 57.35%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-8
            {
                width: 65.67%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-9
            {
                width: 74%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-10
            {
                width: 82.34%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-11
            {
                width: 90.67%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-wd-12
            {
                width: 100%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            /* Extra small : < 576px */
            @media all and (max-width: 575px)
            {
                .row
                {
                    flex-wrap: wrap;
                }

                .col-wd-1
                {
                    width: 49%;
                }

                .col-wd-2
                {
                    width: 49%;
                }

                .col-wd-3
                {
                    width: 49%;
                }

                .col-wd-4
                {
                    width: 49%;
                }

                .col-wd-5
                {
                    width: 49%;
                }
            }

            /* Small : >= 576px */
            @media all and (min-width: 576px) and (max-width: 767px)
            {
                .row
                {
                    flex-wrap: wrap;
                }

                .col-wd-1
                {
                    width: 32.33%;
                }

                .col-wd-2
                {
                    width: 32.33%;
                }

                .col-wd-3
                {
                    width: 32.33%;
                }
            }

            /* Medium : >= 768px */
            @media all and (min-width: 768px) and (max-width: 991px)
            {
                .row
                {
                    flex-wrap: wrap;
                }

                .col-wd-1
                {
                    width: 24%;
                }

                .col-wd-2
                {
                    width: 24%;
                }
            }

            /* Large : >= 992px */
            @media all and (min-width: 992px) and (max-width: 1199px)
            {
                .row
                {
                    flex-wrap: wrap;
                }

                .col-wd-1
                {
                    width: 15.66%;
                }
            }

            /* Extra large : >= 1200px */
            @media all and (min-width: 1200px)
            {
                
            }
        </style>
    </head>
    <body>
        <main>
            <div class="row">
                <section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section><!--
                --><section class="col-wd-1">One</section>
            </div><!--
           --><div class="row">
                <section class="col-wd-2">Two</section><!--
                --><section class="col-wd-2">Two</section><!--
                --><section class="col-wd-2">Two</section><!--
                --><section class="col-wd-2">Two</section><!--
                --><section class="col-wd-2">Two</section><!--
                --><section class="col-wd-2">Two</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-3">Three</section><!--
                --><section class="col-wd-3">Three</section><!--
                --><section class="col-wd-3">Three</section><!--
                --><section class="col-wd-3">Three</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-3">Three</section><!--
                --><section class="col-wd-3">Three</section><!--
                --><section class="col-wd-6">Six</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-4">Four</section><!--
                --><section class="col-wd-4">Four</section><!--
                --><section class="col-wd-4">Four</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-4">Four</section><!--
                --><section class="col-wd-8">Eight</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-5">Five</section><!--
                --><section class="col-wd-7">Seven</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-6">Six</section><!--
                --><section class="col-wd-6">Six</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-7">Seven</section><!--
                --><section class="col-wd-5">Five</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-8">Eight</section><!--
                --><section class="col-wd-4">Four</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-9">Nine</section><!--
                --><section class="col-wd-3">Three</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-10">Ten</section><!--
                --><section class="col-wd-2">Two</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-11">Eleven</section><!--
                --><section class="col-wd-1">One</section>
            </div><!--
            --><div class="row">
                <section class="col-wd-12">Twelve</section>
            </div>
        </main>
    </body>
</html>