<script type="text/javascript">
    $('#refresh').click(function(){
      $.ajax({
         type:'GET',
         url:'refreshcaptcha',
         success:function(data){
             console.log(data.captcha);
            $(".captcha span").html(data.captcha);
         }
      });
    });
</script>