<?php

/**
* This is the model class for table "{{orders}}".
*
* The followings are the available columns in table '{{orders}}':
    * @property integer $id
    * @property string $name
    * @property string $phone
    * @property string $email
    * @property string $post_id
    * @property string $post_type
    * @property integer $status
    * @property string $create_time
    * @property string $update_time
*/
class Orders extends EActiveRecord
{
	protected $post_types = array ( 'card' => 'Заявка на абонемент', 'sport'=>'Запись на занятия', 'guest'=>"Запись на гостевой визит" );	
	
	public $post_type_word;
	
    public function tableName()
    {
        return '{{orders}}';
    }
	
	public static function getStatusAliases($status = -1)
    {
        $aliases = array(
            self::STATUS_CLOSED => 'Не просмотрена',
            self::STATUS_PUBLISH => 'Обработана',
            self::STATUS_REMOVED => 'Удалена',
        );

        if ($status > -1)
            return $aliases[$status];

        return $aliases;
    }
	
	public function getPostType($n=false)
	{
		
		$array = $this->post_types;	
		
		if( $n && $n == "card" )
		{
		      $card = Cards::model()->with( array('price'=>array('condition'=>"price.id={$this->post_slot}")) )->findByPk($this->post_id);
		      $period_card = ($card->type==Cards::BELONGS_TO_ABONEMENT) ? ", сроком ".Cards::getSlotsWithMonth($card->price->slot) : "";
              return "Заявка на абонемент {$card->name} за {$card->price->price} руб{$period_card}";
		      
		}
        elseif($n == "guest" and $this->post_id)
        {
            $sport = Sport::model()->findByPk($this->post_id);
            $begin_string = ($this->post_slot == 1) ? "Запись на ближайшее занятие" : "Запись на занятия";
            return "{$begin_string} по {$sport->title}";
        }
        elseif($n)
            return $array[$n];
		else
			return $array;
	}
	
	public function getPostTypeKeys($n=false)
	{
		$array = array_keys($this->post_types);	
		
		if( is_numeric($n) )
			return $array[$n];
		else
			return $array;
	}


    public function rules()
    {
        return array(
            array('email', 'email'),
			array('phone', 'required'),
            array('status, post_slot', 'numerical', 'integerOnly'=>true),
            array('name, phone, email, post_id, post_type', 'length', 'max'=>255),
            array('create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, name, phone, email, post_id, post_type, status, create_time, update_time', 'safe', 'on'=>'search'),
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
            'phone' => 'Телефон',
            'email' => 'E-Mail',
            'post_id' => 'POST_ID',
            'post_type' => 'Тип заявки',
            'status' => 'Статус',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
			'post_type_word' => 'Тип заявки',
			
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('post_id',$this->post_id,true);
		$criteria->compare('post_type',$this->post_type,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array('defaultOrder'=>'create_time DESC'),
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
