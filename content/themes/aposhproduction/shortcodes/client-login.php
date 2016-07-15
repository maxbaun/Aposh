<?php
  add_shortcode("client-login","clientLogin");
  function clientLogin($atts, $content = null){
    extract(shortcode_atts(array(), $atts));

    $html = '
    <form class="client-login" action="http://poshlogin.com/clientlogon.asp?djidnumber=7638">
      <div class="wpcf7-form-control-wrap">
      <input type="text" class="form-control" placeholder="User Name..." name="username"/>
      </div>
      <div class="wpcf7-form-control-wrap">
      <input type="password" class="form-control" placeholder="Password..." name="password"/>
      </div>
      <div class="text-center wpcf7-form-control-wrap">
        <input type="submit" class="btn btn-cta btn-sm" value="Login" name="submit"/>
      </div>
    </form>
    ';

    $html .= "
      <script>
      <!--
      function SendPasswordWindow() {
      spWindow = window.open('http://poshlogin.com/sendpassword.asp?typeoflogon=client','spWindow','width=350,height=150,menubar=no,scrollbars=no,resizable=yes,location=no,directories=no,status=no');
      spWindow.focus();
      }
      // -->
      </script>      
    ";

    return force_balance_tags($html);
  }
?>
