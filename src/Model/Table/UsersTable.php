<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class  UsersTable extends Table {

    public function initialize(array $config)
    {
        $this->table('t_users');
        $this->belongsToMany('Teams', [
            'joinTable' => 't_user_team',
            'foreignKey' => 'user_id',
        ]);

        $this->hasMany('Projects', [
            'foreignKey' => 'leader_id'
        ]);
        $this->hasMany('Dayoff', [
            'foreignKey' => 'user_id'
        ]);
    }
}

?>    