<?php

class CardlistController extends AdminController
{
	 public function actionCreate()
    {
        $model = new Cardlist;
        $model->page_size = 10;
        $success = $model->save();
        if( $success ) {
            $this->redirect(array('/admin/cardlist/update', 'id'=>$model->id));
        } else {
            $this->render('create', array('model' => $model));
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Cardlist', $id);
        $cardsFinder = new Cards('search');
        $cardsFinder->unsetAttributes();
        if ( isset($_GET['Cards']) ) {
            $cardsFinder->attributes = $_GET['Cards'];
        }
        $cardsFinder->list_id = $model->id;

        if(isset($_POST['Cardlist']))
        {
            $model->attributes = $_POST['Cardlist'];
            $success = $model->save();
            if( $success ) {
                Yii::app()->user->setFlash('SAVED', 'Настройки сохранены');
            }
        }
        $this->render('update', array(
            'model' => $model,
            'cardsFinder' => $cardsFinder
        ));
    }
}
