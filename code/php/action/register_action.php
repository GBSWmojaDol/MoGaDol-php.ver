<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../inc_src/DBCnt.php';
    include "../inc_src/DBCnt.php";
    $URL = '../../php/page/main.php';
    $id = $_POST['create_id'];
    $pw = $_POST['create_pw'];
    $nkname = $_POST['nickname'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    $DATE = date("Y-m-d H:i:s", time());
    $ACCsession = 1;

    $hashpw = base64_encode(hash('sha256', $pw, true));
    
    $stmt = $conn->prepare("INSERT INTO user_info (user_idx, user_id, user_pw, user_nickname, addr1, addr2, makeTime, user_session) VALUES (null, ?, ?, ?, ?, ?, ?, ?)");
    $stmt -> bind_Param('ssssssi', $id, $hashpw, $nkname, $addr1, $addr2, $DATE, $ACCsession);
    $result = $stmt->execute();
    $stmt->close();

    if($result){
        echo "<script>alert('회원 등록 완료되었습니다.');
        location.href = '../../php/page/main.php'</script>";
    }

    ?>
</head>
<body>
    
</body>
</html>