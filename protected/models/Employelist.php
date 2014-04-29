<?php

/**
* This is the model class for table "{{employe_list}}".
*
* The followings are the available columns in table '{{employe_list}}':
    * @property integer $id
    * @property string $name
    * @property integer $node_id
*/
class Employelist extends CActiveRecord
{
    public function tableName()
    {
        return '{{employeslist}}';
    }


    public function rules()
    {
        return array(
            array('node_id', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>255),
            // The following rule is used by search().
            array('id, name, node_id', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
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


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Группа сотрудников',
            'node_id' => 'Узел',
        );
    }




    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('node_id',$this->node_id);
        $criteria->order = 'sort';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    private $_employes;
    public function getEmployes()
    {
        if ( $this->_employes === null ) {
            $criteria = new CDbCriteria();
            $criteria->compare('list_id', $this->id);
            $criteria->compare('status', Employe::STATUS_PUBLISH);
            $criteria->order = 'sort';
            $this->_employes = Employe::model()->findAll($criteria);
        }
        return $this->_employes;
    }
}
