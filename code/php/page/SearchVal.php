<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/699db093f5.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
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

        h1 {
            font-family: 'S-CoreDream-2ExtraLight';
        }
        .nav-list{
            padding-top: 8px;
        }

        .container{
            text-align: center;
            margin-top: 350px;
        }



        .abox{
            margin-top: 70px;
        }

        .abox a{
            margin-left: 10px;
            margin-right: 10px;
        }

        #myjer{
            height: 200px;
            border: 1px #444 solid;
            border-radius: 12px;
            margin-top: 40px;
            overflow-y: scroll;
        }

        .nametime{
            border-radius: 4px;
            box-shadow: 0 0 2px rgba(0, 0, 0, .4);
            margin-bottom: 80px;
            text-align: center;
            
        }

        h3{
            margin-top: 30px;
            text-align: center;
        }

        .img_rev{
            display: block;
            margin: auto;
            margin-top: 20px;
            width: 300px;
            height: 400px;
            border-radius: 22px;
            box-shadow: 0 0 6px rgba(0, 0, 0, .4);
            margin-bottom: 20px;
        }
    </style>
  <title>Search</title>
</head>

<body>
        <?php 
        include "../inc_src/DBCnt.php";
        $search = $_GET['search'];

        $sql = "SELECT * FROM review_info WHERE shop_name Like '%".$search."%' OR review_title LIKE '%".$search."%' OR content LIKE '%".$search."%' OR shop_name LIKE '%".$search."%' ORDER BY review_idx DESC";
        $sql2 = "SELECT * FROM shop_info WHERE shop_name LIKE '%".$search."%' ORDER BY shop_idx DESC";

        

        $result = $conn->query($sql);
        $total = mysqli_num_rows($result);


        $result2 = $conn->query($sql2);
        $total2 = mysqli_num_rows($result2);
        ?>
    <form id="search-form" action="../page/SearchVal.php" method="get">
      <div class="form-floating" id="searchBox">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="search" autocomplete="off" value="<?php echo $search?>">
        <label for="floatingInput">검색할 식당 이름을 입력하세요</label>
      </div>
    </form>

    <?php if($total2 == 0){?>
        <h3>식당 검색 결과가 없습니다</h3>
<hr />
    
    
    
  <?php   }else{?>

    
<h3>식당 검색 결과 : <?php echo $total2; ?>개</h3>
<?php
while($row2 = mysqli_fetch_assoc($result2)){ //DB에 저장된 데이터 수 (열 기준)
    ?>

<div class="comm_box">
<a href="../page/shop_info.php?id=<?php echo strip_tags($row2['shop_idx']);?>" >
<div class="nametime">
    <img src="../../shop_files/<?php echo strip_tags($row2['img_addr']) ?>.png" class="img_rev"> 
    <b>가게 이름 : <?php echo strip_tags($row2['shop_name']); ?></b>
    <br />
    <?php echo strip_tags($row2['categori']); ?>
    
</div>
</a>
</div>
<?php
$total2--;
    }


}
?>




    <?php if($total == 0){ ?>
        <hr />
<h3>리뷰 검색 결과가 없습니다</h3>
<hr />

<?php
}else{ ?>
<hr />
<h3>리뷰 검색 결과 : <?php echo $total; ?>개</h3>
<?php
while($row = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
    ?>

<div class="comm_box">
<a href="../page/Readmore.php?id=<?php echo strip_tags($row['review_idx']);?>" >
<div class="nametime">
    <img src="../../file/<?php echo strip_tags($row['img_address']) ?>.png" class="img_rev"> 
    <b>식당 이름 : <?php echo strip_tags($row['shop_name']); ?></b>
            <br />
    <b>제목 : <?php echo strip_tags($row['review_title']); ?></b>
    <br />
    
    별점 :  <?php for($i = 0; $i < $row['star_point']; $i++){
        echo "★";
   } ?>
    <br />
    <?php echo strip_tags($row['write_day']); ?>
    
</div>
</a>
</div>
<?php
$total--;
    }


}
?>


    <nav class="nav">
    <?php include '../inc_src/menu.php'?>
    </nav>
  
</body>   

</html>
