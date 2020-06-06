<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property integer $id
 * @property integer $id_order
 * @property integer $id_item
 *
 * @property Item $idItem
 * @property UserOrder $idOrder
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_order', 'id_item'], 'required'],
            [['id_order', 'id_item'], 'integer'],
            [['id_item'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['id_item' => 'id']],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => UserOrder::className(), 'targetAttribute' => ['id_order' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'id_item' => 'Id Item',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'id_item']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrder()
    {
        return $this->hasOne(UserOrder::className(), ['id' => 'id_order']);
    }
}
