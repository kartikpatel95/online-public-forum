<?php
/**
 * Created by PhpStorm.
 * User: kartik
 * Date: 2019-12-05
 * Time: 23:04
 */

namespace SOCIALFORUM;

use Psr\Log\LoggerInterface;
use SilverStripe\Control\Email\Email;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\BuildTask;
use SilverStripe\ORM\ArrayList;
use SilverStripe\Security\Member;
use SilverStripe\View\ArrayData;

/**
 * Class NonApprovedSubmissions
 * @package SOCIALFORUM
 */
class NonApprovedSubmissions extends BuildTask {

    private static $segment = 'NonApprovedSubmissions';
    protected $title = "Non Approved Submission Reminder";
    protected $description = "Sends you a reminder if there are submissions made and they are not approved";

    public function run($request)
    {
        $submissions = ForumSubmission::get()->filter(['Approved' => 0]);
        $members = Member::get()->filter(['Groups.Title' => 'Administrators']);
        if($members){
            if($submissions && count($submissions) > 0) {
                $approve = ArrayList::create();
                $count = 0;
                foreach ($submissions as $sub) {
                    $approve->push(new ArrayData([
                        'Number' => $count,
                        'SubName' => $sub->Name,
                        'FormName' => $sub->ForumPage()->Title
                    ]));
                    $count++;
                }

                $emailTo = [];
                if (count($members) > 0) {
                    foreach ($members as $member) {
                        if ($member) {
                            array_push($emailTo, $member->Email);
                        }
                    }
                }
                if(count($approve) > 0){
                    $email = Email::create();
                    $email
                        ->setTo($emailTo)
                        ->setFrom('no-reply@publicforum.co.nz')
                        ->setSubject('Non-Approved Forum Submissions')
                        ->setData([
                            'message' => 'The following submissions need to be approved to display on the website',
                            'data' => $approve
                        ])
                        ->setHTMLTemplate('SOCIALFORUM\\Emails\\NonApprovedSubmissions')
                        ->send();
                }
            }
        }else {
            Injector::inst()->get(LoggerInterface::class)->error('There are no administrators set');
        }
    }
}