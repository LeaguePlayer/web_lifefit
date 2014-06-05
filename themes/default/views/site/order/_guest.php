<form class="guest_form ajaxForm" action="/site/order">

    <input type="hidden" name="Order[post_type]" value="guest" />
    
    <? if($data['id_sport']) { ?>
        <input type="hidden" name="Order[post_id]" value="<? echo $data['id_sport'] ?>" />
    <? } ?>
    
    <? if($data['post_slot']) { ?>
        <input type="hidden" name="Order[post_slot]" value="<? echo $data['post_slot'] ?>" />
    <? } ?>
    
    <div class="row">
        <label>Как вас зовут</label>
        <input type="text" data-field="name" name="Order[name]" placeholder="Иван" />
    </div>
    
    <div class="row">
        <label>Номер телефона</label>
        <input type="text" data-field="phone" name="Order[phone]" placeholder="+7 909 100 20 30" />
    </div>
    
    <div class="row">
        <label>E-mail (не обязательно)</label>
        <input type="text" data-field="email" name="Order[email]" placeholder="example@mail.ru" />
    </div>
    
    <div class="row submit">
        <input type="submit" value="Записаться" />
    </div>
</form>