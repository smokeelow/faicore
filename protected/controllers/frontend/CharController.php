<?php
class CharController extends FrontEndController
{
    public function filters()
    {
        return array(
            'ajaxOnly',
        );
    }

    function actionIndex()
    {}

    public function actionInventory($id)
    {
        if($this->getFConfig('db_driver') == 'sqlsrv')
        {
            $query = "DECLARE @items varbinary(max);SET @items = (SELECT Inventory FROM Character WHERE Name='$id');Select @items";
            $getI = Yii::app()->db->createCommand($query)->queryScalar();
            $getItem = $getI;
        }
        else
        {
            $getI = Character::model()->find(array(
                'select'=>'Inventory',
                'condition'=>'Name=:Name',
                'params'=>array(':Name'=>$id)
            ));
           $getItem = strtoupper(bin2hex($getI->Inventory));
        }

        $i = -1;
        while ($i<11)
        {
            $i++;
            $itemCode[$i] = substr($getItem,($this->getFConfig('versionBit')*$i), $this->getFConfig('versionBit'));
            if($itemCode[$i] != $this->getVersionBit())
            {
                $itemInfo[$i] = Item::getItem(substr($getItem,($this->getFConfig('versionBit')*$i), $this->getFConfig('versionBit')));
                if($itemInfo[$i] == NULL)
                {
                    $itemInfo[$i]['thumb'] = "images/items/no.png";
                    $itemDesc[$i]	= '';
                }
                else
                {
                    $itemDesc[$i]	= $itemInfo[$i]['info'];
                }
            }
        }

        $model = Character::model()->find(array(
            'select'=>'AccountID,Strength,Dexterity,Vitality,Energy,Leadership,Life,Mana,PkLevel,PkCount,Name,cLevel,Money,MapNumber,MapPosX,MapPosY,Class,'.$this->getFConfig('reset_col').','.$this->getFConfig('greset_col').'',
            'condition'=>'Name=:Name',
            'params'=>array(':Name'=>$id)
        ));

        $getChars = Character::model()->findAll(array(
            'select'=>'AccountID,Name,cLevel,Class,'.$this->getFConfig('reset_col').','.$this->getFConfig('greset_col').'',
            'condition'=>'AccountID=:AccountID',
            'params'=>array(':AccountID'=>$model->AccountID)
        ));

        $this->renderPartial('cpage',array(
            'item'=>$itemInfo,
            'itemDesc'=>$itemDesc,
            'model'=>$model,
            'chars'=>$getChars
        ));
    }

    public function getMagicList($name)
    {
        if($this->getFConfig('db_driver') == 'sqlsrv')
        {
            $query = "DECLARE @list varbinary(max);SET @list = (SELECT MagicList FROM Character WHERE Name='$name');Select @list";
            $getL = Yii::app()->db->createCommand($query)->queryScalar();
            $getList = $getL;
        }
        else
        {
            $getL = Character::model()->find(array(
                'select'=>'MagicList',
                'condition'=>'Name=:Name',
                'params'=>array(':Name'=>$name)
            ));
            $getList = strtoupper(bin2hex($getL->MagicList));
        }

        $i= -1;
        while($i < 60)
        {
            $i++;
            $skill = substr($getList,$i*6, 6);

            if (substr($skill,0,2) == 'FF' || (substr($skill,0,2) >= '43' && substr($skill,0,2) <= '48'))
            {

            }
            else
            {
                if (strlen($skill) != '6' || (!preg_match("/[A-Za-z0-9]/",$skill)) || ($skill == 'FF0000'))
                {

                }
                else
                {
                    $id[] = hexdec(substr($skill,0,2));
                }
            }
        }

        return $id;
    }

    public function actionJson()
    {
        $getSkills = file('protected/core_conf/skills/skills.txt');
        foreach($getSkills as $skillInfo)
        {
            $line = explode("\t",$skillInfo);

            $jsonLine[] = array(
                $line['0']=>array($line['1'],$line['5'], $line['6'],$line['7'],$line['8'],$line['9'],$line['10'],$line['11'],$line['12'],$line['13'],$line['14']),
            );
        }
        file_put_contents('protected/core_conf/skills/skills.json',str_replace(array(']}',',{',']]'),array(']',',',']}]'),json_encode($jsonLine)));
    }
}