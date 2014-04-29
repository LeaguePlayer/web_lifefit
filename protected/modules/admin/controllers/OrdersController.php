<?php

class OrdersController extends AdminController
{
	public function actionCreate()
    {
        
        $this->redirect(array('/admin/orders/list'));
            
    }
	
	public function actionUpdate($id)
    {
        $model = $this->loadModel('Orders', $id);
        if(isset($_POST['Orders']))
        {
            $model->attributes = $_POST['Orders'];
            $success = $model->save();
            if( $success ) {
               $this->redirect(array('/admin/orders/list'));
                
            }
        }
		
		$model->post_type_word = $model->getPostType( $model->post_type );
		
        $this->render('update', array('model' => $model));
    }
}
