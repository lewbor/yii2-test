<h3>Добавление задачи</h3>

<?php use app\models\Task;
use yii\helpers\ArrayHelper;use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var Task $entity
 * @var Task[] $tasks
 */
$form = ActiveForm::begin(); ?>

<?= $form->field($entity, 'title')->label('Название') ?>

<?= $form->field($entity, 'description')->textarea()->label('Описание') ?>

<?= $form->field($entity, 'parent')->label('Родительская задача')->dropDownList(
        ArrayHelper::map($tasks,'id',fn($task) => sprintf('%d - %s', $task->id, $task->title)), ['promt' => 'Родительская задача']
)?>

<div class="form-group">
    <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>