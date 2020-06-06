<?php


namespace app\models;
use yii\db\ActiveRecord;

class Settings extends ActiveRecord
{

    public function rules()
    {
        return [
          ['host', 'safe'],
          ['username', 'safe'],
          ['password', 'safe'],
          ['db_name', 'safe'],
        ];
    }

}