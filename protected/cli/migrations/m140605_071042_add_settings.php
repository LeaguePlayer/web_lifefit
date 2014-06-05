<?php
/**
 * Миграция m140605_071042_add_settings
 *
 * @property string $prefix
 */
 
class m140605_071042_add_settings extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'
	public function safeUp()
    {
         $this->insert("{{config}}", array("param"=>"app.mail", "value"=>"", "default"=>"", "label"=>"Почта администратора (Сюда будут приходить заявки)", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.instagram", "value"=>"", "default"=>"", "label"=>"Ссылка на Instagram", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.fb", "value"=>"", "default"=>"", "label"=>"Ссылка на Facebook", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.skype", "value"=>"", "default"=>"", "label"=>"Ссылка на Skype", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.twitter", "value"=>"", "default"=>"", "label"=>"Ссылка на Twitter", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.copyright", "value"=>"Фитнес-центр Lifefit 2014. Все права защищены", "default"=>"", "label"=>"Копирайт (текст выводится в самом низу)", "type"=>"string", "variants"=>"") );
		 
		
    }
 
    /**
     * Добавляет префикс таблицы при необходимости
     * @param $name - имя таблицы, заключенное в скобки, например {{имя}}
     * @return string
     */
    protected function tableName($name)
    {
        if($this->getDbConnection()->tablePrefix!==null && strpos($name,'{{')!==false)
            $realName=preg_replace('/{{(.*?)}}/',$this->getDbConnection()->tablePrefix.'$1',$name);
        else
            $realName=$name;
        return $realName;
    }
 
    /**
     * Получение установленного префикса таблиц базы данных
     * @return mixed
     */
    protected function getPrefix(){
        return $this->getDbConnection()->tablePrefix;
    }
}