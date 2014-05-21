<?php

/**
* This is the model class for table "{{cardlist}}".
*
* The followings are the available columns in table '{{cardlist}}':
    * @property integer $id
    * @property integer $node_id
    * @property integer $page_size
*/
class Cardlist extends CActiveRecord
{
    public function tableName()
    {
        return '{{cardlist}}';
    }


    public function rules()
    {
        return array(
            array('node_id, page_size', 'numerical', 'integerOnly'=>true),
            array('wswg_content', 'safe'),
            // The following rule is used by search().
            array('id, node_id, page_size', 'safe', 'on'=>'search'),
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
            'node_id' => 'node_id',
            'page_size' => 'Количество записей',
            'wswg_content'=>'Текст на странице',
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
		$criteria->compare('page_size',$this->page_size);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

	public function translition()
	{
	 	return "Абонементы";	
	}
    
    public function cardsSearch($count = null)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('list_id', $this->id);
        $criteria->compare('status', News::STATUS_PUBLISH);

	
        $criteria->order = 'create_time DESC';
        $pageSize = 9999;
        return new CActiveDataProvider('Cards', array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>$pageSize
            )
        ));
    }

}
