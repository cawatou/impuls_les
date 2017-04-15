<?php

namespace app\models;

use Yii;

class ItemPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'grade_id', 'price'], 'required'],
            [['item_id', 'grade_id', 'price'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'item_id',
            'grade_id' => 'grade_id',
            'price' => 'price',
        ];
    }
}
