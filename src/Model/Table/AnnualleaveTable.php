<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class  AnnualleaveTable extends Table {

    public function initialize(array $config)
    {
        $this->table('t_annualleave');
        $this->belongsTo('Users', ['foreignKey' => 'user_id']);
    }


?>    