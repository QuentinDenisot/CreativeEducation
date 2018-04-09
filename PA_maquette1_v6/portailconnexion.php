<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Creative Education</title>
    <style>
        @font-face {
            font-family: "Roboto-Regular";
            src: url("./assets/fonts/Roboto/Roboto-Regular.ttf");
        }

        @font-face {
            font-family: "Roboto-Bold";
            src: url("./assets/fonts/Roboto/Roboto-Bold.ttf");
        }
        .row
        {
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
        @media all and (max-width: 768px)
        {
            .row
            {
                flex-wrap: wrap;
            }

            .connecter_info {
                left:10% !important;
            }
            .form{
                left:0% !important;
            }
            .col-xs-4
            {
                width: 80%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }
            .col-xs-5
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
        }

        @media all and (min-width: 768px) and (max-width: 1024px)
        {
            .row
            {
                flex-wrap: wrap;
            }
            .form{
                left: 25% !important;
            }
            .connecter_info{
                left: 32.5% !important;
            }
            .col-md-4
            {
                width: 35%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }

            .col-md-6
            {
                width: 50%;
                background-color: #f3f6f7;
                margin: 0.5% 0.5%;
                padding: 1%;
                border-radius: 5px;
                border: 1px solid #dde4e6;
                box-sizing: border-box;
                text-align: center;
            }
        }
        body{
            margin:0;
            background: url("front/background-img.jpg") no-repeat;
            height: 100%;
        }
        main{
            justify-content: center;
            vertical-align: center;
        }
        .form{
            position: absolute;
            top: 40%;
            left: 33.835%;
            height: auto;
            /*min-height: 7.33%;*/
            /*max-height: 15.66%;*/
            display: flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
            background-color:white;
            font-family: "Roboto-Regular";

        }
        .connecter_info{
            position: absolute;
            top: 37.5%;
            left: 38%;
            max-height: 5%;
            display: flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
            color: white;
            background: linear-gradient(#EC407A, #D81B60);
            z-index: 1;
            font-family: "Roboto-Regular";
            font-size: 18px;
        }
        .icon{
            padding-right: 5%;
        }

        .input_connection{
            display: flex;
            flex-direction: row;
            align-items: stretch;
            margin-top: 15px;

        }
        input {
            border: none;
            border-bottom: 2px solid #BDBDBD;
        }

        button {
            border: none;
            background: linear-gradient(#EC407A, #D81B60);
            color: white;
            height: 30px;
            border-radius: 2px;
        }

    </style>
</head>
<body>
    <main class="row">
        <span class="col-wd-3 col-md-4 col-xs-4 connecter_info">Se connecter</span>
        <form class="form col-wd-4 col-xs-5 col-md-6">
            <span class="input_connection"><img class="icon" src="./assets/icons/icon-user.svg"><input type="text" placeholder="Nom d'utilisateur"></span>
            <span class="input_connection"><img class="icon" src="./assets/icons/icon-password-connection.svg"><input type="password" placeholder="Mot de passe"></span>
            <span class="input_connection"><button>VALIDER</button></span>
        </form>
    </main>
</body>
</html>
