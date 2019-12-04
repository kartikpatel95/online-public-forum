<?php

namespace SOCIALFORUM;

use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ValidationResult;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ForumSubmission extends DataObject
{
  /**
   * Defines the database table name
   * @var string
   */
  private static $table_name = 'ForumSubmission';
  /**
   * Singular name for CMS
   * @var string
   */
  private static $singular_name = 'Forum Submission';
  /**
   * Plural name for CMS
   * @var string
   */
  private static $plural_name = 'Forum Submissions';
  /**
   * Database fields
   * @var array
   */
  private static $db = [
    'Name' => 'Varchar',
    'Email' => 'Varchar',
    'PhoneNumber' => 'Varchar',
    'Summary' => 'Text',
    'Approved' => 'Boolean'
  ];

  /**
   * Defines summary fields commonly used in table columns
   * as a quick overview of the data for this dataobject
   * @var array
   */
  private static $summary_fields = [
    'Name',
    'Email',
    'PhoneNumber' => 'Phone Number',
    'Summary'
  ];

  public function validate()
  {
    $result = parent::validate();
    try {
      $this->validation($result);
    }catch(\Exception $exc) {
      $result->addError($exc->getMessage());
    }
    return $result;
  }

  public function validation(ValidationResult $result)
  {
    $this->getTrimValues();
    if(strlen($this->Name) <= 0){
      $result->addFieldError('Name', 'Name is required!');
    }
    if(strlen($this->Email) <= 0){
      $result->addFieldError('Email', 'Email is required!');
    }
    if(strlen($this->PhoneNumber) <= 0){
      $result->addFieldError('PhoneNumber', 'Phone number is required!');
    }
    if(strlen($this->Summary) <= 0){
      $result->addFieldError('Summary', 'Summary is required!');
    }
  }

  /**
   * Event handler called before writing to the database.
   */
  public function onBeforeWrite()
  {
    parent::onBeforeWrite();
    $this->getTrimValues();
  }
  public function getTrimValues()
  {
    $this->Name = trim($this->Name);
    $this->Email = trim($this->Email);
    $this->PhoneNumber = trim($this->PhoneNumber);
    $this->Summary = trim($this->Summary);
  }
}
