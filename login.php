<?php include "header.php"; ?>

<script type="text/javascript">
	$(function(){
		$("#login").submit(function(e){
			e.preventDefault();
			$(this).find('input[type="submit"]').attr("disabled",true);
			$.ajax({
				type: "POST",
				method: "POST",
				url: "./byphp/todo.php",
				data: $(this).serialize(),
				dataType: "script",
			});
		});
	});
</script>


        <div id="center">
            <section>
                <div id="section" alt="컨텐츠영역">
                    <article>
                        <form id="login">
							<input type="hidden" name="exec" value="signin" />
                            <div id="loginCenter">
                                <div class="loginHead">로그인</div>
                                <div>
                                    <input class="loginTextbox" type="email" name="email" placeholder="이메일 입력" required />
                                </div>
                                <div>
                                    <input class="loginTextbox" type="password" name="password" placeholder="비밀번호 입력" required />
                                </div>
                                <div>
                                    <input class="loginSubmit" type="submit" value="로그인" />
                                </div>
                                <p align="center" class="loginText">
                                    아직 올스타빗 계정이 없으신가요?<a href="register.php"> 회원가입</a>
                                </p>
                                <p align="center" class="loginText">
                                    로그인에 문제가 있으신가요?<a href="passwordSet.php"> 패스워드 재설정</a>
                                </p>
                            </div>
                        </form>
                    </article>
                </div>
            </section>
        </div>
<?php include "footer.html"?>