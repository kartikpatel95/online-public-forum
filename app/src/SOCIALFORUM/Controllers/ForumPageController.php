<?php

namespace SOCIALFORUM;

use SilverStripe\Control\HTTPRequest;
use SilverStripe\Security\Security;
use SilverStripe\View\Requirements;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ForumPageController extends \PageController
{

    /**
     * @var array
     */
    private static $allowed_actions = [
        'SaveSubmission', 'CurrentPageInfo'
    ];

    /**
     * @var array
     */
    private static $url_handlers = [
        'save/$forumID!' => 'SaveSubmission',
        'get/$forumID!' => 'CurrentPageInfo'
    ];

    protected function init()
    {
        parent::init();
        Requirements::themedJavascript('assets/javascript/forum/index');
    }

    /**
     * Gets the the approved submissions
     */
    public function getSubmissions() {
        $submissions = ForumSubmission::get()
            ->filter(['ForumPageID' => $this->ID, 'Approved' => 1])
            ->sort('Created', 'ASC');
        return $submissions;
    }

    /**
     * Writes the submission to the database
     * @param HTTPRequest $request
     * @return \SilverStripe\Control\HTTPResponse
     */
    public function SaveSubmission(HTTPRequest $request){
        $response = (object)['success' => false, 'message' => null, 'data' => null];
        $forumPage = $request->param('forumID');
        if($forumPage){
            $body = json_decode($request->getBody());
            $model = ForumSubmission::create();
            try{
                if(Security::getCurrentUser()){
                    $model->Approved = 1;
                }else{
                    $model->Approved = 0;
                }
                $model->ForumPage = $forumPage;
                $model->update((array)$body);
                $model->write();
                $response->success = true;
                $response->message = "Successfully submitted your submission. Once it has been approved it will be displayed above";
            }catch (\Exception $exc){
                $response->message = $exc->getMessage();
            }
        }else{
            $response->message = "Forum page with id: " . $forumPage . ' does not exist';
        }
        return $this->getResponse()
            ->addHeader('Content-type', 'application/json')
            ->setBody(json_encode($response));
    }

    /**
     * @param HTTPRequest $request
     * @return \SilverStripe\Control\HTTPResponse
     */
    public function CurrentPageInfo(HTTPRequest $request){
        $response = (object)['success' => false, 'message' => null, 'data' => null];
        $pageID = $request->param('forumID');
        if($pageID){
            $model = ForumPage::get()->byID($pageID);
            $response->success = true;
            $response->message = 'Successfully retrieved page ' . $model->Title;
            $response->data = $model->toMap();
        }else{
            $response->message = 'There was a error with id: ' . $pageID;
        }
        return $this->getResponse()
            ->addHeader('Content-type', 'application/json')
            ->setBody(json_encode($response));
    }
}
