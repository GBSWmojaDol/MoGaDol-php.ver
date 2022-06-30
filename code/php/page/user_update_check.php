<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>REGISTER</title>
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
}

h1{
    font-family: 'S-CoreDream-2ExtraLight';
}
</style>
<script src="../../js/checkInfo.js"></script>
<script src="../../js/connection.js"></script>
<body>
    <header class="welcome-header">
       
        <h1 class="account_title welcome-header__title">계정 수정</h1>
    </header>
    <div class="container">
    <form id="login-form" action="../../php/page/user_update.php" method="post"  autocomplete="off">

<div class="form-floating">
    <input type="password" class="form-control" placeholder="." id="floatingInput" name="create_pw"/>
    <label for="floatingInput">PASSWORD</label>
</div>

<?php include "../inc_src/DBCnt.php"; ?>
<input type="submit" value="Delete-Account"  />
</form>
    </div>
</body>
</html>