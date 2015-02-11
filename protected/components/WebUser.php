<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class WebUser {
    
    private $_model;
    
    public function isAdvi() {
        $user = $this->loadUser(Yii::app()->user->id);
        
        if($user === null) {
            return 0;
        }
        else {
            return intval($user->user_types_id) == 1;//หัวหน้ากองพัสดุ
        }
    }
    
    public function isSupport() {
        $user = $this->loadUser(Yii::app()->user->id);
        
        if($user === null) {
            return 0;
        }
        else {
            return intval($user->user_types_id) == 5;//เจ้าหน้าที่กอง
        }
    }
    
    protected function loadUser($id = null) {
        if($this->_model === null) {
            if($id !== null) {
                $this->_model = TbUser::model()->findByPk($id);
            }
        }
        return $this->_model;
    }
}

