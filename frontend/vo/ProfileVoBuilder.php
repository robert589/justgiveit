<?php
namespace frontend\vo;
use frontend\vo\ProfileVo;

class ProfileVoBuilder implements Builder {
    private $user_id;
    
    private $username;
    
    private $first_name;
    
    private $last_name;
    
    private $validated;
    
    private $profile_pic;
    
    private $bid_list;
    
    private $email;
    
    private $columns;
    
    private $give_list;
    
    private $total_bids;
    
    private $total_gives;
    
    private $total_favorites;
    
    private $user_country_name;
    
    private $user_country_code;
    
    private $user_city_name;
    
    private $user_city_id;
    
    private $intro;
    
    public function getUserCountryName() {
        return $this->user_country_name;
    }
    
    public function getUserCountryCode() {
        return $this->user_country_code;
    }
    public function getUserCityName() {
        return $this->user_city_name;
    }
    public function getUserCityId() {
        return $this->user_city_id;
    }
    
    public function setUserCountryName($user_country_name) {
        $this->user_country_name = $user_country_name;
    }
    
    public function setUserCountryCode($user_country_code) {
        $this->user_country_code = $user_country_code;
    }
    
    public function setUserCityName($user_city_name) {
        $this->user_city_name = $user_city_name;
    }
    
    public function setUserCityId($user_city_id) {
        $this->user_city_id = $user_city_id;
    }
    
    
    public function getIntro() {
        return $this->intro;
    }
    
    public function setIntro($intro) {
        $this->intro =  $intro;
    }
    
    public function getTotalBids() {
        return $this->total_bids;
    }
    
    public function getTotalGives() {
        return $this->total_gives;
    }
    
    public function getTotalFavorites() {
        return $this->total_favorites;
    }
    
    public function setTotalBids($total_bids) {
        $this->total_bids = $total_bids;
    }
    
    public function setTotalGives($total_gives) {
        $this->total_gives = $total_gives;
    }
    
    public function setTotalFavorites($total_favorites) {
        $this->total_favorites = $total_favorites;
    }
    public function build() {
        return new ProfileVo($this);
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

    public function getProfilePic() {
        return $this->profile_pic;
    }

    public function getBidList() {
        return $this->bid_list;
    }

    public function getGiveList() {
        return $this->give_list;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
        return $this;
    }

    public function setProfilePic($profile_pic) {
        $this->profile_pic = $profile_pic;
    }

    public function setBidList($bid_list) {
        $this->bid_list = $bid_list;
    }

    public function setGiveList($give_list) {
        $this->give_list = $give_list;
        
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function isValidated() {
        return $this->validated;
    }
    
    public function setValidated($validated) {
        $this->validated = $validated;
    }
    
    public function getColumns() {
        return $this->columns;
    }
    
    public function setColumns($columns) {
        $this->columns = $columns;
    }
}