<?php 
class Login {
	public static function getFacebookWidget() {
		$html = '<div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : \'132703346866636\', // App ID
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true  // parse XFBML
      });
    };

    // Load the SDK Asynchronously
    (function(d){
      var js, id = \'facebook-jssdk\'; if (d.getElementById(id)) {return;}
      js = d.createElement(\'script\'); js.id = id; js.async = true;
      js.src = "//connect.facebook.net/en_US/all.js";
      d.getElementsByTagName(\'head\')[0].appendChild(js);
    }(document));
  </script>

  <fb:login-button show-faces="true" width="200" max-rows="1" scope="publish_actions">
  </fb:login-button>';
		return $html;
	}
}
?>