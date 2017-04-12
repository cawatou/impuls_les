<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_slider".
 *
 * @property integer $id
 * @property string $title
 * @property string $img
 * @property string $link
 */
class MainSlider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'img'], 'required'],
            [['title', 'img', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'img' => 'Img',
            'link' => 'Link',
        ];
    }
}
