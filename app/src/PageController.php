<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Lessons\VideoComment;
    use SilverStripe\View\Requirements;

    use SilverStripe\Security\SecurityToken;
    use SilverStripe\Control\HTTPRequest;
    use SilverStripe\Dev\Debug;

    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = ['createVideoComment'];

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
            Requirements::css('css/bootstrap.min.css');
            Requirements::css('css/style.css');
            Requirements::javascript('javascript/common/modernizr.js');
            Requirements::javascript('javascript/common/jquery-1.11.1.min.js');
            Requirements::javascript('javascript/common/bootstrap.min.js');
            Requirements::javascript('javascript/common/bootstrap-datepicker.js');
            Requirements::javascript('javascript/common/chosen.min.js');
            Requirements::javascript('javascript/common/bootstrap-checkbox.js');
            Requirements::javascript('javascript/common/nice-scroll.js');
            Requirements::javascript('javascript/common/jquery-browser.js');
            Requirements::javascript('javascript/scripts.js');
        }

        public function SecurityToken()
        {
            SecurityToken::inst();
            return SecurityToken::inst()->getSecurityID();
        }

        public function createVideoComment(HTTPRequest $request)
        {
            Debug::dump($request);
            die();
            // $inputValues = json_decode($request->getBody()); // need to check request body as the data was not sending to post object when using fetch or axios
            $inputValues = json_decode($request); // need to check request body as the data was not sending to post object when using fetch or axios
            //   Debug::dump($inputValues);
            // die();
            $response = new \stdClass(); // what is this?
            $response->message = 'Unsuccessful...';
            $response->success = false;
            // SecurotyToken checks are not working
            if (SecurityToken::inst()->checkRequest($request) && $request->postVar('name') && $request->postVar('comment')) {
            // if ($inputValues->name && $inputValues->comment) {
                $videoComment = new VideoComment();
                $videoComment->Name =  $request->postVar('name');
                $videoComment->Comment = $request->postVar('comment');
                // $videoComment->Name = $inputValues->name;
                // $videoComment->Comment = $inputValues->comment;
                try {
                    if ($videoComment->write() !== false) {
                        $response->message = 'Successfully created Video comment.';
                        $response->success = true;
                        $response->data = $inputValues;
                        return json_encode($response);
                    } else {
                        $response->message = 'Database error while creating Video comment.';
                        return json_encode($response);
                    }
                } catch(Exception $e) {
                    $response->message = 'Error saving Video comment: ' . $e;
                    return json_encode($response);
                }
            }
            return json_encode($response);

        }
    }
}
