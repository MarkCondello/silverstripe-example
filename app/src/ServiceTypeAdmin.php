<?php 
namespace Markcond\Research;
use SilverStripe\Admin\ModelAdmin;
class ServiceTypeAdmin extends ModelAdmin
{
  private static $table_name = 'ServiceTypes'; // where is this table???
  private static $menu_title = 'Service Types';
  private static $url_segment = 'service-types';
  private static $managed_models = [
    ServiceType::class
  ];
}