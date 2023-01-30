<?php
function youtubeData($id)
 {
    $API_key = 'AIzaSyDKK6FDnHK1ArSQAoti_v8_mwvOG8yYk0Q';
    
    $videoId = $id;
    
    $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$videoId.'&key='.$API_key.''));
    
    foreach($videoList->items as $item){
      if(isset($item->id)){
        $data = array($videoId, $item->snippet->title, $item->snippet->description);
      }
    }
 return $data;
 }
   
?>