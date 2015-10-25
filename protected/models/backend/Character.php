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
			array('cLevel, LevelUpPoint, Str, Dex, Vit, Ene, Com, Class, Experience, Strength, Dexterity, Vitality, Energy, Money, MapNumber, MapPosX, MapPosY, MapDir, PkCount, PkLevel, PkTime, CtlCode, Leadership, ChatLimitTime, FruitPoint, JHtype, VipType, '.$this->getFConfig('reset_col').', MasterLevel, MasterExp, MasterPoints, Married, mLevel, mlPoint, InventoryExpansion, WinDuels, LoseDuels, Tutorial, PenaltyMask, '.$this->getFConfig('greset_col').'', 'numerical', 'integerOnly'=>true),
			array('Life, MaxLife, Mana, MaxMana', 'numerical'),
			array('AccountID, Name, JHDX, MarryName', 'length', 'max'=>10),
			array('MagicList', 'length', 'max'=>240),
			array('Quest', 'length', 'max'=>100),
			array('Inventory', 'length', 'max'=>7584),
			array('MuBotData', 'length', 'max'=>257),
			array('mlExperience, mlNextExp, DailyQuestTime', 'length', 'max'=>19),
			array('MasterMagicList', 'length', 'max'=>480),
			array('QuestData', 'length', 'max'=>450),
			array('MDate, LDate, VipStart, VipDays', 'safe'),
			array('AccountID, getRA_search, Name, cLevel, LevelUpPoint, Class, Strength, Dexterity, Vitality, Energy, Money, MapNumber, MapPosX, MapPosY, MapDir, PkCount, PkLevel, PkTime, CtlCode, Quest, Leadership,'.$this->getFConfig('reset_col').', '.$this->getFConfig('greset_col').'', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
            'getGuild'  => array(self::BELONGS_TO,   'GuildMember',  'Name'),
            'getAcc'    => array(self::BELONGS_TO,   'AccountCharacter',  'Id'),
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
			'JHtype' => 'Jhtype',
			'VipType' => 'Vip Type',
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
			$this->getFConfig('greset_col') => $this->getFConfig('greset_col'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

        $criteria->select = 'AccountID, Name';

     	$criteria->compare('AccountID',$this->AccountID,true);
		$criteria->compare('Name',$this->Name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=> 100,
                'pageVar'=>'page',
            ),
            'sort'=>array(
                'defaultOrder'=>'AccountID ASC',
            ),
		));
	}

    public static function getCClass($class,$r)
    {
        $entity	= array(
            '0'		=>  array('<span class="sm">Dark Wizard</span>',        'Dark Wizard',      'DW', 'dw',     ''.Yii::app()->getTemplate('core').'images/class/dw.gif',      '',     '18', '18', '15', '30', '0',  '0'),
            '1'		=>	array('<span class="sm">Soul Master</span>',        'Soul Master',      'SM', 'dw',     ''.Yii::app()->getTemplate('core').'images/class/dw.gif',      '',     '18', '18', '15', '30', '0',  '0'),
            '2'		=>	array('<span class="sm">Grand Master</span>',       'Grand Master',     'GM', 'dw',     ''.Yii::app()->getTemplate('core').'images/class/dw.gif',      '',     '18', '18', '15', '30', '0',  '0'),
            '3'		=>	array('<span class="sm">Grand Master</span>',       'Grand Master',     'GM', 'dw',     ''.Yii::app()->getTemplate('core').'images/class/dw.gif',      '',     '18', '18', '15', '30', '0',  '0'),
            '16'	=>	array('<span class="dk">Dark Knight</span>',        'Dark Knight',      'DK', 'dk',     ''.Yii::app()->getTemplate('core').'images/class/dk.gif',      '',     '28', '20', '25', '10', '0',  '16'),
            '17'	=>	array('<span class="dk">Blade Knight</span>',       'Blade Knight',     'BK', 'dk',     ''.Yii::app()->getTemplate('core').'images/class/dk.gif',      '',     '28', '20', '25', '10', '0',  '16'),
            '18'	=>	array('<span class="dk">Blade Master</span>',       'Blade Master',     'BM', 'dk',     ''.Yii::app()->getTemplate('core').'images/class/dk.gif',      '',     '28', '20', '25', '10', '0',  '16'),
            '19'	=>	array('<span class="dk">Blade Master</span>',       'Blade Master',     'BM', 'dk',     ''.Yii::app()->getTemplate('core').'images/class/dk.gif',      '',     '28', '20', '25', '10', '0',  '16'),
            '32'	=>	array('<span class="elf">Fairy Elf</span>',         'Fairy Elf',        'FE', 'elf',    ''.Yii::app()->getTemplate('core').'images/class/elf.gif',     '',     '22', '25', '20', '15', '0',  '32'),
            '33'	=>	array('<span class="elf">Muse Elf</span>',          'Muse Elf',         'ME', 'elf',    ''.Yii::app()->getTemplate('core').'images/class/elf.gif',     '',     '22', '25', '20', '15', '0',  '32'),
            '34'	=>	array('<span class="elf">High Elf</span>',          'High Elf',         'HE', 'elf',    ''.Yii::app()->getTemplate('core').'images/class/elf.gif',     '',     '22', '25', '20', '15', '0',  '32'),
            '35'	=>	array('<span class="elf">High Elf</span>',          'High Elf',         'HE', 'elf',    ''.Yii::app()->getTemplate('core').'images/class/elf.gif',     '',     '22', '25', '20', '15', '0',  '32'),
            '48'	=>	array('<span class="mg">Magic Gladiator</span>',    'Magic Gladiator',  'MG', 'mg',     ''.Yii::app()->getTemplate('core').'images/class/mg.gif',      '',     '26', '26', '26', '26', '0',  '48'),
            '49'	=>	array('<span class="mg">Duel Master</span>',        'Duel Master',      'DM', 'mg',     ''.Yii::app()->getTemplate('core').'images/class/mg.gif',      '',     '26', '26', '26', '26', '0',  '48'),
            '50'	=>	array('<span class="mg">Duel Master</span>',        'Duel Master',      'DM', 'mg',     ''.Yii::app()->getTemplate('core').'images/class/mg.gif',      '',     '26', '26', '26', '26', '0',  '48'),
            '64'	=>	array('<span class="dl">Dark Lord</span>',          'Dark Lord',        'DL', 'dl',     ''.Yii::app()->getTemplate('core').'images/class/dl.gif',      '',     '26', '20', '20', '15', '25', '64'),
            '65'	=>	array('<span class="dl">Lord Emperror</span>',      'Lord Emperror',    'LE', 'dl',     ''.Yii::app()->getTemplate('core').'images/class/dl.gif',      '',     '26', '20', '20', '15', '25', '64'),
            '66'	=>	array('<span class="dl">Lord Emperror</span>',      'Lord Emperror',    'LE', 'dl',     ''.Yii::app()->getTemplate('core').'images/class/dl.gif',      '',     '26', '20', '20', '15', '25', '64'),
            '80'	=>	array('<span class="sum">Summoner</span>',          'Summoner',         'SUM','sum',    ''.Yii::app()->getTemplate('core').'images/class/sum.gif',     '',     '21', '21', '18', '23', '0',  '80'),
            '81'	=>	array('<span class="sum">Bloody Summoner</span>',   'Bloody Summoner',  'BS', 'sum',    ''.Yii::app()->getTemplate('core').'images/class/sum.gif',     '',     '21', '21', '18', '23', '0',  '80'),
            '82'	=>	array('<span class="sum">Dimension Master</span>',  'Dimension Master', 'DiM','sum',    ''.Yii::app()->getTemplate('core').'images/class/sum.gif',     '',     '21', '21', '18', '23', '0',  '80'),
            '83'	=>	array('<span class="sum">Dimension Master</span>',  'Dimension Master', 'DiM','sum',    ''.Yii::app()->getTemplate('core').'images/class/sum.gif',     '',     '21', '21', '18', '23', '0',  '80'),
            '96'	=>	array('<span class="rf">Rage Fighter</span>',       'Rage Fighter',     'RF', 'rf',     ''.Yii::app()->getTemplate('core').'images/class/rf.gif',      '',     '32', '27', '25', '20', '0',  '96'),
            '97'	=>	array('<span class="rf">Fist Master</span>',		'Fist Master',	    'FM', 'rf',	    ''.Yii::app()->getTemplate('core').'images/class/rf.gif',      '',     '32', '27', '25', '20', '0',  '96'),
            '98'	=>	array('<span class="rf">Fist Master</span>',        'Fist Master',      'FM', 'rf', 	''.Yii::app()->getTemplate('core').'images/class/rf.gif',      '',	  '32', '27', '25', '20', '0',  '96'),
        );
        return $entity[$class][$r];
    }


    public static function getAChars()
    {
        return self::model()->count('cLevel >= :level', array(':level'=>1));
    }

    public function getFinderAccCharacters($acc)
    {
        return $this->findAll(array(
            'select'=>'Name',
            'condition'=>'AccountID=:AccountID',
            'params'=>array(':AccountID'=>$acc)
        ));
    }
}