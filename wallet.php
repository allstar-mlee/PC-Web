<?php include "header.php"; ?>

<?php
if($mbsx['login']!==true) {
	echo '<script type="text/javascript">';
	echo 'alert("로그인 후 이용해주세요.");';
	echo 'self.location.replace("./login.php");';
	echo '</script>';
	exit;
}

$resp=Jcurl('GET','https://api.allstarbit.com/public/wallet/'.$mbsx['email'].'/'.$mbsx['password'],false);
$resx=json_decode($resp,true);

$wallets=array(
	'main'=>array(),
	'sub'=>array(),
);
for($i=0; $i<sizeof($resx['data']); $i++) {
	$wx=$resx['data'][$i];
	if($wx['issue']=='KRW') {
		$wallets['main'][]=$wx;
	}
	else {
		$wallets['sub'][]=$wx;
	}
}
?>


        <div id="center">
            <section>
                <div id="section" alt="컨텐츠영역">
                    <article>
                            <div id="walletCenter">
                                <div class="walletHeader">
                                    <div>
                                        <p>총 자산 평가액</p>
                                        <p><span>70,756</span>KRW</p>
                                    </div>
                                </div>
                                <div class="walletBody">
                                    <table class="walletBody1T">
                                        <tbody>
                                            <tr>
                                                <th>KRW 자산</th>
                                                <th>총 보유 금액</th>
                                                <th>미체결 금액</th>
                                                <th>거래 가능 금액</th>
                                                <th><a id="walletDepositPopup">입출금 계좌 관리</a></th>
                                            </tr>
											<?php
											for($i=0; $i<sizeof($wallets['main']); $i++) {
												$wx=$wallets['main'][$i];
											?>
                                            <tr>
                                                <td>
                                                    <div></div>
                                                    <div>
                                                        <p>대한민국 원</p>
                                                        <p><?php echo strtoupper($wx['issue']);?></p>
                                                    </div>
                                                </td>
                                                <td><?php echo ($wx['balance']);?></td>
                                                <td><?php echo ($wx['readOnly']);?></td>
                                                <td><?php echo ($wx['balance']-$wx['readOnly']);?></td>
                                                <td>
                                                    <a href="krw_deposit.php">입금</a>
                                                    <a href="krw_withdraw.php">출금</a>
                                                </td>
                                            </tr>
											<?php
											}
											?>
                                        </tbody>
                                    </table>
                                    <div class="walletCheckedView">
                                        <p>
                                            <img src="img/checkbox_off.png">
                                            <input type="checkbox" id="walletBodyCheck" value="off" style="display:none;">
                                            <label for="walletBodyCheck">보유 코인만 보기</label>
                                        </p>
                                    </div>
                                    <table class="walletBody2T">
                                        <tbody>
                                            <tr>
                                                <th>코인명</th>
                                                <th>총 보유 수량</th>
                                                <th>미체결 수량</th>
                                                <th>거래 가능 수량</th>
                                                <th><a id="walletWithdrawPopup">출금 주소 관리</a></th>
                                            </tr>
											<?php
											for($i=0; $i<sizeof($wallets['sub']); $i++) {
												$wx=$wallets['sub'][$i];
											?>
                                            <tr>
                                                <td>
                                                    <div></div>
                                                    <div>
                                                        <p><?php echo array_key_exists(strtoupper($wx['issue']),$_global_wallet_names)?$_global_wallet_names[strtoupper($wx['issue'])]['ko']:strtoupper($wx['issue']);?></p>
                                                        <p><?php echo strtoupper($wx['issue']);?></p>
                                                    </div>
                                                </td>
                                                <td><?php echo ($wx['balance']);?></td>
                                                <td><?php echo ($wx['readOnly']);?></td>
                                                <td><?php echo ($wx['balance']-$wx['readOnly']);?></td>
                                                <td>
													<?php
													/*
                                                    <a href="krw_deposit.php">입금</a>
                                                    <a href="krw_withdraw.php">출금</a>
													*/
													?>
                                                </td>
                                            </tr>
											<?php
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="walletDepositPopup">
                                    <ul>
                                        <li>
                                            <select>
                                                <option>KRW 지갑</option>
                                            </select>
                                            <span><img src="img/closeBtn.png" class="walletDepositClose1"></span>
                                        </li>
                                        <li>
                                            <p>최강일님의 KRW 계좌<span>삭제(3회 남음)</span></p>
                                        </li>
                                        <li>
                                            <p>은행명</p>
                                            <p>
                                                <input type="text">
                                            </p>
                                        </li>
                                        <li>
                                            <p>계좌번호</p>
                                            <p>
                                                <input type="text">
                                            </p>
                                        </li>
                                        <li>
                                            <p>예금주</p>
                                            <p>
                                                <input type="text">
                                            </p>
                                        </li>
                                        <li>
                                            <p>계좌 닉네임</p>
                                            <p>
                                                <input type="text">
                                            </p>
                                        </li>
                                        <li>
                                            <input type="button" value="닫기" class="walletDepositClose2">
                                        </li>
                                        <li>
                                            <div></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="walletWithdrawPopup">
                                    <ul>
                                        <li>
                                            <select>
                                                <option>KRW 지갑</option>
                                            </select>
                                            <span><img src="img/closeBtn.png" class="walletWithdrawClose1"></span>
                                        </li>
                                        <li>
                                            <p>최강일님의 KRW 계좌<span>삭제(3회 남음)</span></p>
                                        </li>
                                        <li>
                                            <p>은행명</p>
                                            <p>
                                                <input type="text">
                                            </p>
                                        </li>
                                        <li>
                                            <p>계좌번호</p>
                                            <p>
                                                <input type="text">
                                            </p>
                                        </li>
                                        <li>
                                            <p>예금주</p>
                                            <p>
                                                <input type="text">
                                            </p>
                                        </li>
                                        <li>
                                            <p>계좌 닉네임</p>
                                            <p>
                                                <input type="text">
                                            </p>
                                        </li>
                                        <li>
                                            <input type="button" value="닫기" class="walletWithdrawClose2">
                                        </li>
                                        <li>
                                            <div></div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--center closed-->
                            
                    </article>
                </div>
            </section>
        </div>
<?php include "aside.php"; ?>
<?php include "footer.html"; ?>