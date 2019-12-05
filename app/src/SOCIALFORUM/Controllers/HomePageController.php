<?php

namespace SOCIALFORUM;

class HomePageController extends \PageController
{
  /**
  * Gets list of campaigns
  */
  public function getCampaigns()
  {
    $campain = CampaignPage::get()->filter(['Active' => 1]);
    return $campain;
  }
}
