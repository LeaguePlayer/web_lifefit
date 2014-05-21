<?php

/**
* This is the model class for table "{{employes}}".
*
* The followings are the available columns in table '{{employes}}':
    * @property integer $id
    * @property string $name
    * @property string $img_photo
    * @property string $phone
    * @property string $fax
    * @property string $reception_phone
    * @property string $wswg_description
    * @property integer $list_id
    * @property integer $status
    * @property integer $sort
    * @property integer $create_time
    * @property integer $update_time
*/
class Employe extends EActiveRecord
{
    const GENDER_MAN = 1;
    const GENDER_WOOMAN = 2;

    public static function getGenders()
    {
        return array(
            self::GENDER_MAN => 'Мужчина',
            self::GENDER_WOOMAN => 'Женщина',
        );
    }

    public function getCurrentGender()
    {
        $gender = self::getGenders();
        return $gender[$this->gender];
    }

    public function tableName()
    {
        return '{{employes}}';
    }


    public function rules()
    {
        return array(
            array('name, billet', 'required'),
            array('list_id, status, sort, create_time, update_time, gender', 'numerical', 'integerOnly'=>true),
            array('name, phone', 'length', 'max'=>255),
            array('wswg_description, surname', 'safe'),
            array('email', 'email'),
            // The following rule is used by search().
            array('id, name, phone, wswg_description, list_id, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
            'name' => 'Имя',
            'surname'=>'Фамилия',
            'img_photo' => 'Фото сотрудника',
            'phone' => 'Телефон',
         //   'fax' => 'Факс',
            'email' => 'E-mail',
          //  'reception_phone' => 'Телефон приемной',
            'wswg_description' => 'Описание',
            'billet' => 'Должность',
            'list_id' => 'Ссылка на список сотрудников',
            'status' => 'Статус',
            'gender' => 'Пол',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }


    public function behaviors()
    {
        return CMap::mergeArray(parent::behaviors(), array(
        	'imgBehaviorPhoto' => array(
				'class' => 'application.behaviors.UploadableImageBehavior',
				'attributeName' => 'img_photo',
				'versions' => array(
					'icon' => array(
						'centeredpreview' => array(90, 90),
					),
					'small' => array(
						'adaptiveResize' => array(218, 302),
					),
                    'full' => array(
                        'resize' => array(300),
                    ),
				),
			),
        ));
    }


    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
        $criteria->compare('surname',$this->surname,true);
		$criteria->compare('img_photo',$this->img_photo,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
	//	$criteria->compare('fax',$this->fax,true);
	//	$criteria->compare('reception_phone',$this->reception_phone,true);
		$criteria->compare('wswg_description',$this->wswg_description,true);
		$criteria->compare('list_id',$this->list_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
        $criteria->order = 'sort';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }


    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function isMan()
    {
        return $this->gender === self::GENDER_MAN;
    }

    public function isWooman()
    {
        return $this->gender == self::GENDER_WOOMAN;
    }
}
