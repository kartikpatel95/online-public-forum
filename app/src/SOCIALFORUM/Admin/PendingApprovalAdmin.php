<?php

namespace SOCIALFORUM;

use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class PendingApprovalAdmin extends ModelAdmin
{
    /**
     * Managed data objects for CMS
     * @var array
     */
    private static $managed_models = [
        ForumSubmission::class
    ];

    /**
     * URL Path for CMS
     * @var string
     */
    private static $url_segment = 'pending-approval';

    /**
     * Menu title for Left and Main CMS
     * @var string
     */
    private static $menu_title = 'Forum Pending Approval';

    /**
     * Menu icon for Left and Main CMS
     * @var string
     */

    private static $menu_icon_class = 'font-icon-p-download';

    /**
     * @param null $id
     * @param null $fields
     * @return \SilverStripe\Forms\Form
     */
    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);
        if ($this->modelClass === ForumSubmission::class) {
            $fieldName = $this->sanitiseClassName($this->modelClass);
            if ($grid = $form->Fields()->dataFieldByName($fieldName)) {
                $grid->getConfig()->removeComponentsByType([
                    GridFieldAddNewButton::class
                ]);
            }
        }

        return $form;
    }

    /**
     * returns a non approved data to be displayed in admin
     */
    public function getList(){
        $list = parent::getList();
        if ($this->modelClass == 'SOCIALFORUM\ForumSubmission') {
            $list = ForumSubmission::get()->filter(['Approved' => 0]);
        }

        return $list;
    }
}
