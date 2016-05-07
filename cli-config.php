<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 07/03/16
 * Time: 15:44
 */

// cli-config.php


$loader = require __DIR__.'/vendor/autoload.php';

define('BASEPATCH',__DIR__);


require __DIR__.'/app/Config/db.php';

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)
));
return $helperSet;