<?php
    function getInstagramUsername()
    {
        $username = 'katsarosgiannis';
        return $username;
    }

    function getJsonFromProfile($instagramUsername)
    {
        $url = "https://www.instagram.com/$instagramUsername/?__a=1";
    	$client = curl_init($url);
    	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    	$response = curl_exec($client);
    	$result = json_decode($response,true);    
    	return $result;
    }
    
    function parseJsonCreateObjectAndFillIt($json)
    {
        foreach ($json as $key => $value) {
            if($key=="graphql") {
                foreach ($value as $graphqlKey => $graphqlValue) {
                    foreach ($graphqlValue as $userKey => $userValue) {
                        if($userKey=="username")
                        {
                            $username = $userValue;
                        }         
                        else if($userKey=="full_name")
                        {
                            $fullname = $userValue;
                        }                    
                        else if($userKey=="profile_pic_url_hd")
                        {
                            $profilePic = $userValue;
                        }                   
                        else if($userKey=="biography")
                        {
                            $biography = $userValue;
                        }
                        else if($userKey=="edge_followed_by")
                        {
                            $followers = $userValue['count'];
                        }                    
                        else if($userKey=="edge_follow")
                        {
                            $following = $userValue['count'];
                        }                    
                        else if($userKey=="is_business_account")
                        {
                            if($userValue)$businessAccount="Επαγγελματικός Λογαριασμός";
                            else $businessAccount="Προσωπικός Λογαριασμός";
                        }
                        else if($userKey=="edge_owner_to_timeline_media")
                        {
                            $postCount = $userValue['count'];
                            $photos = array();
                            $photoLikes = array();
                            $photoLocations = array();
                            foreach ($userValue['edges'] as $edgesKey => $edgesValue) {
                                foreach ($edgesValue as $insideEdgesKey => $insideEdgesValue) {
                                    foreach ($insideEdgesValue as $insideNodesKey => $insideNodesValue) {
                                        if($insideNodesKey=="display_url")
                                        {
                                            $photoUrl = $insideNodesValue;
                                            array_push($photos, $photoUrl);
                                        }                                    
                                        else if($insideNodesKey=="edge_liked_by")
                                        {
                                            $photoLike = $insideNodesValue['count'];
                                            array_push($photoLikes, $photoLike);
                                        }                                    
                                        else if($insideNodesKey=="location")
                                        {
                                            $photoLocation = $insideNodesValue['name'];
                                            array_push($photoLocations, $photoLocation);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                break;
            }
        }
        return createAndFillProfileObject($username,$fullname,$profilePic,$biography,$followers,$following,$businessAccount,$postCount,$photos,$photoLocations,$photoLikes);
    }
    
    function createAndFillProfileObject($username,$fullname,$profilePic,$biography,$followers,$following,$businessAccount,$postCount,$photos,$photoLocations,$photoLikes)
    {
        $user = new Profile($username,$fullname,$profilePic,$biography,$followers,$following,$businessAccount,$postCount,$photos,$photoLocations,$photoLikes);
        return $user;
    }
    
    function getUserProfile()
    {
        $username = getInstagramUsername();
        $json = getJsonFromProfile($username);
        $user = parseJsonCreateObjectAndFillIt($json);
        return $user;
    }
    
?>