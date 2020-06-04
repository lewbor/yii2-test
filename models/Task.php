<?php


namespace app\models;


use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * Class Task
 * @package app\models
 * @property string title
 * @property string description
 * @property int user_id
 * @property \DateTime created_at
 * @property ?int parent_id
 */
class Task extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            ['parent_id', 'integer']
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    public function getParent() {
        return $this->hasOne(Task::class, ['id' => 'parent_id'])
            ->from(self::tableName() . 'AS parent');
    }

    public static function forCurrentUser(): array {
        return  Task::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->all();
    }
}