<?php



function getDatabaseConn(){

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try
    {
        $pdo = new PDO(
            'mysql:host='. HOST .';dbname='. DB_NAME,
            DB_USERNAME,
            DB_PASSWORD,
            $options
        );


    }
    catch(PDOException $e)
    {

        die("Error: " . $e->getMessage());
    }

    return $pdo;
}


