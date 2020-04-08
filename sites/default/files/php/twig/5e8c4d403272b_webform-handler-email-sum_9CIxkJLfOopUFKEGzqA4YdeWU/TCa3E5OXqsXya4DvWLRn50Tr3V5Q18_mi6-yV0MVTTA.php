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

/* modules/contrib/webform/templates/webform-handler-email-summary.html.twig */
class __TwigTemplate_a7bddcd1c9f35087ad1652ae3526fe4d0e4f9b04a7417f96c36c7069a4a394d0 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 13];
        $filters = ["t" => 13, "escape" => 14, "replace" => 14, "join" => 20];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t', 'escape', 'replace', 'join'],
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
        // line 13
        if ($this->getAttribute(($context["settings"] ?? null), "debug", [])) {
            echo "<b class=\"color-error\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Debugging is enabled"));
            echo "</b><br />";
        }
        // line 14
        echo "<b>";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("To:"));
        echo "</b> ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_replace_filter($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["settings"] ?? null), "to_mail", [])), ["," => ", "]), "html", null, true);
        echo "<br />
";
        // line 15
        if ($this->getAttribute(($context["settings"] ?? null), "cc_mail", [])) {
            echo "<b>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("CC:"));
            echo "</b> ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_replace_filter($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["settings"] ?? null), "cc_mail", [])), ["," => ", "]), "html", null, true);
            echo "<br />";
        }
        // line 16
        if ($this->getAttribute(($context["settings"] ?? null), "bcc_mail", [])) {
            echo "<b>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("BCC:"));
            echo "</b> ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_replace_filter($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["settings"] ?? null), "bcc_mail", [])), ["," => ", "]), "html", null, true);
            echo "<br />";
        }
        // line 17
        echo "<b>";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("From:"));
        echo "</b> ";
        if ($this->getAttribute(($context["settings"] ?? null), "from_name", [])) {
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["settings"] ?? null), "from_name", [])), "html", null, true);
        }
        echo " &lt;";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["settings"] ?? null), "from_mail", [])), "html", null, true);
        echo "&gt;<br />
<b>";
        // line 18
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Subject:"));
        echo "</b> ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["settings"] ?? null), "subject", [])), "html", null, true);
        echo "<br />
<b>";
        // line 19
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Settings:"));
        echo "</b> ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar((($this->getAttribute(($context["settings"] ?? null), "html", [])) ? ("HTML") : (t("Plain text"))));
        echo " ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(((($this->getAttribute(($context["settings"] ?? null), "html", []) && $this->getAttribute(($context["settings"] ?? null), "attachments", []))) ? ("/") : ("")));
        echo " ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar((($this->getAttribute(($context["settings"] ?? null), "attachments", [])) ? (t("Attachments")) : ("")));
        echo " ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar((($this->getAttribute(($context["settings"] ?? null), "twig", [])) ? (t("(Twig)")) : ("")));
        echo "<br />
<b>";
        // line 20
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Sent when:"));
        echo "</b> ";
        if ($this->getAttribute(($context["settings"] ?? null), "states", [])) {
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_join_filter($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["settings"] ?? null), "states", [])), "; "), "html", null, true);
        } else {
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Custom"));
        }
        echo "<br />
";
        // line 21
        if ($this->getAttribute(($context["settings"] ?? null), "theme_name", [])) {
            echo "<b>";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Theme:"));
            echo "</b> ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["settings"] ?? null), "theme_name", [])), "html", null, true);
            echo "<br />";
        }
    }

    public function getTemplateName()
    {
        return "modules/contrib/webform/templates/webform-handler-email-summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 21,  113 => 20,  101 => 19,  95 => 18,  84 => 17,  76 => 16,  68 => 15,  61 => 14,  55 => 13,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for a summary of a webform email handler.
 *
 * Available variables:
 * - settings: The current configuration for this email handler.
 * - handler: The email handler.
 *
 * @ingroup themeable
 */
#}
{% if settings.debug %}<b class=\"color-error\">{{ 'Debugging is enabled'|t }}</b><br />{% endif %}
<b>{{ 'To:'|t }}</b> {{ settings.to_mail|replace({',': ', '}) }}<br />
{% if settings.cc_mail %}<b>{{ 'CC:'|t }}</b> {{ settings.cc_mail|replace({',': ', '}) }}<br />{% endif %}
{% if settings.bcc_mail %}<b>{{ 'BCC:'|t }}</b> {{ settings.bcc_mail|replace({',': ', '}) }}<br />{% endif %}
<b>{{ 'From:'|t }}</b> {% if settings.from_name %}{{ settings.from_name }}{% endif %} &lt;{{ settings.from_mail }}&gt;<br />
<b>{{ 'Subject:'|t }}</b> {{ settings.subject }}<br />
<b>{{ 'Settings:'|t }}</b> {{ settings.html ? 'HTML' : 'Plain text'|t }} {{ settings.html and settings.attachments ? '/' : '' }} {{ settings.attachments ? 'Attachments'|t : '' }} {{ settings.twig ? '(Twig)'|t : '' }}<br />
<b>{{ 'Sent when:'|t }}</b> {% if settings.states %}{{ settings.states|join('; ') }}{% else %}{{ 'Custom'|t }}{% endif %}<br />
{% if settings.theme_name %}<b>{{ 'Theme:'|t }}</b> {{ settings.theme_name }}<br />{% endif %}
", "modules/contrib/webform/templates/webform-handler-email-summary.html.twig", "/var/www/html/modules/contrib/webform/templates/webform-handler-email-summary.html.twig");
    }
}
