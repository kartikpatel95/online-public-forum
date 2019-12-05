<?php

namespace SOCIALFORUM;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ForumPageController extends \PageController
{

  /**
  * Gets the the approved submissions
  */
  public function getSubmissions() {
    $submissions = ForumSubmission::get()
    ->filter(['ForumPageID' => $this->ID, 'Approved' => 1]);
    return $submissions;
  }
}
