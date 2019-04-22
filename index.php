<html>
<header>
<title>ICS 455</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>
<style>
body {
     background-image: url(pictures/background.png);

}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.badgePicture {
position: fixed;
bottom: 0px;
right: 0px;
}
</style>
</header>
<body>
<!-- SCM Music Player http://scmplayer.co -->
<script type="text/javascript" src="https://scmplayer.co/script.js" 
data-config="{'skin':'skins/aquaPink/skin.css','volume':50,'autoplay':true,'shuffle':false,'repeat':1,'placement':'bottom','showplaylist':false,'playlist':[{'title':'Hacking Into The Mainframe','url':'https://soundcloud.com/mr-robot-3/mrrobot-soundtrack-mac-quayle-main-theme-song'}]}" ></script>
<!-- SCM Music Player script end -->


<!-- Insert Code Inbetween BODY Tags <BODY></BODY> -->

<SCRIPT language="JavaScript">
<!-- Mouse Bubbles from Rainbow Arch

/*
Mouse Bubbles from Rainbow Arch 
This script and many more from
http://rainbow.arch.scriptmania.com
*/


n4=(document.layers);
n6=(document.getElementById&&!document.all);
ie=(document.all);
o6=(navigator.appName.indexOf("Opera") != -1)?true:false;


/*
The bubble image must be in the same folder/directory 
as the page using the script. If the image is put into a 
separate folder, you will have to alter ALL references to it.
*/

img0=new Image();
img0.src="bubwhite.gif";

//Netscape 6 struggles, again! Always use a lower amount for this browser.
num=(n6)?10:15;

//Nothing needs altering past here.......................
y=0;
x=0;
if (n4||n6){
window.captureEvents(Event.MOUSEMOVE);
function mouse1(e){
 y = e.pageY-20-window.pageYOffset;
 x = e.pageX-4;
 } 
if (n4) window.onMouseMove=mouse1;
else document.onmousemove=mouse1;
}
if (ie||o6){
 function mouse2(){
 y = (ie)?event.clientY-20:event.clientY-20-window.pageYOffset;
 x = event.clientX-4;
 } 
document.onmousemove=mouse2;
}
yp=new Array();
xp=new Array();
sp=new Array();
rt=new Array();
gr=new Array();
s1=new Array();
s2=new Array();
nz=new Array();
wh=(ie)?window.document.body.clientHeight:window.innerHeight;
for (i=0; i < num; i++){                                                                
 yp[i]=Math.random()*wh-y;
 xp[i]=x;
 sp[i]= 6+Math.random()*3;
 s1[i]=0;
 s2[i]=Math.random()*0.1+0.05;
 gr[i]=4;
 nz[i]=Math.random()*15+5;
 rt[i]=Math.random()*0.5+0.1;
}
if (n4){
 for (i=0; i < num; i++){
 document.write("<LAYER NAME='bub"+i+"' LEFT=0 TOP=-50>"
+"<img src='bluebub.gif' width="+nz[i]+" height="+nz[i]+"></LAYER>");
 }
}
if (ie){
document.write('<div style="position:absolute;top:0px;left:0px"><div style="position:relative">');
 for (i=0; i < num; i++){
 document.write('<img id="bub'+i+'" src="'+img0.src+'" style="position:absolute;top:-50px;left:0px">');
 }
 document.write('</div></div>');
}
if (n6||o6){
 for (i=0; i < num; i++){
 document.write("<div id='bub"+i+"' style='position:absolute;top:-50px;left:0px'>"
+"<img src="+img0.src+" width="+nz[i]+" height="+nz[i]+"></div>");
 }
}
function MouseBubbles(){
scy=(document.all)?document.body.scrollTop:window.pageYOffset;
scx=(document.all)?document.body.scrollLeft:window.pageXOffset;
for (i=0; i < num; i++){
sy = sp[i]*Math.sin(270*Math.PI/180);
sx = sp[i]*Math.cos(s1[i]*5);
yp[i]+=sy;
xp[i]+=sx; 
if (yp[i] < -40){
 yp[i]=y;
 xp[i]=x;
 sp[i]= 6+Math.random()*3;
 gr[i]=4;
 nz[i]=Math.random()*15+5;
}
if (n4){
 document.layers["bub"+i].left=xp[i]+scx;
 document.layers["bub"+i].top=yp[i]+scy;
}
if (ie){
 document.getElementById("bub"+i).style.left=xp[i]+scx;
 document.getElementById("bub"+i).style.top=yp[i]+scy;
 document.getElementById("bub"+i).style.width=gr[i];
 document.getElementById("bub"+i).style.height=gr[i]; 
}
if (n6||o6){
 document.getElementById("bub"+i).style.left=xp[i]+scx;
 document.getElementById("bub"+i).style.top=yp[i]+scy;
}
gr[i]+=rt[i]; 
s1[i]+=s2[i];
if (gr[i] > 14) gr[i]=15;
}
setTimeout('MouseBubbles()',10);
}
MouseBubbles();
//-->
</SCRIPT>




<br>
<br>
<div class = "ui container" style="background-color: white">
<br>
<br>
<img src="pictures/title.jpg" class="center">
<div class="center">
<h1 clas = "ui header">ICS 455 Final Project</h1>
<p>this is a final project for school please dont actually sign into anything on this site.</p>

<ul>
  <li>Oauth Data Examples</li>
    <ul>
      <li><a href="/demo/githubOauthDemo.php">Github Oauth Data Example</a></li>
      <li><a href="/demo/facebookOauthDemo.php">Facebook Oauth Data Example</a></li>
      <li><a href="/demo/googleOauthDemo.php">Google Oauth Data Example</a></li>
    </ul>
  <li>Phishing attack</li>
    <ul>
      <li><a href="/phish/facebookPhishingDemo.php">Facebook Phishing Example</a></li>
    </ul>

  
</div>
<br>
<br>
</div>
<img src="pictures/securitybadges.jpg" class="badgePicture">
</body>
</html>
