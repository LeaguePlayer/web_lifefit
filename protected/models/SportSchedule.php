<?php

/**
* This is the model class for table "{{sport_schedule}}".
*
* The followings are the available columns in table '{{sport_schedule}}':
    * @property integer $id
    * @property integer $id_sport
    * @property integer $day_of
    * @property string $time_of
*/
class SportSchedule extends EActiveRecord
{
    public function tableName()
    {
        return '{{sport_schedule}}';
    }


    public function rules()
    {
        return array(
            array('id_sport, day_of, id_hall', 'numerical', 'integerOnly'=>true),
            array('time_of, teacher', 'safe'),
            // The following rule is used by search().
            array('id, id_sport, day_of, time_of', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
             'sport' => array(self::BELONGS_TO, 'Sport', 'id_sport')
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_sport' => 'ID_SPORT',
            'day_of' => 'День проведения',
            'time_of' => 'Время проведения',
        );
    }



    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('id_sport',$this->id_sport);
		$criteria->compare('day_of',$this->day_of);
		$criteria->compare('time_of',$this->time_of,true);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
