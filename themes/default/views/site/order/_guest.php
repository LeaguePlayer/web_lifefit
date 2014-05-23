<form class="guest_form ajaxForm" action="/site/order" action="POST">


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