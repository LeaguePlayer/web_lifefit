<?php

class SportlistController extends AdminController
{
	public function actionCreate()
    {
        $model = new Sportlist;
      //  $model->page_size = 5;
        $success = $model->save();
        if( $success ) {
            $this->redirect(array('/admin/sportlist/update', 'id'=>$model->id));
        } else {
            $this->render('create', array('model' => $model));
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Sportlist', $id);
        $sportFinder = new Sport('search');
        $sportFinder->unsetAttributes();
        if ( isset($_GET['Sport']) ) {
            $sportFinder->attributes = $_GET['Sport'];
        }
        $sportFinder->list_id = $model->id;

        if(isset($_POST['Sportlist']))
        {
            $model->attributes = $_POST['Sportlist'];
            $success = $model->save();
            if( $success ) {
                Yii::app()->user->setFlash('SAVED', 'Настройки сохранены');
            }
        }
        $this->render('update', array(
            'model' => $model,
            'sportFinder' => $sportFinder
        ));
    }
}
