<?php
namespace app\model;

use app\core\Model;

class Schedule extends Model{

    public function getSchedule(){

      return $this->db->getRow('Select * from schedule');
    }

}