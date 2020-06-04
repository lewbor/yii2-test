<?php
/** @var Task[] $items */

use app\models\Task;
use yii\helpers\Url;

Yii::$app->formatter->locale = 'ru-RU';
?>
<h3>Список задач <a href="<?= Url::toRoute(['tasks/add']) ?>" class="btn btn-primary">Добавить</a>
</h3>

<table class="table">
    <tr>
        <th>#</th>
        <th></th>
        <th>Название</th>
        <th>Описание</th>
        <th>Родительская задача</th>
        <th>Добавлена в</th>
    </tr>
    <?php foreach ($items as $idx => $item): ?>
        <tr>
            <td><?= $idx + 1 ?></td>
            <th>
                <a href="<?= Url::toRoute(['tasks/edit', 'id' => $item->id]) ?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
            </th>
            <td><?= $item->title ?> </td>
            <td><?= $item->description ?></td>
            <td>
                <?php if ($item->parent !== null): ?>
                    #<?= $item->parent->id ?> - <?= $item->parent->title ?>
                <?php endif; ?>
            </td>
            <td><?= YII::$app->formatter->asDatetime($item->created_at) ?></td>
        </tr>
    <?php endforeach; ?>
</table>