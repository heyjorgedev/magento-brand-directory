<?php

/*
|--------------------------------------------------------------------------
| Jorge Murta / Brand Directory 0.0.1 Version Installation
|--------------------------------------------------------------------------
|
| ... A quick explanation here
|
 */

$this->startSetup();

// Set Table Name
$table->setName($this->getTable('jorgemurta_branddirectory/brand'));

/**
 * =============================
 *  Add Table Columns
 * =============================
 * - entity_id
 * - created_at
 * - updated_at
 * - name
 * - url_key
 * - description
 * - visibility
 */
$table->addColumn(
    'entity_id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    10,
    array(
        'auto_increment' => true,
        'unsigned'       => true,
        'nullable'       => false,
        'primary'        => true,
    )
);
$table->addColumn(
    'created_at',
    Varien_Db_Ddl_Table::TYPE_DATETIME,
    null,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'updated_at',
    Varien_Db_Ddl_Table::TYPE_DATETIME,
    null,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'name',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'url_key',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'description',
    Varien_Db_Ddl_Table::TYPE_TEXT,
    null,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'visibility',
    Varien_Db_Ddl_Table::TYPE_BOOLEAN,
    null,
    array(
        'nullable' => false,
    )
);

/**
 * Set the Table Engine and Charset
 */
$table->setOption('type', 'InnoDB');
$table->setOption('charset', 'utf8');

/**
 * Create the table and end the Setup!
 */
$this->getConnection()->createTable($table);

$this->endSetup();
