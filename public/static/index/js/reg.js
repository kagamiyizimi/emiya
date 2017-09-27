/**
 * Created by Administrator on 2017/9/26 0026.
 */
// window.onload=function () {
//     var phone=document.getElementById('username');
//     var reg01=/[0-9]{11}/;
//     var reg01=/[0-9]{11}/;
//     var reg01=/[0-9]{11}/;
//     var reg01=/[0-9]{11}/;
//     var woring=document.getElementsByClassName('woring')[0];
//     var woring1=document.getElementsByClassName('woring')[1];
//     var woring2=document.getElementsByClassName('woring')[2];
//     var woring3=document.getElementsByClassName('woring')[3];
//     var woring4=document.getElementsByClassName('woring')[4];
//     phone.onchange=function () {
//         var phone_num=phone.value;
//         // console.log(reg01.test(phone_num));
//         var res= reg01.test(phone_num);
//         if(!res){
//             woring.style.display="block";
//         }else{
//             woring.style.display="none";
//         }
//     }
// }
$(function () {
    var reg01=/^1[34578]\d{9}$/;
    var reg02=/^.{6,20}/;
    var reg03=/[a-zA-Z]/;
    var reg04=/[^%&',;=?$\x22]/;
    $('.reg_chan:eq(0)').change(function () {
        var res1= reg01.test($(this).val());
        if(!res1){
            $('.woring:eq(0)').show()
        }else {
            $('.woring:eq(0)').hide()
        }
    })
    $('.reg_chan:eq(1)').change(function () {
        var res1= reg02.test($(this).val());
        var res2= reg03.test($(this).val());
        var res3= reg04.test($(this).val());
        if(!res1){
            $('.woring:eq(1)').show();
            $('.reg_inp>.reg_level').css({display:'none'})
        }else {
            $('.woring:eq(1)').hide();
            $('.reg_inp>.reg_level1').css({display:"block"});
            if(res2){
                $('.reg_inp>.reg_level2').css({display:"block"});
                if(res3){
                    $('.reg_inp>.reg_level3').css({display:"block"});
                }
            }
        }
    })
    $('.reg_chan:eq(2)').change(function () {
        var val1=$('.reg_chan:eq(1)').val();
        var val2=$('.reg_chan:eq(2)').val();
        console.log(val1,val2);
        if(val1!=val2){
            $('.woring:eq(2)').show();
        }else {
            $('.woring:eq(2)').hide();
        }
    })
    $('.msg_send').click(function () {

        var mobile=$('input[name=mobile]').val();

        $.ajax({
            type:'POST',
            dataType:'json',
            url:"/index.php/index/Reg/message",
            data:{mobile:mobile},
            success:function (d) {
                alert(mobile)
                alert(d.msg);
            }
        })
    })
})
