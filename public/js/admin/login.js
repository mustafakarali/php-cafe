/**
 *	login
 ************************************************************************
 *	@Author Xiaoming Yang
 *	@Date	2015-12-02 14:15
 ************************************************************************
 *	update time			editor				updated information
 *
 */
$(function(){
    Menu.resizeContent();
    Menu.regHook();
});


function doSignIn(){

    $.post(
       '/cafe/admin.php/login/login',
        {"username":$("#username").val(),"userpwd":$("#userpwd").val()},
        function(data){
            if(data == 1){
                location.href="/cafe/admin.php/login/main";
            }else{
                $("#msg").css("display","block");
            }
    });
}