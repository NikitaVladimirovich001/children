<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "circle".
 *
 * @property int $id
 * @property string $name
 * @property string $opisanie
 * @property string $age
 * @property int $category_id
 * @property string $image
 *
 * @property Category $category
 * @property Comment[] $comments
 * @property Proposal[] $proposals
 * @property Timelist[] $timelists
 */
class Circle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'circle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'opisanie', 'age', 'category_id', 'image'], 'required'],
            [['opisanie'], 'string'],
            [['category_id'], 'integer'],
            [['name', 'age'], 'string', 'max' => 256],
            [['image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'opisanie' => Yii::t('app', 'Opisanie'),
            'age' => Yii::t('app', 'Age'),
            'category_id' => Yii::t('app', 'Category ID'),
            'image' => Yii::t('app', 'Image'),
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
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['circle_id' => 'id']);
    }

    /**
     * Gets query for [[Proposals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProposals()
    {
        return $this->hasMany(Proposal::class, ['circle_id' => 'id']);
    }

    /**
     * Gets query for [[Timelists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTimelists()
    {
        return $this->hasMany(Timelist::class, ['circle_id' => 'id']);
    }
}
