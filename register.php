<?php include "header.php"; ?>

<script type="text/javascript">
	$(function(){
		$(".registerSubmit").off("click");
		$(".registerPopupClose").click(function(){
			$("#register").each(function(){
				this.reset();
			});
			$("#registerPopup").hide();
			self.location.reload();
		});
		$("#register").submit(function(e){
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
		$("#verify").submit(function(e){
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
		$("#resend").on("click",function(e){
			e.preventDefault();
			if(!$("#verify").find('input[name="email"]').val()){
				alert("올바르지 못한 접근입니다.");
			}
			else{
				$("#resend").attr("disabled",true);
				$.ajax({
					type: "POST",
					method: "POST",
					url: "./byphp/todo.php",
					data: {
						"exec": "sendmail-verify",
						"email": $("#verify").find('input[name="email"]').val(),
					},
				}).done(function(msg){
					if(msg)	alert(msg);
					$("#resend").attr("disabled",false);
				});
			}
		});
	});
</script>


        <div id="center">
            <section>
                <div id="section" alt="컨텐츠영역">
                    <article>
                        <form id="register">
							<input type="hidden" name="exec" value="signup" />
                            <div id="registerCenter">
                                <div class="registerHead">
                                    회원가입
                                </div>

                                <div>
                                    <input type="email" name="email" placeholder="이메일 입력" required />
                                </div>
                                <div>
                                    <input type="password" name="password" placeholder="패스워드 입력" required />
                                </div>
                                <div>
                                    <input type="password" name="passwordConfirm" placeholder="패스워드 확인" required />
                                </div>
                            </div>
                            <div id="registerTerms">
                                <div class="termsAllSelect">
                                    <img src="img/checkbox_off.png">
                                    <input type="checkbox" value="off" style="display:none;"> 모두 동의 합니다
                                </div>
                                
                                <div>
                                    올스타빗 이용약관 동의<font color="f5b74c">(필수)</font>
                                </div>
                                <div>
                                    <textarea>dd</textarea>
                                </div>
                                <div align="right"  class="agreeCheck">
                                    <img src="img/checkbox_off.png">
                                    <input type="checkbox" value="off" style="display:none;"> 동의 합니다
                                </div>
                                
                                <div>
                                    개인정보 수집 및 이용에 대한 동의<font color="f5b74c">(필수)</font>
                                </div>
                                <div>
                                    <textarea>dd</textarea>
                                </div>
                                <div align="right"  class="agreeCheck">
                                    <img src="img/checkbox_off.png">
                                    <input type="checkbox" value="off" style="display:none;"> 동의 합니다
                                </div>
                                
                                <div>
                                    이벤트 등 프로모션 알림 수신에 대한 동의<font color="f5b74c">(선택)</font>
                                </div>
                                <div>
                                    <textarea>dd</textarea>
                                </div>
                                <div align="right"  class="agreeCheck">
                                    <img src="img/checkbox_off.png">
                                    <input type="checkbox" value="off" style="display:none;"> 동의 합니다
                                </div>
                                
                                <div>
                                    <input type="submit" value="회원가입" class="registerSubmit" />
                                </div>
                                
                            </div>
                        </form>
                        <div class="registerAnchor">
                            <a href="login.php">로그인&nbsp;</a>|<a href="passwordSet.php">&nbsp;패스워드설정</a>
                        </div>
                        <br>
                    </article>
                    
                    <article>
                        <div id="registerPopup">
                            <div class="registerPopupCenter">
								<form id="verify">
								<input type="hidden" name="exec" value="verify-email" />
                                <div class="registerPopupHead">이메일 인증</div>
                                <div class="registerPopupContent">등록해 주셔서 감사합니다 ! 인증코드가 담긴 이메일을 고객님의 이메일 주소로 발송 했습니다. 발송된 이메일에 포함된 인증코드를 아래칸에 입력해 주십시오</div>
                                <div class="registerPopupHead">이메일 주소</div>
                                <div><input type="text" name="email" class="registerPopupTextbox" placeholder="받아온 이메일" required readonly /></div>
                                <div><input type="text" name="rpc" class="registerPopupTextbox" placeholder="인증코드 입력" required /></div>
                                
                                <div class="cordResend clear">
                                    <div>
                                    <img src="img/warning.png">인증코드가 발송되지 않았거나 인증 코드가 만료된경우에는 재발급 신청을 해주시기 바랍니다
                                    </div>
                                    <div><input type="button" id="resend" value="인증코드 재전송" /></div>
                                </div>
                                <div class="registerPopupSubmit clear">
                                    <div><input type="button" value="닫기" class="registerPopupClose"></div>
                                    <div><input type="submit" value="인증코드 확인" /></div>
                                </div>
								</form>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </div>
<?php include "footer.html"?>