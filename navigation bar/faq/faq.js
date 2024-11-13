function showcontent(data){
    var id=data.id;
    console.log('answer'+id);
    var showans=document.getElementById("answer"+id);
    if(showans.style.display=="none"){
        showans.style.display="block";

    }else{
        showans.style.display="none";
    }
}