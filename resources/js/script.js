function Refresh(){
    var img = document.images['captchaImg'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?n="+Math.random()*1000;
}