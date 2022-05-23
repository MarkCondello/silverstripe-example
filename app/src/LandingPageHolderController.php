<?php
namespace Markcond\Research;

use PageController;

use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\PaginatedList;

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FormAction;

class LandingPageHolderController extends PageController 
{
  //Only allow landing page pages in sub page settings
  private static $allowed_children = [LandingPage::class];
  protected function init()
  {
    parent::init();
  }

  public function index(HTTPRequest $request)
  {
    $landingPages = LandingPage::get();
    if($catID = $request->getVar('ServiceTypeID')) {
      $landingPages = LandingPage::get()->where(
        "\"ServiceTypeID\" = $catID"
      );
    }
    $paginatedLandingPages = PaginatedList::create(
      $landingPages,
      $request
    )
      ->setPageLength(1)
      ->setPaginationGetVar('s'); //WT??? pagination start variable
    $data = [
      'Results' => $paginatedLandingPages
    ];
    return $data;
  }

  public function LandingPageCategoryFilter()
  {
    $form = Form::create(
      $this,
      'LandingPageCategoryFilter',
      FieldList::create(
        DropdownField::create('ServiceTypeID', 'Select a service type', ServiceType::get() )->setEmptyString('(All service types)')
      ),
      FieldList::create(
        FormAction::create('index', "Filter Partners")
      )
    );
    $form->setFormMethod('GET')
      ->setFormAction($this->link())
      ->disableSecurityToken()
      ->loadDataFrom($this->request->getVars()); // this loads the previous selection 
    return $form;
  }
}