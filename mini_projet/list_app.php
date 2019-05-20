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
 <form action="list_app.php" method="POST">
 <div class="form-group"  style=width:500px >
 <label for="exampleInputEmail1" style=margin-left:700px><strong> Promo</strong></label>
 <input style=margin-left:500px name="promo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Entrer la promotion">
 <button style=margin-left:700px type="submit" class="btn btn-primary" style=margin-left:150px name="bouton">valider</button>

  </div>   
  </form>
 <?php
 echo "<table border=2 class='table table-striped table-pink' >
  <thead style=background-color:orange>
 <th>code</th>
 <th>nom</th>
 <th>prenom</th>
 <th>date de naissance</th>
 <th>numéro</th>
 <th>email</th>
 <th>statut</th>
 <th>promo</th>
 </thead>";
 $promo=$_POST['promo'];
 $app=fopen("app.txt","a+");
 while(!feof($app)){
     $ligne=fgets($app);
     $element=explode(",",$ligne);
  
         if(isset($_POST['bouton']) or isset($_GET['name'])){
         if(($promo==$element[7]) or ($_GET['name'] == $element[7])) {
             if($element[6]!='Exclu'){
     echo "<tr>
     <td>$element[0]</td>
     <td>$element[1]</td>
     <td>$element[2]</td>
     <td>$element[3]</td>
     <td>$element[4]</td>
     <td>$element[5]</td>
     <td><a href='traitement1.php?code=$element[0]'> <button name='bouton' id='bouton'>$element[6]</button></a></td>
     <td>$element[7]</td>
     </tr>";}
         }
 }
}
 fclose($app);
 echo "</table>";
 ?>
 </body>
 </html>