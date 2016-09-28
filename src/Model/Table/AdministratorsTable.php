<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class  AdministratorsTable extends Table {

    public function initialize(array $config)
    {
        $this->table('t_administrators');
    }

   public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('password','Not empty');
    return $validator
    }
}
 