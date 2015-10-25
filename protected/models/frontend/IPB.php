<?php

class IPB extends IpbActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'topics';
	}

	public function rules()
	{
		return array(
            array('tid, title, last_poster_name, last_post', 'length', 'max'=>200),
		);
	}

    public static function getLPosts()
    {
        return self::model()->findAll(array(
            'select'=>'tid,title, last_poster_name, last_post',
            'order'=>'tid DESC',
            'limit'=>Yii::app()->getFConfig('ipbTNumber')
        ));
    }

    public static function getLink($id,$title)
    {
       return Yii::app()->getFConfig('forumURL').'index.php?/topic/'.
           $id.'-'.str_replace(' ','-',strtolower($title)).'/page__view__getlastpost';
    }
}