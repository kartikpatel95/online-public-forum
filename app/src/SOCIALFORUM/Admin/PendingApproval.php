<?php

use SilverStripe\Admin\ModelAdmin;
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
  * returns a non approved data to be displayed in admin
  */
  public function getList(){
    $submissions = ForumSubmission::get()->filter(['Approved' => 0]);
    return $submissions;
  }
}
