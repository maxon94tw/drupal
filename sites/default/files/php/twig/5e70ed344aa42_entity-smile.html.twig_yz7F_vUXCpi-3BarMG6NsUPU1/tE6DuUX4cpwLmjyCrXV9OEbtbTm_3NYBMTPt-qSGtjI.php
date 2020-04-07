<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/entity_smile/templates/entity-smile.html.twig */
class __TwigTemplate_b6a8a2d3f67a80ae2cc9ab795d15421e1369ae4917dc42838af5f67c920d2e2c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 26];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 15
        echo "

";
        // line 22
        echo "

<p>Test twig template!</p>

<p>test_var: ";
        // line 26
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["test_var"] ?? null)), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/entity_smile/templates/entity-smile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 26,  59 => 22,  55 => 15,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{# ** @file modules/custom/entity_smile/templates/entity-smile.html.twig
 *
 * Default theme implementation to present entity_smile data.
 *
 * Available variables:
 * - content: A list of content items. Use 'content' to print all content, or
 *          content.field_name to access public fields
 * - attributes: HTML attributes for the container element.
 *
 * @see template_preprocess_entity_smile()
 *
 * @ingroup themeable
 */
#}


{#<div{{ attributes.addClass('entity_smile') }}>#}
{#  {% if content %}#}
{#    {{- content -}}#}
{#  {% endif %}#}
{#</div>#}


<p>Test twig template!</p>

<p>test_var: {{ test_var }}</p>
", "modules/custom/entity_smile/templates/entity-smile.html.twig", "/var/www/html/modules/custom/entity_smile/templates/entity-smile.html.twig");
    }
}