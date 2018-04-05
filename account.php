<?php include "header.php"; ?>
 
        <div id="center">
            <section>
                <div id="section" alt="컨텐츠영역">
                    <article>
                        <form action="" method="">
                            <div id="accountCenter">
                                <div class="accountHead">
                                    <ul>
                                        <li><a href="#">패스워드 변경</a></li>
                                        <li><a href="#">지갑주소 관리</a></li>
                                    </ul>
                                </div>
                                <div class="accountTitle">인증과정</div>
                                <ul class="accountStep clear">
                                    <li>
                                        <a href="#">
                                            <p><img src="img/step_on.png"></p>
                                            <p><img src="img/step_email.png"></p>
                                            <p>이메일인증</p>
                                            <p>완료</p>
                                            <p></p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="auth_smart.php">
                                            <p><img src="img/step_off.png"></p>
                                            <p><img src="img/step_smart.png"></p>
                                            <p>본인확인</p>
                                            <p>가상화폐 입금가능</p>
                                            <p>입출금한도 1000만원</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="auth_otp.php">
                                            <p><img src="img/step_off.png"></p>
                                            <p><img src="img/step_otp.png"></p>
                                            <p>OTP인증</p>
                                            <p>가상화폐 출금가능</p>
                                            <p>일 출금한도 1000만원</p>
                                        </a>
                                    </li>
                                    <li id="accountPopup">
                                            <p><img src="img/step_off.png"></p>
                                            <p><img src="img/step_account.png"></p>
                                            <p>계좌등록</p>
                                            <p>원화 입출금가능</p>
                                            <p>일 출금한도 1000만원</p>
                                    </li>
                                    <li>
                                        <a href="auth_identity.php">
                                            <p><img src="img/step_off.png"></p>
                                            <p><img src="img/step_identity.png"></p>
                                            <p>신원확인</p>
                                            <p>출금가능금액 상향</p>
                                            <p>일 출금한도 1000만원</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="member_data clear">
                                    <li><p>회원정보</p></li>
                                    <li>
                                        <p>닉네임</p>
                                        <p><input type="text"></p>
                                        <p>회원등급</p>
                                        <p><input type="text"></p>
                                    </li>
                                </ul>
                                <ul class="contact_data clear">
                                    <li><p>연락처정보</p></li>
                                    <li>
                                        <p>이메일/아이디</p>
                                        <p><input type="text"></p>
                                        <p>전화번호</p>
                                        <p><input type="text"></p>
                                    </li>
                                </ul>
                                <ul class="security_data clear">
                                    <li><p>보안정보</p></li>
                                    <li>
                                        <p>2Fa</p>
                                        <p>
                                            <input type="text" placeholder="2FA를 등록해주십시오">
                                            <span>활성화</span>
                                        </p>
                                    </li>
                                </ul>
                                <ul class="connect_data clear">
                                    <li><p>접속기록</p></li>
                                    <li>
                                        <table>
                                            <tr>
                                                <td>로그인 시각</td>
                                                <td>IP주소</td>
                                                <td>위치</td>
                                                <td>기기</td>
                                            </tr>
                                            <tr>
                                                <td>18.03.27 15:32:43</td>
                                                <td>144.444.280.929</td>
                                                <td>Korea,Republic of</td>
                                                <td>windows.chrome</td>
                                            </tr>
                                            <tr>
                                                <td>18.03.27 15:32:43</td>
                                                <td>144.444.280.929</td>
                                                <td>Korea,Republic of</td>
                                                <td>windows.chrome</td>
                                            </tr>
                                            <tr>
                                                <td>18.03.27 15:32:43</td>
                                                <td>144.444.280.929</td>
                                                <td>Korea,Republic of</td>
                                                <td>windows.chrome</td>
                                            </tr>
                                            <tr>
                                                <td>18.03.27 15:32:43</td>
                                                <td>144.444.280.929</td>
                                                <td>Korea,Republic of</td>
                                                <td>windows.chrome</td>
                                            </tr>
                                            <tr>
                                                <td>18.03.27 15:32:43</td>
                                                <td>144.444.280.929</td>
                                                <td>Korea,Republic of</td>
                                                <td>windows.chrome</td>
                                            </tr>
                                        </table>
                                    </li>
                                </ul>
                                <ul class="quitAccount">
                                    <li><p>회원탈퇴</p></li>
                                    <li>
                                        <p>
                                            회원 탈퇴시, 올스타빗에서 보유하고 있는 고객님의 개인정보는 삭제되며 복구되지 않습니다. 신중히 결정해 주십시오.
                                            <br>    
                                            ※고객님의 계정에 잔액이 남아있을 시, 탈퇴 절차가 정상적으로 진행되지 않습니다. 잔액을 모두 출금하신 후 요청해 주세요.
                                            <br>
                                        </p>
                                        <input type="button" value="회원탈퇴">
                                    </li>
                                </ul>
                                
                            </div>
                        </form>
                    </article>
                </div>
            </section>
        </div>

        <div class="accountPopupStep1">
            <ul>
                <li><span>KRW지갑</span><span><img src="img/closeBtn.png" class="accountPopupClose1"></span></li>
                <li>아직 등록된 은행 계좌 정보가 없습니다</li>
                <li>입출금에 사용할 고객님의 은행계좌 정보를 입력해 주십시오.</li>
                <li>
                    <select>
                        <option>은행선택</option>
                        <option>국민은행</option>
                        <option>기업은행</option>
                        <option>하나은행</option>
                    </select>
                </li>
                <li><input type="text" placeholder="계좌 번호"></li>
                <li><input type="text" placeholder="예금주"></li>
                <li><input type="text" placeholder="계좌 닉네임"></li>
                <li>
                    <input type="button" value="닫기" class="accountPopupClose1">
                    <input type="button" value="다음" class="goAccountStep2">
                </li>
            </ul>
        </div>

        <div class="accountPopupStep2">
            <ul>
                <li><span>KRW지갑</span><span><img src="img/closeBtn.png" class="accountPopupClose2"></span></li>
                <li>등록된 계좌로 받으신 입금정보(1월)에서 고유코드[ALLSTAR***]를</li>
                <li>확인하신 후 아래의 숫자 3자리를 입력해 주십시오</li>
                <li><input type="text" placeholder="secret code"></li>
                <li><img src="img/warning.png"></li>
                <li align="center">고유코드를 수신하지 못하셨다면 
                    <font color="#ff7300">고객지원센터</font>
                    로 문의해 주세요
                </li>
                <li>
                    <input type="button" value="닫기" class="accountPopupClose2">
                    <input type="button" value="인증" class="goAccountStep3">
                </li>
            </ul>
        </div>

        <div class="accountPopupStep3">
            <ul>
                <li><span>KRW지갑</span><span><img src="img/closeBtn.png" class="accountPopupClose3"></span></li>
                <li>ㅇㅇㅇ님의 KRW 계좌</li>
                <li>
                    <p>은행명</p>
                    <input type="text" placeholder="은행명">
                </li>
                <li>
                    <p>계좌번호</p>
                    <input type="text" placeholder="계좌번호">
                </li>
                <li>
                    <p>예금주</p>
                    <input type="text" placeholder="예금주명">
                </li>
                <li>
                    <p>계좌 닉네임</p>
                    <input type="text" placeholder="계좌닉네임명">
                </li>
                <li>
                    <input type="button" value="닫기" class="accountPopupClose3">
                </li>
            </ul>
        </div>
<?php include "aside.php"; ?>
<?php include "footer.html"; ?>