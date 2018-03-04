function Love() {
    this.init();
}
Love.prototype={
    init:function () {
        this.slide();
        this.wenzi();
        this.xuehua();
        this.huaaixin();
    },
    slide:function () {
        var swiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            on: {
                touchEnd: function () {
                    var TR = swiper.translate;
                    console.log(TR)
                    if (TR < -950) {
                        window.location.href = "register.html";
                        // location.href =http://www.swiper.com.cn
                        // alert(1);
                    }
                },


                // on: {
            //     touchEnd:function (event) {
            //         alert(1);
            //         // window.location.href="register.html";
            //         // var startY;
            //         // var endY;
            //         // window.addEventListener("touchstart",function(e){
            //         //     startY=e.touches[0].clientX;
            //         // },false);
            //         // window.addEventListener("touchmove",function(e){
            //         // },false);
            //         // window.addEventListener("touchend",function(e){
            //         //     endY=e.changedTouches[0].clientX;
            //         //     // var time=setTimeout(function(){
            //         //         if(endY-startY<=-100&&swiper.activeIndex==2){
            //         //             window.location.href="register.html";
            //         //         }
            //         //     // },2000)
            //         // },false)
            //     },
                slideChange: function(){
                    if(swiper.activeIndex==0){
                        $(".bigBox").css("display","block");
                    }else{
                        $(".bigBox").css("display","none");
                    }
                    if(swiper.activeIndex==1){

                    }else{
                    }
                    if(swiper.activeIndex==2){
                        $(".dhBOX").css("display","block") ;
                    }else{
                        $(".dhBOX").css("display","none");
                    }
                }

            }
        })
    },
    wenzi:function () {
        // alert(1);
        var content = document.getElementById("content1");
        var strArry = content.innerText.split('');
        content.innerText='';
        var i=0;
        var timer = setInterval(function () {
            if (i<strArry.length){
                content.innerText += strArry[i];
                i++;
            }else {
                clearInterval(timer);
            }
        },100);
    },
    xuehua:function () {
        $(function() {
            var snowflakeURl = [
                './img/icon_petal_1.png',
                './img/icon_petal_2.png',
                './img/icon_petal_3.png',
                './img/icon_petal_4.png',
                './img/icon_petal_5.png',
                './img/icon_petal_6.png',
                './img/icon_petal_7.png',
                './img/icon_petal_8.png'
            ]
            var container = $("#content");
            visualWidth = container.width();
            visualHeight = container.height();
            //获取content的宽高
            function snowflake() {
                // 雪花容器
                var $flakeContainer = $('#snowflake');

                // 随机六张图
                function getImagesName() {
                    return snowflakeURl[[Math.floor(Math.random() * 8)]];
                }
                // 创建一个雪花元素
                function createSnowBox() {
                    var url = getImagesName();
                    return $('<div class="snowbox" />').css({
                        'width': 25,
                        'height': 26,
                        'position': 'absolute',
                        'backgroundRepeat':'no-repeat',
                        'zIndex': 100000,
                        'top': '-41px',
                        'backgroundImage': 'url(' + url + ')'
                    }).addClass('snowRoll');
                }
                // 开始飘花
                setInterval(function() {
                    // 运动的轨迹
                    var startPositionLeft = Math.random() * visualWidth - 100,
                        startOpacity    = 1,
                        endPositionTop  = visualHeight - 40,
                        endPositionLeft = startPositionLeft - 100 + Math.random() * 500,
                        duration        = visualHeight * 10 + Math.random() * 5000;
                    // 随机透明度，不小于0.5
                    var randomStart = Math.random();
                    randomStart = randomStart < 0.5 ? startOpacity : randomStart;
                    // 创建一个雪花
                    var $flake = createSnowBox();
                    // 设计起点位置
                    $flake.css({
                        left: startPositionLeft,
                        opacity : randomStart
                    });
                    // 加入到容器
                    $flakeContainer.append($flake);
                    // 开始执行动画
                    $flake.transition({
                        top: endPositionTop,
                        left: endPositionLeft,
                        opacity: 0.7
                    }, duration, 'ease-out', function() {
                        $(this).remove() //结束后删除
                    });
                }, 500);
            }
            snowflake()
            //执行函数
        })
    },
    huaaixin:function () {
        var b = document.getElementsByClassName('top')[0];
        var c = document.getElementsByTagName('canvas')[0];
        var a = c.getContext('2d');
        eval('var M=Math,n=M.pow,i,E=2,F="rgba(233,61,109,",d=M.cos,z=M.sin,L=1,u=30,W=window,w=c.width=W.innerWidth,h=c.height=W.innerHeight,r=_1){return M.random()*2-1},y="px Arial",v="♥",q="♥",X=w/3,Y=h/1,T=2,p=_1){var e=this;e.g=_1){e.x=X;e.y=Y;e.k=0;e.l=0;e.t=M.random()*19000;e.c=e.t};e.d=_1){a.fillStyle=F+(e.c/e.t)+")";a.fillText(q,e.x,e.y);e.c-=50;e.x+=e.k;e.y+=e.l;e.k=e.k+r();e.l=e.l+r();if(e.c<0||e.x>w||e.x<0||e.y>h||e.y<0){e.g()}};e.g()},A,B;a.textAlign="center";a.strokeStyle="#000";a.lineWidth=2;for(i=0;i<350;i++){M[i]=new p()}setInterval(_1){a.clearRect(0,0,w,h);a.font=u+y;X=(w/3*n(z(T),3)+w/2);Y=0.8*(-h/40*(13*d(T)-5*d(2*T)-2*d(3*T)-d(4*T))+h/2.3);T+=(z(T)+3)/99;for(i=0;i<350;i++){with(M[i]){A=(x/w-0.5)*0.9,B=-(y/h-0.5);if(L&&(A*A+2*n((B-0.5*n(M.abs(A),0.5)),2))>0.11){k=l=0}d()}}a.font=120+y;if(E>0.1){if(E<1){a.fillStyle=F+E+")";a.fillText("Click",w/2,h/2)}E-=0.02}a.fillStyle="#E93D6D";a.fillText(v,X,Y+u);a.strokeText(v,X,Y+u)},50);b.bgColor="#FFEFF2";c.onmouseup=_1){L=(L)?0:1}'.replace(/(_1)/g,'function('))
    }
}
var l=new Love();
