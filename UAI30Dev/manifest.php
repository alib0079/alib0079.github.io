<? session_start();
if(!empty($_SESSION[token])){$token=$_SESSION[token];}
if(!empty($_GET[token])){$token=$_GET[token];}
//print_r($_SESSION);
?>
{
  "name": "Universal IA Token#<?echo"$token";?>",
  "short_name": "UAI Brain",
  "theme_color": "#317EFB",
  "background_color": "#2196f3",
  "display": "standalone",
  "Scope": "./",
  "start_url": "./index.php?token=<?echo"$token";?>",
  "icons": [
    {
      "src": "images/icons/icon-72x72.png",
      "sizes": "72x72",
      "type": "image/png"
    },
    {
      "src": "images/icons/icon-96x96.png",
      "sizes": "96x96",
      "type": "image/png"
    },
    {
      "src": "images/icons/icon-128x128.png",
      "sizes": "128x128",
      "type": "image/png"
    },
    {
      "src": "images/icons/icon-144x144.png",
      "sizes": "144x144",
      "type": "image/png"
    },
    {
      "src": "images/icons/icon-192x192.png",
      "sizes": "192x192",
      "type": "image/png"
    },
    {
      "src": "images/icons/icon-384x384.png",
      "sizes": "384x384",
      "type": "image/png"
    },
    {
      "src": "images/icons/icon-512x512.png",
      "sizes": "512x512",
      "type": "image/png"
    }
  ],
  "splash_pages": null
  
}