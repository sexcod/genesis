<?php

namespace SexCode\Lib;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;


class Doctrine {

  private static $em = null;

  public function __construct()
  {
   //se for falso usa o APC como cache, se for true usa cache em arrays
$isDevMode = false;
//caminho das entidades
$paths = array(dirname(__DIR__). '/Models');
$db = array(dirname(__DIR__). '/Config/db');
// configurações do banco de dados

if($db['driver'] = 'pdo_sql'){

  $dbParams = array(
      'driver' => $db['driver'],
      'path'=> $db['path']
      );

}
else{
$dbParams = array(
    'driver' => $db['driver'],
    'host'=> $db['host'],
    'user'   => $db['user'],
    'password' => $db['password'],
    'dbname'    => $db['database'],
    );
}
$config = Setup::createConfiguration($isDevMode);
//leitor das annotations das entidades
$driver = new AnnotationDriver(new AnnotationReader(), $paths);
$config->setMetadataDriverImpl($driver);
//registra as annotations do Doctrine

AnnotationRegistry::registerFile(
    dirname(__DIR__). '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
);
//cria o entityManager
$entityManager = EntityManager::create($dbParams, $config);

self::$em = $entityManager;

  }

  public static function getEm(){

    if(!is_null(self::$em)){
      return self::$em;
    }

  }

}
