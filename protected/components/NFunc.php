<?php

class NFunc {

    function getMonth() {
        $thai_month = array(
            "0" => "",
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );
        return $thai_month;
    }

    function getThisMonth($index) {
        $thai_month = array(
            "0" => "",
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );
        return $thai_month[$index];
    }

    function convertDateToSQL($date) {
        $tmpDate = explode("/", $date);
        //$tmpDate[2] += 543;
        return $tmpDate[2] . '-' . $tmpDate[1] . '-' . $tmpDate[0];
    }

    function convertSQLToDate($date) {
        $tmpDate = explode("-", $date);

        return substr($tmpDate[2], 0, 2) . '/' . $tmpDate[1] . '/' . $tmpDate[0];
    }

    function convertSQLToDateBH($date) {
        $tmpDate = explode("-", $date);

        return substr($tmpDate[2], 0, 2) . '/' . $tmpDate[1] . '/' . ($tmpDate[0]+543);
    }

    function yearToBH($year) {
        return $year + 543;
    }

    function optionSelectYear() {
        $dateYear = date('Y') + 543;
        for ($i = 0; $i <= 10; $i++) {
            echo '<option value="' . $dateYear . '">' . $dateYear . '</option>';
            $dateYear--;
        }
    }

    function getDateThai($date) {
        $thai_month = array(
            "0" => "",
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );

        $tmpDate = explode("/", $date);

        if ($tmpDate[1] < 10)
            $tmpDate[1] = substr($tmpDate[1], 1, 1);

        return " $tmpDate[0] " . $thai_month[$tmpDate[1]] . " $tmpDate[2]";
    }

    function getDateThaiBH($date) {
        $thai_month = array(
            "0" => "",
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );

        $tmpDate = explode("/", $date);

        if ($tmpDate[1] < 10) {
            $tmpDate[1] = substr($tmpDate[1], 1, 1);
        }

        $tmpDate[2] = $tmpDate[2] + 543;

        return " $tmpDate[0] " . $thai_month[$tmpDate[1]] . " $tmpDate[2]";
    }

    function getNowDateThai() {
        $d = date('d');
        $m = date('m');
        $y = date('y') + 543;

        return "$d/$m/$y";
    }

    function getNowAddYearDateThai($year) {
        $d = date('d');
        $m = date('m');
        $y = date('y') + 543 + $year;

        return $d . '/' . $m . '/' . $y;
    }

    function countDay($start, $stop) {
        $temp = explode('-', $start);
        $DateStart = $temp[2]; //วันเริ่มต้น
        $MonthStart = $temp[1]; //เดือนเริ่มต้น
        $YearStart = $temp[0]-543; //ปีเริ่มต้น
        
        $temp2 = explode('-', $stop);

        $DateEnd = $temp2[2]; //วันสิ้นสุด
        $MonthEnd = $temp2[1]; //เดือนสิ้นสุด
        $YearEnd = $temp2[0]; //ปีสิ้นสุด

        $End = mktime(0, 0, 0, $MonthEnd, $DateEnd, $YearEnd);
        $Start = mktime(0, 0, 0, $MonthStart, $DateStart, $YearStart);

        return ceil(($End - $Start) / 86400); // 28
    }

    public function convertModelToArray($models) {
        if (is_array($models))
            $arrayMode = TRUE;
        else {
            $models = array($models);
            $arrayMode = FALSE;
        }

        $result = array();
        foreach ($models as $model) {
            $attributes = $model->getAttributes();
            $relations = array();
            foreach ($model->relations() as $key => $related) {
                if ($model->hasRelated($key)) {
                    $relations[$key] = convertModelToArray($model->$key);
                }
            }
            $all = array_merge($attributes, $relations);

            if ($arrayMode)
                array_push($result, $all);
            else
                $result = $all;
        }
        return $result;
    }

    function setCookieData($name, $time, $data) {
        $setData = new CHttpCookie($name, $data);
        $setData->expire = time() + $time; //60 * 60 * 24 * 30;
        Yii::app()->request->cookies->add($name, $setData);
    }

    function getCookieData($name) {
        return Yii::app()->request->cookies[$name]->value;
    }

    function removeCookieData($name) {
        unset(Yii::app()->request->cookies[$name]);
    }

    function clearCookieData() {
        Yii::app()->request->cookies->clear();
    }

}
