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
}