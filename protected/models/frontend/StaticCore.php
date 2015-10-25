<?php
class StaticCore
{
    public static function getSOnline($server)
    {
        if(Yii::app()->getFServer($server,'serverIP') != '')
        {
            if($connect = @fsockopen(Yii::app()->getFServer($server,'serverIP'),Yii::app()->getFServer($server,'serverPort'), $errorNo, $errorStr, (float)0.3))
            {
                fclose($connect);
                $serverStatus = 'on';
            }
            else
            {
                $serverStatus = 'off';
            }
        }
        else
        {
            $serverStatus = 'off';
        }

        return $serverStatus;
    }

    public static function strCut($txt,$number)
    {
        if(isset($txt{$number}))
        {
           return mb_substr($txt, 0, $number,'utf-8')."...";
        }
        else
        {
            return mb_substr($txt, 0, $number,'utf-8');
        }
    }

    public static function getSElement($val)
    {
        $array = array(
            ''  =>'none',
            '-1'=>'none',
            '0' =>'ice',
            '1' =>'poison',
            '2' =>'lightning',
            '3' =>'fire',
            '4' =>'earth',
            '5' =>'wind',
            '6' =>'water'
        );

        return $array[$val];
    }

    public static function getPStatus($val)
    {
        switch($val)
        {
            case 0: $result = 'Hero';       break;
            case 1: $result = 'Hero';       break;
            case 2: $result = 'Hero';       break;
            case 3: $result = 'Commoner';   break;
            case 4: $result = 'PK';         break;
            case 5: $result = 'PK';         break;
            case 6: $result = 'Murder';     break;
            case 7: $result = 'Phonoman';   break;
        }

        return $result;
    }

    public static function normalHeight($val)
    {
        if($val == '64' || $val == '65' || $val == '66')
        {
            echo 'style="height:352px;"';
        }
    }

    public static function getRClass($val)
    {
        if($val%2 == 0)
        {
            echo 'row1';
        }
        else
        {
            echo 'row2';
        }
    }
}
