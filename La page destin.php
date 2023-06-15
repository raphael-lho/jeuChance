<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rencontre</title>
</head>
<body>
<div>
    <?php
        //Informations nécessaires à la connexion
        $servername = 'localhost';
		$dbname='monstre';
        $username = 'root';
        $password = '';
            
        //On établit la connexion
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $requete = $conn->prepare("SELECT * FROM monstre WHERE RAND()*1 LIMIT 1");
        $requete->execute();
        
        $data = $requete->fetchALL(PDO::FETCH_ASSOC);
        $chance = rand(0,9);
        
        $materiaux = ['diamant','rubis','PO','trésor magique'];
        $objetMagique = ['une épée magique','une armure magique','un bouclier magique','un casque magique'];

        foreach ($data as $row) {
            if ($chance == 0 || $chance == 1 || $chance == 2){
                echo "VOUS AVEZ TROUVE UN TRESOR !! "."<br>";
                $chanceTresor = rand(0,1);
                if ($chanceTresor == 0){
                    $chanceMateriaux = rand(0,2);
                    if ($materiaux == 0 ){
                        $nbChancerubis = rand(1,5);
                        echo "Nombre de ".$materiaux[$chanceMateriaux]." Trouvé : "."<br>";
                        echo $nbChanceDiamant;
                    }else{
                        if ($chanceMateriaux == 1){
                            $nbChanceRubis = rand(1,100);
                            echo "Nombre de ".$materiaux[$chanceMateriaux]." Trouvé : "."<br>";
                            echo $nbChanceRubis;
                        }else{
                            if ($chanceMateriaux == 2){
                                $nbChancePO = rand(1,100);
                                echo "Nombre de ".$materiaux[$chanceMateriaux]." Trouvé : "."<br>";
                                echo $nbChancePO;
                            }
                        }
                    }
    
                }else{
                    if($chanceTresor == 1){
                        $chanceObjetMagique = rand(0,3);
                        echo $objetMagique[$chanceObjetMagique];
                    }
                }
            }else{
                if($chance == 3 || $chance == 4 || $chance == 5){
                    echo " Il faut relancer la page ";
                }else{
                    echo $row['monstreNom']."<br>"."Point de vie : ".$row['monstrePv']."<br>"."Attaque : ".$row['monstreAttaque']."<br>"."Dégâts : ".$row['monstreDegtMax']."<br>"."<br>";
                }
            }
        }
    ?>
</div>
</body>
</html>