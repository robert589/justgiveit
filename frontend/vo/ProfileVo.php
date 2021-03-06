<?php

namespace frontend\vo;

use common\libraries\UserLibrary;
use common\libraries\CommonLibrary; 
use common\libraries\PostLibrary;   

class ProfileVo implements Vo {
    
    private $user_id;
    
    private $username;
    
    private $first_name;
    
    private $last_name;
    
    private $profile_pic;
    
    private $bid_list;
    
    private $give_list;
    
    private $total_bids;
    
    private $total_favorites;
    
    private $total_gives;
    
    private $user_country_name;
    
    private $user_country_code;
    
    private $user_city_name;
    
    private $user_city_id;
    
    private $email;
    
    private $columns;
    
    private $intro;
    
    private $validated;
    
    function __construct(ProfileVoBuilder $builder) {
        $this->user_id  =$builder->getUserId();
        $this->username = $builder->getUsername();
        $this->first_name = $builder->getFirstName();
        $this->last_name = $builder->getLastName();
        $this->profile_pic = $builder->getProfilePic();
        $this->bid_list = $builder->getBidList();
        $this->give_list = $builder->getGiveList();
        $this->total_bids = $builder->getTotalBids();
        $this->total_favorites = $builder->getTotalFavorites();
        $this->total_gives = $builder->getTotalGives();
        $this->email = $builder->getEmail();
        $this->validated = $builder->isValidated();
        $this->intro = $builder->getIntro();
        $this->user_city_id = $builder->getUserCityId();
        $this->user_city_name = $builder->getUserCityName();
        $this->user_country_code = $builder->getUserCountryCode();
        $this->user_country_name = $builder->getUserCountryName();
        $this->columns = $builder->getColumns();
    }
    
    public function getColumns() {
        return $this->columns;
    }
    
    public function getTotalBids() {
        return $this->total_bids;
    }
    
    public function getTotalFavorites() {
        return $this->total_favorites;
    }
    
    public function getTotalGives() {
        return $this->total_gives;
    }
    
    public static function createBuilder() {
        return new ProfileVoBuilder();
    }
    public function getUserId() {
        return $this->user_id;
    }

    public function getUsername() {
        return $this->username;
    }
    
    public function getFirstName() {
        return $this->first_name;
    }
    
    public function getLastName() {
        return $this->last_name;
    }

    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name;
    }


    public function getProfilePic() {
        return UserLibrary::buildPhotoPath($this->profile_pic);
    }
    
    public function getBidList() {
        return $this->bid_list;
    }

    public function getGiveList() {
        return $this->give_list;
    }
    
    public function getSimpleSidenav() {
        return [
            ['label' => 'Stuff', 'url' => \Yii::$app->request->baseUrl . '/user/' . $this->username . '/stuff']
        ];
    }

    public function getUserLink() {
        return UserLibrary::buildUserLink($this->username);
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function isValidated() {
        return $this->validated;
    }
    
    public function isOwner() {
        return UserLibrary::isOwner($this->user_id);
    }
    
    public function getIntro() {
        return $this->intro;
    }
    
    public function getUserCountryCode() {
        return $this->user_country_code;
    }
    
    public function getUserCountryName() {
        return $this->user_country_name;
    }
    
    public function getUserCityId() {
        return $this->user_city_id;
    }
    
    public function getLocationText() {
        if($this->user_city_id !== null) {
            return CommonLibrary::buildLocationText($this->user_country_code, $this->user_city_name, $this->user_country_name);   
        } else {
            return '[Location is not set]';
        }
    }
}