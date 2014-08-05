<?php

/* SZIMProgramBundle:Default:index.html.twig */
class __TwigTemplate_331ec31e85e1fe580d4a15a34cc67f060011f3c6ca60e9968dbf29b76f51cddb extends Twig_Template
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
        echo "Program wyglada tak: <br />

Jakis punkt programu:   <br />
";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!
";
    }

    public function getTemplateName()
    {
        return "SZIMProgramBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 4,  19 => 1,);
    }
}
