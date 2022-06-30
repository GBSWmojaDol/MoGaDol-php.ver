<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>information</title>
    <link rel="stylesheet" href="../../css/style.css">
    <?php
    include "../inc_src/DBCnt.php";
    include '../inc_src/UserSession.php';
    ?>
    <style>
        @font-face {
            font-family: 'S-CoreDream-2ExtraLight';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_six@1.2/S-CoreDream-2ExtraLight.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'LeferiPoint-WhiteA';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2201-2@1.0/LeferiPoint-WhiteA.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        * {
            font-family: 'LeferiPoint-WhiteA';
        }

        body{
            background-color: #f1f1f5;
        }

        h1 {
            font-family: 'S-CoreDream-2ExtraLight';
        }

        .nav-list {
            padding-top: 8px;
        }

        .container {
            text-align: center;
            margin-top: 350px;
        }



        .abox {
            margin-top: 70px;
        }

        .abox a {
            margin-left: 10px;
            margin-right: 10px;
        }

        .ateg_box{
            text-align: center;
        }

        .nametime {
            padding-top: 20px;
            padding-bottom: 20px;
            text-align: center;
            /*border-radius: 12px;*/
            border: 1px solid #888;
            background-color: white;
            margin-bottom : 30px;
        }


        .img_rev {
            display: block;
            margin: auto;
            margin-top: 20px;
            width: 300px;
            height: 400px;

            /*border-radius: 22px;*/
            box-shadow: 0 0 6px rgba(0, 0, 0, .4);
            margin-bottom: 20px;
        }

        .header {
            width: 100%;
            height: 60px;
            border-bottom: 1px solid #ccc;
            line-height: 70px;
            background-color: white;
        }

        h3 {
            text-align: center;
        }

        .back_icon {
            width: 30px;
            height: 30px;
            vertical-align: middle;
            margin-left: 10px;
        }

        .shop_img {
            width: 80%;
            margin-bottom: 20px;
            margin-top: 10px;

            border-radius: 12px;
            box-shadow: 0 0 8px rgba(0, 0, 0, .3);
        }

        .container {
            margin: auto;
            margin-top: 0;
            margin-bottom: 20px;
            width: 90%;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 0 3px rgba(0, 0, 0, .3);
        }

        .text-sm {
            font-size: 0.8rem;
        }

        p {
            margin-bottom: 4px;
        }

        .btn {
            width: 50%;
            height: 70px;
            line-height: 70px;
            color: white;
            list-style-type: none;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-color: #6178D4;

            margin: auto;
            margin-top: 30px;
            transition: all 0.4s ease-in-out;
        }

        .btn:active {
            border: #6178D4 2px solid;
            background-color: white;
            color: #6178D4;
        }

        table {
            margin: auto;
        }

        #myjer{
            height: 400px;
            border: 1px #ccc solid;
            /*border-radius: 4px;*/
            margin-top: 40px;
            overflow-y: scroll;
          
            background-color: #ddd;
        
        }

        tr{
            justify-content: space-between;
        }


        .menu_img{
            width: 100px;
            height: 100px;
            border-radius: 4px;
            box-shadow: 0 0 6px rgba(0, 0, 0, .4);
            display : block;
            float: left;
        }
      
        .menu_boxx{
            position: relative;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .menu_box{
            border-bottom : 1px solid #ccc;
            height: 100px;
            width: 90%;
            margin: auto;

        }

        .text_box{
            display: block;
        }

        a{
            text-align: center;

        }

        a li{
            margin: auto;
        }

        .wrap-box{
            padding-top: 20px;
            padding-bottom: 20px;
        }

        #wid{
            margin-top: 30px;
        }
    </style>


    <?php
    $id = $_GET["id"];
    $sql = "SELECT * FROM shop_info WHERE shop_idx = " . $id . ";";
    $sql2 = "SELECT * FROM review_info WHERE shop_idx = " . $id . ";";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $total = mysqli_num_rows($result2);
    $rows = mysqli_fetch_assoc($result);

    $str = nl2br($rows['content']);
    ?>



</head>

<body>

    <div class="header">
        <a href="../page/main.php">
            <img src="../../img/arrow.png" class="back_icon">
            
        </a>



    </div>

    <div class="container" id="wid">
        <div class="wrap-box">
        <img src="../../shop_files/<?php echo $rows['img_addr'] ?>.png" class="shop_img">
        <h3><?php echo $rows['shop_name'] ?></h3>
        <p><?php echo $rows['categori'] ?></p>
        <P><?php echo $rows['shop_addr']  ?></P>
        <p class="text-sm"><?php echo $rows['addr_detail']  ?></p>
        <p>call : <?php echo $rows['call_num'] ?></p>
        
        <P><?php echo $str; ?></P>
        
        <hr />
        <table>
            <tr>
                <td>포장</td>
                <td><?php if ($rows['package_bool'] == 1) {
                        echo "가능";
                    } else {
                        echo "불가능";
                    } ?></td>
            </tr>


            <tr>
                <td>무선 인터넷</td>
                <td><?php if ($rows['wifi_bool'] == 1) {
                        echo "가능";
                    } else {
                        echo "불가능";
                    } ?></td>
            </tr>

            <tr>
                <td>예약</td>
                <td><?php if ($rows['reserved_bool'] == 1) {
                        echo "가능";
                    } else {
                        echo "불가능";
                    } ?></td>
            </tr>
        </table>
        </div>
        
    </div>


    <div class="container">
    <div class="menu_boxx">
        <?php 
            $sqll = "SELECT * FROM menu_info WHERE shop_idx = '".$id."' ORDER BY menu_idx ASC;";
            $result4 = $conn->query($sqll);
            $ressss = 1;
            $total222 = mysqli_num_rows($result4);
            while ($rowss = mysqli_fetch_assoc($result4)) {
        ?>

                <div class="menu_box">
                    <img src="../../menu_files/menu_<?php echo $ressss."/".$rowss['img_address'] ?>.png" class="menu_img">
                    <div class="text_box">

                    <h4><?php echo $rowss['menu_name'] ?></h4>
                    가격 : <?php echo $rowss['menu_price'] ?>
                    <br />
                    <?php echo $rowss['menu_intro']?>

                    </div>
                </div>
                


                <?php
                $ressss++;
             $total222--;
            } ?>

</div>
    </div>




    <a href="../page/write_review.php?id=<?php echo $id; ?>&shop_name=<?php echo $rows['shop_name']; ?>">
            <li class="btn">후기 등록하기</li>
        </a>

    


    <?php
        if($jb_login){

            if($rows['writer_name'] == $_SESSION['username']){ ?>
                <div class="ateg_box">
                    <a href ="../page/shop_update.php?id=<?php echo $id ?>">수정</a>
                    <a href = "../action/shop_delete_action.php?id=<?php echo $id ?>">삭제</a>
                </div>
        
                <?php } }?>

    <div class="container" id="myjer">
        <p>이 식당의 후기 : <?php echo $total ?> 개</p>
                    
<?php
        while ($row = mysqli_fetch_assoc($result2)) { //DB에 저장된 데이터 수 (열 기준)
        ?>

            <div class="comm_box">
                <a href="../page/Readmore.php?id=<?php echo strip_tags($row['review_idx']); ?>">
                    <div class="nametime">

                        <b>제목 : <?php echo strip_tags($row['review_title']); ?></b>
                        <br />

                        <p class="star" style="text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #000; color:yellow; margin-bottom:0;">
        <?php 
            for($i = 0; $i < $row['star_point']; $i++){
                echo "★";
            }
        ?>
        </p>
                        <br />
                        <?php echo strip_tags($row['write_day']); ?>
                    
                    </div>
                </a>
            </div>
            
            
        <?php
            $total--;
        }
        ?>
    
    </div>


    <nav class="nav">
        <?php include '../inc_src/menu.php' ?>
    </nav>
</body>
<script src="https://kit.fontawesome.com/97a77746ec.js" crossorigin="anonymous"></script>

</html>