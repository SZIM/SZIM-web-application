<?php

/* SZIMMainBundle:Default:index.html.twig */
class __TwigTemplate_c7176082298575cc8cbd3839f6cd3e76173f19f2e369ec5697ca258b5e78abb4 extends Twig_Template
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
        echo "Nagłówek <br />
Menu <br />

Zawartość strony <br />
";
        // line 5
        echo $this->getContext($context, "content");
        echo "

<br />
Stopka <br />

";
    }

    public function getTemplateName()
    {
        return "SZIMMainBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 5,  24 => 4,  19 => 1,);
    }
}
