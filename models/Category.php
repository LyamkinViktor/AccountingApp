<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $name
 */
class Category extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName():string
    {
        return 'category';
    }

    /**
     * @return array[]
     */
    public function rules():array
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels():array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
