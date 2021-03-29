<?php

namespace app\models;

use DateTime;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "balance".
 *
 * @property int $id
 * @property float|null $amount
 * @property int|null $user_id
 *
 * @property User $user
 */
class Balance extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName():string
    {
        return 'balance';
    }

    /**
     * @return array
     */
    public function rules():array
    {
        return [
            [['amount'], 'number'],
            [['user_id'], 'integer'],
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
            'user_id' => 'User ID',
        ];
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

    /**
     * Returns the balance for the selected period.
     * The default is for the current month.
     *
     * @param string|null $startDate
     * @param string|null $endDate
     *
     * @return float|integer
     */
    public function getBalanceByPeriod(?string $startDate, ?string $endDate)
    {
        if (null === $startDate || null === $endDate) {
            $firstDay = new DateTime('first day of this month');
            $startDate = $firstDay->format('Y-m-d');
            $lastDay = new DateTime('last day of this month');
            $endDate = $lastDay->format('Y-m-d');
        }
        $operations = Operation::getOperationsByPeriod($startDate, $endDate);

        $summaryAmount = [];
        /** @var Operation $operation */
        foreach ($operations as $operation) {
            $summaryAmount[] = $operation->type ? $operation->amount : -($operation->amount);
        }

        return array_sum($summaryAmount);
    }
}
