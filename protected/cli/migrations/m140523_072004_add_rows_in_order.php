<?php
/**
 * Миграция m140523_072004_add_rows_in_order
 *
 * @property string $prefix
 */
 
class m140523_072004_add_rows_in_order extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'
		public function safeUp()
    {
     
         $this->addColumn('{{orders}}', 'post_slot', 'integer');
       
    }
 
    public function safeDown()
    {
      
        $this->dropColumn('{{orders}}', 'post_slot');
        
    }
 
    /**
     * Удаляет таблицы, указанные в $this->dropped из базы.
     * Наименование таблиц могут сожержать двойные фигурные скобки для указания
     * необходимости добавления префикса, например, если указано имя {{table}}
     * в действительности будет удалена таблица 'prefix_table'.
     * Префикс таблиц задается в файле конфигурации (для консоли).
     */
  
 
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