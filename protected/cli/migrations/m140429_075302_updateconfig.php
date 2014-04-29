<?php
/**
 * Миграция m140429_075302_updateconfig
 *
 * @property string $prefix
 */
 
class m140429_075302_updateconfig extends CDbMigration
{
    
 
    public function safeUp()
    {
         $this->insert("{{config}}", array("param"=>"app.code_city", "value"=>"", "default"=>"", "label"=>"Код города", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.phone", "value"=>"", "default"=>"", "label"=>"Номер телефона", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.street", "value"=>"", "default"=>"", "label"=>"Адрес клуба", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.work_time_weekdays", "value"=>"", "default"=>"", "label"=>"Часы работы в будни", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.work_time_weekend", "value"=>"", "default"=>"", "label"=>"Часы работы в выходные", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.slogan", "value"=>"", "default"=>"", "label"=>"Слоган", "type"=>"string", "variants"=>"") );
		 
		 $this->insert("{{config}}", array("param"=>"app.vk", "value"=>"", "default"=>"", "label"=>"Ссылка на группу в VK", "type"=>"string", "variants"=>"") );
    }
 
    public function safeDown()
    {
        
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