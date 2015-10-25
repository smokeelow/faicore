<?php
class Character extends CActiveRecord
{
    public $Guild;
    public $Logo;
    public $Str;
    public $Dex;
    public $Vit;
    public $Ene;
    public $Com;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'Character';
	}

	public function rules()
	{
		return array(
			array('cLevel, LevelUpPoint, Str, Dex, Vit, Ene, Com, Class, Experience, Strength, Dexterity, Vitality, Energy, Money, MapNumber, MapPosX, MapPosY, MapDir, PkCount, PkLevel, PkTime, CtlCode, Leadership, ChatLimitTime, FruitPoint,'.$this->getFConfig('reset_col').', '.$this->getFConfig('greset_col').'', 'numerical', 'integerOnly'=>true),
			array('Life, MaxLife, Mana, MaxMana', 'numerical'),
			array('AccountID, Name', 'length', 'max'=>10),
			array('MagicList', 'length', 'max'=>240),
			array('Quest', 'length', 'max'=>100),
			array('Inventory', 'length', 'max'=>7584),
			array('MDate, LDate', 'safe'),
		);
	}

	public function relations()
	{
		return array(
            'getGuild'    => array(self::BELONGS_TO,   'GuildMember',  'Name'),
            'getAcc'    => array(self::BELONGS_TO,   'AccountCharacter',  'Id')
		);
	}

	public function attributeLabels()
	{
		return array(
			'AccountID' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account'),
			'Name' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Name'),
			'cLevel' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Level'),
			'LevelUpPoint' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Free points'),
			'Class' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Class'),
			'Experience' => 'Experience',
			'Strength' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Strength'),
			'Dexterity' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Agility'),
			'Vitality' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Vitality'),
			'Energy' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Energy'),
            'Leadership' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Command'),
            'Str' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Strength'),
            'Dex' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Agility'),
            'Vit' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Vitality'),
            'Ene' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Energy'),
            'Com' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Command'),
			'MagicList' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Magic List'),
			'Money' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Money'),
			'Life' => 'Life',
			'MaxLife' => 'Max Life',
			'Mana' => 'Mana',
			'MaxMana' => 'Max Mana',
			'MapNumber' => 'Map Number',
			'MapPosX' => 'Map Pos X',
			'MapPosY' => 'Map Pos Y',
			'MapDir' => 'Map Dir',
			'PkCount' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'PK Count'),
			'PkLevel' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'PK Level'),
			'PkTime' => 'Pk Time',
			'MDate' => 'Mdate',
			'LDate' => 'Ldate',
			'CtlCode' => 'Ctl Code',
			'Quest' => 'Quest',
			'ChatLimitTime' => 'Chat Limit Time',
			'FruitPoint' => 'Fruit Point',
			'JHDX' => 'Jhdx',
			'VipStart' => 'Vip Start',
			'VipDays' => 'Vip Days',
			$this->getFConfig('reset_col') => ''.$this->getFConfig('reset_col').'',
			'MasterLevel' => 'Master Level',
			'MasterExp' => 'Master Exp',
			'MasterPoints' => 'Master Points',
			'Inventory' => 'Inventory',
			'Married' => 'Married',
			'MarryName' => 'Marry Name',
			'MuBotData' => 'Mu Bot Data',
			'mLevel' => 'M Level',
			'mlPoint' => 'Ml Point',
			'mlExperience' => 'Ml Experience',
			'mlNextExp' => 'Ml Next Exp',
			'InventoryExpansion' => 'Inventory Expansion',
			'WinDuels' => 'Win Duels',
			'LoseDuels' => 'Lose Duels',
			'MasterMagicList' => 'Master Magic List',
			'QuestData' => 'Quest Data',
			'Tutorial' => 'Tutorial',
			'DailyQuestTime' => 'Daily Quest Time',
			'mu_id' => 'Mu',
			'PenaltyMask' => 'Penalty Mask',
		);
	}

    public static function getTOP1()
    {
        return self::model()->find(array(
            'select'=>'Name',
            'condition'=>'CtlCode=:CtlCode',
            'order'=>''.Yii::app()->getFConfig('greset_col').' DESC, '.Yii::app()->getFConfig('reset_col').' DESC, cLevel DESC',
            'limit'=>'1',
            'params'=>array(':CtlCode'=>'0')
        ));
    }

    public function getCClass($class,$r)
    {
        $entity	= array(
            '0'		=>  array('<span class="sm">Dark Wizard</span>',        'Dark Wizard',      'DW', 'dw',     ''.Yii::app()->getTemplate('core').'images/class/dw.gif',      '',     '18', '18', '15', '30', '0',  '0', '<span class="sm">DW</span>'),
            '1'		=>	array('<span class="sm">Soul Master</span>',        'Soul Master',      'SM', 'dw',     ''.Yii::app()->getTemplate('core').'images/class/dw.gif',      '',     '18', '18', '15', '30', '0',  '0', '<span class="sm">SM</span>'),
            '2'		=>	array('<span class="sm">Grand Master</span>',       'Grand Master',     'GM', 'dw',     ''.Yii::app()->getTemplate('core').'images/class/dw.gif',      '',     '18', '18', '15', '30', '0',  '0', '<span class="sm">GM</span>'),
            '3'		=>	array('<span class="sm">Grand Master</span>',       'Grand Master',     'GM', 'dw',     ''.Yii::app()->getTemplate('core').'images/class/dw.gif',      '',     '18', '18', '15', '30', '0',  '0', '<span class="sm">GM</span>'),
            '16'	=>	array('<span class="dk">Dark Knight</span>',        'Dark Knight',      'DK', 'dk',     ''.Yii::app()->getTemplate('core').'images/class/dk.gif',      '',     '28', '20', '25', '10', '0',  '16','<span class="dk">DK</span>'),
            '17'	=>	array('<span class="dk">Blade Knight</span>',       'Blade Knight',     'BK', 'dk',     ''.Yii::app()->getTemplate('core').'images/class/dk.gif',      '',     '28', '20', '25', '10', '0',  '16','<span class="dk">BK</span>'),
            '18'	=>	array('<span class="dk">Blade Master</span>',       'Blade Master',     'BM', 'dk',     ''.Yii::app()->getTemplate('core').'images/class/dk.gif',      '',     '28', '20', '25', '10', '0',  '16','<span class="dk">BM</span>'),
            '19'	=>	array('<span class="dk">Blade Master</span>',       'Blade Master',     'BM', 'dk',     ''.Yii::app()->getTemplate('core').'images/class/dk.gif',      '',     '28', '20', '25', '10', '0',  '16','<span class="dk">BM</span>'),
            '32'	=>	array('<span class="elf">Fairy Elf</span>',         'Fairy Elf',        'FE', 'elf',    ''.Yii::app()->getTemplate('core').'images/class/elf.gif',     '',     '22', '25', '20', '15', '0',  '32','<span class="elf">FE</span>'),
            '33'	=>	array('<span class="elf">Muse Elf</span>',          'Muse Elf',         'ME', 'elf',    ''.Yii::app()->getTemplate('core').'images/class/elf.gif',     '',     '22', '25', '20', '15', '0',  '32','<span class="elf">ME</span>'),
            '34'	=>	array('<span class="elf">High Elf</span>',          'High Elf',         'HE', 'elf',    ''.Yii::app()->getTemplate('core').'images/class/elf.gif',     '',     '22', '25', '20', '15', '0',  '32','<span class="elf">HE</span>'),
            '35'	=>	array('<span class="elf">High Elf</span>',          'High Elf',         'HE', 'elf',    ''.Yii::app()->getTemplate('core').'images/class/elf.gif',     '',     '22', '25', '20', '15', '0',  '32','<span class="elf">HE</span>'),
            '48'	=>	array('<span class="mg">Magic Gladiator</span>',    'Magic Gladiator',  'MG', 'mg',     ''.Yii::app()->getTemplate('core').'images/class/mg.gif',      '',     '26', '26', '26', '26', '0',  '48','<span class="mg">MG</span>'),
            '49'	=>	array('<span class="mg">Duel Master</span>',        'Duel Master',      'DM', 'mg',     ''.Yii::app()->getTemplate('core').'images/class/mg.gif',      '',     '26', '26', '26', '26', '0',  '48','<span class="mg">DM</span>'),
            '50'	=>	array('<span class="mg">Duel Master</span>',        'Duel Master',      'DM', 'mg',     ''.Yii::app()->getTemplate('core').'images/class/mg.gif',      '',     '26', '26', '26', '26', '0',  '48','<span class="mg">DM</span>'),
            '64'	=>	array('<span class="dl">Dark Lord</span>',          'Dark Lord',        'DL', 'dl',     ''.Yii::app()->getTemplate('core').'images/class/dl.gif',      '',     '26', '20', '20', '15', '25', '64','<span class="dl">DL</span>'),
            '65'	=>	array('<span class="dl">Lord Emperror</span>',      'Lord Emperror',    'LE', 'dl',     ''.Yii::app()->getTemplate('core').'images/class/dl.gif',      '',     '26', '20', '20', '15', '25', '64','<span class="dl">LE</span>'),
            '66'	=>	array('<span class="dl">Lord Emperror</span>',      'Lord Emperror',    'LE', 'dl',     ''.Yii::app()->getTemplate('core').'images/class/dl.gif',      '',     '26', '20', '20', '15', '25', '64','<span class="dl">LE</span>'),
            '80'	=>	array('<span class="sum">Summoner</span>',          'Summoner',         'SUM','sum',    ''.Yii::app()->getTemplate('core').'images/class/sum.gif',     '',     '21', '21', '18', '23', '0',  '80','<span class="sum">SUM</span>'),
            '81'	=>	array('<span class="sum">Bloody Summoner</span>',   'Bloody Summoner',  'BS', 'sum',    ''.Yii::app()->getTemplate('core').'images/class/sum.gif',     '',     '21', '21', '18', '23', '0',  '80','<span class="sum">BS</span>'),
            '82'	=>	array('<span class="sum">Dimension Master</span>',  'Dimension Master', 'DiM','sum',    ''.Yii::app()->getTemplate('core').'images/class/sum.gif',     '',     '21', '21', '18', '23', '0',  '80','<span class="sum">DM</span>'),
            '83'	=>	array('<span class="sum">Dimension Master</span>',  'Dimension Master', 'DiM','sum',    ''.Yii::app()->getTemplate('core').'images/class/sum.gif',     '',     '21', '21', '18', '23', '0',  '80','<span class="sum">DM</span>'),
            '96'	=>	array('<span class="rf">Rage Fighter</span>',       'Rage Fighter',     'RF', 'rf',     ''.Yii::app()->getTemplate('core').'images/class/rf.gif',      '',     '32', '27', '25', '20', '0',  '96','<span class="rf">RF</span>'),
            '97'	=>	array('<span class="rf">Fist Master</span>',		'Fist Master',	    'FM', 'rf',	    ''.Yii::app()->getTemplate('core').'images/class/rf.gif',      '',     '32', '27', '25', '20', '0',  '96','<span class="rf">FM</span>',   ),
            '98'	=>	array('<span class="rf">Fist Master</span>',        '<span class="rf">FM</span>',   'Fist Master',      'FM', 'rf', 	''.Yii::app()->getTemplate('core').'images/class/rf.gif',      '',	   '32', '27', '25', '20', '0',  '96'),
        );
        return $entity[$class][$r];
    }

    public static function getRConfig($param)
    {
        $model = new Character;

        if($model->getFConfig($param) == 1)
        {
            return "<span class='yes'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Yes')."</span>";
        }
        else
        {
            return "<span class='no'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'No')."</span>";
        }
    }

    public static function getCPoints($points)
    {
        return ($points < 0 ? ($points+Yii::app()->getFConfig('maxPoints')) : $points);
    }

    public static function getRCount($count, $entity)
    {
        $case = array (2, 0, 1, 1, 1, 2);
        return $count." ".$entity[ ($count%100 > 4 && $count%100 < 20) ? 2 : $case[min($count%10, 5)] ];
    }

    public function getTMap($map,$row)
    {
        $teleport = array(
            'Lorencia'        => array('0','120','115'),
            'Dungeon'         => array('1','108','247'),
            'Dungeon 2'       => array('1','232','126'),
            'Dungeon 3'       => array('1','3','84'),
            'Devias'          => array('2','211','40'),
            'Devias 2'        => array('2','25','27'),
            'Devias 3'        => array('2','226','231'),
            'Noria'           => array('3','175','112'),
            'Elbeland'        => array('51','133','120'),
            'Lost Tower'      => array('4','209','71'),
            'Lost Tower 2'    => array('4','237','241'),
            'Lost Tower 3'    => array('4','86','166'),
            'Lost Tower 4'    => array('4','87','86'),
            'Lost Tower 5'    => array('4','130','53'),
            'Lost Tower 6'    => array('4','52','53'),
            'Lost Tower 7'    => array('4','10','85'),
            'Arena'           => array('6','64','130'),
            'Atlans'          => array('7','24','24'),
            'Atlans 2'        => array('7','226','53'),
            'Atlans 3'        => array('7','63','163'),
            'Tarkan'          => array('8','187','58'),
            'Tarkan 2'        => array('8','100','140'),
            'Icarus'          => array('10','15','13')
        );
        return $teleport[$map][$row];
    }

    public static function getTLMap()
    {
        $mlist = array(
            'Lorencia',
            'Dungeon',
            'Dungeon 2',
            'Dungeon 3',
            'Devias',
            'Devias 2',
            'Devias 3',
            'Noria',
            'Elbeland',
            'Lost Tower',
            'Lost Tower 2',
            'Lost Tower 3',
            'Lost Tower 4',
            'Lost Tower 5',
            'Lost Tower 6',
            'Lost Tower 7',
            'Arena',
            'Atlans',
            'Atlans 2',
            'Atlans 3',
            'Tarkan',
            'Tarkan 2',
            'Icarus'
        );

        foreach ($mlist as $item)
        {
            $result[$item] = $item;
        }

        return $result;
    }

    public function getCChar($name)
    {
        return $class = Yii::app()->user->char == $name ? 'active-char' : 'non';
    }

    public function getCMap($params='')
    {
        $map = self::find(array(
            'select'=>'MapNumber, MapPosX, MapPosY',
            'condition'=>'Name=:Name',
            'params'=>array(':Name'=>Yii::app()->user->char)
        ));

        if($params == 'list')
        {
            return $this->getMap($map['MapNumber']);
        }
        else
        {
            return $this->getMap($map['MapNumber'])."(".$map['MapPosX']."x".$map['MapPosY'].")";
        }
    }

    public static function getCharRow($name,$column=array())
    {
        $model = self::model()->find(array(
            'select'=>$column,
            'condition'=>'Name=:Name',
            'params'=>array(':Name'=>$name)
        ));

        return $model;
    }

    public function getAUChars()
    {
        return $chars = self::findAll(array(
            'select'=> 'Name, cLevel, Class, '.$this->getFConfig('reset_col').', '.$this->getFConfig('greset_col').'',
            'order'=>'cLevel DESC, '.$this->getFConfig('reset_col').' DESC,'.$this->getFConfig('greset_col').' DESC',
            'condition'=>'AccountID=:AccountID',
            'params'=>array(':AccountID'=>Yii::app()->user->username)
        ));
    }

    public function getOCChar()
    {
        return $char = self::findAll(array(
           'select'=>'Name, Class, LevelUpPoint, Strength, Dexterity, Vitality, Energy, Leadership, cLevel,'.$this->getFConfig('reset_col').', '.$this->getFConfig('greset_col').', Money, MapNumber, MapPosX, MapPosY',
           'condition'=>'Name=:Name',
           'params'=>array(':Name'=>Yii::app()->user->char)
        ));
    }

    public static function getAChars()
    {
        $chars = self::model()->findAll(array(
            'select'=> 'Name,Class',
            'order'=>'Name ASC',
            'condition'=>'AccountID=:AccountID',
            'params'=>array(':AccountID'=>Yii::app()->user->username)
        ));

        return $chars;
    }

    public function getCOnline($online)
    {
        $status = array(
            '0'     => '<span class="offline">Offline</span>',
            '1'     => '<span class="online">Online</span>'
        );
        return $status[$online];
    }

    public function getOInfo($acc,$char)
    {
        $online = MEMBSTAT::model()->find(array(
            'select'=>'ConnectStat',
            'condition'=>'memb___id=:memb___id',
            'params'=>array(':memb___id'=>$acc)
        ));

        $model = AccountCharacter::model()->find(array(
            'select'=>'GameIDC',
            'condition'=>'Id=:Id',
            'params'=>array(':Id'=>$acc)
        ));

        if($model->GameIDC == $char && $online->ConnectStat == 1)
        {
            return 1;
        }
        else if($model->GameIDC == $char && $online->ConnectStat == 0)
        {
            return 0;
        }
        else
        {
            return 0;
        }
    }

    public function getIntToTxt($int)
    {
        switch($int)
        {
            case 1 : $entity = "online";  break;
            case 0 : $entity = "offline"; break;
            default: $entity = "offline"; break;
        }
       return $entity;
    }

    public function getCGuild($name)
    {
        $guild = GuildMember::model()->findByAttributes(array('Name'=>$name));

        return $guild->G_Name;
    }

    public function getGMark($name)
    {
        $guild = Guild::model()->find(array(
            'select'=>'G_Mark',
            'condition'=>'G_Name=:G_Name',
            'params'=>array(':G_Name'=>$name)
        ));

        return $guild->G_Mark;
    }

    public function getGLogo($name,$size)
    {
        if(file_exists('images/guilds/'.$name.'-'.$size.'.png'))
        {
            $output	= '<img src="/images/guilds/'.$name.'-'.$size.'.png" alt="'.$name.'" width="'.$size.'" height="'.$size.'"/>';
        }
        else
        {
            $hex        = urlencode($this->getGuildMarkString($this->getGMark($name)));
            $pixelSize	= $size / 8;
            $img 		= imagecreatetruecolor($size,$size);

            if(!preg_match('/[^a-zA-Z0-9]/',$hex) && $hex != '')
            {
                $hex	= stripslashes($hex);
                for ($y = 0; $y < 8; $y++)
                {
                    for ($x = 0; $x < 8; $x++)
                    {
                        $offset	= ($y*8)+$x;
                        if	    (substr($hex, $offset, 1) == '1')	{$c1 = '0';		$c2 = '0'; 		$c3 = '0';	}
                        elseif	(substr($hex, $offset, 1) == '2')	{$c1 = '140'; 	$c2 = '138'; 	$c3 = '141';}
                        elseif	(substr($hex, $offset, 1) == '3')	{$c1 = '255'; 	$c2 = '255'; 	$c3 = '255';}
                        elseif	(substr($hex, $offset, 1) == '4')	{$c1 = '254'; 	$c2 = '0'; 		$c3 = '0';	}
                        elseif	(substr($hex, $offset, 1) == '5')	{$c1 = '255'; 	$c2 = '138'; 	$c3 = '0';	}
                        elseif	(substr($hex, $offset, 1) == '6')	{$c1 = '255'; 	$c2 = '255'; 	$c3 = '0';	}
                        elseif	(substr($hex, $offset, 1) == '7')	{$c1 = '140'; 	$c2 = '255'; 	$c3 = '1';  }
                        elseif	(substr($hex, $offset, 1) == '8')	{$c1 = '0'; 	$c2 = '255'; 	$c3 = '0';  }
                        elseif	(substr($hex, $offset, 1) == '9')	{$c1 = '1'; 	$c2 = '255'; 	$c3 = '141';}
                        elseif	(substr($hex, $offset, 1) == 'A')	{$c1 = '0'; 	$c2 = '255';	$c3 = '255';}
                        elseif	(substr($hex, $offset, 1) == 'B')	{$c1 = '0'; 	$c2 = '138'; 	$c3 = '255';}
                        elseif  (substr($hex, $offset, 1) == 'C')   {$c1 = '0'; 	$c2 = '0'; 		$c3 = '254';}
                        elseif	(substr($hex, $offset, 1) == 'D')	{$c1 = '0'; 	$c2 = '0'; 		$c3 = '255';}
                        elseif	(substr($hex, $offset, 1) == 'E')	{$c1 = '255'; 	$c2 = '0'; 		$c3 = '254';}
                        elseif	(substr($hex, $offset, 1) == 'F')	{$c1 = '255'; 	$c2 = '0'; 		$c3 = '140';}

                        $row[$x] 		= $x*$pixelSize;
                        $row[$y] 		= $y*$pixelSize;
                        $row2[$x] 		= $row[$x] + $pixelSize;
                        $row2[$y]		= $row[$y] + $pixelSize;

                        if(substr($hex, $offset, 1) == '0')
                        {
                            $c1 = '25';		$c2 = '25'; 		$c3 = '25';
                            imagecolortransparent($img, imagecolorallocate($img, $c1, $c2, $c3));
                            $color[$y][$x]	= imagecolorallocate($img, $c1, $c2, $c3);
                        }
                        else
                        {
                            $color[$y][$x]	= imagecolorallocate($img, $c1, $c2, $c3);
                        }

                        imagefilledrectangle($img, $row[$x], $row[$y], $row2[$x], $row2[$y], $color[$y][$x]);
                    }
                }

                if(!is_dir('images/guilds')) mkdir('images/guilds', 0755);

                imagepng($img,'images/guilds/'.$name.'-'.$size.'.png');
                imagedestroy($img);
                $output	= '<img src="/images/guilds/'.$name.'-'.$size.'.png" alt="'.$name.'" width="'.$size.'" height="'.$size.'"/>';
            }
        }
        return $output;
    }

    public static function getAllChars()
    {
        return self::model()->count('cLevel >= :level', array(':level'=>1));
    }

    public static function getDwStat()
    {
        return self::model()->count('Class = 0');
    }

    public static function getSmStat()
    {
        return self::model()->count('Class = 1');
    }

    public static function getGmStat()
    {
        return self::model()->count('Class = 2 OR Class = 3');
    }

    public static function getDkStat()
    {
        return self::model()->count('Class = 16');
    }

    public static function getBkStat()
    {
        return self::model()->count('Class = 17');
    }

    public static function getBmStat()
    {
        return self::model()->count('Class = 18 OR Class = 19');
    }

    public static function getFeStat()
    {
        return self::model()->count('Class = 32');
    }

    public static function getMeStat()
    {
        return self::model()->count('Class = 33');
    }

    public static function getHeStat()
    {
        return self::model()->count('Class = 34 OR Class = 35');
    }

    public static function getMgStat()
    {
        return self::model()->count('Class = 48');
    }

    public static function getDmStat()
    {
        return self::model()->count('Class = 49 OR Class = 50');
    }

    public static function getDlStat()
    {
        return self::model()->count('Class = 64');
    }

    public static function getLeStat()
    {
        return self::model()->count('Class = 65 OR Class = 66');
    }

    public static function getSumStat()
    {
        return self::model()->count('Class = 80');
    }

    public static function getBsStat()
    {
        return self::model()->count('Class = 81');
    }

    public static function getDimStat()
    {
        return self::model()->count('Class = 82 OR Class = 83');
    }

    public static function getRfStat()
    {
        return self::model()->count('Class = 96');
    }

    public static function getFmStat()
    {
        return self::model()->count('Class = 97 OR Class = 98');
    }

    public static function getCImage($name)
    {
        $class = self::model()->find(array(
            'select'=>'Class',
            'condition'=>'Name=:Name',
            'params'=>array(':Name'=>$name)
        ));

        return self::getCClass($class->Class,'4');
    }
}