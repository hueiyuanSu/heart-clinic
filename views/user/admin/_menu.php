<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\Nav;

?>

<?= Nav::widget([
    'options' => [
        'class' => 'nav-tabs',
        'style' => 'margin-bottom: 15px',
    ],
    'items' => [
        [
            'label' => Yii::t('appuser', 'Users'),
            'url' => ['/user/admin/index'],
        ],
        [
            'label' => Yii::t('appuser', 'Roles'),
            'url' => ['/rbac/role/index'],
            'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
        ],
        [
            'label' => Yii::t('appuser', 'Permissions'),
            'url' => ['/rbac/permission/index'],
            'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
        ],
        // [
        //     'label' => \Yii::t('appuser', 'Rules'),
        //     'url'   => ['/rbac/rule/index'],
        //     'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
        // ],
        [
            'label' => Yii::t('apprbac', 'Create'),
            'items' => [
                [
                    'label' => Yii::t('apprbac', 'New user'),
                    'url' => ['/user/admin/create'],
                ],
                [
                    'label' => Yii::t('apprbac', 'New role'),
                    'url' => ['/rbac/role/create'],
                    'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
                ],
                [
                    'label' => Yii::t('apprbac', 'New permission'),
                    'url' => ['/rbac/permission/create'],
                    'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
                ],
                // [
                //     'label' => \Yii::t('appuser', 'New rule'),
                //     'url'   => ['/rbac/rule/create'],
                //     'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
                // ]
            ],
        ],
    ],
]) ?>
