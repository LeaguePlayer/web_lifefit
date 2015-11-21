<?php

/**
* This is the model class for table "{{album}}".
*
* The followings are the available columns in table '{{album}}':
    * @property integer $id
    * @property string $name
    * @property integer $glr_album
    * @property string $wswg_body
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Album extends EActiveRecord
{
    public function tableName()
    {
        return '{{album}}';
    }


    public function rules()
    {
        return array(
            array('glr_album, status, sort', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>255),
            array('wswg_body, create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, name, glr_album, wswg_body, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }

    public function translition(){
        return 'Альбом';
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
            'name' => 'Название',
            'glr_album' => 'Альбом',
            'wswg_body' => 'Описание',
            'status' => 'Сатус',
            'sort' => 'Соритровка',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего обновления',
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
            'galleryBehaviorPlans' => array(
                'class' => 'appext.imagesgallery.GalleryBehavior',
                'idAttribute' => 'glr_album',
                'tags'=>true,
                'versions' => array(
                    'small' => array(
                        'adaptiveResize' => array(90, 90),
                    ),
                    'medium' => array(
                        'resize' => array(600),
                    ),
                    'view' => array(
                        'adaptiveResize' => array(183, 183),
                    ),
                    'photo'=>array(
                        'adaptiveResize' => array(500, 200),
                    )
                ),
                'name' => true,
                'description' => true,
            ),
        ));
    }

    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('glr_album',$this->glr_album);
		$criteria->compare('wswg_body',$this->wswg_body,true);
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
