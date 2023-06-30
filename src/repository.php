<?php
namespace Syadem\VaccinationProfile;

class Repository {
  private $data;

  public function __construct($data)
  {
    $this->data = array();
    foreach($data as &$value) {
      $this->data[$value->id] = $value;
    }
  }

  public function find($id){
    return $this->data[$id];
  }

  public function all(){
    return $this->data;
  }
}
