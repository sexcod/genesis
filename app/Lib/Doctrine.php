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
$paths = array(BASEPATCH . '/app/Models');
// configurações do banco de dados
$dbParams = array(
    'driver' => 'pdo_mysql',
    'host'=> 'progs.net.br',
    'user'   => 'progs_mk',
    'password' => 'mk3600',
    'dbname'    => 'progs_mk',
);
$config = Setup::createConfiguration($isDevMode);
//leitor das annotations das entidades
$driver = new AnnotationDriver(new AnnotationReader(), $paths);
$config->setMetadataDriverImpl($driver);
//registra as annotations do Doctrine

AnnotationRegistry::registerFile(
    BASEPATCH . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
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