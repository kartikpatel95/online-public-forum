<?php

namespace SOCIALFORUM;

use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ValidationResult;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;

/**
 * Class ForumSubmission
 * @package SOCIALFORUM
 * @property string $Name
 * @property string $Email
 * @property string $PhoneNumber
 * @property string $Summary
 * @property boolean $Approved
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
     * Has_one relationship
     * @var array
     */
    private static $has_one = [
        'ForumPage' => ForumPage::class,
        'ApprovedBy' => Member::class
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
        'Summary',
        'ForumPage.Title' => 'Forum Pages'
    ];

    /**
     * Defines a default list of filters for the search context
     * @var array
     */
    private static $searchable_fields = [
        'Name',
        'Email',
        'PhoneNumber',
        'ForumPage.Title' => [
            'title' => 'Forum Page Title',
            'field' => TextField::class,
            'filter' => 'PartialMatchFilter'
        ]
    ];

    /**
     * CMS Fields
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldsFromTab('Root.Main', ['ApprovedByID', 'Approved']);
        $fields->addFieldsToTab('Root.Main',[
            TextField::create('Name','Name'),
            TextField::create('Email','Email'),
            TextField::create('PhoneNumber','Phone Number'),
            TextareaField::create('Summary', 'Summary'),
            DropdownField::create('ForumPageID', 'Forum Page',
                ForumPage::get()
                    ->filter(['CloseDate:GreaterThanOrEqual' => Date('Y-m-d h:m:s')])
                    ->map('ID','Title'))
        ]);

        return $fields;
    }

    /**
     * @return ValidationResult
     */
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

    /**
     * @param ValidationResult $result
     */
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
     * @return Member|null
     */
    public static function getLoggedInMember(){
        return Security::getCurrentUser();
    }

    /**
     * Event handler called before writing to the database.
     */
    public function onBeforeWrite()
    {
        $this->getTrimValues();
        if (self::getLoggedInMember()) {
            $this->Approved = 1;
            $this->ApprovedByID = self::getLoggedInMember()->ID;
        }

        return parent::onBeforeWrite();
    }

    /**
     * Trim database fields
     */
    public function getTrimValues()
    {
        $this->Name = trim($this->Name);
        $this->Email = trim($this->Email);
        $this->PhoneNumber = trim($this->PhoneNumber);
        $this->Summary = trim($this->Summary);
    }
}
