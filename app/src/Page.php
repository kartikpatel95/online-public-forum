<?php

namespace {

    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\HTMLEditor\HtmlEditorField;
    use SilverStripe\Assets\Image;
    use SilverStripe\CMS\Model\SiteTree;

    /**
    * @property HTMLText $BannerContent
    */
    class Page extends SiteTree
    {
        private static $db = [
          'BannerContent' => 'HTMLText'
        ];

        private static $has_one = [
          'Banner' => Image::class
        ];

        /**
         * Relationship version ownership
         * @var array
         */
        private static $owns = [
          'Banner'
        ];

        /**
         * CMS Fields
         * @return FieldList
         */
        public function getCMSFields()
        {
          $fields = parent::getCMSFields();
          $fields->addFieldToTab('Root.Banner', $banner = UploadField::create('Banner','Banner'));
          $banner->setFolderName('Banners');
          $banner->setAllowedExtensions(['jpeg', 'jpg', 'png', 'gif']);
          $fields->addFieldToTab('Root.Banner', HtmlEditorField::create('BannerContent','Banner Content'));
          return $fields;
        }
    }
}
