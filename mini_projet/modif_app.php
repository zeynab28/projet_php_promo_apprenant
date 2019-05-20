<!doctype html>
<html >
<head>
  <meta charset="utf-8">
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
  <center><h1 style=font-family:fantasy>vous voulez modifier </h1></center>
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
  <form style=width:80% method="POST" action="modif_app.php">


<div class="form-group" style=margin-left:200px>
    <label for="exampleInputPassword1"><strong>Code:</strong></label>
    <input type="password" style=background-color:orange class="form-control" id="exampleInputPassword1" placeholder="entrer votre code" name="code">
  </div>

  <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong>Nom:</strong></label>
    <input name="nom" style=background-color:#1E90FF type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Entrer votre nom">
  </div>
    <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong> Prénom:</strong></label>
    <input name="prenom" style=background-color:orange type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Entrer votre prénom">
    </div>
    <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong> Date de naissance: </strong></label>
    <input name="date" style=background-color:#1E90FF type="date" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Entrer votre date de naissance">
 </div>
    <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong>Numéro:</strong></label>
    <input name="num" style=background-color:orange type="number" class="form-control" id="exampleInputEmail1" aria-describedby="numberHelp" placeholder="Entrer votre numéro">
  </div>
  <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong> Email address:</strong> </label>
    <input name="mail"  style=background-color:#1E90FF type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group" style=margin-left:200px>
    <label for="exampleInputEmail1"><strong> Statut</strong></label>
    <input name="statut" style=background-color:orange type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Entrer le code">
  </div>
  
  <?php
  echo"<select name='promo' id='promo' >";
  $promo=fopen("promo.txt","a+");
  while(!feof($promo))
  {
    $ligne=fgets($promo);
    $element=explode(",",$ligne);
  echo  '<option value="promo" name="promotion"><strong>'.$element[1].'</strong></option>';
  }

  echo "</select>";
  ?>
  <button type="submit" class="btn btn-primary" style=margin-left:150px name="bouton">valider</button>
</form>
  <?php

    echo "<table border=1 width=100% class='table table-striped table-pink' style=background-color:orange>";
    echo "<thead class='entete'>
    <th>code</th>
 <th>nom</th>
 <th>prenom</th>
 <th>date de naissance</th>
 <th>numéro</th>
 <th>promo</th>
 <th>email</th>
 <th>statut</th>
    </thead>";
   
    if(isset ($_POST['bouton']))
    {
      if(!empty($_POST['code']) && !empty($_POST['nom']) && !empty($_POST['prenom']))
      {
        $code=$_POST['code'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $date=$_POST['date'];
        $num=$_POST['num'];
        $email=$_POST['mail'];
        $statut=$_POST['statut'];
        $promot=$_POST['promotion'];
         $app=fopen("app.txt","r");
         while(!feof($app)){
           $ligne=fgets($app);
           $element=explode(",",$ligne);
           if($code==$element[0])
           {
             $code=$element[0];
             $element[1]=$nom;
             $element[2]=$prenom;
             $element[3]=$date;
             $element[4]=$num;
             $element[5]=$email;
             $element[6]=$statut;
             $element[7]=$promot;
             $inline=$element[0].','.$element[1].','.$element[2].','.$element[3].','.$element[4].','.$element[5].','.$element[6].','.$element[7]."\n";
           }
           else{
             $inline=$ligne;
           }
           $inline1=$inline1.$inline;
         }
         fclose($app) ;
         $app=fopen("app.txt","w+");
         fwrite($app,$inline1);
         fclose($app);
      }} 
      $app=fopen("app.txt","a+");
      while(!feof($app))
      {
        $ligne=fgets($app);
        $element=explode(",",$ligne);
        echo "<tr>
        <td>$element[0]</td>
        <td>$element[1]</td>
        <td>$element[2]</td>
        <td>$element[3]</td>
        <td>$element[4]</td>
        <td>$element[5]</td>
        <td>$element[6]</td>
        <td>$element[7]</td>
        </tr>";
      }
      
echo "</table>" ;
    ?>
</body>
</html>