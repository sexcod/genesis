<?php

/* index.html.twig */
class __TwigTemplate_2d29509fe968f0f1176b1b35d8c5b8e9d7e993524e53ecac489842adad2439b0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang='pt' data-ng-app=\"app\">
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Base Progs</title>
 
<link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->assetsFunction("bower/bootstrap/dist/css/bootstrap.css"), "html", null, true);
        echo "\" media=\"screen\">

  </head>
  <body ng-controller=\"AppController\" >

 <h1 class=\"title\">Component Router</h1>
   <div ng-viewport>loading...</div>
  
<script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->assetsFunction("bower/angular/angular.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->assetsFunction("bower/angular-new-router/dist/router.es5.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->assetsFunction("components/home/home.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->assetsFunction("components/app.js"), "html", null, true);
        echo "\"></script>
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 20,  48 => 19,  44 => 18,  40 => 17,  29 => 9,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang='pt' data-ng-app="app">*/
/*   <head>*/
/*     <meta charset='utf-8'>*/
/*     <meta http-equiv='X-UA-Compatible' content='IE=edge'>*/
/*     <meta name='viewport' content='width=device-width, initial-scale=1'>*/
/*     <title>Base Progs</title>*/
/*  */
/* <link rel="stylesheet" href="{{ assets('bower/bootstrap/dist/css/bootstrap.css')}}" media="screen">*/
/* */
/*   </head>*/
/*   <body ng-controller="AppController" >*/
/* */
/*  <h1 class="title">Component Router</h1>*/
/*    <div ng-viewport>loading...</div>*/
/*   */
/* <script type="text/javascript" src="{{ assets('bower/angular/angular.js')}}"></script>*/
/* <script type="text/javascript" src="{{ assets('bower/angular-new-router/dist/router.es5.js')}}"></script>*/
/* <script type="text/javascript" src="{{ assets('components/home/home.js')}}"></script>*/
/* <script type="text/javascript" src="{{ assets('components/app.js')}}"></script>*/
/*   </body>*/
/* </html>*/
/* */
