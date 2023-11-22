<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proposal".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $telefon
 * @property int|null $category_id
 * @property int|null $status
 * @property int|null $circle_id
 * @property string|null $image
 * @property int $user_id
 *
 * @property Category $category
 * @property Circle $circle
 * @property User $user
 */
class Proposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proposal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname',  'telefon'], 'required'],
            [['category_id', 'status', 'circle_id', 'user_id'], 'integer'],
            [['name', 'surname', 'patronymic', 'telefon'], 'string', 'max' => 256],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['circle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Circle::class, 'targetAttribute' => ['circle_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['user_id', 'default', 'value'=>Yii::$app->user->getId()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'telefon' => Yii::t('app', 'Телефон'),
            'category_id' => Yii::t('app', 'Возраст'),
            'status' => Yii::t('app', 'Status'),
            'circle_id' => Yii::t('app', 'Кружок'),
            'image' => Yii::t('app', 'Image'),
            'user_id' => Yii::t('app', 'User ID'),
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 1:
                return 'Ожидание';
            case 2:
                return 'Принято';
            case 3:
                return 'Отклонено';
        }
    }

    public function good()
    {
        $this->status=2;
        return $this->save(false);
    }

    public function verybad()
    {
        $this->status=1;
        return $this->save(false);
    }
}
