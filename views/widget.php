<?php
/**
 * @var \yii\db\ActiveRecord $model
 * @var \budyaga\cropper\Widget $widget
 *
 */

use yii\helpers\Html;

?>
<style>
    .thumbnail {
        border: none;
        margin-bottom: 10px;
    }
    .flex {
        justify-content: space-around;
        display: flex;
    }
</style>
<div class="cropper-widget">
    <div class="flex">
    <div class="new-photo-area" style="margin: 0; border: none; height: <?= $widget->cropAreaHeight; ?>px; width: <?= $widget->cropAreaWidth; ?>px;">
        <div class="cropper-label">
            <span><?= $widget->label;?></span>
        </div>
    </div>
    <?= Html::activeHiddenInput($model, $widget->attribute, ['class' => 'photo-field']); ?>
    <?= Html::hiddenInput('width', $widget->width, ['class' => 'width-input']); ?>
    <?= Html::hiddenInput('height', $widget->height, ['class' => 'height-input']); ?>
    <?= Html::img(
        $model->{$widget->attribute} != ''
            ? $model->{$widget->attribute}
            : $widget->noPhotoImage,
        [
            'style' => 'height: ' . $widget->thumbnailHeight . 'px; width: ' . $widget->thumbnailWidth . 'px',
            'class' => 'thumbnail',
            'data-no-photo' => $widget->noPhotoImage
        ]
    ); ?>
    </div>
    <div class="cropper-buttons" style="display: inline-block">
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent delete-photo" aria-label="<?= Yii::t('cropper', 'DELETE_PHOTO');?>">
            <i class="mdi mdi-delete"></i><?= Yii::t('cropper', 'DELETE_PHOTO');?>
        </button>
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored crop-photo hidden" aria-label="<?= Yii::t('cropper', 'CROP_PHOTO');?>">
            <i class="mdi mdi-content-cut" aria-hidden="true"></i> <?= Yii::t('cropper', 'CROP_PHOTO');?>
        </button>
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored upload-new-photo hidden" aria-label="<?= Yii::t('cropper', 'UPLOAD_ANOTHER_PHOTO');?>">
            <i class="mdi mdi-camera" aria-hidden="true"></i> <?= Yii::t('cropper', 'UPLOAD_ANOTHER_PHOTO');?>
        </button>
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored save-photo hidden">
            Cохранить
        </button>
    </div>
    <div class="progress hidden" >
        <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
    </div>
</div>