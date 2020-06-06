<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "restaurant_table".
 *
 * @property int $id
 * @property int $capacity
 * @property string $state
 * @property string $reservation_code
 * @property int $number_of_table
 * @property int $id_restaurant
 *
 * @property Restaurant $restaurant
 * @property UserOrder[] $userOrders
 */
class RestaurantTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurant_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capacity', 'number_of_table', 'id_restaurant'], 'required'],
            [['capacity', 'number_of_table', 'id_restaurant'], 'integer'],
            [['state'], 'string'],
            [['reservation_code'], 'string', 'max' => 255],
            [['id_restaurant'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurant::className(), 'targetAttribute' => ['id_restaurant' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'capacity' => 'Capacity',
            'state' => 'State',
            'reservation_code' => 'Reservation Code',
            'number_of_table' => 'Number Of Table',
            'id_restaurant' => 'Id Restaurant',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurant::className(), ['id' => 'id_restaurant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrders()
    {
        return $this->hasMany(UserOrder::className(), ['id_table' => 'id']);
    }
}
