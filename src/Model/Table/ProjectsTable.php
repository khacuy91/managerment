<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class  ProjectsTable extends Table {

    public function initialize(array $config)
    {
        $this->table('t_projects');
        
         $this->belongsTo('Teams', [
            'joinTable' => 't_user_team',
            'foreignKey' => 'team_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'leader_id'
        ]);
    }
}

?>    