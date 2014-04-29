<?php
/**
 * Миграция m140428_061351_sport
 *
 * @property string $prefix
 */
 
class m140428_061351_sport extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'
	private $dropped = array('{{sport}}');
 
    public function safeUp()
    {
        $this->_checkTables();
 
        $this->createTable('{{sport}}', array(
            'id' => 'pk', // auto increment

			'list_id' => "integer COMMENT 'LIST_ID'",
			'seo_id' => "integer COMMENT 'SEO_ID'",
			
			
			'title' => "string COMMENT 'Название'",
			'short_desc' => "text COMMENT 'Краткое описание'",
			'wswg_body' => "text COMMENT 'Описание направления'",
			'img_preview_main_slider' => "string COMMENT 'Изображение, которое будет выводится на главной в слайдере'",
			'img_preview_coming_soon' => "string COMMENT 'Изображение, которое будет выводится на главной в ближайшем занятии'",
			
			
			
			
			'status' => "tinyint COMMENT 'Статус'",
			'sort' => "integer COMMENT 'Вес для сортировки'",
            'create_time' => "datetime COMMENT 'Дата создания'",
            'update_time' => "datetime COMMENT 'Дата последнего редактирования'",
        ),
        'ENGINE=MyISAM DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');
    }
 
    public function safeDown()
    {
        $this->_checkTables();
    }
 
    /**
     * Удаляет таблицы, указанные в $this->dropped из базы.
     * Наименование таблиц могут сожержать двойные фигурные скобки для указания
     * необходимости добавления префикса, например, если указано имя {{table}}
     * в действительности будет удалена таблица 'prefix_table'.
     * Префикс таблиц задается в файле конфигурации (для консоли).
     */
    private function _checkTables ()
    {
        if (empty($this->dropped)) return;
 
        $table_names = $this->getDbConnection()->getSchema()->getTableNames();
        foreach ($this->dropped as $table) {
            if (in_array($this->tableName($table), $table_names)) {
                $this->dropTable($table);
            }
        }
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