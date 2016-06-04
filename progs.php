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
            if(strpos($a, 'g') !== false) return $this->generate(substr($a, 1), $ax);
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
    
    function generate($comando, $parametros){
        
        $valor = $parametros[0];
        $page = $parametros[1];
        
        switch($valor){
            
            case 'page':
            
          $result =  system('mkdir public/components/'.$page);
          
          $this->page($page);
          
           echo "componente $page criado com sucesso \n 
            não esqueça de inserir o componente em sua app.js , \n 
            e no app/resources/view/index.html.twig \n ";

          break;
            
        }
        
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


public function page($page)
{
    $file = fopen("public/components/$page/$page.html","w");
    $content = file_get_contents('https://raw.githubusercontent.com/sexcod/genesis/1.0/public/components/home/home.html');
    $content = str_replace('home',"$page",$js);
   fwrite($file,$content);
   fclose($file);
   
    $file = fopen("public/components/$page/$page.js","w");
    $js = file_get_contents('https://raw.githubusercontent.com/sexcod/genesis/1.0/public/components/home/home.js');
   
   $js = str_replace('home',"$page",$js);
   $js = str_replace('HomeController',ucwords($page).'Controller',$js);
   
   fwrite($file,$js);
   fclose($file);
   
}
    function help(){
    	exit("\n \t Help \n

      db:create:table  => create table in database using entitys in model \n
      db:model:valida   =>  validate-schema \n
      db:update   =>  update table in database using new models \n
      db:create:entitys  =>   create entitys using table in database \n
      db:generate:getseters  => generate get and sets in models \n 
      g page  => gera um componente já no padrão angular \n 
      g controller  => gera um controller vazio \n 
      g controller api  =>  gera um controller com metodos padrão \n 
      g controller -r  => gera controler com rotas \n 
      

      ");
    }

}
