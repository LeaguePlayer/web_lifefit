<?php

/**
* This is the model class for table "{{cards}}".
*
* The followings are the available columns in table '{{cards}}':
    * @property integer $id
    * @property integer $type
    * @property string $name
    * @property string $img_preview
    * @property string $wswg_short_desc
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Cards extends EActiveRecord
{
    
    const BELONGS_TO_ABONEMENT = 0;
    const BELONGS_TO_PERSONAL_TRAINING = 1;
    
    public function tableName()
    {
        return '{{cards}}';
    }


    public function rules()
    {
        return array(
			array('name', 'required'),
            array('type, status, sort', 'numerical', 'integerOnly'=>true),
            array('name, img_preview', 'length', 'max'=>255),
            array('wswg_short_desc, create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, type, name, img_preview, wswg_short_desc, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
			'list'=>array(self::BELONGS_TO, 'Cardlist', 'list_id'),
			'prices'=>array(self::HAS_MANY, 'Pricecards', 'id_card', 'order'=>'slot ASC'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'type' => 'Вид абонемента',
            'name' => 'Название',
            'img_preview' => 'Изображение',
            'wswg_short_desc' => 'Краткое описание',
            'status' => 'Статус',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }


    public function behaviors()
    {
        return CMap::mergeArray(parent::behaviors(), array(
			'imgBehaviorPreview' => array(
				'class' => 'application.behaviors.UploadableImageBehavior',
				'attributeName' => 'img_preview',
				'versions' => array(
					'icon' => array(
						'centeredpreview' => array(90, 90),
					),
					'small' => array(
						'resize' => array(200, 180),
					)
				),
			),
			
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
		$criteria->compare('type',$this->type);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('img_preview',$this->img_preview,true);
		$criteria->compare('wswg_short_desc',$this->wswg_short_desc,true);
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

	public static function getTypes($n = false)
	{
		$array = array('Клубная карта', 'Персональные тренировки');	
		
		if( is_numeric ( $n ) )
			return $array[$n];
		else
			return $array;
		
	}
	
	public function afterDelete()
	{
		parent::afterDelete();
		
		foreach ($this->prices as $model_pricecard) $model_pricecard->delete();
		
		return true;	
	}
	
	public static function getSlots($n = false)
	{
		$array = array('1 слот (на 1 месяц)', '2 слот (на 3 месяц)', '3 слот (на 6 месяц)', '4 слот (на 12 месяц)',);	
		
		if( is_numeric ( $n ) )
			return $array[$n];
		else
			return $array;
		
	}

}
