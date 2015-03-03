<?php
if (isset($_GET["emailGestion"]) && isset($_GET["passGestion"])) {
    include '../persistance/UtilisateurService.php';
    include '../persistance/CarteService.php';
    extract($_GET);
    $persistanceSrv = new UtilisateurService();
    $carteSrv = new CarteService();
    $lignes = $persistanceSrv->getByEmailAndPassword($emailGestion, md5($passGestion));
    $rowCount = $lignes->rowCount();
    if ($rowCount >= 1) {
        include_once '../persistance/CarteService.php';
        $carteSrv = new CarteService();
        $query= $carteSrv->getAll();
        $count = $carteSrv->count();
        print '[';
        $i = 0;
        while ($line = $query->fetch()) {
            $i++;
            print "{\"id\":" . $line->id_loc_dispo . ",\"nom\":\"" . $line->NOM . "\",\"longitude\":\"" . $line->LONGITUDE . "\",\"latitude\":\"" . $line->LATITUDE . "\"}";
            if ($i < $count) {
                print ',';
            }
        }
        print "]";
    } else {
        echo 'ERREUR';
    }
} else {
    print '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <head>
      <title>Error 404 - Not found</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="cache-control" content="no-cache" />
   </head>
   <body style="font-family:arial;">
  	<h1 style="color:#0a328c;font-size:1.0em;">Error 404 - Not found</h1>
	<p style="font-size:0.8em;">Le fichier requis n\'a pas &#233;t&#233; trouv&#233;.
Il peut s\'agir d\'une erreur technique. Veuillez r&#233;essayer ult&#233;rieurement. Si vous ne pouvez pas acc&#233;der au fichier apr&#232;s plusieurs tentatives, cela signifie qu\'il a &#233;t&#233; supprim&#233;.
</p>
   </body>
  </html>';
}
?><?php ?>
