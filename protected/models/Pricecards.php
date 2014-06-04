<?php

/**
* This is the model class for table "{{price_cards}}".
*
* The followings are the available columns in table '{{price_cards}}':
    * @property integer $id
    * @property integer $id_card
    * @property integer $slot
    * @property integer $price
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Pricecards extends EActiveRecord
{
    public function tableName()
    {
        return '{{price_cards}}';
    }


    public function rules()
    {
        return array(
            array('id_card, slot, price, status, sort', 'numerical', 'integerOnly'=>true),
            array('create_time, update_time, comment', 'safe'),
            // The following rule is used by search().
            array('id, id_card, slot, price, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_card' => 'ID_карты',
            'slot' => 'Слот',
            'price' => 'Стоимость',
            'status' => 'Статус',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
            'comment'=>'Комментарий к цене',
        );
    }


    public function behaviors()
    {
        return CMap::mergeArray(parent::behaviors(), array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time',
                'setUpdateOnCreate' => true,
			),
        ));
    }

    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('id_card',$this->id_card);
		$criteria->compare('slot',$this->slot);
		$criteria->compare('price',$this->price);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
        $criteria->order = 'sort';
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
