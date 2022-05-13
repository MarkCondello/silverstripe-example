<?php
namespace SilverStripe\Lessons;

use PageController;

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Dev\Debug;

class VideoPageController extends PageController 
{

  private static $allowed_actions = [
    'CommentForm',
  ];

  public function CommentForm()
  {
    // params: what handles the form, Name of the form, Its fields, the form action
    $form = Form::create(
      $this,
      'CommentForm',
      FieldList::create(
        TextField::create('Name'),
        TextAreaField::create('Comment')
      ),
      FieldList::create(
        FormAction::create('HandleForm', 'Submit Comment')
      )
    );
    return $form;
  }

  public function HandleForm($data, $form)
  {
    $comment = VideoComment::create();
    $comment->VideoPageId = $this->ID;
    $form->saveInto($comment);
    $comment->write();
    return $this->redirectBack();
  }
  
  // I added this method, the tutorial did not explain how to retrieve the Video Comments
  // The VideoComment entity has VideoPageId columns which are set to 0 and there is no VideoPageId object anyway.
  public function VideoComments()
  {
    return VideoComment::get();
        // Debug::dump($comments);

  }

  protected function init()
  {
    // die($this->ID);
    parent::init();
    // Debug::dump($this->VideoObjects);
  }
}