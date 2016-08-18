<?php
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);
use yii\helpers\Html;
use yii\widgets\ActiveForm;
Use app\components\MenuCategoryWidget;
Use app\components\BrandMenuWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">
<?php //debug($model);?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <hr/>
    <h4>Основная информация о товаре:</h4>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendor_code')->textInput(['disabled' => 'disabled']) ?>

    <div class="form-group field-categories-parent_id has-success">
        <label class="control-label" for="products_category_id">Категория</label>
        <select id="products_category_id" class="form-control" name="Products[category_id]">
            <option value="0">Выберите категорию</option>
            <?= MenuCategoryWidget::widget(['tpl' => 'list', 'model' => $model]) ?>
        </select>
        <div class="help-block"></div>
    </div>

    <div class="form-group field-categories-parent_id has-success">
        <label class="control-label" for="products_brand_id">Бренд</label>
        <select id="products_brand_id" class="form-control" name="Products[brand_id]">
            <option value="0">Выберите бренд</option>
            <?= BrandMenuWidget::widget(['tpl' => 'list', 'model' => $model]) ?>
        </select>
        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'data_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ]
      ),
    ]); ?>
    <hr/>
    <?= $form->field($model, 'data_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['type' => 'number', 'step' => 100]) ?>
    <hr/>
    <h4>Информация о состоянии товара:</h4>
    <?= $form->field($model, 'is_new')->checkbox() ?>

    <?= $form->field($model, 'in_stock')->checkbox() ?>

    <?= $form->field($model, 'hit')->checkbox() ?>

    <?= $form->field($model, 'recomended')->checkbox() ?>

    <?= $form->field($model, 'discount')->checkbox() ?>
    <hr/>
    <h4>Загрузка изображений:</h4>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?php $img = $model->getImage(); ?>
    <img src="<?php echo $img ? $img->getUrl() : '/images/products/no-images.png'?>" width="150px" id="img_delete" data-id="<?= $model->id; ?>">
    <?php unset($img); ?>
    <p><span style="color: red">*</span> Если у товара только одно главное изображение, то загружать тут, минуя загрузку галереи</p>
    <p><span style="color: red">**</span> Удалить можно кликнув на изображение</p>
    <p><span style="color: red">***</span> Удалить все изображения можно в разделе добавления галереи</p>
    <hr/>

    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
    <div class="img_box">
        <?php $imgs = $model->getImages(); //debug($img); ?>
        <?php
        if ($imgs){
            $html = '';
            foreach ($imgs as $img){
                if ($img->isMain == 1) continue;
                $html .= "<img src='{$img->getUrl()}' width='150px' > ";
            }
            echo $html;
        }

        ?>
        <?php unset($imgs); ?>
    </div>
    <p id="images_delete" data-id='<?= $model->id; ?>'><span class="glyphicon glyphicon-remove-sign" style="color: red"></span>Удалить все изображения товара</p>
    <p><span style="color: red">* !</span> Нельзя одновременно загружать отдельно основное фото и галерею!</p>
    <p><span style="color: red">**</span> Загружать можно не более 6 фото одновременно</p>
    <p><span style="color: red">***</span> Первое (по номеру/названию) фото автоматически становится основным, остальные галереей</p>
    <p><span style="color: red">****</span> Если основное фото уже было до этого, то изменения коснутся только галереи</p>
    <?//= $form->field($model, 'raiting')->textInput() ?>

    <?//= $form->field($model, 'rait_count')->textInput() ?>

    <?//= $form->field($model, 'created')->textInput() ?>

    <?//= $form->field($model, 'modified')->textInput() ?>
<hr/>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
