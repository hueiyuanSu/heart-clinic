<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace dektrium\rbac\widgets;

use yii\bootstrap\Nav;

/**
 * Menu widget.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Menu extends Nav
{
    /**
     * @inheritdoc
     */
    public $options = [
        'class' => 'nav-tabs'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $userModuleClass       = 'dektrium\user\Module';
        $isUserModuleInstalled = \Yii::$app->getModule('user') instanceof $userModuleClass;

        $this->items = [
            [
                'label'   => \Yii::t('apprbac', 'Users'),
                'url'     => ['/user/admin/index'],
                'visible' => $isUserModuleInstalled,
            ],
            [
                'label' => \Yii::t('apprbac', 'Roles'),
                'url'   => ['/rbac/role/index'],
            ],
            [
                'label' => \Yii::t('apprbac', 'Permissions'),
                'url'   => ['/rbac/permission/index'],
            ],
            [
                'label' => \Yii::t('apprbac', 'Rules'),
                'url'   => ['/rbac/rule/index'],
            ],
            [
                'label' => \Yii::t('appuser', 'Create'),
                'items' => [
                    [
                        'label'   =>\ Yii::t('appuser', 'New user'),
                        'url'     => ['/user/admin/create'],
                        'visible' => $isUserModuleInstalled,
                    ],
                    [
                        'label' => \Yii::t('appuser', 'New role'),
                        'url'   => ['/rbac/role/create']
                    ],
                    [
                        'label' => \Yii::t('appuser', 'New permission'),
                        'url'   => ['/rbac/permission/create']
                    ],
                    [
                        'label' => \Yii::t('appuser', 'New rule'),
                        'url'   => ['/rbac/rule/create']
                    ]
                ]
            ],
        ];
    }
}
