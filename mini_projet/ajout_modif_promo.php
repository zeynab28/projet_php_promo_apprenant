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
<form action="ajout_modif_promo.php" method="POST" style=margin-left:300px>
<div class="form-group row">
    <label for="inputnom3" class="col-sm-2 col-form-label"><strong>code</strong></label> 
    <div class="col-sm-10">
      <input type="text" style=background-color:orange class="form-control" id="nom3" name="code" placeholder="entrer le code" style=width:50%>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Nom</strong></label>
    <div class="col-sm-10">
      <input type="text" style=background-color:#1E90FF class="form-control" id="inputEmail3" name="nom" placeholder="entrer le nom" style=width:50%>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label"><strong>Mois</strong></label>
    <div class="col-sm-10">
      <input type="text" style=background-color:orange class="form-control" id="inputPassword3" name="mois" placeholder="entrer le mois" style=width:50%>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label"><strong>Année</strong></label>
    <div class="col-sm-10">
      <input type="numb" style=background-color:#1E90FF class="form-control" id="inputPassword3" name="année" placeholder="entrer l'année" style=width:50%>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="ajout">Ajouter</button>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="modif">modifier</button>
    </div>
  </div>
</form>
<?php
 echo "<table border=1 class='table table-striped table-pink' >";
 echo "<thead style=background-color:orange>
 <th>code</th>
 <th>nom</th>
 <th>mois</th>
 <th>année</th>
 </thead>";
 $promo=fopen("promo.txt","a+");
 if(isset($_POST['ajout'])){
    if(!empty($_POST['code']) && !empty($_POST['nom']) && !empty($_POST['mois']) && !empty($_POST['année'])){
        $chaine="\n".$_POST['code'] .",".$_POST['nom'].",".$_POST['mois'].",".$_POST['année'].",";
      fwrite($promo,$chaine);
      fclose($promo);
    }
}

if(isset($_POST['modif'])){
    if(!empty($_POST['code']) && !empty($_POST['nom']) && !empty($_POST['mois']) && !empty($_POST['année'])){
$code=$_POST['code'];
$nom=$_POST['nom'];
$mois=$_POST['mois'];
$anne=$_POST['année'];
$promo=fopen("promo.txt","r");
while(!feof($promo)){
$ligne=fgets($promo);
           $element=explode(",",$ligne);
           if($code==$element[0])
           {
             $code=$element[0];
             $element[1]=$nom;
             $element[2]=$mois;
             $element[3]=$anne;
             $inline=$element[0].','.$element[1].','.$element[2].','.$element[3]."\n";
           }
           else{
             $inline=$ligne;
           }
           $inline1=$inline1.$inline;
         }
         fclose($promo) ;
         $promo=fopen("promo.txt","w+");
         fwrite($promo,$inline1);
         fclose($promo);
    }
}
$promo=fopen("promo.txt","a+");
      while(!feof($promo))
      {
        $ligne=fgets($promo);
        $element=explode(",",$ligne);
        echo "<tr>
        <td>$element[0]</td>
        <td>$element[1]</td>
        <td>$element[2]</td>
        <td>$element[3]</td>
        </tr>";
      }
      fclose($promo);
      echo "</table>";
  ?>  
</body>
</html>