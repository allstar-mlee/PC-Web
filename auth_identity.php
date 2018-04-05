<?php include "header.php"; ?>

        <div id="center">
            <section>
                <div id="section" alt="컨텐츠영역">
                    <article>
                        <form action="" method="">
                            <div id="authIdentityCenter">
                                <ul class="authIdentityDiv clear">
                                    <li>
                                        <p class="identityLeftTitle">신원확인</p>
                                        <p class="identityLeftContent">
                                            당사는 고객님의 정보를 귀중히 여기며<br>
                                            안전하게 보관될 수 있도록 최선을 다합니다.
                                        </p>
                                        <p>
                                            <img src="img/security_img.png">
                                        </p>
                                    </li>
                                    
                                    
                                    <li class="authIdentityRight">
                                        <div class="authIdentity1">
                                            <span>신분증 사본</span>
                                            <input type="text" placeholder="예:주민등록증, 여권, 운전면허증" width="200px">
                                            <label for="identityUpload">등록</label>
                                            <input type="file" id="identityUpload" style="display:none;">
                                        </div>
                                        
                                        <p>· 유효한 신분증에는 <font color="#f5b74c">주민등록증, 여권, 운전면허증, 외국인등록증, 외국국적동포 거소신고증, 제외국민주민등록증</font>이 해당됩니다.</p>
                                        <p>· 만료되지 않은 신분증을 사용해 주십시오</p>
                                        <p>· <font color="#f5b74c">신분증의 주민등록번호 뒷자리를 가려 주십시오</font></p>
                                        <p>· 본인의 얼굴이 선명하게 나온 신분증을 사용해 주십시오.</p>
                                        <p>· 밝은 곳에서 신분증 상의 모든 정보가 선명하게 보이도록 촬영되어야 합니다</p>
                                        <p>· 포토샵과 같은 프로그램을 사용하여 이미지를 보정하지 마십시오</p>
                                        <p><a href="#"><font color="#f5b74c">· 예시 보기</font></a></p><br>
                                        
                                        <div class="authIdentity2">
                                            <span>신원 확인용 사진</span>
                                            <input type="text" placeholder="예:올스타빗과 오늘 날짜 메모, 신분증" width="200px">
                                            <label for="identityUpload2">등록</label>
                                            <input type="file" id="identityUpload2" style="display:none;">
                                        </div>
                                        
                                        <p>· 신원확인용 사진에는 아래 세 가지가 모두 포함되어야 합니다</p>
                                        <p>· <font color="#f5b74c">1)자필로 올스타빗과 오늘의 날짜를 적은 메모, 2)신분증, 3)고객님의 얼굴</font></p>
                                        <p>· 유효기간이 표기된 신분증을 사용해 주십시오</p>
                                        <p>· 밝은 곳에서 신분증과 메모 상의 모든 정보가 선명하게 보이도록 촬영되어야 합니다.</p>
                                        <p>· <font color="#f5b74c">신분증의 주민등록번호 뒷자리만 가리고,</font> 메모와 고객님의 얼굴 전체가 확인될 수 있는 사진을 전송 해 주십시오. (모자, 머플러, 안대, 선글라스 등 착용 금지)</p>
                                        <p>· 포토샵과 같은 프로그램을 사용하여 이미지를 보정하지 마십시오.</p>
                                        
                                        <p><a href="#"><font color="#f5b74c">· 예시 보기</font></a></p><br>
                                        

                                        <div class="identityAgree">
                                            <p class="identityAllAgree">
                                                <input type="checkbox" value="off" style="display:none;">
                                                <img src="img/checkbox_off.png">&nbsp;모두 동의 합니다
                                            </p>
                                            <p>
                                                개인정보 수집 및 이용에 대한 문의
                                                <font color="#f5b74c">(필수)</font>
                                            </p>
                                            <p>
                                                <textarea>zz</textarea>
                                            </p>
                                            <p class="identityAgreeEach" align="right">
                                                <input type="checkbox" value="off" style="display:none;">
                                                <img src="img/checkbox_off.png">
                                                동의 합니다
                                            </p>
                                            <p>
                                                개인정보 수집 및 이용에 대한 문의
                                                <font color="#f5b74c">(필수)</font>
                                            </p>
                                            <p>
                                                <textarea>zz</textarea>
                                            </p>
                                            <p class="identityAgreeEach" align="right">
                                                <input type="checkbox" value="off" style="display:none;">
                                                <img src="img/checkbox_off.png">
                                                동의 합니다
                                            </p>
                                        </div>
                                        <div class="identitySubmit clear">
                                            <input type="button" value="확인">
                                        </div>
                                    </li><!--divide right li-->
                                </ul><!--divide ul-->

                            </div><!--center closed-->
                        </form>
                    </article>
                </div>
            </section>
        </div>

        <div class="identityPopup">
            <ul class="identityPopupCenter">
                <li><p>알림</p></li>
                <li><p>신분증과 신원 확인용 사진 촬영 전 도움말을 주의 깊게 읽어 주시고, <font color="red">예시 사진</font>을 반드시 확인해 주시기 바랍니다.</p></li>
                <li><p>재촬영이 필요한 경우, 심사 시간이 추가로 소요될 수 있습니다.</p></li>
                <li><input type="button" value="확인"></li>
            </ul>
        </div>
<?php include "aside.php"; ?>