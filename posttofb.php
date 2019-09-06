<?php


require_once __DIR__ . '/facebook-php-sdk/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '370130123909034',
  'app_secret' => '741e75794e6e2d87b6129311d80cbaf9',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();
$accessToken='EAAFQoaKOZA6oBAMnZAZAxvZADRDBsiZBVBMk2IZBPyk6O6QVAxNrgZAXVTh7ySZAhqZCY6BJdJJxBfZBFVvhvnBCrk4XyMXOkmZBzHgUOY0cRHeoZCOJpmu8KZAlZA1ZA6dmkKFbzsHaYDoMZBYZALibsOi8tQIPudubcfVymkgwCaEC0TefmmDY78ufQbnnngHryXsHv8EMVrAFIqhExiAZDZD';

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me', 'EAAFQoaKOZA6oBAMnZAZAxvZADRDBsiZBVBMk2IZBPyk6O6QVAxNrgZAXVTh7ySZAhqZCY6BJdJJxBfZBFVvhvnBCrk4XyMXOkmZBzHgUOY0cRHeoZCOJpmu8KZAlZA1ZA6dmkKFbzsHaYDoMZBYZALibsOi8tQIPudubcfVymkgwCaEC0TefmmDY78ufQbnnngHryXsHv8EMVrAFIqhExiAZDZD');
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo 'Logged in as ' . $me->getName();

//$msg=[
//    'message'=> 'this is test post',
//];
//$fb->post('/me/feed', $msg, $accessToken);


?>