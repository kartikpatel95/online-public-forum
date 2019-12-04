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
  * returns a approved data to be displayed in admin
  */
  public function getList(){
    $submissions = ForumSubmission::get()->filter(['Approved' => 1]);
    return $submissions;
  }
}
