function Zhuce() {
    this.txt=$("#txt");
    this.write=$("#write");
    this.init();
}
Zhuce.prototype={
    constructor:Zhuce,
    init:function () {
      this.zhuce();
    },
    zhuce:function () {
        var _this=this;
        var reg=/^(13|15|18|17)\d{9}$/g;
        $("#btn1").on("click",function () {
            if(_this.txt.val()==""){
                $(".fillout:eq(0)").html("手机号不能为空");
            }
            else if(!reg.test(_this.txt.val())){
                $(".fillout:eq(0)").html("手机号格式不正确");
            }else{
                $(".fillout:eq(0)").html("");
            }
            if(_this.write.val()==""){
                $(".mima").html('密码不能为空');
            }else if(_this.write.val().length<6){
                $(".mima").html('密码不能小于六位');
            }
        })

    }

}
var zhu=new Zhuce();
