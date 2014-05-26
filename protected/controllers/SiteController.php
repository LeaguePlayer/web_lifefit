<?php

class SiteController extends FrontController
{
	public $layout = '//layouts/main';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
	    $node = Structure::model()->findByUrl('main');
        $page = $node->getComponent();
        
       
        if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title;
        else
            $this->title = $node->name.' | '.Yii::app()->config->get('app.name');

        Yii::app()->clientScript->registerMetaTag($node->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');
        
        $gallery = $page->getGallery();
        
        
		$this->render('index', array('page'=>$page, 'gallery'=>$gallery));
	}
    
    public function actionBuycard($id_card, $slot)
    {
        if (isset($_POST['Order']))
          {
            header('Content-type: application/json');
            $model = new Orders;
			$model->attributes = $_POST['Order'];
			$model->status = 0;

			if($model->save())
			{
						if($model->name) $message .="Имя: {$model->name}<br>";
						if($model->phone) $message .="Номер телефона: {$model->phone}<br>";
						//if($model->rating) $message .="Оценка: {$model->rating}<br>";
					//	if($model->comment) $message .="Комментарий: {$model->comment}<br>";
						//$message.="{$model->create_time}";
					//	$message.="http://{$_SERVER['SERVER_NAME']}/admin/reviews/update/id/{$model->id}/list_id/{$model->id_list}";

							$date = date('d.m.Y H:i');
							$message .="Время заявки: {$date}<br>";	



						if(SiteHelper::sendMail("Получен новый вопрос/заявка сайта!",$message,"minderov@amobile-studio.ru","no-reply@alextour72.ru")) 
				echo CJSON::encode("OK");
			}
			else
			{
			
				echo CJSON::encode($model->getErrors());	
			}
            die();
          }
          
          
        if(!Yii::app()->request->isAjaxRequest)
            throw new CHttpException('404','error');
       
       
        
        $card_model = Cards::model()->with( array('price'=>array('condition'=>"price.id=:slot_id", 'params'=>array(':slot_id'=>$slot))) )->findByPk($id_card);
        
        if(!$card_model)    
            throw new CHttpException('404','error');
            
        
        $data['id_card'] = $id_card;
        $data['id_slot'] = $slot;
        
        $begin_string = ($card_model->type==Cards::BELONGS_TO_ABONEMENT) ? "Резервирование абонемента" : "Вы выбрали";
           
        $period_card = Cards::getSlotsWithMonth($card_model->price->slot);
        $title = "{$begin_string} {$card_model->name} {$period_card} за {$card_model->price->price} руб";
        
        $this->renderPartial('/site/order/main', array('title'=>$title, 'type'=>'card', 'data'=>$data));
    }
    
    public function actionOrder()
    {
        if(!Yii::app()->request->isAjaxRequest)
            throw new CHttpException('404','error');
       
         if (isset($_POST['Order']))
          {
            header('Content-type: application/json');
            $model = new Orders;
			$model->attributes = $_POST['Order'];
			$model->status = 0;

			if($model->save())
			{
						if($model->name) $message .="Имя: {$model->name}<br>";
						if($model->phone) $message .="Номер телефона: {$model->phone}<br>";
						//if($model->rating) $message .="Оценка: {$model->rating}<br>";
					//	if($model->comment) $message .="Комментарий: {$model->comment}<br>";
						//$message.="{$model->create_time}";
					//	$message.="http://{$_SERVER['SERVER_NAME']}/admin/reviews/update/id/{$model->id}/list_id/{$model->id_list}";

							$date = date('d.m.Y H:i');
							$message .="Время заявки: {$date}<br>";	



				//		if(SiteHelper::sendMail("Получен новый вопрос/заявка сайта!",$message,Yii::app()->config->get('app.email'),"no-reply@alextour72.ru")) 
				echo CJSON::encode("OK");
			}
			else
			{
			
				echo CJSON::encode($model->getErrors());	
			}
            die();
          }
          
        
        $title = "Гостевое занятие";
        
        $this->renderPartial('/site/order/main', array('title'=>$title, 'type'=>'guest'));
    }
    
    public function actionAbout($personal)
    {
        if(!Yii::app()->request->isAjaxRequest)
            throw new CHttpException('404','error');
       
        
          
        $model = Employe::model()->findByPk($personal);
        if(!$model)
            throw new CHttpException('404','error');
            
        $data['model']=$model;
        
        $title = "{$model->name}";
        
        $this->renderPartial('/site/order/main', array('title'=>"$model->surname $model->name", 'type'=>'about', 'data'=>$data));
    }
    
    
 
    
    
    public function actionGoTo($sport)
    {
        if(!Yii::app()->request->isAjaxRequest)
            throw new CHttpException('404','error');
       
         if (isset($_POST['Order']))
          {
            header('Content-type: application/json');
            $model = new Orders;
			$model->attributes = $_POST['Order'];
			$model->status = 0;

			if($model->save())
			{
						if($model->name) $message .="Имя: {$model->name}<br>";
						if($model->phone) $message .="Номер телефона: {$model->phone}<br>";
						//if($model->rating) $message .="Оценка: {$model->rating}<br>";
					//	if($model->comment) $message .="Комментарий: {$model->comment}<br>";
						//$message.="{$model->create_time}";
					//	$message.="http://{$_SERVER['SERVER_NAME']}/admin/reviews/update/id/{$model->id}/list_id/{$model->id_list}";

							$date = date('d.m.Y H:i');
							$message .="Время заявки: {$date}<br>";	



				//		if(SiteHelper::sendMail("Получен новый вопрос/заявка сайта!",$message,Yii::app()->config->get('app.email'),"no-reply@alextour72.ru")) 
				echo CJSON::encode("OK");
			}
			else
			{
			
				echo CJSON::encode($model->getErrors());	
			}
            die();
          }
          
        $model = Sport::model()->findByPk($sport);
        if(!$model)
            throw new CHttpException('404','error');
        
        $title = "Заявка на посещения {$model->title}";
        
        $this->renderPartial('/site/order/main', array('title'=>$title, 'type'=>'guest'));
    }
    
    public function actionThankyou()
    {
        if(!Yii::app()->request->isAjaxRequest)
            throw new CHttpException('404','error');
        
        $title = "Спасибо что выбрали LifeFit!";
        
        $this->renderPartial('/site/order/main', array('title'=>$title, 'type'=>'thanks'));
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout='//layouts/error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}