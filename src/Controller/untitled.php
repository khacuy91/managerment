$users = TableRegistry::get('Users')
                                            ->find('all')
                                             ->contain(['Teams'=>['conditions'=>['Teams.status'=>2]],'Teams.Projects'=>['conditions'=>['Projects.status'=>2]],'Teams.Projects.Users'] )                                    
                                            ->where(['Users.id'=>$userLogin->id])
                                            ->toArray();            
            
            $idLeader     = TableRegistry::get('t_projects')
                                                            ->find('list',['keyField'=>'id','valueField'=>'leader_id'])
                                                            ->toArray();
            
            $otherLeader    = TableRegistry::get('T_Users')
                                                        ->find('all')
                                                        ->select(['id','full_name'])
                                                        ->where(['T_Users.id IN'=>$idLeader])
                                                        ->toArray();
             
            $checkisLeader  = TableRegistry::get('Projects')
                                                        ->find('all')
                                                        ->contain(['Users'])
                                                        ->where(['Projects.leader_id'=>$userLogin->id])
                                                        ->first();                                    
            $vacation = TableRegistry::get('T_day_off')->newEntity();   
            
            if ($this->request->is(['post','put'])) {
                if ($this->request->data['start_date'] < $this->request->data['end_date']) {
                    
                    $vacations                  = TableRegistry::get('T_day_off')->patchEntity($vacation, $this->request->data,['validate'=>false]) ;                   
                    $idOther                    = $vacations->ortherleader;                   
                    
                    $emailOther                 = TableRegistry::get('T_Users')
                                                                            ->find('all')
                                                                            ->select(['email','id'])
                                                                            ->where(['T_Users.id'=> $idOther])
                                                                            ->first();              

                    $vacations->created         = date('Y-m-d');
                    $vacations->status          = 0; 
                    $startdate                  = $vacations->start_date   = $this->request->data['start_date'];
                    $enddate                    = $vacations->end_date     = $this->request->data['end_date'];
                    $content                    = $vacations->content;
                    $vacations->full_name       = $userLogin->full_name;
                    $judgework                  = $vacations->judge_work ;
                    $vacations->user_id         = $userLogin->id;
                    $emailAdmin                 = "vuongvo1991@gmail.com";
                    $vacations->other_leader_id = $idOther;

                    //if (TableRegistry::get('T_day_off')->save($vacations)) {
                        foreach ($users as $user) : 
                            if ($user->email != NULL){                                 
                                foreach ($user['teams']  as $team) :   

                                foreach ($team['projects'] as $project) :
                                      echo "<pre>";
                                    print_r($project);die;
                                        $email = array($emailAdmin, $project->user->email);
                                       
                                         /*
                                            $this->sendMail('no-reply-test@nal.vn', $email, 'vacation', 
                                            __('annual leave'), ['enddate'=>$enddate,'startdate'=>$startdate,
                                                                                'full_name'=>$vacations->full_name,
                                                                                'content'=> $content,
                                                                                'judgework'=>$judgework]); */
                                                                                               
                                endforeach;           
                            endforeach;    
                            } 
                            else {
                                die('co gia tri');
                            }           
                           
                        endforeach;     
                        
                         
                        $this->set('error_message', __('Create form Annual leave success'));
                   // }
                   // else {
                     //   $this->set('error_message', __('Save Data Fail'));
                    //}
                }
                else {
                    $this->set('error_message', __('Start date and end date incorrect'));
                }

    	    }
           
              
            $this->set('checkisLeader'  , $checkisLeader);  
            $this->set('vacation'       , $vacation);
             $this->set('otherLeader'   , $otherLeader);
            $this->viewBuilder()->layout('');