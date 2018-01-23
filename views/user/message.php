<?php
use yii\helpers\Html;
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var yii\web\View $this
 * @var dektrium\user\Module $module
 */

$this->title = $title;
?>

<?= $this->render('/_alert', ['module' => $module]); ?>
<?php
if(Yii::$app->user->isGuest){
?>
<p class="text-center">
    <?= Html::a(Yii::t('appuser', 'Already registered? Sign in!'), ['/user/security/login']) ?>
</p>
<?php } ?>
