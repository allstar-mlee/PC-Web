<?php include "header.php"; ?>
  
        <div id="center">
            <section>
                <div id="section" alt="컨텐츠영역">
                    <article>
                        <form action="" method="">
                            <div id="authOtpCenter">
                                <ul class="authOtpDiv clear">
                                    <li><!--left-->
                                        <p class="otpLeftTitle">보안-2FA활성화</p>
                                        <p>
                                            당사는 고객님의 정보를 귀중히 여기며<br>
                                            안전하게 보관될 수 있도록 최선을 다합니다.
                                        </p>
                                        <p>
                                            <img src="img/security_img.png">
                                        </p>
                                    </li>
                                    <li><!--right-->
                                        <div class="otpDownload">
                                            <p class="otpDownload1"><b>STEP1.</b> 2FA 앱을 다운로드해 주세요</p>
                                            <p class="otpDownload2">Google Play Store 및 Apple App Store 에서 아래의 2FA 인증앱을 휴대기기에 다운로드 해 주십시오.</p>
                                            <div class="store_logo clear">
                                                <p><img src="img/google_play.png"></p>
                                                <p><img src="img/app_store.png"></p>
                                            </div>
                                            <div class="otp_logo">
                                                <p>
                                                    <a href="#">
                                                        <img src="img/otp_logo.png">Google OTP
                                                    </a>
                                                </p>
                                                <p>
                                                    <a href="#">
                                                        <img src="img/otp_logo.png">Google authenticator
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="otpQrcode">
                                            <p class="otpQrcode1">
                                                <b>STEP2.</b> 바코드 스캔 또는 16자리 코드번호 입력
                                            </p>
                                            <p class="otpQrcode2">
                                                위에서 설치한 2FA 인증 앱을 실행한 후, '바코드 스캔'을 실시하여 아래에 표시된 QR 코드를 스마트폰으로 스캔해 주십시오. 또는 '제공된 키 입력'을 선택하시어 16자리 코드번호를 입력 하셔도 됩니다. <br>
                                                <a href="#">
                                                    <font color="#f5b74c" style="text-decoration:underline;">2FA는 어떻게 설정하면 되나요?</font>
                                                </a>
                                            </p>
                                            <div class="otpQrcode3 clear">
                                                <div>
                                                    <p>QR코드</p>
                                                    <p><img src="img/qrcode_ex.png"></p>
                                                </div>
                                                <div>
                                                    <p>16자리 코드 번호</p>
                                                    <p><input type="text" placeholder="코드번호"></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="qrcodeInsert">
                                            <input type="text" placeholder="2FA 코드 입력">
                                            <input type="button" value="본인인증완료">
                                            <!--submit-->
                                        </div>
                                    </li><!--divide right li-->
                                </ul><!--divide ul-->
                                
                              
                            </div><!--center closed-->
                        </form>
                    </article>
                </div>
            </section>
        </div>
<?php include "aside.php"; ?>