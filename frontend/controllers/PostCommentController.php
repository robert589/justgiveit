<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\service\ServiceFactory;
use frontend\widgets\PostComment;
use frontend\models\NotificationCommentCommentForm;
/**
 * Site controller
 */
class PostCommentController extends Controller
{
    
    private $service_factory;
    
    private $post_comment_service;
    
    public function init() {
        $this->service_factory = new ServiceFactory();
        $this->post_comment_service = $this->service_factory->getService(ServiceFactory::POST_COMMENT_SERVICE);
    }
    
    public  function actionCreate() {
        $data = array();
        if(!Yii::$app->user->isGuest && isset($_POST['message']) && isset($_POST['post_id'])) {
            $model = new \frontend\models\CreateCommentForm;
            $model->user_id = Yii::$app->user->getId();
            $model->message = $_POST['message'];
            $model->post_id = $_POST['post_id'];
            $comment_id = $model->create();
            if($comment_id !== false) {
                $data['status'] = 1;
                $this->createCommentNotification($model->post_id);
                $post_comment = $this->post_comment_service->getCommentInfo($comment_id);
                $data['view'] = PostComment::widget(['id' => 'new-post-comment-' . $comment_id, 'post_comment' => $post_comment]);
                return json_encode($data);
               
            } 
        }
        
        $data['status'] = 0;
        return json_encode($data);
    }
    
    private function createCommentNotification($post_id) {
        $notification = new NotificationCommentCommentForm();
        $notification->post_id = $post_id;
        $notification->new_actor_id = Yii::$app->user->getId();
        $notification->create();
    }
    
    public function actionDelete() {
        $data = array();
        if(!Yii::$app->user->isGuest && isset($_POST['comment_id'])) {
            $model = new \frontend\models\DeletePostCommentForm;
            $model->user_id = Yii::$app->user->getId();
            $model->comment_id = $_POST['comment_id'];
            $result = $model->delete();
            if($result !== false) {
                $data['status'] = 1;
                return json_encode($data);
               
            } 
        }
        
        $data['status'] = 0;
        return json_encode($data);
    }
    
    public function actionEdit() {
        $data = array();
        if(!Yii::$app->user->isGuest && isset($_POST['comment_id']) && isset($_POST['message']) ) {
            $model = new \frontend\models\EditPostCommentForm;
            $model->user_id = Yii::$app->user->getId();
            $model->comment_id = $_POST['comment_id'];
            $model->message = $_POST['message'];
            $result = $model->edit();
            if($result !== false) {
                $data['status'] = 1;
                return json_encode($data);
               
            } 
        }
        
        $data['status'] = 0;
        return json_encode($data);
    
    }
}
