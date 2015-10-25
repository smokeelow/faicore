<?php

/**
 * This is the model class for table "DefaultClassType".
 *
 * The followings are the available columns in table 'DefaultClassType':
 * @property integer $Class
 * @property integer $Strength
 * @property integer $Dexterity
 * @property integer $Vitality
 * @property integer $Energy
 * @property string $MagicList
 * @property double $Life
 * @property double $MaxLife
 * @property double $Mana
 * @property double $MaxMana
 * @property integer $MapNumber
 * @property integer $MapPosX
 * @property integer $MapPosY
 * @property string $Quest
 * @property integer $DbVersion
 * @property integer $Leadership
 * @property integer $Level
 * @property integer $LevelUpPoint
 * @property string $Inventory
 * @property string $MasterMagicList
 * @property string $QuestData
 * @property integer $Tutorial
 * @property string $DailyQuestTime
 */
class DefaultClassType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DefaultClassType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DefaultClassType';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Class', 'required'),
			array('Class, Strength, Dexterity, Vitality, Energy, MapNumber, MapPosX, MapPosY, DbVersion, Leadership, Level, LevelUpPoint, Tutorial', 'numerical', 'integerOnly'=>true),
			array('Life, MaxLife, Mana, MaxMana', 'numerical'),
			array('MagicList', 'length', 'max'=>240),
			array('Quest', 'length', 'max'=>100),
			array('Inventory', 'length', 'max'=>7584),
			array('MasterMagicList', 'length', 'max'=>480),
			array('QuestData', 'length', 'max'=>450),
			array('DailyQuestTime', 'length', 'max'=>19),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Class, Strength, Dexterity, Vitality, Energy, MagicList, Life, MaxLife, Mana, MaxMana, MapNumber, MapPosX, MapPosY, Quest, DbVersion, Leadership, Level, LevelUpPoint, Inventory, MasterMagicList, QuestData, Tutorial, DailyQuestTime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}


    public static function getInventory($class)
    {
        $entity = self::model()->find(array(
            'select'=>'Inventory',
            'condition'=>'Class=:Class',
            'params'=>array(':Class'=>$class)
        ));

        return $entity['Inventory'];
    }

    public static function getMList($class)
    {
        $entity = self::model()->find(array(
            'select'=>'MagicList',
            'condition'=>'Class=:Class',
            'params'=>array(':Class'=>$class)
        ));

        return $entity['MagicList'];
    }
}