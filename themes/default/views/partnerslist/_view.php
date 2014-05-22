<div class="partner">
    <div class="img_div">
       <? echo ($data->link) ? CHtml::link($data->getImage('small'), "http://{$data->link}", array('target'=>'_blank')) : $data->getImage('small'); ?>
    </div>
    <div class="title_div"><? echo ($data->link) ? CHtml::link($data->title, "http://{$data->link}", array('target'=>'_blank')) : $data->title; ?></div>
</div>