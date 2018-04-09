<!DOCTYPE html>

<html lang="fr">
    <head>
      <meta charset="UTF-8"/>
      <style type="text/css">
				body
				{
					font-size: 0.8em;
				 /* background-attachment: fixed; */
					background-color: white;
					/* background-image:url(css/img/background-img.jpg); */
					height: 100%;
					overflow: hidden;
				}

				body>img
				{
					background-size: 100%;
					object-fit: cover; /*Ne modifie pas la résolution*/
					filter: brightness(60%);
					height: 100%;
					object-position: top center; /*image centré positionné en haut*/
					width: 100%;
					position: absolute;
					background-repeat: no-repeat;
					object-fit: cover;
					object-position: center;
					top: -10px;

				}
        *
        {

        }
				#titre1
				{
					text-align: center;
					color : #FFFFFF;
					font-family: roboto;
					margin-top: 10%;
					font-size: 2.5em;
					position: relative;
				}
        .card
        {/*recentre le rectangle gris.*/
					 display: flex;
					 background-image:url(css/img/background_cardregister.png);
					 background-repeat: no-repeat;
					 /* width: 471px;
					 height: 341px; */
					 height: 39%;
					 width: 46%;
					 top: 50%;
					 left: 50%;
					 position: absolute;
					 transform: translate(-50%, -50%);
					 background: rgba(0, 0, 0, 0.5);
					 /* box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25), 0px 1px 4px rgba(0, 0, 0, 0.25); */
					 border-radius: 2%;
					 /* margin:0px; */
					 /* flex-flow:column wrap; */
					 justify-content: space-around;
					 align-items: center;
					 flex-direction: column;
					 overflow: hidden; /*Empêche le dépassement des flottants*/
        }
				.row
				{

				}
				.loadingBar:nth-child(1)
				{
					order: 0%;
					/* line-height: 10%; */
					/* margin:0%;
					padding:0%; */
					border:none;
					display:flex;
					flex-wrap: center;
					align-items:center;/*recentre les bar*/
					justify-content: center;
					border-top-width: 4%; /*Bordure haut du conteneur*/
					width:100%;
					height:100%;
				}
				.ellipseRouge
				{
					  /* position: absolute;*/
 					/* width: 14px;
 					height: 14px; */
					width: 20px;
					height: 20px;
					border-radius: 50%;
					background: #EC407A;
					/* border-top-width: 20px; /*Bordure haut du conteneur*/ */
					background-repeat: no-repeat;
				}
				.bar1
				{
					/*border-top-width: 20px; /*Bordure haut du conteneur*/
					/*border-top-width: 20%; /*Bordure haut du conteneur*/

					  /* position: absolute;*/
					background: #EC407A;
					vertical-align: middle;width: 95px;
					height: 2px;
					/* width: 40px;/*largeur*/
					/*height: 3px;/*taille/epaisseur*/
					/* left:864px; /*gauche*/
					/* bottom:30px;
					top: 529px;/*haut*/
				}
				.bar2
				{
					  /* position: absolute;*/
					background: #FFFFFF;
					vertical-align: middle;
					width: 95px;
					height: 2px;
					/* width: 40px;
					height: 3px; */
				}
				.ellipseBlancche
				{
					 /* position: absolute;*/
					/* width: 14px;
					height: 14px; */
					background: #FFFFFF;
					border-radius: 50%;
					background-repeat: no-repeat;
					width: 20px;
					height: 20px;
				}
				.bar3
				{
					  /* position: absolute;*/
					background: #FFFFFF;
					vertical-align: middle;
					width: 95px;
					height: 2px;
					/* width: 40px;
					height: 3px; */
					/* width: inherit;
					height: inherit; */
				}
				.bar4
				{
						/* position: absolute;*/
					/* width: 40px;
					height: 3px; */
					background: #FFFFFF;
					width: 95px;
					height: 2px;
					vertical-align: middle;
				}
				.saisie1:nth-child(2)
				{
					display: flex;
					width:100%;
					height:100%;
					align-items: center;
					/* flex-direction: column; */
					overflow: hidden; /*Empêche le dépassement des flottants*/
					flex-wrap: center;
					align-items:center;/*recentre les bar*/
					justify-content: center;

				}
				.vector1
				{
					/* position: absolute; */
					background-image:url(css/img/vector1.png);
					width: 16.67px;
					height: 16.67px;
					background-repeat: no-repeat;
					background-size: 100%;
					margin:5%;

				}
				.text1
				{
				/*	border-bottom: 2px solid red;
					box-sizing: border-box; */
					/* width:30%;
					height:10%; */
				}
				.saisie2:nth-child(3)
				{
					display: flex;
					height: auto;
					width: auto;
					width:100%;
					height:100%;
					/* align-items: center; */
					/* overflow: hidden; /*Empêche le dépassement des flottants*/ */
					flex-wrap: center;
					align-items:center;/*recentre les bar*/
					justify-content: center;
					/* border:none; */

				}
				.vector2
				{
					/* position: absolute; */
					align-items: center;
					background-image: url(css/img/vector2.png);
					width: 14.25px;
					height: 19px;
					background-repeat: no-repeat;
					margin:5%;
				}
				.text2
				{
					/* border-bottom: 2px solid red;
					box-sizing: border-box; */
					/* width:10%;
					height:10%; */
				}
				.saisie3:nth-child(4)
				{
					display:flex;
					/* flex-wrap: nowrap; */
					/* height: auto;
					width: auto; */
					width:100%;
					height:100%;
					align-items: center;
					overflow: hidden; /*Empêche le dépassement des flottants*/
					flex-wrap: center;
					align-items:center;/*recentre les bar*/
					justify-content: center;
				}
				.text3
				{
					/* border-bottom: 2px solid red;
					box-sizing: border-box; */
					/* width:10%;
					height:10%; */

				}
				input[type=text]
				{
					width:100%;
					height:200%;
					font-size: 80%;
				 	padding: 2%;
					/* background-image: center; */
					border:none; /*retire les bordure*/
					top:100%;
					background-color:rgba(0, 0, 0, 0);
					border-bottom:1px solid #FFFFFF;
					/* color: white; */
					color: #FFFFFF;
				}
				input[type=password]
				{
					width:100%;
					height:200%;
					font-size: 80%;
				 	padding: 2%;
					/* background-image: center; */
					border:none; /*retire les bordure*/
					top:100%;
					background-color:rgba(0, 0, 0, 0);
					border-bottom:1px solid #FFFFFF;
					/* color: white; */
					color: #FFFFFF;
				}
				/* [placeholder]
				{
				  font-style: italic;
					background-size: 100%;
				} */
				/* :placeholder-shown
				{

				} */
				::placeholder
				{
					color: #FFFFFF;

				}
				/* :-ms-input-placeholdermain
				{
				} */
				.button1:nth-child(5)
				{
					/* background-image:url(css/img/submitbouton.png); */
					border: 1px solid #FFFFFF;
					box-sizing: border-box;
					border-radius: 3px;
					text-align: center;
					position: absolute;
						opacity: 0.5;
				}
				button[type=button]
				{
					width:100%;
					height:100%;
					color: #FFFFFF;
					background-color:rgba(0, 0, 0, 0);
					border-color: #FFFFFF;
					font-size: 90%;
					border-radius: 10%;
					padding-bottom: 2.5%;
					padding-top: 2.5%;
					padding-left: -4%;
					text-align: center;
				}
				@media screen and (max-width: 700px)
				{
			  body
				{
					zoom: 0.75;
				  }
				}

      </style>
    </head>
			<h1 id="titre1">Bienvenue sur Creative Education</h1>
    <body>
			<img src="css/img/background-img.jpg" />
	      <div class="card">
					<form>
						<div class="loadingBar">
							<div class="ellipseRouge"></div>
							<div class="bar1"></div>
							<div class="bar2"></div>
							<div class="ellipseBlancche"></div>
							<div class="bar3"></div>
							<div class="bar4"></div>
							<div class="ellipseBlancche"></div>
						</div>
						<div class="saisie1">
							<div class="vector1"></div>
							<div class="text1"><input class="text" type="text" placeholder="Nom de compte"></input></div>
						</div>
						<div class="saisie2">
							<div class="vector2"></div>
							<div class="text2"><input  class="text" type="password" placeholder="mot de passe"></input></div>
						</div>
						<div class="saisie3">
							<div class="vector2"></div>
							<div class="text3"><input  class="text" type="password" placeholder="Confirmez le mot de passe"></input></div>
						</div>
						<div class="button">
							<div class="button1   "><button  type="button" class="">VALIDER</button></div>
						</div>
					</form>
				</div>
    </body>
</html>
