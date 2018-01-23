<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
		<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <title>Laravel</title>
    </head>
    <body>
	<div >
          <input id="url" type="text" class="text" value="http://www.iqiyi.com/v_19rrf5upzo.html">

          <input name="doplayers" type="button" id="doplayers" class="button" onClick="player()" value="立即播放">
        </div>
     <iframe id="jiekou" name="jiekou" src="" width="100%" height="100%"></iframe>
    </body>
<script type="text/javascript">
	function player() {
		var a = $('#url').val();
		if (a == "") {
			alert('请输入视频网站网址！');
			$('#url').focus();
			return (false)
		}else{
			$.ajax({
					type: 'POST',
					url:'/serlize',
					data: {types:1},
					dataType: 'json',
					async:false,
					success: function(data){
						if(data.status=='success'){
							document.getElementById("jiekou").src=url;
							});							
						}
					}		
		});
		}
	}
</script>
</html>
