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
		$("#input").submit(function(e){
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
				alert("입금 예정 금액을 입력해 주십시오.");
				$(this).find('input[name="amount"]').focus();
			}
		});
	});
</script>

        <div id="center">
            <section>
                <div id="section" alt="컨텐츠영역">
                    <article>
						<form id="input">
							<input type="hidden" name="exec" value="input" />
							<input type="hidden" name="issue" value="KRW" />
                            <div id="krwDepositCenter">
                                <div class="krwDepositHeader">
                                    <p>KRW 입금</p>
                                    <p>원화(KRW)를 입금하여 암호화폐 거래에 필요한 KRW지갑 잔고를 충전합니다.</p>
                                </div>
                                <div class="krwDepositBody1">
                                    <p><a>IBK 에스크로 이체 ></a></p>
                                    <p>STEP 1. 입금 예정 금액을 입력해 주십시오.</p>
                                    <div>
                                        <input type="text" name="amount" />
                                        <span>KRW</span>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="krwDepositBody2">
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
                                </div>
                                <div class="krwDepositBody3">
                                    <p>입금 안내사항</p>
                                    <ul>
                                        <li>이전에 입금 이력이 있더라도, 매번 동일한 입금절차를 거치셔야 합니다.</li>
                                        <li>입금코드와 금액이 입금예약사항과 정확히 일치하는 경우, 입금 후 고객님의 계정에 반영되기까지 약 3분 정도 소요됩니다.</li>
                                        <li>서버 점검 시간 또는 은행거래 처리가 많은 월말에는 평소보다 입금처리가 지연될 수 있습니다.</li>
                                        <li>은행 공통 점검 시간(매일 23:30~00:30)에는 입금이 불가능하거나 지연될 수 있습니다.</li>
                                        <li>원화(KRW)를 처음 입금하시는 경우, 72시간 동안 암호화폐 출금이 전면 제한됩니다.</li>
                                        <li>입금 예약은 최대 25회까지 가능하며, 추가 입금 예약을 접수하기 위해서는 대기 중인 입금예약건이 입금완료 되어야 합니다.</li>
                                    </ul>
                                    <p>[입금시 주의사항] 반드시 읽어주세요!</p>
                                    <ul>
                                        <li>반드시 STEP1에서 입금 예약하신 금액만큼 STEP2의 계좌로부터 한번에 입금하셔야 합니다.</li>
                                        <li>6자리 입금코드는 '입금통장표시, 받는분통장표시, 받는통장메모'등 입금받는 계좌(㈜스트리미)에 표기되는 적요 란에 정확히 입력해주셔야 합니다.</li>
                                        <li>다음의 경우에는 입금처리가 되지 않으므로 고객지원포털 '문의 남기기'를 통해 원화입금지연 문의를 남겨주셔야 하며, 문의 확인 후 고객님의 계정에 반영되기까지 최장 10일이 소요됩니다.
                                            <span>- 예약한 금액과 다른 금액을 입금 예)1,000,000원을 예약하고 100,000만원을 입금</span>
                                            <span>- 예약한 금액을 분할해 입금 예)1,000,000원을 500,000원 두 번으로 나누어 입금</span>
                                            <span>- 6자리 입금코드를 미입력</span>
                                            <span>- 6자리 입금코드를 오입력 예)ABCDEF를 ABCDEE로 입력</span>
                                        </li>
                                        <li>입금액 상이, 입금코드 미입력 또는 오입력으로 인한 입금지연 문의 시에는 입금여부 확인이 가능한 증빙자료를 제출해주셔야 합니다. (이 때, 제출하시는 증빙자료는 예금주명, 계좌번호, 입금액, 입금시간을 정확히 확인할 수 있는 자료여야 합니다.)</li>
                                        <li>입금예약은 72시간 동안 유효하며, 유효기간이 만료된 이후에는 입금예약을 신규로 다시 접수하셔야 합니다.</li>
                                        <li>입금처리 가능 기간이 지나 금액을 반환할 경우, 은행수수료는 고팍스에서 부담하지 않습니다.</li>
                                    </ul>
                                    <div>
                                        <input type="button" value="지갑관리">
                                        <input type="submit" value="입금 예약" />
                                    </div>
                                </div>
                            </div><!--center closed-->
						</form>
                    </article>
                </div>
            </section>
        </div>
<?php include "aside.php"; ?>
<?php include "footer.html"; ?>