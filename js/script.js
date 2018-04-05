$(document).ready(function(){

    $(".detailRight0Menu li").each(function(idx){
       $(this).click(function(){
          alert(idx+"번 선택됨"); 
       }); 
    });
});