<?php
    class Profile 
    {
        private $username;
        private $fullname;
        private $profilePic;
        private $biography;
        private $followers;
        private $following;
        private $businessAccount;
        private $postCount;
        private $photos;
        private $photoLikes;
        private $photoLocations;
        
        public function __construct($username,$fullname,$profilePic,$biography,$followers,$following,$businessAccount,$postCount,$photos,$photoLocations,$photoLikes) {
            $this->username = $username;
            $this->fullname = $fullname;
            $this->profilePic = $profilePic;
            $this->biography = $biography;
            $this->followers = $followers;
            $this->following = $following;
            $this->businessAccount = $businessAccount;
            $this->postCount = $postCount;
            $this->photos = $photos;
            $this->photoLikes = $photoLikes;
            $this->photoLocations = $photoLocations;
        }
    
        function set_username($username) {
            $this->username = $username;
        }
        function get_username() {
            return $this->username;
        }

        function set_fullname($fullname) {
            $this->fullname = $fullname;
        }
        function get_fullname() {
            return $this->fullname;
        }

        function set_profilePic($profilePic) {
            $this->profilePic = $profilePic;
        }
        function get_profilePic() {
            return $this->profilePic;
        }

        function set_biography($biography) {
            $this->biography = $biography;
        }
        function get_biography() {
            return $this->biography;
        }

        function set_followers($followers) {
            $this->followers = $followers;
        }
        function get_followers() {
            return $this->followers;
        }

        function set_following($following) {
            $this->following = $following;
        }
        function get_following() {
            return $this->following;
        }

        function set_businessAccount($businessAccount) {
            $this->businessAccount = $businessAccount;
        }
        function get_businessAccount() {
            return $this->businessAccount;
        }

        function set_postCount($postCount) {
            $this->postCount = $postCount;
        }
        function get_postCount() {
            return $this->postCount;
        }

        function set_photos($photos) {
            $this->photos = $photos;
        }
        function get_photos() {
            return $this->photos;
        }

        function set_photoLikes($photoLikes) {
            $this->photoLikes = $photoLikes;
        }
        function get_photoLikes() {
            return $this->photoLikes;
        }

        function set_photoLocations($photoLocations) {
            $this->photoLocations = $photoLocations;
        }
        function get_photoLocations() {
            return $this->photoLocations;
        }
    }
?>