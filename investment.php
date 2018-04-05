<?php include "header.php"; ?>

        <div id="center">
            <section>
                <div id="section" alt="컨텐츠영역">
                
                    <article>
                            <div id="investmentCenter">
                                <ul class="investmentTitle clear">
                                    <li>보유코인</li>
                                    <li>거래내역</li>
                                    <li>미체결</li>
                                    <li>입출금대기</li>
                                </ul>
                                <div class="investmentBody0">
                                    <p align="right" class="body1Title">* 매수평균가, 평가금액, 평가손익, 수익률은 모두 <b>KRW로 환산한 추정값으로 참고용</b>입니다.<img src="img/qIcon_off.png"></p>
                                    <div class="investmentBody1Q_1">
                                    <p>
                                        <b>[보유코인 유의사항]</b><br>
                                        <b>1.</b>보유코인의 매수평균가, 평가금액, 평가손익, 수익률은 모두 KRW로 환산한 추정값으로 참고용입니다.
                                        <br><br>
                                        · 올스타빗에서는 4가지의 기초화폐(KRW, BTC, ETH, USDT)로 암호화폐를 거래할 수 있습니다<br><br>
                                        · 4가지 기초화폐 중 어떤 것으로 거래하는가에 따라서 매수가격의 단위가 달라지며, 하나의 코인을 2가지 이상의 기초화폐로 거래하게 되면 현재 수익률을 확인하는 것이 어려워지게 됩니다.<br><br>
                                        · 이를 위한 보완책으로 모든 가격의 단위를 KRW로 환산해 현재 추정 수익률을 참고용으로 확인하실 수 있도록 제공합니다.
                                    </p>
                                     <p>
                                        <b>2.</b>보유코인의 매수/매도 및 입금/출금 내역을 모두 반영합니다. 입금 내역의 매수평균가는 입금 시점의 시세를 반영해 계산합니다.
                                    </p>
                                    <p>
                                        <b>3.</b>계산 방식<br>
                                        · 총평가 : 보유 암호화폐의 평가금액 합계<br><br>
                                        · 총 보유자산 : 총평가+보유KRW<br><br>
                                        ·매수평균가 : 매수(입금) 체결 시 직전 매수평균가와 평균, 매도(출금) 체결 시 직전 매수평균가 유지<br><br>
                                        <font color="#959595">
                                        >BTC 마켓의 매수가격은 BTC/KRW 가격을 반영해 KRW로 환산(같은 방식으로 ETH 마켓과 USDT마켓 가격도 KRW로 환산)
                                        </font><br><br>
                                        · 매수금액 : 보유수량 x 매수평균가<br><br>
                                        · 평가금액 : 보유수량 x 현재가<br><br>
                                        <font color="#959595">
                                        >보유코인이 KRW마켓에 상장되어 있으면 KRW마켓 현재가 기준, 그렇지 않으면 BTC 마켓의 현재가를 KRW로 환산해서 평가금액 계산
                                        </font><br><br>
                                        · 평가손익 : 평가금액 - 매수금액<br><br>
                                        · 수익률 : 평가손익 % 매수금액<br><br>
                                    </p>
                                    <p>
                                    ※ 보유코인을 어떤 마켓에서 매매한 것인지에 따라서, 혹은 입출금이 빈번이 발생하는 경우 수익률이 과대 혹은 과소평가되어 보일 수 있습니다.(고객님의 보유 수량에는 영향을 미치지 않습니다.)<br><br>
                                    <font color="#959595">
                                        이는 고객님의 수익평가에 대한 참고자료로, 올스타빗은 제공된 편의정보를 기반으로 한 투자결과에 대한 책임을 지지 않습니다.    
                                    </font>
                                    </p>
                                </div>
                                    <table class="investmentBody1T_1">
                                        <tr>
                                            <th>총매수금액</th>
                                            <td>0 KRW</td>
                                            <th>총평가손익</th>
                                            <td>-</td>
                                            <th>보유KRW</th>
                                            <td>0 KRW</td>
                                        </tr>
                                        <tr>
                                            <th>총평가금액</th>
                                            <td>-</td>
                                            <th>총평가수익률</th>
                                            <td>-</td>
                                            <th>총 보유자산</th>
                                            <td>0 KRW</td>
                                        </tr>
                                    </table>
                                    <table class="investmentBody1T_2">
                                        <tr>
                                            <th>보유코인</th>
                                            <th>보유수량</th>
                                            <th>매수평균가</th>
                                            <th>매수금액</th>
                                            <th>평가금액</th>
                                            <th>평가손익(%)</th>
                                        </tr>
                                        
                                        <tr>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">거래내역이 없습니다</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="investmentBody1">
                                    <p align="right">
                                        <select>
                                            <option>거래 전체</option>
                                            <option>매수</option>
                                            <option>매도</option>
                                            <option>입금</option>
                                            <option>출금</option>
                                        </select>    
                                    </p>
                                    <table class="investmentBody2T">
                                    <tr>
                                        <th>주문시간</th>
                                        <th>코인</th>
                                        <th>거래종류</th>
                                        <th>거래수량</th>
                                        <th>거래단가<img src="img/qIcon_off.png">
                                        </th>
                                        <div class="investmentBody2T_1Q">
                                                <p>입출금 내역의 거래단가는<br>입출금 시점의 시세를 반영해<br>계산합니다.</p>
                                        </div>
                                        <th>거래금액</th>
                                        <th>수수료</th>
                                        <th>정산금액(수수료반영)</th>
                                    </tr>
                                    <tr>
                                        <td>result</td>
                                        <td>result</td>
                                        <td>result</td>
                                        <td>result</td>
                                        <td>result</td>
                                        <td>result</td>
                                        <td>result</td>
                                        <td>result</td>
                                    </tr>
                                    <tr>
                                        <td colspan="8">거래내역이 없습니다.</td>
                                    </tr>
                                </table>
                                </div>
                                <div class="investmentBody2">
                                    <table class="investmentBody3T">
                                        <tr>
                                            <th>시간</th>
                                            <th>마켓명</th>
                                            <th>거래종류</th>
                                            <th>주문가격</th>
                                            <th>주문수량</th>
                                            <th>체결수량</th>
                                            <th>미체결수량</th>
                                        </tr>
                                        <tr>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                        </tr>
                                        <tr>
                                        <td colspan="7">미체결 주문이 없습니다.</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="investmentBody3">
                                    <table class="investmentBody4T">
                                        <tr>
                                            <th>신청 확인 시간</th>
                                            <th>코인</th>
                                            <th>거래종류</th>
                                            <th>주문수량</th>
                                            <th>거래ID</th>
                                            <th>상태</th>
                                        </tr>
                                        <tr>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                            <td>result</td>
                                        </tr>
                                        <tr>
                                        <td colspan="6">입출금 대기 중인 내역이 없습니다.</td>
                                        </tr>
                                    </table>
                                </div>
                            </div><!--center closed-->
                            
                    </article>
                </div>
            </section>
        </div>
<?php include "aside.php"; ?>
<?php include "footer.html"; ?>