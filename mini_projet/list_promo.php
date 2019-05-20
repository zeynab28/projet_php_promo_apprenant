<!Doctype html>
<html>
<head>
<title>sonatel academy</title>
<link rek="stylesheet" href="boostrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
body{
    text-align:center;
    background-image:url(sa.jpeg);
  background-repeat:no-repeat;
}

</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style=margin-left:300px>
  <a class="navbar-brand" href="inscrir.php">inscription</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="list_app.php">liste apprenant <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="modif_app.php">modifier apprenant</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ajout_modif_promo.php">ajouter/modifier promo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="list_promo.php" >liste promo</a>
      </li>
    </ul>
  </div>
</nav>
<?php
echo "<table border=1 style=margin-top:200px id='tab' class='table table-striped table-pink'>";
echo "<thead style=background-color:orange>
<th>code</th>
<th>nom</th>
<th>mois</th>
<th>année</th>
<th>effectif</th>
</thead>";
$promo=fopen("promo.txt","r");

    while(!feof($promo)){
   $ligne=fgets($promo);
    $element=explode(",",$ligne);
    $app=fopen("app.txt", "r");
    $nbre=0;
    $apprenant=file("app.txt");
    while(!feof($app)){
      for($i=0; $i<count($apprenant); $i++){
        $nom[$i]=strtok($apprenant[$i],",");
        $nom1[$i]=strtok(",");
        $nom2[$i]=strtok(",");
        $nom3[$i]=strtok(",");
        $nom4[$i]=strtok(",");
        $nom5[$i]=strtok(",");
        $nom6[$i]=strtok(",");
        $nom7[$i]=strtok(",");
        if($element[1]==$nom7[$i])
        {
          $nbre++;
        }
       
      }
      break;
    }
    echo "<tr>
    <td>$element[0]</td>
    <td>$element[1]</td>
    <td>$element[2]</td>
    <td>$element[3]</td>
    <td>$nbre</td>
    </tr>";

    
  }
    fclose($promo);
   
 echo "</table>";
?>
    
</body>
</html>