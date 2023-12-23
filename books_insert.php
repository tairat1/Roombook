<!DOCTYPE html>
<?php
require 'mysql/config.php';

/*var_dump(
    isset($_POST['bkcust1']) ? $_POST['bkcust1'] :'',
    isset($_POST['bktel1']) ? $_POST['bktel1'] :'',
    isset($_POST['bkcust2']) ? $_POST['bkcust2'] :'',
    isset($_POST['bktel2']) ? $_POST['bktel2'] :'',
    isset($_POST['bkcust3']) ? $_POST['bkcust3'] :'',
    isset($_POST['bktel3']) ? $_POST['bktel3'] :'',
    isset($_POST['bkcust4'])? $_POST['bkcust4'] :'',
    isset($_POST['bktel4']) ? $_POST['bktel4'] :'' ); */

$bkin = $_POST['bkin'];
$bkout = $_POST['bkout'];

//ตรวจเช็คการรับค่าตัวแปร ถ้ามีการรับค่ามาให้ค่าเท่าตัวที่รับมา ถ้าไม่มีกดหนดใหเป็น ''
isset($_POST['bkcust1']) ? $_POST['bkcust1'] :'';
isset($_POST['bkcust2']) ? $_POST['bkcust2'] :'';
isset($_POST['bkcust3']) ? $_POST['bkcust3'] :'';
isset($_POST['bkcust4']) ? $_POST['bkcust4'] :'';
isset($_POST['bktel1']) ? $_POST['bktel1'] :'';
isset($_POST['bktel2']) ? $_POST['bktel2'] :'';
isset($_POST['bktel3']) ? $_POST['bktel3'] :'';
isset($_POST['bktel4']) ? $_POST['bktel4'] :'';

// เช็คเงื่อนไข ถ้าค่าไม่ว่างหรือ มีการรับข้อมูลมูลมา 
// ให้เก็บข้อมูล  $bkcust $bktel ให้ Sql คิวรี่ข้อมูลตามที่รับมาอีกที
if($_POST['bkcust1'] !='') {
    $bkcust =  $_POST['bkcust1'];
    $bktel=$_POST['bktel1']; }
elseif($_POST['bkcust2'] !=''){
    $bkcust =  $_POST['bkcust2'];
    $bktel=$_POST['bktel2']; }
elseif($_POST['bkcust3'] !=''){ 
    $bkcust =  $_POST['bkcust3'];
    $bktel=$_POST['bktel3']; }
elseif($_POST['bkcust4'] !=''){
    $bkcust =  $_POST['bkcust4'];
    $bktel=$_POST['bktel4']; };
//

if(isset($_POST['rmid'])){
    $rmid=$_POST['rmid'];
    $sql="SELECT COUNT(rmid) AS countid FROM books "
            . "WHERE rmid = '$rmid' AND bkstatus > 0 "
            . "AND ((bkin >= '$bkin' AND bkin < '$bkout') "
            . "OR (bkin < '$bkin' AND bkout > '$bkin'))";
    $result=$conn->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $countid=(int)$row['countid'];
    if($countid<1){
        $sql="INSERT INTO books(bkdate, rmid, bkin, bkout, bkcust, bktel, bkstatus) "
                . "VALUES (NOW(), '$rmid', '$bkin', '$bkout', '$bkcust', '$bktel', '1')";
        $result=$conn->query($sql);
        $v1=($result==1)?1:0;
    }else{
        $v1=0;
    }
}else{
    $v1=0;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบจองห้องพัก</title>
    </head>
    <body>
        <script>
            var v1=<?php echo $v1;?>;
            var vurl="rooms.php?bkin=<?php echo $bkin;?>";
            vurl+="&bkout=<?php echo $bkout;?>";
            vurl+="&bkcust=<?php echo $bkcust;?>";
            vurl+="&bktel=<?php echo $bktel;?>";
            if(v1==1){
                alert("การดำเนินการเสร็จสิ้น");
            }else{
                alert("การดำเนินการผิดพลาด");
            }
            window.location.replace(vurl);
        </script> 
    </body>
</html>
