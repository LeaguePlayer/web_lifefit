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
            array('alias', 'convertation'),
            array('alias', 'unique'),
			array('title, alias', 'required'),
            array('list_id, status, sort', 'numerical', 'integerOnly'=>true),
            array('title, img_preview_main_slider, img_preview_coming_soon', 'length', 'max'=>255),
            array('short_desc, wswg_body, create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, list_id, title, short_desc, wswg_body, img_preview_main_slider, img_preview_coming_soon, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }
    
    public function convertation($attribute,$params)
	{
		$this->{$attribute} = strtolower(SiteHelper::translit($this->title));
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
            'alias'=>"URL",
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
						'adaptiveResize' => array(540, 422),
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
    
    public static function getDayOfClassesEng($n)
	{
		$array = array( "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun" );
		
		return array_search($n, $array);
	}
    
    public static function getTimeOfClasses($n = false)
	{
		$array = array( "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00"   );
		
		if ( is_numeric($n) )
			return $array[$n];
		else
			return $array;
	
    }
    
    public static function generateCell($type_hall, $data)
    {
        
        $div = "<div class='cell busy slise' data-day='{$data[day]}' data-time='{$data[time]}' data-sport='{$data[id_sport]}'>";
            $div .= "<div class='busy_cell'>";
                $div .= "<div class='rel'>";
                        $div .= "<div class='angle {$type_hall}'></div>";
                    $div .= "<div class='title_busy_cell'>{$data[sport]}</div>";
                    
                    $div .= ($data['teacher']) ? "<span>{$data[teacher]}</span>" : "";
                $div .= "</div>";
            $div .= "</div>";
        $div .= "</div>";
        
        return $div;
    }
    
    const SMALL_HALL = 0;
    const BIG_HALL = 1;
    
    public static function getHall($n=false)
    {
        $array = array( self::SMALL_HALL => "Малый зал", self::BIG_HALL => "Большой зал"   );
		
		if ( is_numeric($n) )
			return $array[$n];
		else
			return $array;
    }
    
    public static function getNextTrain()
    {
        $string = "";
        $data=array();
        $today = date('D');
        $time = date('H:i',strtotime("+2 hours"));
        $numeric_today = Sport::getDayOfClassesEng($today);
        $find_all_right_sports = SportSchedule::model()->find( array( 'order'=>'day_of ASC, time_of ASC', 'condition'=>"day_of > :day or (day_of =:day and time_of>=:time)", 'params'=>array(':day'=>$numeric_today,'time'=>$time)) );
        if($find_all_right_sports) 
        {
             if($numeric_today == $find_all_right_sports->day_of)
                $string = "Сегодня вы можете успеть на увлекательные занятия по {$find_all_right_sports->sport->title}.";
             else
             {
                $diff = $find_all_right_sports->day_of- $numeric_today;
                
                switch($diff)
                {
                    case 1:
                         $string = "Завтра вы можете посетить увлекательное занятие по {$find_all_right_sports->sport->title}.";
                    break;
                    case 2:
                         $string = "Запланируйте на послезавтра поход на занятие по {$find_all_right_sports->sport->title}.";
                    break;
                    default:
                          $date_start = date('d.m',strtotime("+{$diff} days"));
                          $string = "Посетите ближайшее занятие {$date_start} по {$find_all_right_sports->sport->title}.";
                    break;
                }
             }
        }
        else // значит тренеровка слева (по дню)
        {
            $find_all_right_sports = SportSchedule::model()->find( array( 'order'=>'day_of ASC, time_of ASC', 'condition'=>"day_of < :day or (day_of = :day and time_of<:time)", 'params'=>array(':day'=>$numeric_today,'time'=>$time)) );
            if($find_all_right_sports) 
            {
                
                        $diff = $numeric_today - $find_all_right_sports->day_of;
                        $string = $diff;
                        $diff_of_weak = 7-$diff;
                        switch($diff_of_weak)
                        {
                            case 1:
                                 $string = "Завтра вы можете посетить увлекательное занятие по {$find_all_right_sports->sport->title}.";
                            break;
                            case 2:
                                 $string = "Запланируйте на послезавтра поход на занятие по {$find_all_right_sports->sport->title}.";
                            break;
                            default:
                                  $date_start = date('d.m',strtotime("+{$diff_of_weak} days"));
                                  $string = "Посетите ближайшее занятие {$date_start} по {$find_all_right_sports->sport->title}.";
                            break;
                        }
                     
            }
        }
        $data['model']=$find_all_right_sports;
        $data['string']=$string;
        
        
        return $data;
    }
    
    
}
