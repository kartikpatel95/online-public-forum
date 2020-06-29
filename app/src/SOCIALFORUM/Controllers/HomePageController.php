<?php

namespace SOCIALFORUM;

class HomePageController extends \PageController
{
    /**
     * Gets list of campaigns
     */
    public function getCampaigns()
    {
        return CampaignPage::get()->filter(['Active' => 1]);
    }
}
