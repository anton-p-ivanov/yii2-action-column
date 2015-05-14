# yii2-action-column
Action column with dropdown menu for Yii 2.x GridView widget

## How to use
    <?= \yii\grid\GridView::widget([
        'dataProvider' => ...,
        'columns' => [
            ['class' => \yii\grid\CheckboxColumn::className()],
            ['class' => \yapi68\actioncolumn\ActionColumn::className()],
            ...
        ]
    ]); ?>

## Options
| Option | Type | Description |
|--------|-------------|------|
| **items** | array, Closure | List of dropdown menu items. See http://www.yiiframework.com/doc-2.0/yii-widgets-menu.html#$items-detail for detailed information on how to use this options. If no items is set default items will be used. |
| **containerClass** | string | Widget container class attribute value. Default, "*dropdown action-column*". |
| **itemsContainerClass** | string | Dropdown menu container class attribute value. Default, "*dropdown-menu*" |

## Minimum requirements
* PHP 5.4.0
* Yii 2.0.x Framework