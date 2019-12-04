<?php

namespace SOCIALFORUM;

use SilverStripe\Dev\Debug;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\ORM\ValidationResult;

class CampaignPage extends \Page
{
  /**
   * Defines the database table name
   * @var string
   */
  private static $table_name = 'CampaignPage';

  /**
   * Defines whether a page can be in the root of the site tree
   * @var boolean
   */
  private static $can_be_root = true;

  private static $icon_class = "font-icon-menu-campaigns";

  /**
   * Defines the allowed child page types
   * @var array
   */
  private static $allowed_children = [
    ForumPage::class
  ];

  /**
   * Database fields
   * @var array
   */
  private static $db = [
    'Active' => 'Boolean',
    'TileCaption' => 'Varchar'
  ];

  /**
   * Add default values to database
   * @var array
   */
  private static $defaults = [
    'Active' => 0
  ];

  /**
   * Has_one relationship
   * @var array
   */
  private static $has_one = [
    'Teaser' => Image::class
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
    $layout = FieldGroup::create([
      CheckboxField::create('Active', 'Active Campaign')
    ])->setTitle('Layout');
    $fields->addFieldToTab('Root.Main', $layout, 'Content');

    $fields->addFieldToTab('Root.Teaser', TextField::create('TileCaption', 'Tile Caption')
    ->setDescription('Max characters is 30.'));
    $fields->addFieldToTab('Root.Teaser', $teaser = UploadField::create('Teaser'));
    $teaser->setFolderName('Teasers');
    return $fields;
  }

  public function getCMSValidator()
  {
    return RequiredFields::create([
      'TileCaption', 'Teaser'
    ]);
  }

  /**
  * @return ValidationResult
  */
  public function validate()
  {
    $result = parent::validate();
    try {
      $this->validation($result);
    }catch (\Exception $exc){
      $result->addError($exc->getMessage());
    }
    return $result;
  }

  /**
  * @param ValidationResult $result
  * @return ValidationResult
  */
  public function validation(ValidationResult $result)
  {
    $caption = trim($this->TileCaption);
    if(strlen($caption) > 30){
      $result->addFieldError('TileCaption', 'Maximum number of characters that are allowed is 30.', 'bad');
    }
    return $result;
  }

  /**
  * Based on the campaign ID displays if there are available forums or not
  */
  public function getCampaignStatus($id){
    $forums = ForumPage::get()->filter([
        'ParentID' => $id,
        'CloseDate:GreaterThanOrEqual'  => Date('Y-m-d h:m:s')
      ]);
    return count($forums) > 0 ? "Fourms are still Open" : "Forums are all Closed";
  }
}
