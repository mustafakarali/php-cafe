/**
 *	login
 ************************************************************************
 *	@Author Xiaoming Yang
 *	@Date	25-01-2015 19:45
 ************************************************************************
 *	update time			editor				updated information
 *
 */

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