<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MojaDoll</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<?php include "../inc_src/UserSession.php";
include "../inc_src/DBCnt.php";?>
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

    .container {
        text-align: center;
    }

    a {
        text-decoration: none;
        color: #888;
    }
</style>

<body>
    <header class="welcome-header">
        <h1 class="welcome-header__title">LOGIN</h1>
    </header>


    <div class="container">
        <?php

        if ($jb_login) {



        ?>

            <h2>이미 로그인 하셨습니다.</h2>


        <?php
        } else {



        ?>

            <form id="login-form" action="../action/login_action.php" method="post" onsubmit="return onSubmit()" autocomplete="off">
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="." id="floatingInput" name="login_id" />
                    <label for="floatingInput">ID</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" placeholder="." id="floatingInput" name="login_pw" />
                    <label for="floatingInput">PASSWORD</label>
                </div>
                <input type="submit" value="LogIn" />
            </form>

            <a href="../page/register_form.php">Create Account</a>

    </div>


<?php } ?>


</body>












<script src="https://kit.fontawesome.com/97a77746ec.js" crossorigin="anonymous"></script>
<script>
    function onSubmit() {
        let username = document.querySelector('input[name="login_id"]');
        let password = document.querySelector('input[name="login_pw"]');

        if (username.value.length == 0) {
            alert('아이디를 확인해주세요');
            return false;
        }

        if (password.value.length == 0) {
            alert('비밀번호를 확인해주세요');
            return false;
        }

        return true;
    }
</script>

</html>