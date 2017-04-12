<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mail_orders".
 *
 * @property integer $id
 * @property integer $item_id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $comment
 * @property string $date
 */
class MailOrders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mail_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id'], 'integer'],
            [['name'], 'required'],
            [['comment'], 'string'],
            [['date'], 'safe'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'comment' => 'Comment',
            'date' => 'Date',
        ];
    }
}
