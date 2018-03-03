<?php session_start(); Header("content-type: application/x-javascript"); 
if(!empty($_SESSION[token])){$token=$_SESSION[token];}
if(!empty($_GET[token])){$token=$_GET[token];}

$staticCacheName = "UAI30-Token".$token.""; 
$dynamicCacheName ="UAI30-Dynamic-Token".$token."";                                         
$staticAssets1 =  "'./'";
$staticAssets2 = "'./index.php?token=".$token."'";
$staticAssets3 = "'./styles/inline.css'"; 
$staticAssets4 = "'./serviceWroker.php?token=".$token."'";
$staticAssets5 = "'./scripts/". $token .".js'" ;
$staticAssets6 = "'./manifest.php?token=".$token."'" ;
//static resources:
$staticAssets7 = "'./libs/annyang.min.js'";                                                       
         

echo "self.addEventListener('install', async function () {                 \n";
echo "const cache = await caches.open('".$staticCacheName."');                           \n";
echo "cache.addAll([".$staticAssets1.",".$staticAssets2.",".$staticAssets3.",".$staticAssets4.",".$staticAssets5.",".$staticAssets6.",".$staticAssets7."]);                                         \n";
echo "});                                                                 \n";

echo "self.addEventListener('activate', event => {                        \n";
echo "event.waitUntil(self.clients.claim());                              \n";
echo "});                                                                 \n";
echo "                                                                    \n";

echo "self.addEventListener('fetch', event => {                           \n"; 
echo "  const request = event.request;                                    \n";
echo "  const url = new URL(request.url);                                 \n";
echo "  if (url.origin === location.origin) {                             \n";
echo "    event.respondWith(cacheFirst(request));                         \n";
echo "  } else {                                                          \n";
echo "    event.respondWith(networkFirst(request));                       \n";
echo "  }                                                                 \n";
echo "});                                                                 \n";
echo "                                                                    \n";
echo " async function cacheFirst(request) {                               \n";
echo "  const cachedResponse = await caches.match(request);               \n";
echo "  return cachedResponse || fetch(request);                          \n";
echo "}                                                                   \n";
echo "                                                                    \n";
echo " async function networkFirst(request) {                             \n";
echo "  const dynamicCache = await caches.open('".$dynamicCacheName."');           \n";
echo "  try {                                                             \n";
echo "    const networkResponse = await fetch(request);                   \n";
echo "    dynamicCache.put(request, networkResponse.clone());             \n";
echo "    return networkResponse;                                         \n";
echo "  } catch (err) {                                                   \n";
echo "    const cachedResponse = await dynamicCache.match(request);       \n";
echo "    return cachedResponse || await caches.match('./fallback.json'); \n";
echo "  }                                                                 \n";                                                              
echo "}                                                                   \n";

?>