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
        
        if(isset($parametros[0])){
          $valor = $parametros[0];   
        }
        if(isset($parametros[1])){
             $page = $parametros[1];
        }
          if(isset($parametros[1]) && isset($parametros[2])){
           
             $valor = $parametros[0]." ".$parametros[1];  
             
             $page = $parametros[2];
             
           
        }
        

       
        
        switch($valor){
            
            case 'page':
            
          $result =  system('mkdir public/components/'.$page);
          
          $this->page($page);
          
           echo "componente $page criado com sucesso \n 
            não esqueça de inserir o componente em sua app.js , \n 
            e no app/resources/view/index.html.twig \n ";

          break;
          
           case 'controller':
            
          
          
          $this->controller($page);
          
           echo "controller $page criado com sucesso \n ";

          break;
          
            case 'controller api':
            
          
          
          $this->controller($page,true);
          
           echo "controller api $page criado com sucesso \n 
                 ";

          break;
          
            case 'controller -r':
            
          
          
          $this->controller($page,false,true);
          
           echo "controller $page criado com sucesso \n 
            rota criada com sucesso";

          break;
          
  default:
  
      echo "comando não encontrado \n ";
            
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
    $content = file_get_contents('https://raw.githubusercontent.com/sexcod/genesis/1.0/doc/base/home.html');
    $content = str_replace('home',"$page",$js);
   fwrite($file,$content);
   fclose($file);
   
    $file = fopen("public/components/$page/$page.js","w");
    $js = file_get_contents('https://raw.githubusercontent.com/sexcod/genesis/1.0/doc/base/home.js');
   
   $js = str_replace('home',"$page",$js);
   $js = str_replace('HomeController',ucwords($page).'Controller',$js);
   
   fwrite($file,$js);
   fclose($file);
   
}

public function controller($page, $api = false , $router = false  )
{
    if(!is_dir(('app/Config/router'))){
        
        system('mkdir app/Config/router');
        
    }
    
   
     $file = fopen("app/Controllers/".ucwords($page)."Controller.php","w"); 
     
    if($api){
      $content = file_get_contents('https://raw.githubusercontent.com/sexcod/genesis/1.0/doc/base/HomeControllerApi.php');
      $content = str_replace('HomeController',ucwords($page).'Controller',$content);
    }else{
        
     $content = file_get_contents('https://raw.githubusercontent.com/sexcod/genesis/1.0/doc/base/HomeController.php');
        $content = str_replace('HomeController',ucwords($page).'Controller',$content); 
    }
    if($router){
   $router = fopen("app/Config/router/$page.php","w"); 
   $contentRouter = file_get_contents('https://raw.githubusercontent.com/sexcod/genesis/1.0/doc/base/router.php');
   $contentRouter = str_replace('HomeController',ucwords($page).'Controller',$contentRouter);
   $contentRouter = str_replace('home',$page,$contentRouter);
   fwrite($router,$contentRouter);
   fclose($router); 
    }
  
   fwrite($file,$content);
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
