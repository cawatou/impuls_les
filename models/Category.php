<?php

namespace app\models;

use Yii;
use \yii\db\Query;
/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $img
 * @property string $link
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name', 'title', 'img', 'link'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'description' => 'Description',
            'img' => 'Img',
            'link' => 'Link',
        ];
    }

    public function getSidebar(){
        return (new Query)
            ->select('category.*')
            ->from('item, category')
            ->where('category.id = item.cat_id')
            ->distinct()
            ->all();
    }
}
