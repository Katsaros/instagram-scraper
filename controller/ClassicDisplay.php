<?php
    function textOnly($user)
    {
        echo "<p>Username: ".$user->get_username()."</p>";
        echo "<p>Full name: ".$user->get_fullname()."</p>";
        echo "<p>Profile Pic: ".$user->get_profilePic()."</p>";
        echo "<p>Biography: ".$user->get_biography()."</p>";
        echo "<p>Followers: ".$user->get_followers()."</p>";
        echo "<p>Following: ".$user->get_following()."</p>";
        echo "<p>Type: ".$user->get_businessAccount()."</p>";
        echo "<p>Number of posts: ".$user->get_postCount()."</p>";
        print_r($user->get_photos());
        echo "<br><br><br>";
        print_r($user->get_photoLocations());
        echo "<br><br><br>";
        print_r($user->get_photoLikes());        
    }
    
    function classicThreeColumns($user)
    {
            ?>
                <div class="basicbox">
                    <div class="row">
                        <div class="col-3">
                            <img src="<?php echo $user->get_profilePic() ?>" class="profile_photo"/>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-8">
                                    <span class="fullname"><?php echo $user->get_fullname() ?></span><br>
                                    <span class="username">@<?php echo $user->get_username() ?></span>
                                </div>
                                <div class="col-4">
                                    <a target="_blank" href="https://www.instagram.com/<?php echo $user->get_username()?>/"><button type="button" class="btn btn-primary">Follow</button></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3" style="margin: 10px;">
                                    <span class="details"><?php echo $user->get_postCount() ?><span class="detailsclear"><br>posts</span></span>
                                </div>
                                <div class="col-3" style="margin: 10px;">
                                    <span class="details"><?php echo $user->get_followers() ?><span class="detailsclear"><br>followers</span></span>
                                </div>
                                <div class="col-3" style="margin: 10px;">
                                    <span class="details"><?php echo $user->get_following() ?><span class="detailsclear"><br>following</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                                foreach($user->get_photos() as $photo)
                                {
                                    echo '
                                    <div class="col-3" style="padding-right: 0px; padding-left: 0px;">
                                        <img src="'.$photo.'" class="post_photo" />
                                    </div>'
                                    ;
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?
    }    
?>