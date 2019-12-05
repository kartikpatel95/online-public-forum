<?php

namespace SOCIALFORUM;

use SilverStripe\Admin\ModelAdmin;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ApprovedSubmissionsAdmin extends ModelAdmin
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
  private static $url_segment = 'approved-submissions';

  /**
   * Menu title for Left and Main CMS
   * @var string
   */
  private static $menu_title = 'Forum Approved Submissions';

  /**
   * Menu icon for Left and Main CMS
   * @var string
   */
  private static $menu_icon_class = 'font-icon-comment';

/**
 * @param Int $id
 * @param FieldList $fields
 * @return Form
 */
public function getEditForm($id = null, $fields = null)
{
  $form = parent::getEditForm($id, $fields);
  return $form;
}

  /**
  * returns a approved data to be displayed in admin
  */
  public function getList(){
    $list = parent::getList();
    if($this->modelClass == 'SOCIALFORUM\ForumSubmission'){
      $list = ForumSubmission::get()->filter(['Approved' => 1]);
    }
    return $list;
  }
}
