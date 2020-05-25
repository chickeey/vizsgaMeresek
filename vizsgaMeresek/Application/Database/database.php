<?php

function insertNewInvoice( PDO $pdo, $invoice)
{
    extract($invoice);

    $smt = $pdo->prepare(
        "INSERT INTO `szamla` VALUES (
            (SELECT MAX(id) + 1 FROM (SELECT * FROM `szamla`) T),
            :szamlaszam, 
            current_date, 
            :ertek, 
            :palyazatId, 
            :regioNev
        )"
    );

    $smt->bindParam(":szamlaszam",      $szamlaszam);
    $smt->bindParam(":ertek",           $ertek);
    $smt->bindParam(":palyazatId",      $palyazatId);
    $smt->bindParam(":regioNev",  $regioNev);

    try 
    {
        if (!$smt->execute())
        {
            throw new PDOException($smt->errorInfo()[2]);
        }

        return true;
    } 
    catch (PDOException $e) 
    {
        errorLog($e->getMessage());
        return false;
    }
}

function deleteregion( PDO $pdo, $regioId)
{
    $smt = $pdo->prepare("DELETE FROM `regiok` WHERE `id` = :regioId");

    $smt->bindParam(":regioId", $regioId);

    try  
    {
        if (!$smt->execute())
        {
            throw new PDOException($smt->errorInfo()[2]);
        }

        return true;
    } 
    catch (PDOException $e) 
    {
        errorLog($e->getMessage());
        return false;
    }
}

function getregion( PDO $pdo )
{
    $smt = $pdo->prepare("SELECT * FROM `regioNev`");

    try 
    {
        if (!$smt->execute())
        {
            throw new PDOException($smt->errorInfo()[2]);
        }

        return $smt->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch (PDOException $e) 
    {
        errorLog($e->getMessage());
        return [];
    }
}


function getregions( PDO $pdo )
{
    $smt = $pdo->prepare("SELECT * FROM `regiok`");

    try 
    {
        if (!$smt->execute())
        {
            throw new PDOException($smt->errorInfo()[2]);
        }

        return $smt->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch (PDOException $e) 
    {
        errorLog($e->getMessage());
        return [];
    }
}


function getConnection($config)
{
    extract($config);

    try 
    {
        return new PDO(
            "mysql:host={$hostName};dbname={$database};charset=utf8;",
            $userName,
            $password
        );
    } 
    catch (PDOException $e) 
    {
        errorLog($e->getMessage());
        return false;
    }
}