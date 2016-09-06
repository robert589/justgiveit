<?php/* @var $this \yii\web\View *//* @var $content string */use yii\helpers\Html;use yii\widgets\Breadcrumbs;use frontend\assets\AppAsset;use common\libraries\UserLibrary;use frontend\widgets\CreatePost;use kartik\dialog\Dialog;use yii\bootstrap\Modal;use frontend\vo\BidReplyVoBuilder;use frontend\widgets\BidReply;//all linksif(Yii::$app->user->isGuest){    //all links    $login_link = Yii::$app->request->baseUrl . '/site/link';}else{    $logout_link = Yii::$app->request->baseUrl . '/site/logout';};AppAsset::register($this);$this->title = "Just Give it!";?><?php $this->beginPage() ?><!DOCTYPE html><html lang="<?= Yii::$app->language ?>"><head>    <meta charset="<?= Yii::$app->charset ?>">    <meta name="viewport" content="width=device-width, initial-scale=1">    <?= Html::csrfMetaTags() ?>    <title><?= Html::encode($this->title) ?></title>    <?php $this->head() ?></head><?php $this->beginBody() ?>    <nav class="navbar-default navbar-fixed-top menu-bar main-container" >        <div class="logo" align="left">            <?= Html::a('JustGiveIt', Yii::$app->request->baseUrl . '/', ['class' => 'btn menu-btn']) ?>                    </div>        <div class="navbar-button"  align="right">            <?= Html::button('<span class="glyphicon glyphicon-home"></span>', ['class' => 'btn menu-btn home-menu-button']) ?>            <?php if(Yii::$app->user->isGuest){ ?>            <?= Html::button('Login', ['class' => 'btn menu-btn', 'id' => 'login-menu']) ?>            <?php } else { ?>            <?= Html::button('<span class="glyphicon glyphicon-plus"></span>', ['class' => 'btn menu-btn give-stuff-modal-button']) ?>            <?= Html::button('<span class="glyphicon glyphicon-bell"></span>', ['class' => 'btn menu-btn notification-button']) ?>                        <?=  \common\widgets\LinkDropdown::widget(                   ['label' => Html::img(UserLibrary::buildPhotoPath(Yii::$app->user->identity->profile_pic),                                ['class' => 'menu-profile-pic'])                    ,                    'items' =>                        [                           ['label' => 'Profile' ,                              'url' => UserLibrary::buildUserLink(Yii::$app->user->identity->username)],                           ['label' => 'Logout',                               'url' => Yii::$app->request->baseUrl . '/site/logout',                              'options' => [ 'data-method' => 'post']                           ]                       ]                   ,                    'button_class' => 'btn menu-btn', 'id' => 'profile-menu']); ?>                       <?php } ?>        </div>    </nav>    <div class="main-container main-view">        <?= Breadcrumbs::widget([            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],        ]) ?>        <?= $content ?>    </div></div><div class="main-hidden-input">    <?= Html::hiddenInput('base-url', Yii::$app->request->baseUrl, ['id' => 'base-url']) ?>    <?= Html::hiddenInput('user-id', Yii::$app->user->getId(), ['id' => 'current-user-id']) ?></div><div id='bid-reply-template' class='hide'>    <?php         //template        $bid_reply_template_builder = new BidReplyVoBuilder();        $bid_reply_template_builder->applyTemplate();    ?>    <?= BidReply::widget(['id' => 'bid-reply-template-id', 'bid_reply' => $bid_reply_template_builder->build()]) ?></div><?phpModal::begin([    'id' => 'login-modal',    'size' => Modal::SIZE_SMALL]);    echo  frontend\widgets\Login::widget(['id' => 'login-form']) ;Modal::end();?><?php    Modal::begin([        'id' => 'create-post-modal',        'header' => '<h4 align="center">Create Post</h4>',        'size' => Modal::SIZE_DEFAULT    ]); ?><?= CreatePost::widget(['id' => 'create-post']); ?><?php    Modal::end();?><?= Dialog::widget() ?><?php$this->endBody();?></html><?php $this->endPage() ?>