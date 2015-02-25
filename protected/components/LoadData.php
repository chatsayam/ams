<?php

class LoadData {
    public function loadInstitutionName($uid = NULL){
        if($uid === NULL){
            $uid = Yii::app()->user->id;
        }
        
        $webUser = new WebUser();
        
        $user = $webUser->loadUser($uid);
        
        $ins = TbInstitution::model()->findByPk($user->tb_institution_institution_id);
        
        return $ins->institution;
        
    }
    
    public function loadInstitutionID($uid = NULL){
        if($uid === NULL){
            $uid = Yii::app()->user->id;
        }
        
        $webUser = new WebUser();
        
        $user = $webUser->loadUser($uid);
        
        return $user->tb_institution_institution_id;
    }
    
    public function loadUserType($uid = NULL){
        if($uid === NULL){
            $uid = Yii::app()->user->id;
        }
        
        $webUser = new WebUser();
        
        $user = $webUser->loadUser($uid);
        
        return $user->user_types_id;
    }
    
    public function loadDivisionName($uid = NULL){
        if($uid === NULL){
            $uid = Yii::app()->user->id;
        }
        
        $webUser = new WebUser();
        
        $user = $webUser->loadUser($uid);
        
        $ins = TbInstitution::model()->findByPk($user->tb_institution_institution_id);
        
        $div = TbDivision::model()->findByPk($ins->tb_division_division_id);
        
        return $div->division;
        
    }
    
    public function loadTypeUser(){
        $uid = Yii::app()->user->id;
        
        $webUser = new WebUser();
        
        $user = $webUser->loadUser($uid);
        
        return $user->user_types_id;
    }


    public function loadUser(){
        
    }
}