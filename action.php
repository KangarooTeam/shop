<?php
    function tovar($value) {
        $con_str= mysqli_connect('localhost', 'root', '', 'test');
        $result_q= mysqli_query($con_str, "SELECT info FROM `market` WHERE name='$value'");
        while ($res= mysqli_fetch_array($result_q)) {
            echo $res['info'];
        }
     }
?>