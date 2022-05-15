<?php 
namespace Markcond\Research;
use PageController;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
 use SilverStripe\Forms\FormAction;
use SilverStripe\Dev\Debug;

class LandingPageController extends PageController
{
  public function init()
  {
    parent::init();
  }

  public function serviceTypeName()
  {
    return $this->ServiceType->Name;
  }

  private static $allowed_actions = [
    'CustomerRatingForm',
  ];

  // Create the front end form
  public function CustomerRatingForm()
  {
    // params: what handles the form, Name of the form, Its fields, the form action
    $form = Form::create(
      $this,
      'CustomerRatingForm',
      FieldList::create(
        TextField::create('CustomerName'),
        TextField::create('Rating')
          ->setAttribute('type', 'number')
          ->setAttribute('min', '1')
          ->setAttribute('max', '5')
      ),
      FieldList::create(
        FormAction::create('HandleSubmit', 'Add Rating')
      )
    );
    return $form;
  }

  //handle the form submit request
  public function HandleSubmit($data, $form)
  {
    $customerRating = CustomerRating::create();
    $customerRating->LandingPageID = $this->ID;
    $form->saveInto($customerRating);
    $customerRating->write();
    return $this->redirectBack();
  }

  //Display the saved values
  public function GetCustomerRatings()
  {
    // $ratings = $this->CustomerRatings; SS Issue: There is no relation from LandingPage to CustomerRating
    return CustomerRating::get()
      ->where("\"LandingPageID\" = $this->ID")->sort('Created', 'DESC');
     //Debug::dump($ratings);
  }
}