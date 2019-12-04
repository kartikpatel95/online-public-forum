<?php

namespace SOCIALFORUM;

class CampaignPageController extends \PageController {

  /**
  * gets the form based on the page you are on
  */
  public function getForums()
  {
    $forums = ForumPage::get()->filter([
      'ParentID' => $this->ID,
      'OpenDate:LessThanOrEqual' => Date('Y-m-d h:m:s')
    ]);
    return $forums;
  }
}
