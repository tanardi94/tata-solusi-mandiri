<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_details".
 *
 * @property int $id
 * @property int $product_id
 * @property int|null $parent_id
 * @property int|null $level
 * @property string|null $specification
 * @property string|null $key
 * @property string|null $value
 * @property int|null $status
 * @property string $created_at
 * @property int|null $created_by
 * @property string $updated_at
 * @property int|null $updated_by
 *
 * @property ProductDetails $parent
 * @property Product $product
 * @property ProductDetails[] $productDetails
 */
class ProductDetails extends \frontend\models\CustomActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['product_id', 'parent_id', 'level', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['specification', 'key', 'value'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductDetails::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'parent_id' => 'Parent ID',
            'level' => 'Level',
            'specification' => 'Specification',
            'key' => 'Key',
            'value' => 'Value',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ProductDetails::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * Gets query for [[ProductDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductDetails()
    {
        return $this->hasMany(ProductDetails::className(), ['parent_id' => 'id']);
    }
}
