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
            if(strpos($a, 'make:') !== false) return $this->cmdMake(substr($a, 5), $ax);
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
            case 'create:table':
                $result  = system('./vendor/bin/doctrine orm:schema-tool:create',$return);

                echo $result;

                break;

            case 'model:valida':
                $result  = system('./vendor/bin/doctrine orm:validate-schema');
                print $result;

                break;

            case 'update':
                $result  = system('./vendor/bin/doctrine orm:validate-schema');
                print $result;
                break;
                
           case 'create:entitys':
          $result = system('./vendor/bin/doctrine orm:convert-mapping --from-database annotation app/Models');
           print $result;
            break;  
                
                  case 'generate:getseters':
          $result = system('./vendor/bin/doctrine orm:generate-entities --generate-methods="true"  app/Models');
           print $result;
            break;  
          
        }

    }


    function cmdMake($comando, $parametros)
    {
        switch($comando){
            case 'create:table':
                $result  = system('./vendor/bin/doctrine orm:schema-tool:create',$return);

                echo $result;

                break;
        }

    }

    function help(){
    	exit("\n\tHelp");
    }

}