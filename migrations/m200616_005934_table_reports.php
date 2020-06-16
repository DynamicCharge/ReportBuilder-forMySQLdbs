<?php

use yii\db\Migration;

/**
 * Class m200616_005934_table_reports
 */
class m200616_005934_table_reports extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = 'CREATE TABLE reports (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name varchar(30) null unique,
            custom_headers varchar(30) null,
            table_names varchar(30) null,
            table_header_name varchar(30) null,
            search_items varchar(30) null,
            db_name  varchar(30) null,
        )';

        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $sql = 'DROP TABLE reports;';

        Yii::$app->db->createCommand($sql)->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200616_005934_table_reports cannot be reverted.\n";

        return false;
    }
    */
}
