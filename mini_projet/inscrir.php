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
h1{
    font-family:palatino;
  
}
#promo{
  width:200px;
margin-left:500px;
  height:40px;
}

</style>
</head>
<body >
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
<h1>inscription</h1>
<form style=width:80% method="POST" action="inscrir.php">



  <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong>Nom:</strong></label>
    <input name="nom" style=background-color:orange type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Entrer votre nom">
  </div>
    <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong> Prénom:</strong></label>
    <input name="prenom" style=background-color:#1E90FF type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Entrer votre prénom">
    </div>
    <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong> Date de naissance: </strong></label>
    <input name="date" style=background-color:orange type="date" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Entrer votre date de naissance">
 </div>
    <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong>Numéro:</strong></label>
    <input name="num" style=background-color:#1E90FF type="number" class="form-control" id="exampleInputEmail1" aria-describedby="numberHelp" placeholder="Entrer votre numéro">
  </div>
  <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong> Email address:</strong> </label>
    <input name="mail" style=background-color:orange type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong> Statut</strong></label>
    <input name="statut" style=background-color:#1E90FF type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Entrer le code">
  </div>
  <?php
  echo"<select name='promo' id='' >";
  $promo=fopen("promo.txt","a+");
  while(!feof($promo))
  {
    $ligne=fgets($promo);
    $element=explode(",",$ligne);
  echo  '<option ><strong>'.$element[1].'</strong></option>';
  }
fclose($promo);
  echo "</select>";
  ?>

  <button type="submit" class="btn btn-primary" style=margin-left:200px name="bouton">valider</button>
</form>
    <?php

   
    $trouv=false;
   // if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['code']) && !empty($_POST['date']) && !empty($_POST['num']) && !empty($_POST['mail']) && !empty($_POST['statut']) && !empty($_POST['promo'])){
      if(isset($_POST['bouton'])){
        $code=rand(1,1000);
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$date=$_POST['date'];
$num=$_POST['num'];
$email=$_POST['mail'];
$statut=$_POST['statut'];
$promot=$_POST['promo'];

        $app=fopen("app.txt","a+");
        while($ligne=fgets($promo))
        {
          $element=explode(",",$ligne);
          $code=$element[0];
          $nom=$element[1];
          $prenom=$element[2];
          $date=$element[3];
          $num=$element[4];
          $email=$element[5];
          $statut=$element[6];
          $promot=$element[7];
          if($code==$element[0]);
          {
            $trouv=true;
            echo "vérifier les champs";
          }

        }
        if($trouv==false)
        {
          $h=sn;
          $h=$code.$h;
          $chaine="\n".$code.",".$_POST['nom'].",".$_POST['prenom'].",".$_POST['date'].",".$_POST['num'].",".$_POST['mail'].",".$_POST['statut'].",".$_POST['promo'].",";
          fwrite($app,$chaine);
        }
       
        fclose($app);
      }
// }
 
    ?>
</body>
</html>