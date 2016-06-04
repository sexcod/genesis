<?php

$cmd = new Test($argv);



class Test
{


    function __construct($rqst){
		array_shift($rqst);
        $ax = $rqst;
        foreach($rqst as $a){
            array_shift($ax);
            if(strpos($a, '-h') !== false || strpos($a, '?') !== false) return $this->help();
            if(strpos($a, 'db:') !== false) return $this->dbMake(substr($a, 3), $ax);
            if(strpos($a, 'clear:') !== false) return $this->clear(substr($a, 6), $ax);
            //Plugins
            if(strpos($a, 'table:') !== false) {
                $plugin = new Plugin\Table(substr($a, 6), $ax);
                return $plugin->run();
            }
        }

    }

    function clear(){
        system('rm -rf /app/resources/cache/*');

        echo "cache limpo";
    }

    function dbMake($comando, $parametros)
    {
        switch($comando){
          // create table in database using entitys in model
            case 'create:table':

                  print_r($parametros);

                $result  = system('./vendor/bin/doctrine orm:schema-tool:create',$return);

                echo $result;

                break;
         // validate-schema
            case 'model:valida':
                $result  = system('./vendor/bin/doctrine orm:validate-schema');
                print $result;

                break;
          // update table in database using new models
            case 'update':
                $result  = system('./vendor/bin/doctrine orm:validate-schema');
                print $result;
                break;
         // create entitys using table in database
           case 'create:entitys':
          $result = system('./vendor/bin/doctrine orm:convert-mapping --from-database annotation app/Models');
           print $result;
            break;
      // generate get and sets in models
          case 'generate:getseters':
          $result = system('./vendor/bin/doctrine orm:generate-entities --generate-methods="true"  app/Models');
           print $result;
            break;

        }

    }


    function help(){
    	exit("\n \t Help \n

      db:create:table  create table in database using entitys in model \n
      db:model:valida   validate-schema \n
      db:update update table in database using new models \n
      db:create:entitys  create entitys using table in database \n
      db:generate:getseters generate get and sets in models

      ");
    }

}
