<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property string $description
 * @property string $picture
 * @property integer $id_mnue
 *
 * @property Menu $idMnue
 * @property OrderItem[] $orderItems
 */
class Item extends \yii\db\ActiveRecord
{
    public $file;
    public $restaurant_name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'description'], 'required'],
            [['price', 'id_mnue'], 'integer'],
            [['picture'],'file','extensions'=>'png,jpg,gif'],
            [['name', 'description', 'picture'], 'string', 'max' => 255],
            [['restaurant_name'], 'safe'],
            [['id_mnue'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['id_mnue' => 'id']],
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
            'price' => 'Price',
            'description' => 'Description',
            'picture' => 'Picture',
            'id_mnue' => 'Id Mnue',
            'restaurant_name' => 'Restaurant Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMnue()
    {
        return $this->hasOne(Menu::className(), ['id' => 'id_mnue']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['id_item' => 'id']);
    }
}
