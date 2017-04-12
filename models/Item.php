<?php

namespace app\models;

use Yii;

class Item extends \yii\db\ActiveRecord
{
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
            [['name', 'width', 'thickness'], 'required'],
            [['cat_id', 'width', 'thickness'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['manufacturer', 'wood', 'wet', 'size', 'grade', 'img', 'title'], 'string', 'max' => 255],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'cat_id' => 'Категория',
            'img' => 'Изображение',
            'manufacturer' => 'Производиель',
            'wood' => 'Порода дерева',
            'wet' => 'Влажность',
            'size' => 'Размеры',
            'grade' => 'Сортность',
            'title' => 'Заголовок',
            'description' => 'Описание',
        ];
    }
}
