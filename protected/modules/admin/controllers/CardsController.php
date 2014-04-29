<?php

class CardsController extends AdminController
{
	public function actionCreate($list_id)
    {
        $model = new Cards();
        $model->list_id = $list_id;
		
		//SiteHelper::mpr($_POST);
		
		// generation price cards model before first render
		$array_pricecards = array();
		foreach ( Cards::getSlots() as $id_slot => $value )
		{
			$array_pricecards[$id_slot] = new Pricecards;
			//$array_pricecards[$id_slot]['model'] = new Pricecards;
		}
		
		$validate = true;
		if(isset($_POST['Pricecards']))
        {
			foreach( $_POST['Pricecards'] as $id_slot => $post_pricecard )
			{
				$array_pricecards[$id_slot]->attributes = $post_pricecard;
				$validate = $array_pricecards[$id_slot]->validate() && $validate;
			}
        }
		
        if(isset($_POST['Cards']))
        {
			
            $model->attributes = $_POST['Cards'];
            $validate = $model->validate() && $validate;
        }
		
		if( $validate && isset($_POST['Cards']) && isset($_POST['Pricecards']))
		{
				$model->save(false);
				foreach( $_POST['Pricecards'] as $id_slot => $post_pricecard )
				{
					$array_pricecards[$id_slot]->id_card = $model->id;
					$array_pricecards[$id_slot]->slot = $id_slot;
					$array_pricecards[$id_slot]->save(false);
				}
				
				
				$this->redirect(array("/admin/cardlist/update", 'id'=>$model->list_id));
		}
		
        $this->render('create', array('model' => $model, 'array_pricecards'=>$array_pricecards));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel('Cards', $id);
		
		
		$array_pricecards = array();
		if( count($model->prices) > 0 )
		{
			foreach ( $model->prices as $obj )
			{
				$array_pricecards[$obj->slot] = $obj;
				//$array_pricecards[$id_slot]['model'] = new Pricecards;
			}
		}
		
		
		$validate = true;
		if(isset($_POST['Pricecards']))
        {
			foreach( $_POST['Pricecards'] as $id_slot => $post_pricecard )
			{
				$array_pricecards[$id_slot]->attributes = $post_pricecard;
				$validate = $array_pricecards[$id_slot]->validate() && $validate;
			}
        }
		
		if(isset($_POST['Cards']))
        {
			
            $model->attributes = $_POST['Cards'];
            $validate = $model->validate() && $validate;
        }
		
		if( $validate && isset($_POST['Cards']) && isset($_POST['Pricecards']))
		{
				$model->save(false);
				foreach( $_POST['Pricecards'] as $id_slot => $post_pricecard )
				{
					$array_pricecards[$id_slot]->id_card = $model->id;
					$array_pricecards[$id_slot]->slot = $id_slot;
					$array_pricecards[$id_slot]->save(false);
				}
				
				
				$this->redirect(array("/admin/cardlist/update", 'id'=>$model->list_id));
		}
		
		
        $this->render('update', array('model' => $model, 'array_pricecards'=>$array_pricecards));
    }
}
