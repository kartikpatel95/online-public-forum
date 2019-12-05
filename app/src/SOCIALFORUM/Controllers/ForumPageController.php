<?php

namespace SOCIALFORUM;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class Controller extends \PageController
{

  /**
  * Gets the the approved submissions
  */
  public function getForumSubmissions() {
    $submissions = ForumSubmission::get()
      ->filter(['ForumPageID' => $this->ID])
      ->sort('CreatedDate', 'ASC');
    return $submissions;
  }
}
