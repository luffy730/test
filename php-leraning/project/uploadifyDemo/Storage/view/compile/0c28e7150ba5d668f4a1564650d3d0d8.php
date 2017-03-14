<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- 需要载入的文件 -->
    <script type="text/javascript" src="Public/uploadify/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="Public/uploadify/jquery.uploadify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Public/uploadify/uploadify.css">
</head>
<body>
<!-- html页面 -->
<div lab="uploadFile">
	<!-- file表单 -->
    <input id="f" type="file" multiple="true">
    <span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>
    <script type="text/javascript">
        $(function() {
            $('#f').uploadify({
                'formData'     : {//POST数据
                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
                },
                'fileTypeDesc' : '上传文件',//上传描述
                'fileTypeExts' : '*.jpg;*.png',
                'swf'      : '<?php echo __PUBLIC__?>/uploadify/uploadify.swf',
                'uploader' : '<?php echo U('upload')?>',//指定服务器上传的方法
                'buttonText':'选择文件',
                'fileSizeLimit' : '2000KB',
                'uploadLimit' : 1,//上传文件数
                'width':65,
                'height':25,
                'successTimeout':10,//等待服务器响应时间
                'removeTimeout' : 0.2,//成功显示时间
                'onUploadSuccess' : function(file, data, response) {
                    //转为json
                    data=$.parseJSON(data);
                    //获得图片地址
                    var imageUrl = data.url;
                    var li="<li>";
                    li += "<img src='"+imageUrl+"'/>";
                    li += "<input type='hidden' name='thumb' value='"+data.path+"'/><a href='javascript:;' id='self-close'>X</a>";
                    li += "</li>";
                    $("#uploadList ul").prepend(li);
                }
            });

            var i = 1;
            $('#self-close').live('click',function(){
                $(this).parent('li').remove();
                i++;
                $('#f').uploadify('settings','uploadLimit',i);
            })
        });
    </script>
    <div id="uploadList">
        <ul>

        </ul>
    </div>
</div>

</body>
</html>