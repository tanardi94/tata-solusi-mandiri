<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_images".
 *
 * @property int $id
 * @property int $product_id
 * @property string $image
 * @property int $seq
 * @property int|null $status
 * @property string $created_at
 * @property int|null $created_by
 * @property string $updated_at
 * @property int|null $updated_by
 *
* @property Product $product
 */
class ProductImages extends \frontend\models\CustomActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $imageFile;
    public static function tableName()
    {
        return 'product_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'image', 'seq'], 'required'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => 'update'],
            [['product_id', 'seq', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['image'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'image' => 'Image',
            'seq' => 'Seq',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function deleteImage()
    {
        $image = Yii::getAlias(Yii::$app->params['storage'] . '/uploads/product/') . $this->photo;
        if(unlink($image)) {
            $this->photo = null;
            $this->save();
            return true;
        }
        return false;
    }
}
