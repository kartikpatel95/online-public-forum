<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\View\Requirements;

    /**
     * Class PageController
     */
    class PageController extends ContentController
    {
        private static $allowed_actions = [];

        protected function init()
        {
            parent::init();
            Requirements::themedJavascript('assets/javascript/vendor/jquery.min');
            Requirements::themedJavascript('assets/javascript/vendor/bootstrap.min');
            Requirements::themedCSS('assets/css/vendor/bootstrap.min.css');
            Requirements::themedCSS('assets/css/framework/typography');
            Requirements::themedCSS('assets/css/layout');

            Requirements::css("https://use.fontawesome.com/releases/v5.8.2/css/all.css");
            Requirements::css("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap");
        }
    }
}
