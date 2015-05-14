<?php
/**
 * @author Anton Ivanov (https://github.com/yapi68/)
 * @link https://github.com/yapi68/yii2-action-column#readme
 * @license https://github.com/yapi68/yii2-action-column/blob/master/LICENSE
 */

namespace yapi68\actioncolumn;

use yii\web\AssetBundle;

/**
 * Class ActionColumnAsset
 * @package yapi68\actioncolumn
 */
class ActionColumnAsset extends AssetBundle
{
    public $sourcePath = '@actioncolumn/assets';
    public $baseUrl = '@web';
    public $css = [
        'ActionColumn.css',
        '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset'
    ];
}
