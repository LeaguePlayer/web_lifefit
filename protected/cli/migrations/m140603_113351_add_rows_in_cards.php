<?php
/**
 * Миграция m140603_113351_add_rows_in_cards
 *
 * @property string $prefix
 */
 
class m140603_113351_add_rows_in_cards extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'

    public function safeUp()
    {
     
         $this->addColumn('{{cards}}', 'priority', 'tinyint');
         $this->addColumn('{{price_cards}}', 'comment', 'string');
       
    }
 
    public function safeDown()
    {
      
        $this->dropColumn('{{cards}}', 'priority');
        $this->dropColumn('{{price_cards}}', 'comment');
        
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