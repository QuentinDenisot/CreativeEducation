<?php

// édition du début du fichier XML
$xml = '<?xml version="1.0" encoding="iso-8859-1"?><rss version="2.0">';
$xml .= '<channel>';
$xml .= '<title>Titre du cours</title>';
$xml .= '<link>http://www.creativeedu.fr</link>';
$xml .= '<description>Cours universitaire</description>';

	class fluxRSS extends BaseSQL
	{
		$sqlprepare= $pdo->prepare("SELECT * FROM courses ORDER BY date DESC LIMIT, 5");
		$sqlprepare->execute();
		$results = $sqlprepare->fetch(PDO::FETCH_ASSOC);
		$obj = $results->fetchAll();

		// extraction des informations et ajout au contenu
		foreach ($obj as $key => $value)
		{
			$titre=$value;
			$lien=$value;
			$description=$value;
			$date=$value;
			$date2=date("D, d M Y H:i:s", strtotime($date));

			$xml .= '<item>';
			$xml .= '<title>'.$titre.'</title>';
			$xml .= '<link>'.$lien.'</link>';
			$xml .= '<pubDate>'.$date2.' GMT</pubDate>';
			$xml .= '<description>'.$description.'</description>';
			$xml .= '</item>';
		}
			// édition de la fin du fichier XML
			$xml .= '</channel>';
			$xml .= '</rss>';

			// écriture dans le fichier
			$fp = fopen("flux.xml", 'w+');
			fputs($fp, $xml); // insertion de la définition dans le tableau/fichier.
			fclose($fp); //fermeture du fichier xml


		foreach($rss as $tab)
		{
		  echo '<div class="news_box">
		           <div class="news_box_title">'.$tab[0].'</div>
		           <div class="news_box_date">posté le '.date("d/m/Y",strtotime($tab[2])).'</div>
		           '.$tab[3].' <a href="'.$tab[1].'">Lire tout l\'article</a>
		        </div>';
		}

		function lit_rss($fichier, $objets)
		{
				// on lit tout le fichier
			if($chaine = @implode("",@file($fichier)))
			{
				// on découpe la chaine obtenue en items
				$tmp = preg_split("/<\/?"."item".">/",$chaine); //Éclate une chaîne par expression rationnelle
				// pour chaque item
				for($i=1;$i<sizeof($tmp)-1;$i+=2) //Compte tous les éléments du tableau
					// on lit chaque objet de l'item
					foreach($objets as $objet)
					{
						// on découpe la chaine pour obtenir le contenu de l'objet
						$tmp2 = preg_split("/<\/?".$objet.">/",$tmp[$i]);
						// on ajoute le contenu de l'objet au tableau resultat
						$resultat[$i-1][] = @$tmp2[1];
					}
					// on retourne le tableau resultat
					return $resultat;
			}
		}
		?>
		<rss version="2.0">
		<channel>
		<title></title>
		<link>http://www.creativeedu.fr</link>
		<description></description>
		<item>
		<title>Titre de la news</title>
		<link>http://www.creativeedu.fr/news.php?id=3</link>
		<description>Description de la news</description>
		<pubDate></pubDate>
		</item>
		<item>
		<title>Titre de la news</title>
		<link>http://www.creativeedu.fr/news.php?id=3</link>
		<description>Description de la news</description>
		<pubDate></pubDate>
		</item>
		<item>
		<title>Titre de la news</title>
		<link>http://www.creativeedu.fr/news.php?id=3</link>
		<description>Description de la news</description>
		<pubDate></pubDate>
		</item>
		</channel>
		</rss>
		<?php
	}


?>
