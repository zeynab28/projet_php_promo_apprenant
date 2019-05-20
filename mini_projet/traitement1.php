<?php
$code=$_GET['code'];
$vide="";
$app=fopen("app.txt","r");
while(!feof($app))
{
$ligne=fgets($app);
$element=explode(",",$ligne);
if($code==$element[0] )
{
    $nm = $element[7]; 
    if($element[6]=="présent\n" || $element[6]=="présent")
    {
        $element[6]='abandoné';
        
    }
    elseif($element[6]=="Exclu\n" || $element[6]=='Exclu'){
        $element[6]='abandoné';
        }
    elseif($element[6]=="abandonné\n" || $element[6]=='abandonné'){
        $element[6]='Exclu';
          }
    else{
        $rempli=$ligne;
    }
}
$rempli=$element[0].','.$element[1].','.$element[2].','.$element[3].','.$element[4].','.$element[5].','.$element[6].','.$element[7].",\n";
$vide=$vide.$rempli;
}
fclose($app);
$app=fopen('app.txt','w+');
fputs($app,trim($vide));
fclose($app);
header("location:list_app.php?name=".$nm."");

// fputs($app,trim($vide));
// fclose($app);
// unlink("app.txt");//supprime fichier BDD
// rename("app1.txt","app.txt");//renommer BDD en BDD1
// header('location:list_app.php');
?>