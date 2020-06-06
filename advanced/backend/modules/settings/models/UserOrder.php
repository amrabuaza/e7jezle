<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "user_order".
 *
 * @property integer $id
 * @property string $date
 * @property integer $bill
 * @property integer $id_rustarurant
 * @property integer $id_table
 * @property integer $id_user
 *
 * @property OrderItem[] $orderItems
 * @property Restaurant $idRustarurant
 * @property RestaurantTable $idTable
 * @property User $idUser
 */
class UserOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'bill', 'id_rustarurant', 'id_table', 'id_user'], 'required'],
            [['date'], 'safe'],
            [['bill', 'id_rustarurant', 'id_table', 'id_user'], 'integer'],
            [['id_rustarurant'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurant::className(), 'targetAttribute' => ['id_rustarurant' => 'id']],
            [['id_table'], 'exist', 'skipOnError' => true, 'targetClass' => RestaurantTable::className(), 'targetAttribute' => ['id_table' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'bill' => 'Bill',
            'id_rustarurant' => 'Id Rustarurant',
            'id_table' => 'Id Table',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['id_order' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRustarurant()
    {
        return $this->hasOne(Restaurant::className(), ['id' => 'id_rustarurant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTable()
    {
        return $this->hasOne(RestaurantTable::className(), ['id' => 'id_table']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
