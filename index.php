<?php
require 'sdk/src/facebook.php';
require 'AppInfo.php';
require 'data.php';
$facebook = new Facebook(array(
  'appId'  => FACEBOOK_APP_ID,
  'secret' => FACEBOOK_SECRET_KEY,
));

  if(empty($_REQUEST['behalf'])||empty($_REQUEST['event_id']))
  {
  echo "wrong url";
  exit();
  }
  $user_id = $facebook->getUser();
  ?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head></head>
  <body>
  <?php
    if($user_id) {
      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {
     //if user is creating event behalf of user account
      $behalf= $_REQUEST['behalf']; //have two value User or Page
      $user_profile = $facebook->api('/me','GET');
      if($behalf=='user'){ 
      $eventId=$_REQUEST['event_id'];       
      $event_array=getEventDetails($eventId);

      $publisherid=$user_profile['id'];
      $event_id = $facebook->api('/'.$publisherid.'/events','POST',$event_array); //create event behalf of user		
      }
      else if($behalf=='page'){
		 
        $user_access_token=$facebook->getAccessToken();  //this will use to get page access_token	    
        if(!empty($user_access_token)) {
        
        //get all pages access token 
        $pages=$facebook->api('/'.$user_profile['id'].'/accounts?access_token='.$user_access_token);
        $pagesDestail =array();
        
        if(empty($pages['data']))
        {
        echo "You don't have any page.";
        exit();
        }
        
        foreach ($pages['data'] as $page){
         $pagesDestail[$page['id']]=$page;
        }        
        //display select box to select page behalf of that page use want to create page
        if(!isset($_POST['create_event'])){
        ?>
        <form name="pageSelection" method="post">
        <label>Select Page:</label>
        <select name=page id ="page">
        <?php foreach ($pages['data'] as $page){?>
        <option value="<?php echo $page['id'];?>"><?php echo $page['name'];?></option>
        <?php }?>
        </select>
        <input type="hidden" name="behalf" value="<?php echo $_REQUEST['behalf'];?>" />
        <input type="hidden" name="eventId"  value="<?php echo $_REQUEST['event_id']?>"/>
        <input type="submit" name="create_event" value="Create Event" />
        </form>        
        <?php 
        }
        if(isset($_POST['create_event'])){
        $pageId=$_POST['page'];//this will be a page id
        $pageAccessToken=$pagesDestail[$pageId]['access_token']; //this will be the page access token
        $eventId=$_POST['eventId'];
        $event_array=getEventDetails($eventId);
        $event_array['page_id']=$pageId;
        $event_array['access_token']=$pageAccessToken;
        
        //creating event behalf of page
         $event_id = $facebook->api("/$pageId/events","POST",$event_array);
          }
       }
   }
      if(!empty($event_id)){        
      $event_url="http://www.facebook.com/events/".$event_id['id'];
      ?>
        <script type="text/javascript">
       <?php echo 'top.location="'.$event_url.'";';?>
       </script>
        
       <?php 
      }           
      } catch(FacebookApiException $e) {
        
        $params = array('scope' => 'user_status,publish_stream,user_photos,create_event,manage_pages');
        $login_url = $facebook->getLoginUrl($params); 
        ?>
       <script type="text/javascript">
       <?php echo 'top.location="'.$login_url.'";';?>
       </script>
        <?php 
       // error_log($e->getType());
       // error_log($e->getMessage());
      }   
    } 
    else {
       $params = array('scope' => 'user_status,publish_stream,user_photos,create_event,manage_pages');
       $login_url = $facebook->getLoginUrl($params);
       ?> 
       <script type="text/javascript">
       <?php echo 'top.location="'.$login_url.'";';?>
       </script>
       <?php 
    }
?>
  </body>
</html>
