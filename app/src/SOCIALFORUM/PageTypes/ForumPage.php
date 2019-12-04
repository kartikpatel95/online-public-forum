<?php

namespace SOCIALFORUM;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\DateTimeField;

class ForumPage extends \Page
{
  /**
   * Defines the database table name
   * @var string
   */
  private static $table_name = 'ForumPage';

  private static $icon_class = "font-icon-p-news-item";

  /**
   * Defines whether a page can be in the root of the site tree
   * @var boolean
   */
  private static $can_be_root = false;

  private static $description = "Add under Campaign Page";

  /**
   * Database fields
   * @var array
   */
  private static $db = [
    'Caption' => 'Text',
    'OpenDate' => 'DBDatetime',
    'CloseDate' => 'DBDatetime'
  ];

  /**
   * Has_one relationship
   * @var array
   */
  private static $has_one = [
    'Teaser' => Image::class,
  ];

  /**
   * Relationship version ownership
   * @var array
   */
  private static $owns = [
    'Teaser'
  ];

  /**
   * CMS Fields
   * @return FieldList
   */
  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $dates = FieldGroup::create([
      DateTimeField::create('OpenDate'),
      DateTimeField::create('CloseDate')
    ])->setTitle('Forum Dates');
    $fields->addFieldToTab('Root.Main', $dates, 'Content');

    $teaser = UploadField::create('Teaser', 'Teaser');
    $teaser->setFolderName('Teasers');
    $fields->addFieldsToTab('Root.Teaser',[
        TextareaField::create('Caption', 'Teaser Caption'),
        $teaser
    ]);
    return $fields;
  }

  public function getCMSValidator()
  {
    return RequiredFields::create([
      'Teaser', 'Caption', 'OpenDate', 'CloseDate'
    ]);
  }

  /**
  * Gets text for tile based on close date
  */
  public function getOpenClosedStatus()
  {
    $result = null;
    if($this->dbObject('CloseDate') < Date('Y-m-d h:m:s')) {
      $result = "Closed";
    } else {
      $result = "Open";
    }
    return $result;
  }
}
