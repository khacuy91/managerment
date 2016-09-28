<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class  TeamsTable extends Table {

    public function initialize(array $config)
    {
        $this->table('t_teams');
        $this->belongsToMany('Users', [
            'joinTable' => 't_user_team',
            'foreignKey' => 'user_id',
        ]);
         $this->hasMany('Projects', [
            'foreignKey' => 'team_id'
        ]);
    }
}

?>    