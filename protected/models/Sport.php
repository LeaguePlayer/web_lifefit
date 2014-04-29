<?php

/**
* This is the model class for table "{{sport}}".
*
* The followings are the available columns in table '{{sport}}':
    * @property integer $id
    * @property integer $list_id
    * @property string $title
    * @property string $short_desc
    * @property string $wswg_body
    * @property string $img_preview_main_slider
    * @property string $img_preview_coming_soon
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Sport extends EActiveRecord
{
    public function tableName()
    {
        return '{{sport}}';
    }


    public function rules()
    {
        return array(
			array('title', 'required'),
            array('list_id, status, sort', 'numerical', 'integerOnly'=>true),
            array('title, img_preview_main_slider, img_preview_coming_soon', 'length', 'max'=>255),
            array('short_desc, wswg_body, create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, list_id, title, short_desc, wswg_body, img_preview_main_slider, img_preview_coming_soon, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
			'list'=>array(self::BELONGS_TO, 'Sportlist', 'list_id'),
			'schedule'=>array(self::HAS_MANY, 'SportSchedule', 'id_sport', 'order'=>'ID ASC'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'list_id' => 'LIST_ID',
            'title' => 'Название',
            'short_desc' => 'Краткое описание',
            'wswg_body' => 'Описание направления',
            'img_preview_main_slider' => 'Изображение, которое будет выводится на главной в слайдере',
            'img_preview_coming_soon' => 'Изображение, которое будет выводится на главной в ближайшем занятии',
            'status' => 'Статус',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }


    public function behaviors()
    {
        return CMap::mergeArray(parent::behaviors(), array(
			'imgBehaviorPreview_main_slider' => array(
				'class' => 'application.behaviors.UploadableImageBehavior',
				'attributeName' => 'img_preview_main_slider',
				'versions' => array(
					'icon' => array(
						'centeredpreview' => array(90, 90),
					),
					'small' => array(
						'resize' => array(200, 180),
					)
				),
			),
			'imgBehaviorPreview_coming_soon' => array(
				'class' => 'application.behaviors.UploadableImageBehavior',
				'attributeName' => 'img_preview_coming_soon',
				'versions' => array(
					'icon' => array(
						'centeredpreview' => array(90, 90),
					),
					'small' => array(
						'resize' => array(200, 180),
					)
				),
			),
			'Seo' => array(
				'class' => 'application.behaviors.SeoBehavior',
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
		$criteria->compare('list_id',$this->list_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('short_desc',$this->short_desc,true);
		$criteria->compare('wswg_body',$this->wswg_body,true);
		$criteria->compare('img_preview_main_slider',$this->img_preview_main_slider,true);
		$criteria->compare('img_preview_coming_soon',$this->img_preview_coming_soon,true);
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
	
	public function afterDelete()
	{
		parent::afterDelete();
		
			if( count( $this->schedule ) > 0 )
			{
				foreach ( $this->schedule as $schedule)  $schedule->delete();
			}
		
		return true;	
	}

	public static function getDayOfClasses($n = false)
	{
		$array = array( "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье" );
		
		if ( is_numeric($n) )
			return $array[$n];
		else
			return $array;
	}

}
