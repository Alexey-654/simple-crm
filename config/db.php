<?php

$pathToDB = __DIR__ . "/../sqlite.db";

return [
    'class' => 'yii\db\Connection',
    "dsn" => "sqlite:$pathToDB"
    // 'username' => 'root',
    // 'password' => '',
    // 'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
