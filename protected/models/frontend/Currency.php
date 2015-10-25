<?php

/**
 * This is the model class for table "T_InGameShop_Point".
 *
 * The followings are the available columns in table 'T_InGameShop_Point':
 * @property string $AccountID
 * @property double $WCoinP
 * @property double $WCoinC
 * @property double $GoblinPoint
 */
class Currency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Currency the static model class
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
		return 'T_CashShop_DATA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('memb_guid', 'required'),
			array('wcoin_c, wcoin_p, wcoin_g', 'numerical'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(

		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */

    public static function getUCurrency()
    {
        $currency = self::model()->findByAttributes(array('memb_guid'=>Yii::app()->user->guid));

        if($currency = NULL)
        {
            foreach($currency as $key => $item)
            {
                $result[$key] = intval($item);
            }
        }
        else
        {
            $result = array(
                'wcoin_c' => '0',
                'wcoin_p' => '0',
                'wcoin_g' => '0',
            );

        }

        return $result;


    }
}