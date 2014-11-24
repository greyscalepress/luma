<?php 

/* This file will process video URLS

 * We start testing for youtube. But it could be other services as well...
 * 
*/


/*
We want this:

links-video.php

<iframe width="420" height="315" src="//www.youtube-nocookie.com/embed/WLuOM0QYk9s?rel=0" frameborder="0" allowfullscreen></iframe>
*/


foreach($cf_video as $video_url) {
			
			// https://www.youtube.com/watch?v=WLuOM0QYk9s
			
			if (substr($video_url, 0, 32) == "https://www.youtube.com/watch?v=") {
						
						$video_url = str_replace("https://www.youtube.com/watch?v=", "", $video_url);
						
						echo '<iframe width="420" height="315" src="//www.youtube-nocookie.com/embed/'. $video_url .'?rel=0" frameborder="0" allowfullscreen></iframe>';
			     
			} else if (substr($video_url, 0, 31) == "http://www.youtube.com/watch?v=") {
			
					$video_url = str_replace("http://www.youtube.com/watch?v=", "", $video_url);
					
					echo '<iframe width="420" height="315" src="//www.youtube-nocookie.com/embed/'. $video_url .'?rel=0" frameborder="0" allowfullscreen></iframe>';
					
			}
			

}