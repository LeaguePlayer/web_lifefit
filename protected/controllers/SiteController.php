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
        
        $data['page'] = $page;
        $data['node'] = $node;
       
        if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title;
        else
            $this->title = $node->name.' | '.Yii::app()->config->get('app.name');

        Yii::app()->clientScript->registerMetaTag($node->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');
        
        $gallery = array(
                            1 => array('name'=>"Тренажерный зал", 'link'=>'/page/trenazhernyj-zal', 'slogan'=>'Стремление к победе'),
                            2 => array('name'=>"Силовой фитнес", 'link'=>'/page/silovoj-fitnes', 'slogan'=>'Созидание и цель'),
                            3 => array('name'=>"Мягкий фитнес", 'link'=>'/page/myagkij-fitnes', 'slogan'=>'Легкость движения'),
                            4 => array('name'=>"TRX", 'link'=>'/page/trx', 'slogan'=>'Гибкость тела'),
                            5 => array('name'=>"Бокс", 'link'=>'/page/boks', 'slogan'=>'Сила & точность'),
                            6 => array('name'=>"Йога", 'link'=>'/page/joga', 'slogan'=>'Гибкость и душа'),
                            7 => array('name'=>"Танцевальные направление", 'link'=>'/page/tanceval-nye-napravlenie', 'slogan'=>'Движение и совешенство'),
                        );

        $getNextTrain = Sport::getNextTrain();
        
        $card_on_main = Cards::getCardOnMain();

		$this->render('index', array('data'=>$data, 'gallery'=>$gallery,'next_training'=>$getNextTrain, 'card_on_main'=>$card_on_main));
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
			             $model->post_type_word = $model->getPostType( $model->post_type );
						if($model->name) $message .="Имя: {$model->name}<br>";
						if($model->phone) $message .="Номер телефона: {$model->phone}<br>";
                        if($model->phone) $message .="E-mail: {$model->email}<br>";
                        if($model->post_type_word) $message .="Тип заявки: {$model->post_type_word}<br>";
                        
					

							$date = date('d.m.Y H:i');
							$message .="Время заявки: {$date}<br>";	



                if(SiteHelper::sendMail("Получен новый вопрос/заявка сайта!",$message,Yii::app()->config->get('app.mail'),"no-reply@lifefit72.ru")) 
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
           
        $period_card = ($card_model->type==Cards::BELONGS_TO_ABONEMENT) ? Cards::getSlotsWithMonth($card_model->price->slot) : "";
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
						$model->post_type_word = $model->getPostType( $model->post_type );
						if($model->name) $message .="Имя: {$model->name}<br>";
						if($model->phone) $message .="Номер телефона: {$model->phone}<br>";
                        if($model->phone) $message .="E-mail: {$model->email}<br>";
                        if($model->post_type_word) $message .="Тип заявки: {$model->post_type_word}<br>";
                        
					

							$date = date('d.m.Y H:i');
							$message .="Время заявки: {$date}<br>";	



                if(SiteHelper::sendMail("Получен новый вопрос/заявка сайта!",$message,Yii::app()->config->get('app.mail'),"no-reply@lifefit72.ru")) 
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
    
    
 
    
    
    public function actionGoTo($sport, $from_main_page = 0)
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
						$model->post_type_word = $model->getPostType( $model->post_type );
						if($model->name) $message .="Имя: {$model->name}<br>";
						if($model->phone) $message .="Номер телефона: {$model->phone}<br>";
                        if($model->phone) $message .="E-mail: {$model->email}<br>";
                        if($model->post_type_word) $message .="Тип заявки: {$model->post_type_word}<br>";
                        
					

							$date = date('d.m.Y H:i');
							$message .="Время заявки: {$date}<br>";	



                if(SiteHelper::sendMail("Получен новый вопрос/заявка сайта!",$message,Yii::app()->config->get('app.mail'),"no-reply@lifefit72.ru")) 
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
        
        $data['id_sport'] = $sport;
        $data['post_slot'] = $from_main_page;
        
        $this->renderPartial('/site/order/main', array('title'=>$title, 'data'=>$data, 'type'=>'guest'));
    }
    
    public function actionThankyou()
    {
        if(!Yii::app()->request->isAjaxRequest)
            throw new CHttpException('404','error');
            
        $node = Structure::model()->findByUrl('stranica-spasibo');
        $page = $node->getComponent();
        
        $data['page'] = $page;
        $data['node'] = $node;
       
        if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title;
        else
            $this->title = $node->name.' | '.Yii::app()->config->get('app.name');

        Yii::app()->clientScript->registerMetaTag($node->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');
        
        
        $title = "Спасибо что выбрали LifeFit!";
        
        $this->renderPartial('/site/order/main', array('title'=>$title, 'data'=>$data, 'type'=>'thanks'));
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout='//layouts/error';
        $this->title = "Ошибка 404. Страница не была найдена на сайте";
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}