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
            Requirements::css("https://use.fontawesome.com/releases/v5.8.2/css/all.css");
            Requirements::css("https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,900&display=swap");
        }

        /**
        * apply class name based on banenr
        * @return string
        */
        public function BannerCheck():string
        {
          $class = null;
          if ($this->Banner()->ID) {
            $class = "banner";
          }else{
            $class = "no-banner";
          }
          return $class;
        }
    }
}
