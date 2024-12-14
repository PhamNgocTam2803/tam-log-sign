<?php
use yii\helpers\Html;

$this->title = 'User Profile';
?>
<div class="user-profile">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><strong>Full Name:</strong> <?= Html::encode($model->fullname) ?></p>
    <p><strong>Email:</strong> <?= Html::encode($model->email) ?></p>
</div>
