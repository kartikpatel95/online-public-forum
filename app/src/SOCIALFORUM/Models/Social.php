<?php

namespace SOCIALFORUM;

use gorriecoe\LinkField\LinkField;
use SilverStripe\Forms\TextField;
use gorriecoe\Link\Models\Link;
use SilverStripe\ORM\DataObject;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\RequiredFields;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class Social extends DataObject
{
    /**
     * Defines the database table name
     * @var string
     */
    private static $table_name = 'Social';
    /**
     * Database fields
     * @var array
     * @property string $Icon
     * @property int $SortID
     */
    private static $db = [
        'Icon' => 'Varchar',
        'SortID' => 'Int'
    ];

    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = [
        'SiteConfig' => SiteConfig::class,
        'SocialLink' => Link::class
    ];

    /**
     * Defines summary fields commonly used in table columns
     * as a quick overview of the data for this dataobject
     * @var array
     */
    private static $summary_fields = [
        'SocialLink.Title' => 'Title',
        'SocialLink.LinkURL' => 'Link'
    ];

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = FieldList::create([
            TextField::create('Icon')
                ->setDescription('Choose your font from font awesome <a href="https://fontawesome.com/" target="_blank">Font Awesome</a>'),
            LinkField::create('SocialLink', '', $this)
        ]);

        return $fields;
    }

    /**
     * @return RequiredFields
     */
    public function getCMSValidator()
    {
        return RequiredFields::create([
            'Icon'
        ]);
    }
}
