<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "operation".
 *
 * @property int $id
 * @property float|null $amount
 * @property string|null $created_at
 * @property int|null $user_id
 * @property int|null $category_id
 *
 * @property Category $category
 * @property User $user
 */
class Operation extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName():string
    {
        return 'operation';
    }

    /**
     * @return array
     */
    public function rules():array
    {
        return [
            [['amount'], 'number'],
            [['created_at'], 'safe'],
            [['user_id', 'category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels():array
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'created_at' => 'Created At',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getCategory():ActiveQuery
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser():ActiveQuery
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
