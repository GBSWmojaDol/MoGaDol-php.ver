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
    include '../inc_src/UserSession.php';

    $shop_idx = $_POST['review_idx'];
    $shop_name = $_POST['create_id'];
    $content = $_POST['content'];
    $DATE = date("Y-M-d-h-m-s", time());
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    $categori = $_POST['CategoriSel'];
    $pack_radio = $_POST['pack'];
    $wifi_radio = $_POST['wifi'];
    $reserve = $_POST['reserve'];
    $callNum = $_POST['shop_num'];


    $upload_dir = '../../shop_files';
    move_uploaded_file($_FILES['InputFile']['tmp_name'], "$upload_dir/$DATE.png");
    $URL = "../../php/page/main.php";

    $stmt = $conn->prepare("UPDATE shop_info SET shop_name = ?, shop_addr = ?, addr_detail = ?, categori = ?, package_bool = ?, wifi_bool = ?, reserved_bool = ?, call_num = ?, img_addr = ?, content = ? WHERE shop_idx =  '".$shop_idx."'; ");
    $stmt ->bind_param("ssssiiisss", $shop_name, $addr1, $addr2, $categori, $pack_radio, $wifi_radio, $reserve, $callNum, $DATE, $content);
    $result = $stmt ->execute();

    if($result){

        echo "<script>
        console.log('ss');
        alert('변경 완료');
        location.href = '".$URL."';
        </script>";
    
    }
  
    

    ?>
    
</body>
</html>