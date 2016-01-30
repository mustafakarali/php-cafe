/**
 *	add a product
 ************************************************************************
 *	@Author Xiaoming Yang
 *	@Date	25-01-2015 19:45
 ************************************************************************
 *	update time			editor				updated information
 *
 */
$(function(){
    Menu.resizeContent();
    Menu.regHook();

    $("#upFile").wrap("<form id='myupload' action='/cafe/admin.php/product/imageUpload'  method='post' enctype='multipart/form-data'></form>");
    $("#upFile").change(function(){ //选择文件
        //校验文件大小
        var chkResult = checkFile(this);
        if(!chkResult){
            alert("the size of upload file must be less than 15MB");
            return;
        }
        $("#myupload").ajaxSubmit({
            dataType:  'json', //数据格式为json
            beforeSend: function() { //上传前
                $('#uploadMsg').css('display','none');
                $('#imageDel').css('display','none');
                $('#uploadImg').css('display','none');
                $('#loadingImg').css('opacity','1');
            },
            success: function(data) { //成功
                if(data.errCode == '0'){
                    $('#uploadImg').attr('src','/cafe/'+data.destination).css('display','block');
                    $('#imagePath').val('/cafe/'+data.destination);
                    $('#imageName').html(data.name+" ("+data.size+")").css('display','block');
                    $('#loadingImg').css('opacity','0');
                    $('#imageDel').css('display','block');
                    $('.upload-btn').css('background-color','grey');
                    $('#upFile').attr('disabled','disabled');
                }else{
                    $('#uploadMsg').css('display','block').html('upload failed. '+data.errInfo);
                    $('#imageDel').css('display','none');
                    $('#loadingImg').css('opacity','0');
                }

            },
            error:function(xhr){ //上传失败
                $('#uploadMsg').css('display','block');
                //$('#uploadMsg').html('upload failed'+xhr.responseText);
                $('#uploadMsg').html('upload failed, please check the file size(<15MB) and file format(jpg,jpeg,gif,png). '+xhr.responseText);
                $('#imageDel').css('display','none');
                $('#loadingImg').css('opacity','0');
            }
        });
    });

    //initial summernote
    $('#summernote').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                // set focus to editable area after initializing summernote
    });
});

function checkFile(target) {
    var fileSize = 0;
    var isIE = /msie/.test(navigator.userAgent.toLowerCase());
    if (isIE && !target.files) {
        var filePath = target.value;
        var fileSystem = new ActiveXObject("Scripting.FileSystemObject");
        var file = fileSystem.GetFile (filePath);
        fileSize = file.Size;
    }else {
        fileSize = target.files[0].size;
    }
    var size = fileSize / 1024;
    if(size>15360){
        return false;
    }
    return true;
}

function imageDelete(){
    $.post(
        '/cafe/admin.php/product/imageDelete',
        {"imagePath":$("#imagePath").val()},
        function(data){
            if(data == 1){
                $('#uploadImg').attr('src','').css('display','none');
                $('#imagePath').val('');
                $('#imageName').html('').css('display','none');
                $('#loadingImg').css('opacity','0');
                $('#imageDel').css('display','none');
                $('.upload-btn').css('background-color','#5bb75b');
                $('#upFile').removeAttr('disabled');
                //clean file upload input value, otherwise, you cannot choose the same last file next time
                $('#upFile').val('');

            }else{
                alert('delete the image failed');
            }
        });
}
function doSubmit() {
    var description = $('#summernote').code();
    $('#description').val(description);
    $('#product_form').submit();
}