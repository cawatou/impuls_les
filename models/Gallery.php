<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property integer $item_id
 * @property string $src
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'src', 'title'], 'required'],
            [['cat_id'], 'integer'],
            [['src'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'cat_id' => 'Категория',
            'src' => 'Изображение',
            'catName' => 'Категория',
        ];
    }
    
    public function getCat()
    {
	return $this->hasOne(GalleryCat::className(), ['id' => 'cat_id']);
    }
    
    /* Геттер для названия страны */
    public function getCatName() {
	return $this->cat->title;
    }
}
