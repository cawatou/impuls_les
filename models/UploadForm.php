<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $imageFile, $document;

    /**
     * @return array the validation rules.
     */
    public function rules(){
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['document'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload_img(){
        if ($this->validate()) {
            $this->imageFile->saveAs('upload/' . $this->imageFile->baseName .'.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }


    public function upload_gallary(){
        if ($this->validate()) {          
            $this->imageFile->saveAs('upload/gallery/'. $this->imageFile->baseName .'.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
    
    public function upload_slider(){
        if ($this->validate()) {          
            $this->imageFile->saveAs('upload/slider/'. $this->imageFile->baseName .'.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
    
}
?>