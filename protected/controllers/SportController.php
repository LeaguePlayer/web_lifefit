<?php

class SportController extends FrontController
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

	
	public function actionView($alias)
	{
        $model = Sport::model()->find(array( 'condition'=>'alias = :alias and status = :status', 'params'=>array(':alias'=>$alias,':status'=>Sport::STATUS_PUBLISH) ));
       
        if(!$model)
            throw new CHttpException(404,'Запрашиваемое направление не найдено');
            
        $this->breadcrumbs =  array(
									"Расписание занятий"=>$model->list->node->getUrl(),
								    $model->title,
								 );;
            
		$this->render('view',array(
			'model'=>$model,
            
		));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Sport');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
