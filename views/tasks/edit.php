<?php use app\models\Task;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var Task $entity */
?>

<h3>Редактирование задачи №<?= $entity->id?></h3>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($entity, 'title')->label('Название') ?>

<?= $form->field($entity, 'description')->textarea()->label('Описание') ?>

<?= $form->field($entity, 'parent_id')->label('Родительская задача')->dropDownList(
    ArrayHelper::map($tasks,'id',fn($task) => sprintf('%d - %s', $task->id, $task->title)), ['prompt' => 'Родительская задача']
)?>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>