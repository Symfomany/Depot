<?php

/* BetaBundle:Default:index.html.twig */
class __TwigTemplate_08c12315f20c18460c099315d59a253a extends Twig_Template
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
        // line 2
        echo "<html xmlns:fb=\"http://www.facebook.com/2008/fbml\"
      xmlns:og=\"http://opengraphprotocol.org/schema/\">
    <head></head>

    <body>
        <h1>Hello Man!</h1>
        <fb:login-button v=\"2\" size=\"xlarge\" onlogin=\"onFacebookConnect();\">
            Login with Facebook
        </fb:login-button>
        <div id=\"fb-root\"></div>
        <script type=\"text/javascript\">
                window.fbAsyncInit = function() {
                    FB.init({
                        appId      : '";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, "facebookAppId"), "html", null, true);
        echo "',
                        status     : true,
                        cookie     : true,
                        xfbml      : true
                    });

                    FB.Event.subscribe('auth.login', function(response) {
                        window.location.reload();
                    });
                };

                function onFacebookConnect() {
                    window.location.reload();
                }

                (function(d){
                    var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                    js = d.createElement('script'); js.id = id; js.async = true;
                    js.src = \"//connect.facebook.net/en_US/all.js\";
                    d.getElementsByTagName('head')[0].appendChild(js);
                }(document));
        </script>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "BetaBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 15,  17 => 2,);
    }
}
