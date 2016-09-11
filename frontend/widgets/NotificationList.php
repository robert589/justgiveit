<?php

namespace frontend\widgets;

use yii\base\Widget;

class NotificationList extends Widget
{
    public $id;
    
    public function init()
    {
        parent::init();

        $this->registerAssets();
    }

    public function registerAssets(){
        $view = $this->getView();
        NotificationListAsset::register($view);

    }

    public function run()
    {
        return $this->render('notification-list',
            ['id' => $this->id]);
    }
}