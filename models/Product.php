<?php
namespace app\models;

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    // Define your product attributes here
    public $name;
    public $category_id;
    public $price;

    // Validation rules for your attributes
    public function rules()
    {
        return [
            [['name', 'category_id', 'price'], 'required'],
            [['category_id'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}
