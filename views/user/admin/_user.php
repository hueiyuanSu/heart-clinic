<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\User $user
 */
 $flagOptions = array(
     '0'=>Yii::t('appuser', 'Flag off'),
     '1'=>Yii::t('appuser', 'Flag on')
 );
?>

<?= $form->field($user, 'email')->textInput(['maxlength' => 255])->label(Yii::t('appuser', 'Email')); ?>
<?= $form->field($user, 'username')->textInput(['maxlength' => 255])->label(Yii::t('appuser', 'Username')); ?>
<?= $form->field($user, 'password')->passwordInput()->label(Yii::t('appuser', 'Password')); ?>
<!-- <?=
    $form->field($user, 'flags')
        ->dropDownList($flagOptions,['options' =>
                [
                  $user->flags => ['selected' => true]
                ]
      ]
    )->label(Yii::t('appuser', 'Flags'));
?> -->
