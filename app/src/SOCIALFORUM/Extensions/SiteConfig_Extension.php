<?php

namespace SOCIALFORUM;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataExtension;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class SiteConfig_Extension extends DataExtension
{
  /**
   * Has_one relationship
   * @var array
   */
  private static $has_one = [
    'Logo' => Image::class,
  ];

  /**
   * Has_many relationship
   * @var array
   */
  private static $has_many = [
    'Social' => Social::class,
  ];

  /**
   * Relationship version ownership
   * @var array
   */
  private static $owns = [
    'Logo'
  ];

  /**
   * Update Fields
   * @return FieldList
   */
  public function updateCMSFields(FieldList $fields)
  {
    $fields->addFieldToTab('Root.Main', $logo = UploadField::create('Logo', 'Logo'));
    $logo->setFolderName('Logos');
    $logo->setAllowedExtensions(['jpeg', 'jpg', 'png', 'gif', 'svg']);
    $fields->addFieldToTab('Root.Social', $this->getSocialItems());
    return $fields;
  }

  /**
  * @return GridField
  */
  public function getSocialItems() {
    $socialgrid = GridField::create('Social','',$this->getOwner()->Social(), GridFieldConfig_RecordEditor::create());
    $socialgrid->getConfig()->addComponent(new GridFieldSortableRows('SortID'));
    return $socialgrid;
  }
}
