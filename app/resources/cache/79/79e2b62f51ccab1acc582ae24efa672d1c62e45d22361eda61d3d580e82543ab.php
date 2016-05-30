<?php

/* template.html.twig */
class __TwigTemplate_1ee5f1e78e2b4c3630b5fb3bb594a6c884560e0235edc809eb26d1398344c206 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta name=\"viewport\" content=\"width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no\" />
        <title>Progs Desenvolvimento</title>
        <link rel=\"stylesheet\" type=\"text/css\"  href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->assetsFunction("assets/css/dist.min.css"), "html", null, true);
        echo "\"/>
    </head>
    <body>

    
    <div class=\"contente\">
    ";
        // line 12
        $this->displayBlock('body', $context, $blocks);
        // line 13
        echo "    </div>

    </body>
</html>
";
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 12,  38 => 13,  36 => 12,  27 => 6,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />*/
/*         <title>Progs Desenvolvimento</title>*/
/*         <link rel="stylesheet" type="text/css"  href="{{ assets('assets/css/dist.min.css') }}"/>*/
/*     </head>*/
/*     <body>*/
/* */
/*     */
/*     <div class="contente">*/
/*     {% block body %}{% endblock %}*/
/*     </div>*/
/* */
/*     </body>*/
/* </html>*/
/* */
