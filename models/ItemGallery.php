<?php

namespace app\models;

use Yii;

class ItemGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'iitem_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'img'], 'required'],
            [['item_id'], 'integer'],
            [['img'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'ID товара',
            'img' => 'Изображение',
        ];
    }
}
