<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class  DayoffTable extends Table {

    public function initialize(array $config)
    {
        $this->table('t_day_off');     
         
         $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
    }
}

?>    