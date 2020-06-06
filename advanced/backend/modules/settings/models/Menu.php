<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $id_restaurant
 *
 * @property Item[] $items
 * @property Restaurant $idRestaurant
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'id_restaurant'], 'required'],
            [['id_restaurant'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'id_restaurant' => 'Id Restaurant',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['id_mnue' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRestaurant()
    {
        return $this->hasOne(Restaurant::className(), ['id' => 'id_restaurant']);
    }
}
