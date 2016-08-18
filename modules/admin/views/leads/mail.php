<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Leads */

$this->title = 'Ответ клиенту';
$this->params['breadcrumbs'][] = ['label' => 'Leads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leads-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formall', [
        'model' => $model,
    ]) ?>

</div>
