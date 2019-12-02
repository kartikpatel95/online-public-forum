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
            Requirements::themedJavascript('assets/javascript/framework/jquery-3.3.1.min');
            Requirements::themedJavascript('assets/javascript/framework/bootstrap');
            Requirements::themedCSS('assets/css/framework/bootstrap');
            Requirements::themedCSS('assets/css/framework/typography');
            Requirements::themedCSS('assets/css/partials/footer');

            Requirements::css("https://use.fontawesome.com/releases/v5.8.2/css/all.css");
            Requirements::css("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap");
        }
    }
}
