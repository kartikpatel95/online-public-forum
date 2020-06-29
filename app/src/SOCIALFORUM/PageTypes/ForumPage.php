<?php

namespace SOCIALFORUM;

use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextareaField;
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

    /**
     * @var string
     */
    private static $icon_class = "font-icon-p-news-item";

    /**
     * Defines whether a page can be in the root of the site tree
     * @var boolean
     */
    private static $can_be_root = false;

    /**
     * @var string
     */
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
     * Has_many relationship
     * @var array
     */
    private static $has_many = [
        'ForumSubmissions' => ForumSubmission::class,
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
        $fields->addFieldToTab('Root.Submissions', $this->getForumSubmissionsData());

        return $fields;
    }

    /**
     * @return RequiredFields
     */
    public function getCMSValidator()
    {
        return RequiredFields::create([
            'Teaser', 'Caption', 'OpenDate', 'CloseDate'
        ]);
    }

    /**
     * Gets text for tile based on close date
     * @return string
     */
    public function getOpenClosedStatus()
    {
        $result = null;
        if($this->dbObject('CloseDate') < Date('Y-m-d h:m:s')) {
            $result = "Submissions Closed";
        } else {
            $result = "Submissions Open";
        }

        return $result;
    }

    public function getSubmissionCount()
    {
        $submissions = ForumSubmission::get()
            ->filter(['ForumPageID' => $this->ID, 'Approved' => 1]);

        return count($submissions);
    }

    /**
     * @return GridField
     */
    public function getForumSubmissionsData()
    {
        $submissionGrid = GridField::create('ForumSubmissions', '',
            $this->getOwner()->ForumSubmissions(), GridFieldConfig_RecordEditor::create());
        $submissionGrid->getConfig()->removeComponentsByType(GridFieldAddNewButton::class);

        return $submissionGrid;
    }

    /**
     * Return the last submission that was submitted
     * @return \SilverStripe\ORM\DataObject
     */
    public function getLastSubmission(){
        $submissions = ForumSubmission::get()
            ->filter(['ForumPageID' => $this->ID, 'Approved' => 1])
            ->last();

        return $submissions;
    }
}
