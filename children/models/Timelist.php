<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timelist".
 *
 * @property int $id
 * @property int|null $circle_id
 * @property int|null $category_id
 * @property string|null $data
 * @property string|null $time
 *
 * @property Category $category
 * @property Circle $circle
 */
class Timelist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timelist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['circle_id', 'category_id'], 'integer'],
            [['data', 'time'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['circle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Circle::class, 'targetAttribute' => ['circle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'circle_id' => Yii::t('app', 'Circle ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'data' => Yii::t('app', 'Data'),
            'time' => Yii::t('app', 'Time'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Circle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCircle()
    {
        return $this->hasOne(Circle::class, ['id' => 'circle_id']);
    }
}
