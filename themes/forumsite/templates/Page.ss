<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="$ContentLocale">
    <!--<![endif]-->
    <!--[if IE 6 ]><html lang="$ContentLocale" class="ie ie6"><![endif]-->
    <!--[if IE 7 ]><html lang="$ContentLocale" class="ie ie7"><![endif]-->
    <!--[if IE 8 ]><html lang="$ContentLocale" class="ie ie8"><![endif]-->

    <% include HeaderTag %>
    <body>
    <header>
        <% include Header %>
        <% require themedCSS("assets/css/vendor/bootstrap.min") %>
        <% require themedCSS("assets/css/framework/typography") %>
        <% require themedCSS("assets/css/layout") %>
    </header>
        <div class="main">
            <div class="typography h-100">
                $Layout
            </div>
        </div>
    <footer>
        <% include Footer %>
        <% require javascript("_resources/themes/forumsite/assets/javascript/vendor/jquery.min.js") %>
        <% require javascript("_resources/themes/forumsite/assets/javascript/vendor/bootstrap.min.js") %>
        <% require javascript("_resources/themes/forumsite/assets/javascript/vendor/masonry.pkgd.min.js") %>
        <% require javascript("_resources/themes/forumsite/assets/javascript/script.js") %>
    </footer>
    </body>
</html>
