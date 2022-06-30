<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include '../inc_src/DBCnt.php';
    include "../inc_src/DBCnt.php";
    $uid= $_GET["userid"];  //GET으로 넘긴 userid
    $sql= "SELECT * FROM user_info where user_id='$uid'";
    $result = mysqli_fetch_array(mysqli_query($conn, $sql));

    if(!$result){
        echo "<span style='color:blue;'>$uid</span> 는 사용 가능한 아이디입니다.";
       ?>
       <p><input type=button value="이 ID 사용" onclick="opener.parent.decide('<?php echo $uid ?>'); window.close();"></p>
        
    <?php
    } else {
        echo "<span style='color:red;'>$uid</span> 는 중복된 아이디입니다.";
        ?><p><input type=button value="다른 ID 사용" onclick="opener.parent.change(); window.close()"></p>
    <?php
    }
?>
</body>


</html>