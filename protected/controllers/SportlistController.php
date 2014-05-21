<?php

class SportlistController extends FrontController
{
	public $layout='//layouts/simple';

	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	public function actionView($url)
    {

	   
	   
        $node = Structure::model()->findByUrl($url);
        if ( !$node )
            throw new CHttpException(404, 'Новостей не найдено');
        $cardlist = $node->getComponent();
     //   $dataProvider = $cardlist->cardsSearch(null);
        

        $this->buildMenu($node);

		
 	   $this->breadcrumbs = $node->getBreadcrumbs();
       
       $data['days'] = Sport::getDayOfClasses();
       $data['time'] = Sport::getTimeOfClasses();
       
       $schedules = SportSchedule::model()->with('sport')->findAll( array( 'order'=> 'day_of ASC, time_of ASC' ) );
       
       foreach ($schedules as $schedule)
       {
        if($schedule->sport->status == SportSchedule::STATUS_PUBLISH)
        {
            $data['schedule'][$schedule->id_hall][$schedule->day_of][date('H:i',strtotime($schedule->time_of))]['sport'] = $schedule->sport->title; 
            $data['schedule'][$schedule->id_hall][$schedule->day_of][date('H:i',strtotime($schedule->time_of))]['teacher'] = $schedule->teacher; 
            $data['schedule'][$schedule->id_hall][$schedule->day_of][date('H:i',strtotime($schedule->time_of))]['id_sport'] = $schedule->id_sport; 
            $data['schedule'][$schedule->id_hall][$schedule->day_of][date('H:i',strtotime($schedule->time_of))]['day'] = $schedule->day_of; 
            $data['schedule'][$schedule->id_hall][$schedule->day_of][date('H:i',strtotime($schedule->time_of))]['time'] = date('H:i',strtotime($schedule->time_of)); 
            
        }
       }
        
         
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/js/schedule.js', CClientScript::POS_END);

        if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title;
        else
            $this->title = $node->name.' | '.Yii::app()->config->get('app.name');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');

        $this->render('/sportlist/schedule', array(
            'result'=>$result,
            'node'=>$node,
			'data'=>$data,
        ));
    }

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Sportlist');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
