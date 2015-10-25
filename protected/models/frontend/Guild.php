<?php

/**
 * This is the model class for table "Guild".
 *
 * The followings are the available columns in table 'Guild':
 * @property string $G_Name
 * @property string $G_Mark
 * @property integer $G_Score
 * @property string $G_Master
 * @property integer $G_Count
 * @property string $G_Notice
 * @property integer $Number
 * @property integer $G_Type
 * @property integer $G_Rival
 * @property integer $G_Union
 * @property string $G_Warehouse
 * @property integer $G_WHPassword
 * @property integer $G_WHMoney
 */
class Guild extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Guild the static model class
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
		return 'Guild';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('G_Name', 'required'),
			array('G_Score, G_Count, G_Type, G_Rival, G_Union, G_WHPassword, G_WHMoney', 'numerical', 'integerOnly'=>true),
			array('G_Name', 'length', 'max'=>8),
			array('G_Mark', 'length', 'max'=>32),
			array('G_Master', 'length', 'max'=>10),
			array('G_Notice', 'length', 'max'=>60),
			array('G_Warehouse', 'length', 'max'=>3840),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('G_Name, G_Mark, G_Score, G_Master, G_Count, G_Notice, Number, G_Type, G_Rival, G_Union, G_Warehouse, G_WHPassword, G_WHMoney', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'members'    => array(self::HAS_MANY,   'GuildMember',  'G_Name')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'G_Name' => 'G Name',
			'G_Mark' => 'G Mark',
			'G_Score' => 'G Score',
			'G_Master' => 'G Master',
			'G_Count' => 'G Count',
			'G_Notice' => 'G Notice',
			'Number' => 'Number',
			'G_Type' => 'G Type',
			'G_Rival' => 'G Rival',
			'G_Union' => 'G Union',
			'G_Warehouse' => 'G Warehouse',
			'G_WHPassword' => 'G Whpassword',
			'G_WHMoney' => 'G Whmoney',
		);
	}

    public function getGMCount($name)
    {
        $members = GuildMember::model()->findAll(array('condition'=>'G_Name=:G_Name', 'params'=>array(':G_Name'=>$name)));

        return count($members);
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

    public function getGLogo($name,$xy=40)
    {
        $code        = urlencode($this->getGuildMarkString($this->getGMark($name)));
        $color[0]    = ''; $color[1]='#000000'; $color[2]='#8c8a8d'; $color[3]='#ffffff'; $color[4]='#fe0000'; $color[5]='#ff8a00'; $color[6]='#ffff00'; $color[7]='#8cff01'; $color[8]='#00ff00'; $color[9]='#01ff8d'; $color['a']='#00ffff'; $color['b']='#008aff'; $color['c']='#0000fe'; $color['d']='#8c00ff'; $color['e']='#ff00fe'; $color['f']='#ff008c';

        $i  = 0;
        $ii = 0;

        $it = '<table id="fai-g-logo" border=0 cellpadding=0 cellspacing=0><tr>';

        while ($i<64)
        {
            $place = $code{$i};
            $i++;
            $ii++;
            $add = $color[$place];

            $it .= '<td class="guildlogo" style=\'background-color: '.$add.'\';></td>';

            if ($ii==8)
            {
                $it .=  '</tr>';
                if ($ii != 64) $it .='<tr>';
                $ii =0;
            }
        }

        $it .= '</table>';

        return $it;
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('G_Name',$this->G_Name,true);
		$criteria->compare('G_Mark',$this->G_Mark,true);
		$criteria->compare('G_Score',$this->G_Score);
		$criteria->compare('G_Master',$this->G_Master,true);
		$criteria->compare('G_Count',$this->G_Count);
		$criteria->compare('G_Notice',$this->G_Notice,true);
		$criteria->compare('Number',$this->Number);
		$criteria->compare('G_Type',$this->G_Type);
		$criteria->compare('G_Rival',$this->G_Rival);
		$criteria->compare('G_Union',$this->G_Union);
		$criteria->compare('G_Warehouse',$this->G_Warehouse,true);
		$criteria->compare('G_WHPassword',$this->G_WHPassword);
		$criteria->compare('G_WHMoney',$this->G_WHMoney);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getAGuilds()
    {
        return self::model()->count('Number >= :number', array(':number'=>1));
    }
}