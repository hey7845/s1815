<?php
/*
    zy
    2018年5月31日
*/
$con=mysqli_connect("localhost","root","123qwe!@#","s1815");
// 检查连接
if (!$con) {     
       print 'Cant connect to MySQL Server'.mysqli_connect_error();     
    }
    
// 更新到参数表
$jd_updateSql = "update xt_fee set str1 = ".randomFloat(7,11);
mysqli_query($con,$jd_updateSql);
$fee_updateSql = "update xt_fee set i3=1";
mysqli_query($con,$fee_updateSql);
//2位小数的随机数
function randomFloat($min = 7, $max = 11)
{
    $num = $min + mt_rand() / mt_getrandmax() * ($max - $min);
    return sprintf("%.2f", $num);
}
?>