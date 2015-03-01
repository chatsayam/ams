<?php

class AMS {
    
    public function createAssetID($nt = NULL, $year = NULL){
        return $year.'2'.'11-'. $this->loadAsset($nt). $this->runIDAsset($nt,$year);
    }
    
    public function createAssetIDLow($nt = NULL, $year = NULL){
        return $year.'1'.'14-'. $this->loadAsset($nt). $this->runIDAssetLow($nt,$year);
        
    }
    
    public function loadAsset($nt = NULL){
        $id = NULL;
        $model = TbTypeAsset::model()->findByPk($nt);
        
        if($model->type_asset_id < 10){
            $id = $model->type_asset_code.'-0'.$model->type_asset_id;
        }else {
            $id = $model->type_asset_code.'-'.$model->type_asset_id;
        }
        
        return $id;
    }
    
    public function runIDAssetLow($type = NULL, $year = NULL){
        $run = NULL;
        
        $db = Yii::app()->db;
        
        $sql = "SELECT * FROM tb_raw_asset_low WHERE raw_year = '" . $year . "' "
                . "AND raw_type = '" . $type . "' "
                . "ORDER BY id DESC";
        
        $data = $db->createCommand($sql)->queryAll();
        
        if(!empty($data)){
            $run = $data[0]['raw_run']+1;
            $run_raw = $data[0]['raw_run']+1;
            while (strlen($run) < 4){
                $run = '0'.$run;
            }
        }else {
            $run = '0001';
            $run_raw = '1';
        }
        
        $model = new TbRawAssetLow();
        
        $model->raw_run = $run_raw;
        $model->raw_type = $type;
        $model->raw_year = $year;
        
        if($model->save()){
            return $run;
        }else {
            return '';
        }
    }
    
    public function runIDAsset($type = NULL, $year = NULL){
        $run = NULL;
        
        $db = Yii::app()->db;
        
        $sql = "SELECT * FROM tb_raw_asset WHERE raw_year = '" . $year . "' "
                . "AND raw_type = '" . $type . "' "
                . "ORDER BY id DESC";
        
        $data = $db->createCommand($sql)->queryAll();
        
        if(!empty($data)){
            $run = $data[0]['raw_run']+1;
            $run_raw = $data[0]['raw_run']+1;
            while (strlen($run) < 4){
                $run = '0'.$run;
            }
        }else {
            $run = '0001';
            $run_raw = '1';
        }
        
        $model = new TbRawAsset();
        
        $model->raw_run = $run_raw;
        $model->raw_type = $type;
        $model->raw_year = $year;
        
        if($model->save()){
            return $run;
        }else {
            return '';
        }
    }
}