<? session_start();
if (!empty($_GET[token])) {$_SESSION["token"]=$_GET[token];}
if (empty($_GET[token])) {$_GET[token]=$_SESSION["token"];}
$token=$_SESSION[token];
?>
<!DOCTYPE html>
<html lang="en">
<script async>function tokenJSError(){document.querySelector('.middle').innerHTML= "<h1><br><br><br><br>Token Don't Exist <br><a href=\"url\"> Buyt Token</a> </h1>";}</script>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" centent="#317EFB">
  <title>UAI 3.0</title>
  <link rel="stylesheet" type="text/css" href="./styles/inline.css"> 

  <!-- TODO add manifest here -->
  <link rel="manifest" href="./manifest.php<?if(!empty($token)){echo"?token=".$token."";}?>">
  <!-- Add to home screen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="UAI 3.0">  
  <meta name="msapplication-TileImage" content="./images/icons/icon-144x144.png">
  <meta name="msapplication-TileColor" content="#2F3BA2">  
  <!-- chrome://flags/#enable-experimental-web-platform-features -->
</head>
<body>

  <header class="header">
    <h1 class="header__title"><center>Universal AI 3.0 - Wallet Address # <?echo"$_SESSION[token]";?></center></h1>
    
  </header>

  <main class="main"><center>
  	<div class="top"></div>
	<div class="middle">
	   <button id="butListen" class="headerButton"><i class="headerButton">Turn Mic On</i>
	   <button id="butConnect" class="headerButton"><i class="headerButton">Bluetooth Connections</i>
           <button ><i>Train AI</i>
	</div>
	<div class="bottom" ></div>
 
  </center></main>
  <div class="loader">
    <svg viewBox="0 0 32 32" width="32" height="32">
      <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
    </svg>
  </div>

 
  
  <script src="./libs/annyang.min.js" async ></script>
  <script src="./scripts/<?if(!empty($token)){echo"$token";}?>.js"  async onerror="tokenJSError();"></script>
  <script async>
   // TODO add service worker code here   to access GET variables 
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker
             .register('./serviceWorker.php<?if(!empty($token)){echo"?token=".$token."";}?>')
             .then(function() { console.log('Service Worker Registered');  });
  }
  </script> 
  
  


</body>
</html>
