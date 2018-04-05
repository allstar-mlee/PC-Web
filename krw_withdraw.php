<?php include "header.php"; ?>

<?php
if($mbsx['login']!==true) {
	echo '<script type="text/javascript">';
	echo 'alert("로그인 후 이용해주세요.");';
	echo 'self.location.replace("./login.php");';
	echo '</script>';
	exit;
}

$resp=Jcurl('GET','https://api.allstarbit.com/public/wallet/'.$mbsx['email'].'/'.$mbsx['password'].'/KRW',false);
$resx=json_decode($resp,true);

?>

<script type="text/javascript">
	$(function(){
		$("#output").submit(function(e){
			e.preventDefault();
			if(parseInt($(this).find('input[name="amount"]').val())>0){
				$(this).find('input[type="submit"]').attr("disabled",true);
				$.ajax({
					type: "POST",
					method: "POST",
					url: "./byphp/todo.php",
					data: $(this).serialize(),
					dataType: "script",
				});
			}
			else{
				alert("촐금 금액을 입력해 주십시오.");
				$(this).find('input[name="amount"]').focus();
			}
		});
	});
</script>

        <div id="center">
            <section>
                <div id="section" alt="컨텐츠영역">
                    <article>
						<form id="output">
							<input type="hidden" name="exec" value="output" />
							<input type="hidden" name="issue" value="KRW" />
                            <div id="krwWithdrawCenter">
                                <div class="krwWithdrawHeader">
                                    <p>KRW 출금</p>
                                    <p>보유중인 KRW 지갑 잔고를 은행계좌로 출금합니다.</p>
                                </div>
                                <div class="krwWithdrawBody1">
                                    <p>STEP 1. 출금 금액을 입력해 주십시오.</p>
                                    <div>
                                        <ul>
                                            <li>출금 가능</li>
                                            <li><?php echo ($resx['data']['balance']-$resx['data']['readOnly']);?><span>KRW</span></li>
                                        </ul>
                                        <div>
                                            <input type="text" name="amount" value="0" />
                                            <span>KRW</span>
                                            <div>
                                                <div></div>
                                                <div></div>
                                                <span>0%</span>
                                            </div>
                                            <ul>
                                                <li>출금 수수료</li>
                                                <li>1,000<span>KRW</span></li>
                                            </ul>
                                            <ul>
                                                <li>총 출금액</li>
                                                <li>0<span>KRW</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="krwWithdrawBody2">
                                    <p>STEP 2. 고객님의 계좌 정보를 확인해 주십시오.</p>
                                    <ul>
                                        <li>은행</li>
                                        <li>우리은행</li>
                                    </ul>
                                    <ul>
                                        <li>계좌번호</li>
                                        <li><?php echo $resx['data']['address'];?></li>
                                    </ul>
                                    <ul>
                                        <li>예금주</li>
                                        <li><?php echo $resx['data']['holder'];?></li>
                                    </ul>
                                    <div>
                                        <input type="button" value="지갑주소 관리">
                                    </div>
                                    <div>
                                        <input type="button" value="←          지갑관리">
                                        <input type="button" value="2FA 인증" style="display:none;" />
										<input type="submit" value="출금요청" />
                                    </div>
                                </div>
                                <div class="krwWithdrawBody3">
                                    <p>확인해 주십시오</p>
                                    <ul>
                                        <li>출금 요청 완료 후, 약 5-30분 이내에 등록하신 은행계좌로 출금됩니다.</li>
                                        <li>단, 은행점검시간 또는 서버 작업이 진행 중일 때에는 반영이 지체될 수 있습니다.</li>
                                        <li>은행 공통 점검시간은 매일 23:00~00:30이며, 점검시간에는 출금이 제한됩니다.</li>
                                        <li>부정 거래가 의심되는 경우, 출금이 제한될 수 있습니다.</li>
                                        <li>출금한도는 인증 단계에 따라 차등 적용됩니다. 출금한도 상향 조정은 <a>고객지원 센터</a>에 문의해 주십시오.</li>
                                        <li>출금 수수료: 1,000원 / 출금 최소 금액: 5,000원</li>
                                        <li>1회 출금 최대금액: 10,000,000원</li>
                                    </ul>
                                </div>
                            </div><!--center closed-->
						</form>
                    </article>
                </div>
            </section>
        </div>
<?php include "aside.php"; ?>
<?php include "footer.html"; ?>