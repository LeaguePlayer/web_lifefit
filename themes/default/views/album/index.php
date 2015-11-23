<div class="actions">
	<div class="fix-width album">
		<div class="items">
		<?
			if ($models){
				foreach ($models as $key => $data) {
					$this->renderPartial('_glr',array('data'=>$data));
				}
			} else {?>
				<p class="empty">Раздел наполняется!</p>
			<?}
		?>
			<div class="item"></div>
			<div class="item"></div>
		</div>
	</div>
</div>
