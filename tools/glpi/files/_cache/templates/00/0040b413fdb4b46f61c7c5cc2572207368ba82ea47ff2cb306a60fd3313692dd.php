<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* display_and_die.html.twig */
class __TwigTemplate_eb99742b26d4f4ae07c3d0d50364c4b87ce540cee4bf23f4251d3e944b1e7b20 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "
<div class=\"alert alert-danger alert-important\">
   <div class=\"d-flex\">
      <div class=\"me-2\">
         <i class=\"fas fa-exclamation-triangle fa-2x\"></i>
      </div>
      <div>
         ";
        // line 40
        echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
        echo "
      </div>
   </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "display_and_die.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 40,  37 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("", "display_and_die.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/MIS-platform/tools/glpi/templates/display_and_die.html.twig");
    }
}