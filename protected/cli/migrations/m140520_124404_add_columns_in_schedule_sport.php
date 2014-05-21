<?php
/**
 * Миграция m140520_124404_add_columns_in_schedule_sport
 *
 * @property string $prefix
 */
 
class m140520_124404_add_columns_in_schedule_sport extends CDbMigration
{
    
    public function safeUp()
    {
       $this->addColumn('{{sport_schedule}}', 'teacher', 'string');
       $this->addColumn('{{sport_schedule}}', 'id_hall', 'tinyint');
    }
 
    public function safeDown()
    {
        $this->dropColumn('{{sport_schedule}}', 'wswg_content');
        $this->dropColumn('{{sport_schedule}}', 'id_hall');
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