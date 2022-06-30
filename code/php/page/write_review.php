<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>WriteReview</title>
</head>

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

*{
    font-family: 'LeferiPoint-WhiteA';
    text-align: center;
}

h1{
    font-family: 'S-CoreDream-2ExtraLight';
}

#floatingTextarea{
    height: 200px;
    margin-bottom: 20px;
}

.star-rating {
  display: flex;
  flex-direction: row-reverse;
  font-size: 2.25rem;
  line-height: 2.5rem;
  justify-content: space-around;
  padding: 0 0.2em;
  text-align: center;
  width: 5em;
}
 
.star-rating input {
  display: none;
}
 
.star-rating label {
  -webkit-text-fill-color: transparent; /* Will override color (regardless of order) */
  -webkit-text-stroke-width:1px;
  -webkit-text-stroke-color: #2b2a29;
  cursor: pointer;
}
 
.star-rating :checked ~ label {
  -webkit-text-fill-color: yellow;
}
 
.star-rating label:hover,
.star-rating label:hover ~ label {
  -webkit-text-fill-color: #fff58c;
}

<?php 
    include "../inc_src/UserSession.php";
    include "../inc_src/DBCnt.php";
?>
</style>
<script src="../../js/checkInfo.js"></script>
<script src="../../js/connection.js"></script>
<body>
    <header class="welcome-header">
       
        <h1 class="account_title welcome-header__title">Write Review</h1>
    </header>

<?php 
    $id = $_GET['id'];
    $shop_name = $_GET['shop_name'];
    if($jb_login){
?>


    <div class="container">
    <form id="login-form" enctype='multipart/form-data' action="../../php/action/review_write_action.php" method="post"  autocomplete="off" required>

<div class="form-floating">
    <input type="text" class="form-control" placeholder="." id="floatingInput" name="create_id" required/>
    <label for="floatingInput">리뷰 제목을 작성해주세요</label>
</div>
<div class="form">
    <input type="text" class="form-control" placeholder="." id="floatingInput" name="shop_name" value="<?php echo $shop_name; ?>" required/>
    
</div>

<p>별점</p>
<div class="star-rating space-x-4 mx-auto">
	<input type="radio" id="5-stars" name="rating" value="5" v-model="ratings" required/>
	<label for="5-stars" class="star pr-4">★</label>
	<input type="radio" id="4-stars" name="rating" value="4" v-model="ratings"required/>
	<label for="4-stars" class="star">★</label>
	<input type="radio" id="3-stars" name="rating" value="3" v-model="ratings"required/>
	<label for="3-stars" class="star">★</label>
	<input type="radio" id="2-stars" name="rating" value="2" v-model="ratings"required/>
	<label for="2-stars" class="star">★</label>
	<input type="radio" id="1-star" name="rating" value="1" v-model="ratings" required/>
	<label for="1-star" class="star">★</label>
</div>

<div class="mb-3">
  <label for="formFileMultiple" class="form-label"></label>
  <input class="form-control" type="file" id="formFile" accept=".jpeg, .jpg, .png" name="InputFile"required>
</div>

<p>리뷰 내용</p>
<div class="form-floating">
<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content"required></textarea>
    <label for="floatingInput">CONTENT</label>
</div>
<input type="text" style="display: none;" name="shop_idx" value="<?php echo $id; ?>" />

<input type="submit" value="Write-Review" />
</form>
    </div>


    <?php
    }else{

    ?>

    <p >로그인이 필요한 기능입니다.</p>
    <a href="../page/login_form.php" >로그인 하기</a>

    <?php  } ?>
</body>


</html>