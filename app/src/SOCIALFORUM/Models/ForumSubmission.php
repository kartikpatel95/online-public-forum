<?php

namespace SOCIALFORUM;

use SilverStripe\ORM\DataObject;

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
}
