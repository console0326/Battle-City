function Register() {
    // this.fillout=$("#fillout:eq(0)");
    this.yzm=null;
    this.init();
}
Register.prototype={
      constructor:Register,
      init:function () {
        this.verify();
        this.enter();
      },
      verify:function () {
          var time=60;
          var _this=this;
         $("#btn").on("click",function () {
             var time=60;
             _this.yzm=Math.floor(Math.random()*9999+1000);
             if ($("#txt").val()== "") {
                $(".fillout").html('手机号不能为空!');
                 // return;
             } else {
                 if (!(/^1[3|4|5|7|8]\d{9}$/.test($("#txt").val()))) {
                     // error.innerHTML='手机号格式有误.';
                     $(".fillout").html('手机号格式有误.');
                     // return;
                     }else{
                           $(".fillout").html("");
                           var timer = setInterval(function(){
                           time--;
                           $("#btn").val(time + "秒") ;
                           $("#btn").attr("disabled",true);
                           if (time==0) {
                             // time = 60;
                              clearInterval(timer);
                              $("#btn").val("获取验证码");
                              $("#btn").attr("disabled",false);
                           }
                         },1000);
                           // var yzm=
                           var sjh=$("#txt").val();
                           console.log(_this.yzm,sjh);
                           $.ajax({
                               type:"post",
                               url:"php/index.php?c=Sms&a=sendSms",
                               dataType: "json",
                               data:{sjh:sjh,yzm:_this.yzm},
                               success:function (data) {
                                   // var users=$("#txt").val;
                                   // localStorage.setItem("users",users);
                               }
                           });

                          }

             }

         });
      },
     enter:function () {
          var _this=this;
          $("#btn1").on("click",function () {
               // console.log(_this.yzm);
              if ($("#txt").val()== "") {
                  $(".fillout").html('手机号不能为空!');
                  // return;
              }
              else{
                  $(".fillout").html("");
                  if($("#write").val()==""){
                    $(".auth").html("请输入验证码");
                  }
                  else{
                      if (!(/^1[3|4|5|7|8]\d{9}$/.test($("#txt").val()))) {
                          // error.innerHTML='手机号格式有误.';
                          $(".fillout").html('手机号格式有误.');
                          // return;
                      }
                      else{
                          // var yzm=localStorage.getItem("yanzhenma");
                          // console.log(yzm);
                          if($("#write").val()!=_this.yzm){
                              $(".auth").html("验证码格式不正确");
                          }
                          else{
                              $(".auth").html("");
                              var da=$("form").serialize();
                              // console.log(da);
                              $.ajax({
                                  type:"post",
                                  url:"php/index.php?c=Login&a=registers",
                                  dataType:"json",
                                  data:da,
                                  success:function (data) {
                                      $.ajax({
                                          type: "get",
                                          url: "../php/index.php?c=Message&a=judge",
                                          dataType: "json",
                                          success: function (data) {

                                          }
                                      });
                                  }
                              })
                          }
                      }
                    }
              }

          })
     },
};
var reg=new Register();