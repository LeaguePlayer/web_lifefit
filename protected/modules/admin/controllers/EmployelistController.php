<?php

class EmployelistController extends AdminController
{
    public function actionCreate($node_id)
    {
        $model = new Employelist;
        $node = Structure::model()->findByPk($node_id);
        $model->name = $node->name;
        if( $model->save() ) {
            $this->redirect(array('/admin/employelist/update', 'id'=>$model->id));
        } else {
            throw new CHttpException(403, 'Ошибка сохранения списка сотрудников');
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Employelist', $id);
        $employeFinder = new Employe('search');
        $employeFinder->unsetAttributes();
        if ( isset($_GET['Employe']) ) {
            $employeFinder->attributes = $_GET['Employe'];
        }
        $employeFinder->list_id = $model->id;

        if(isset($_POST['Employelist']))
        {
            $model->attributes = $_POST['Employelist'];
            $success = $model->save();
            if( $success ) {
                $node = Structure::model()->findByPk($model->node_id);
                $node->name = $model->name;
                $node->saveNode();
                Yii::app()->user->setFlash('SAVED', 'Настройки сохранены');
            }
        }
        $this->render('update', array(
            'model' => $model,
            'employeFinder' => $employeFinder
        ));
    }
}
