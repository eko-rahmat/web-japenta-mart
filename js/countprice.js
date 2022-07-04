function showResult(str){
    if(str.length==0){
        document.getElementById("livecount").innerHTML="0";
        return;
    }
    const xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("livecount").innerHTML=this.responseText;
        }
    }
}