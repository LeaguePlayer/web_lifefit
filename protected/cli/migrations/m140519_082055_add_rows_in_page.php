<?php
/**
 * Миграция m140519_082055_add_rows_in_page
 *
 * @property string $prefix
 */
 
class m140519_082055_add_rows_in_page extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'

    public function safeUp()
    {
         $this->addColumn('{{pages}}', 'map', 'tinyint');
         $this->addColumn('{{pages}}', 'vk_plugin', 'tinyint');
    }
 
    public function safeDown()
    {
        $this->dropColumn('{{pages}}', 'map');
        $this->dropColumn('{{pages}}', 'vk_plugin');
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