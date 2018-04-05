<?php
require_once(__DIR__.'/byphp/common.php');

?><!doctype html>
<html lang="ko">
    <head>
        <title>ALLSTARBIT</title>
        <link rel="stylesheet" type="text/css" href="css/style.css?v=154">

		<link type="text/css" rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <script type="text/javascript" src="js/script.js?v=22"></script>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    </head>

    <body>

        <header>
            <div id="header" alt="헤더영역" class="clear">
                <div class="logo">
                    <a href="index.php"><img src="img/allstarbit_logo.png"></a>
                </div>
                <ul class="headerTitle">
                    <li><a href="index.php">거래소</a></li>
                    <li><a href="wallet.php">지갑관리</a></li>
                    <li><a href="investment.php">투자내역</a></li>
                    <li><a href="account.php">계정관리</a></li>
                    <li><a href="notice.php">공지사항</a></li>
                </ul>
				<?php
				if($mbsx['login']===true) {
				?>
                <div class="loginBtn" align="center" style="visibility:hidden;">
                    <a href="#">#</a>
                </div>
                <div class="loginBtn" align="center">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?logout">로그아웃</a>
                </div>
				<?php
				}
				else {
				?>
                <div class="loginBtn" align="center">
                    <a href="login.php">로그인</a>
                </div>
                <div class="loginBtn" align="center">
                    <a href="register.php">회원가입</a>
                </div>
				<?php
				}
				?>
                <div style="clear: both"></div>
            </div>
        </header>
        