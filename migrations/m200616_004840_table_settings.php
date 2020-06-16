<?php

use yii\db\Migration;

/**
 * Class m200616_004840_table_settings
 */
class m200616_004840_table_settings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = 'CREATE TABLE settings (
            id INT AUTO_INCREMENT PRIMARY KEY,
            host varchar(30) null,
            username varchar(30) null,
            password varchar(30) null,
            db_name varchar(30) null,
        )';

        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $sql = 'DROP TABLE settings;';

        Yii::$app->db->createCommand($sql)->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200616_004840_table_settings cannot be reverted.\n";

        return false;
    }
    */
}
