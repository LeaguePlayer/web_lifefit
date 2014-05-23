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
        $this->title = Yii::app()->config->get('app.name');
		$this->render('index');
	}
    
    public function actionOrder()
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
    
    public function actionThankyou()
    {
        
        $title = "Спасибо за заявку!";
        
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