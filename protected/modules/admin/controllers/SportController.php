<?php

class SportController extends AdminController
{
	public function actionCreate($list_id)
    {
		$timepickerassets = Yii::app()->assetManager->publish( Yii::getPathOfAlias("yiiwheels.widgets.timepicker.assets") );
		Yii::app()->clientScript->registerCssFile("{$timepickerassets}/css/bootstrap-timepicker.css", CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/js/jquery.ui.timepicker.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/js/sport.js', CClientScript::POS_END);
		
        $model = new Sport();
        $model->list_id = $list_id;

	
		// generation price cards model before first render
		
		
		
		$validate = true;
		$make_free_slot = true;
		if(isset($_POST['Schedule']))
        {
			foreach( $_POST['Schedule'] as $id_slot => $post_schedule )
			{
				if( !empty ( $post_schedule['time_of'] ) )
				{
					$array_schedule[$id_slot] = new SportSchedule;
					$array_schedule[$id_slot]->attributes = $post_schedule;
					$validate = $array_schedule[$id_slot]->validate() && $validate;
					
					$make_free_slot = false;
				}
				
				
				//SiteHelper::mpr($post_schedule);
			}
			
        }
		
			
		
		
		
        if(isset($_POST['Sport']))
        {
			
            $model->attributes = $_POST['Sport'];
            $validate = $model->validate() && $validate;
        }
		
		
		if( $validate && isset($_POST['Sport']) && isset($_POST['Schedule']))
		{
				$model->save(false);
				
				
				if( count($array_schedule) > 0 )
				{
					foreach( $array_schedule as $object )
					{
						$object->id_sport = $model->id;
						//$array_pricecards[$id_slot]->attributes = $id_slot;
						$object->save(false);
					}
				}
				
				$this->redirect(array("/admin/sportlist/update", 'id'=>$model->list_id));
		}
		
		
		if($make_free_slot) $array_schedule = array( 1 => new SportSchedule );
       
        $this->render('create', array('model' => $model, 'array_schedule'=>$array_schedule));
    }

    public function actionUpdate($id)
    {
		$timepickerassets = Yii::app()->assetManager->publish( Yii::getPathOfAlias("yiiwheels.widgets.timepicker.assets") );
		Yii::app()->clientScript->registerCssFile("{$timepickerassets}/css/bootstrap-timepicker.css", CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/js/jquery.ui.timepicker.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/js/sport.js', CClientScript::POS_END);
		
        $model = $this->loadModel('Sport', $id);
        $validate = true;
		$make_free_slot = true;
		
		$array_schedule = array();
		$array_exist_id = array();
		
		
		if(isset($_POST['Schedule']))
        {
			foreach( $_POST['Schedule'] as $id_slot => $post_schedule )
			{
				if( !empty ( $post_schedule['time_of'] ) )
				{
					$array_schedule[$id_slot] = (!empty($post_schedule['id'])) ? SportSchedule::model()->findByPk($post_schedule['id']) : new SportSchedule;
					$array_schedule[$id_slot]->attributes = $post_schedule;
					$validate = $array_schedule[$id_slot]->validate() && $validate;
					
					if( isset($array_schedule[$id_slot]->id) ) $array_exist_id[] = $array_schedule[$id_slot]->id;
					
					$make_free_slot = false;
				}
				
				
				//SiteHelper::mpr($post_schedule);
			}
			
        }
		else
		{
			if( count($model->schedule) > 0 )
			{
				foreach ( $model->schedule as $obj )
				{
					$array_schedule[$obj->id] = $obj;
					//$array_pricecards[$id_slot]['model'] = new Pricecards;
				}
				
				$make_free_slot = false;
			}
		}
		
			
		//SiteHelper::mpr($array_exist_id);
		
		
        if(isset($_POST['Sport']))
        {
			
            $model->attributes = $_POST['Sport'];
            $validate = $model->validate() && $validate;
        }
		
		
		if( $validate && isset($_POST['Sport']) && isset($_POST['Schedule']))
		{
				$model->save(false);
				
				// удаляем расписание
				if( count($array_exist_id) > 0 )
				{
					$array_id_exist_string = implode(", ", $array_exist_id);
					
						SportSchedule::model()->deleteAll("id not in ({$array_id_exist_string}) and id_sport = {$model->id}");
				}
				
				if( count($array_schedule) > 0 )
				{
					foreach( $array_schedule as $object )
					{
						$object->id_sport = $model->id;
						//$array_pricecards[$id_slot]->attributes = $id_slot;
						$object->save(false);
					}
				}
				
				
				
				$this->redirect(array("/admin/sportlist/update", 'id'=>$model->list_id));
				
		}
		
		
		if($make_free_slot) $array_schedule = array( 1 => new SportSchedule );
		
		
		
        $this->render('update', array('model' => $model, 'array_schedule'=>$array_schedule));
    }
}
