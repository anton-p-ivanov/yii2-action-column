<?php
/**
 * @author Anton Ivanov (https://github.com/yapi68/)
 * @link https://github.com/yapi68/yii2-action-column#readme
 * @license https://github.com/yapi68/yii2-action-column/blob/master/LICENSE
 */

namespace yapi68\actioncolumn;

use yii\grid\Column;
use yii\helpers\Url;
use yii\widgets\Menu;

/**
 * Class ActionColumn
 * @package yapi68\actioncolumn
 */
class ActionColumn extends Column
{
    /**
     * @var array|\Closure dropdown menu items
     */
    public $items;
    /**
     * @var string widget container class
     */
    public $containerClass = 'dropdown action-column';
    /**
     * @var string dropdown menu container class
     */
    public $itemsContainerClass = 'dropdown-menu';
    /**
     * @var string column header
     */
    public $header = '<i class="fa fa-bars"></i>';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        \Yii::setAlias('actioncolumn', __DIR__);

        ActionColumnAsset::register(\Yii::$app->controller->view);
    }

    /**
     * Set default dropdown menu items
     * @param mixed $key the key associated with the data model
     * @return array dropdown menu items array
     */
    protected function initDefaultItems($key)
    {
        return [
            [
                'label' => 'View',
                'url' => Url::to(['view', 'id' => $key]),
            ],
            [
                'label' => 'Edit',
                'url' => Url::to(['edit', 'id' => $key]),
            ],
            [
                'label' => 'Copy',
                'url' => Url::to(['copy', 'id' => $key]),
            ],
            [
                'label' => '',
                'url' => null,
                'options' => ['class' => 'divider']
            ],
            [
                'label' => 'Delete',
                'url' => Url::to(['delete', 'id' => $key]),
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        $toggle = '<span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
            . '<i class="fa fa-bars text-muted"></i></span>';

        $items = $this->items;

        if ($this->items instanceof \Closure) {
            $items = call_user_func($this->items, $model, $key, $index);
        }

        $nav = Menu::widget([
            'items' => $items ?: $this->initDefaultItems($key),
            'options' => [
                'class' => $this->itemsContainerClass,
                'role' => 'menu'
            ]
        ]);

        return "<div class=\"$this->containerClass\">$toggle$nav</div>";
    }
}
