<?php include "header.php"; ?>
 
        <div id="center">
            <section>
                <div id="section" alt="컨텐츠영역">
                    <article>
                        <form action="" method="">
                            <div id="authSmartCenter">
                                <ul class="authSmartDiv clear">
                                    <li>
                                        <p class="smartLeftTitle">본인 인증</p>
                                        <p>
                                            당사는 고객님의 정보를 귀중히 여기며<br>
                                            안전하게 보관될 수 있도록 최선을 다합니다.
                                        </p>
                                        <p>
                                            <img src="img/security_img.png">
                                        </p>
                                    </li>
                                    <li>
                                        <div class="smartAgree">
                                            <p class="smartAllAgree">
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
                                            <p class="smartAgreeEach" align="right">
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
                                            <p class="smartAgreeEach" align="right">
                                                <input type="checkbox" value="off" style="display:none;">
                                                <img src="img/checkbox_off.png">
                                                동의 합니다
                                            </p>
                                        </div>
                                        <div class="smartMemberData">
                                            <table>
                                                <tr>
                                                    <td rowspan="3">주요개인정보</td>
                                                    <td>
                                                        <input type="text" placeholder="성">
                                                        <input type="text" placeholder="이름">
                                                    </td>
                                                </tr>
                                                <tr><td><input type="text" placeholder="생년월일 (YYYY-MM-DD)"></td></tr>
                                                <tr>
                                                    <td>
                                                        <select>
                                                            <option value="">통신사</option>
                                                            <option value="SKT">SKT</option>
                                                            <option value="KT">KT</option>
                                                            <option value="LG">LG</option>
                                                        </select>
                                                        <input type="text">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </li><!--divide right li-->
                                </ul><!--divide ul-->
                                <ul class="authSmartBtn clear">
                                    <li><img src="img/back_arrow.png"><a href="account.php">계정관리</a></li>
                                    <li><input type="button" value="본인인증완료"><!--submit--></li>
                                </ul>
                            </div><!--center closed-->
                        </form>
                    </article>
                </div>
            </section>
        </div>
<?php include "aside.php"; ?>