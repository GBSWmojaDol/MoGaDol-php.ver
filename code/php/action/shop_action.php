<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
    include '../inc_src/UserSession.php';
    include '../inc_src/DBCnt.php';

    $name = $_POST['shop_name'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    $category = $_POST['CategoriSel'];
    $pack = $_POST['pack'];
    $wifi = $_POST['wifi'];
    $reserved = $_POST['reserve'];
    $shop_num = $_POST['shop_num'];
    $content = $_POST['content'];
    
    $DATE = date("Y-M-d-h-m-s", time());
    $UserName = $_SESSION['username'];
    $URL = "../../php/page/main.php";
    $content = $_POST['content'];
    $sess = 1;

    $idxdate1 = date("Y");
    $idxdate2 = date("m");
    $idxdate3 = date("d");
    $idxdate4 = date("m");
    $idxdate5 = date("s");

    $idxdate = $idxdate1 + $idxdate2 + $idxdate3 + $idxdate4 + $idxdate5;

    $menu1_upload_dir = '../../menu_files/menu_1/';
    $menu2_upload_dir = '../../menu_files/menu_2/';
    $menu3_upload_dir = '../../menu_files/menu_3/';

    $menu_name1 = $_POST['ShopMenu1Name'];
    $menu_name2 = $_POST['ShopMenu2Name'];
    $menu_name3 = $_POST['ShopMenu3Name'];

    $menu1_price = $_POST['ShopMenu1Price'];
    $menu2_price = $_POST['ShopMenu2Price'];
    $menu3_price = $_POST['ShopMenu3Price'];

    $menu_content1 = $_POST['MenuContent1'];
    $menu_content2 = $_POST['MenuContent2'];
    $menu_content3 = $_POST['MenuContent3'];
    
    $upload_dir = '../../shop_files/';
    move_uploaded_file( $_FILES['InputFile']['tmp_name'], "$upload_dir/$DATE.png");
    move_uploaded_file( $_FILES['menuFile1']['tmp_name'], "$menu1_upload_dir/$DATE.png");
    move_uploaded_file( $_FILES['menuFile2']['tmp_name'], "$menu2_upload_dir/$DATE.png");
    move_uploaded_file( $_FILES['menuFile3']['tmp_name'], "$menu3_upload_dir/$DATE.png");

    

    $stmt = $conn -> prepare("INSERT INTO shop_info (shop_idx, shop_name, writer_name ,shop_addr, addr_detail, categori, package_bool, wifi_bool, reserved_bool, call_num, img_addr, content, write_date, shop_session) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
    $stmt->bind_Param("isssssiiissssi", $idxdate,$name, $_SESSION['username'] ,$addr1, $addr2, $category, $pack, $wifi, $reserved, $shop_num, $DATE, $content, $DATE, $sess);
    $result = $stmt->execute();
    $stmt->close();



    $MenuStmt1 = $conn->prepare("INSERT INTO menu_info (shop_idx, menu_idx, img_address, menu_name, menu_intro, menu_price) VALUES (?,null, ?, ?, ?, ?);");
    $MenuStmt1 -> bind_Param('issss',$idxdate, $DATE, $menu_name1, $menu_content1, $menu1_price);
    $result1 = $MenuStmt1 ->execute();

    $MenuStmt2 = $conn->prepare("INSERT INTO menu_info (shop_idx,menu_idx, img_address, menu_name, menu_intro, menu_price) VALUES (?, null,?, ?, ?, ?);");
    $MenuStmt2 -> bind_Param('issss', $idxdate,$DATE, $menu_name2, $menu_content2, $menu2_price);
    $result2 = $MenuStmt2 ->execute();

    $MenuStmt3 = $conn->prepare("INSERT INTO menu_info (shop_idx,menu_idx, img_address, menu_name, menu_intro, menu_price) VALUES (?,null, ?, ?, ?, ?);");
    $MenuStmt3 -> bind_Param('issss', $idxdate,  $DATE, $menu_name3, $menu_content3, $menu3_price);
    $result3 = $MenuStmt3 ->execute();


    if($result){
        echo "<script>alert('등록 완료 되었습니다.');
        location.href = '../page/main.php';
        </script>";
    }
?>