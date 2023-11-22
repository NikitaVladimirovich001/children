<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $body
 * @property string $created_at
 * @property int $status
 * @property int $user_id
 * @property int $circle_id
 *
 * @property Circle $circle
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'required'],
            [['body'], 'string'],
            [['created_at'], 'safe'],
            [['status', 'user_id', 'circle_id'], 'integer'],
            [['circle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Circle::class, 'targetAttribute' => ['circle_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['user_id', 'default', 'value'=>Yii::$app->user->getId()]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'body' => Yii::t('app', 'Оставить комментарий'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
            'user_id' => Yii::t('app', 'User ID'),
            'circle_id' => Yii::t('app', 'Circle ID'),
        ];
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
}
