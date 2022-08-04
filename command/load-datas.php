<?php

try{
    $pdo = new \PDO('mysql:host=localhost;dbname=netflux_db', 'netfluxien', 'azerty', [
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ]);
}
catch(PDOException $e){
    die("DB ERROR: " . $e->getMessage());
}

// On lit le contenu du fichier sql ligne par ligne
$sql = file_get_contents('command/datas.sql');
$requetes = explode(';', $sql);

// On exécute les requêtes
foreach($requetes as $requete){
    if(!empty($requete)){
        $pdo->exec($requete);
    }
}

// On affiche un message de confirmation
echo "Data loaded successfully";
