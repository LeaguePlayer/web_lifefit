<?php

class EmployeController extends AdminController
{
    public function actionCreate($list_id)
    {
        $model = new Employe();
        $model->list_id = $list_id;

        if(isset($_POST['Employe']))
        {
            $model->attributes = $_POST['Employe'];
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/employelist/update', 'id'=>$model->list_id));
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Employe', $id);

        if (isset($_POST['Employe']['deletePhoto'])) {
            $model->deletePhoto();
            if ( Yii::app()->request->isAjaxRequest ) {
                Yii::app()->end();
            }
        }

        if(isset($_POST['Employe']))
        {
            $model->attributes = $_POST['Employe'];
            $success = $model->save();
            if( $success ) {
                $this->redirect(array('/admin/employelist/update', 'id'=>$model->list_id));
            }
        }
        $this->render('update', array('model' => $model));
    }
}
