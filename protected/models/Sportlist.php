<?php

/**
* This is the model class for table "{{sportlist}}".
*
* The followings are the available columns in table '{{sportlist}}':
    * @property integer $id
    * @property integer $node_id
*/
class Sportlist extends EActiveRecord
{
    public function tableName()
    {
        return '{{sportlist}}';
    }


    public function rules()
    {
        return array(
            array('node_id', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            array('id, node_id', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
			'node' => array(self::BELONGS_TO, 'Structure', 'node_id'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'node_id' => 'NODE_ID',
        );
    }

	public function behaviors()
	{
		return array(
			'StructureComponent' => array(
				'class' => 'application.behaviors.StructureComponentBehavior',
			),
		);
	}

    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('node_id',$this->node_id);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
	
	
	public function sportSearch($count = null)
	{
		$criteria = new CDbCriteria();
		$criteria->compare('list_id', $this->id);
		$criteria->compare('status', News::STATUS_PUBLISH);
		
		$criteria->order = 'create_time DESC';
		//$pageSize = $count ? $count : ( is_numeric($this->page_size) ? $this->page_size : 5 );
		return new CActiveDataProvider('News', array(
			'criteria'=>$criteria,
			
		));
	}


}
