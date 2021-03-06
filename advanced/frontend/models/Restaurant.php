<?php

namespace frontend\models;

use backend\modules\settings\models\Menu;
use backend\modules\settings\models\RestaurantTable;
use backend\modules\settings\models\User;
use backend\modules\settings\models\UserOrder;
use Yii;

/**
 * This is the model class for table "restaurant".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $latitude
 * @property string $longitude
 * @property integer $workTime
 * @property integer $rate
 * @property integer $number_tables
 * @property string $status
 * @property integer $id_owners
 *
 * @property Menu[] $menus
 * @property User $idOwners
 * @property RestaurantTable[] $restaurantTables
 * @property UserOrder[] $userOrders
 */
class Restaurant extends \yii\db\ActiveRecord
{
    public $address;
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            if($this->isNewRecord)
            {
                $this->id_owners=Yii::$app->user->id;
                $this->rate = 5;
            }
            if (!empty($this->address)) {
                $part = explode("@", $this->address);
                if (count($part) == 2) {
                    $this->latitude = $part[0];
                    $this->longitude = $part[1];
                }
            }
            return true;
        }
        return false;


    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'workTime', 'number_tables'], 'required'],
            [['type', 'status'], 'string'],
            [['workTime', 'rate', 'number_tables', 'id_owners'], 'integer'],
            [['name', 'latitude', 'longitude'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['address'],'safe'],
            [['id_owners'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_owners' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'workTime' => 'Work Time',
            'rate' => 'Rate',
            'number_tables' => 'Number Tables',
            'status' => 'Status',
            'id_owners' => 'Id Owners',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['id_restaurant' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOwners()
    {
        return $this->hasOne(User::className(), ['id' => 'id_owners']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantTables()
    {
        return $this->hasMany(RestaurantTable::className(), ['id_restaurant' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrders()
    {
        return $this->hasMany(UserOrder::className(), ['id_rustarurant' => 'id']);
    }
}
