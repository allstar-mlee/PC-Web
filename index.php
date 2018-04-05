<?php include "header.php"; ?>

<?php
$wallets=array();
$resp=Jcurl('GET','https://api.allstarbit.com/public/wallet/'.$mbsx['email'].'/'.$mbsx['password'],false);
$resx=json_decode($resp,true);
for($i=0; $i<sizeof($resx['data']); $i++) {
	if(!array_key_exists($resx['data'][$i]['issue'],$wallets)) {
		$wallets[$resx['data'][$i]['issue']]=$resx['data'][$i];
	}
}
$sx='KRW';
$tx='BTC';
if(array_key_exists('source',$_GET)) {
	$sx=$_GET['source'];
}
if(array_key_exists('target',$_GET)) {
	$tx=$_GET['target'];
}
?>

    <style>body{background:#3d3d3d}</style>
        <div id="center" class="tradeBackground">
            <section>
                <div id="section" alt="컨텐츠영역">
                    <article id="article1" alt="컨텐츠영역1">
                        <div class="notice" alt="공지사항">
                            <span>&nbsp;&nbsp;NOTICE&nbsp;</span>
                            <span>
                                <a href="#"><!--공지사항 url/Title--> [이벤트] 공지사항입니다</a>
                            </span>
                        </div>
                    </article>

                    <article id="article2" alt="컨텐츠영역2">
                        <div class="moneyData clear" alt="화폐정보">
                            
                            <div class="moneyData1">
                                <select>
                                    <option>
                                        <span>비트코인</span>
                                        <span>BTC/KRW</span>
                                    </option>
                                    <option>
                                        <span>이더리움</span>
                                        <span>ETH/KRW</span>
                                    </option>
                                </select>
                            </div><!--moneyData1 closed-->
                            
                            
                            <div class="moneyData2">
                                <div class="moneyData2Left">
                                    <div>
                                        <span>000,000,000</span>
                                        <span>KRW</span>
                                    </div>
                                    <div>
                                        <span>전일대비</span>
                                        <span>-111.960% ▼ -001,186,000</span>
                                    </div>
                                </div>
                                <div class="moneyData2Right clear">
                                    <div class="mdrIn">
                                        <div>
                                            <span>고가</span>
                                            <span style="color:#d60000;font-weight:bold;">1,110,000,000</span>
                                        </div>
                                        <div>
                                            <span>거래량(24H)</span>
                                            <span>BTC</span>
                                            <span>110,000,000,000,000</span> 
                                        </div>
                                    </div>
                                    
                                    <p style="clear:both"></p>
                                    
                                    <div class="mdrIn">
                                        <div>
                                            <span>저가</span>
                                            <span style="color:#9292ff;font-weight:bold;">1,110,999,000</span>
                                        </div>
                                        <div>
                                            <span>거래대금(24H)</span>
                                            <span>BTC</span>
                                            <span>110,000,000,000,000</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!--moneyData2 closed-->
                            
                            
                            <div class="moneyData3">
                                <div>
                                    <span style="color:#31ab19">· Bitfinex&nbsp;</span>
                                    <span>019,160,801</span>
                                    <span>($809,157,157)</span>
                                </div>
                                <div>
                                    <span style="color:#3a86ed">· Bitflyer&nbsp;</span>
                                    <span>123,444,888</span>
                                    <span>($012,345,878)</span>
                                </div>
                                <div>
                                    <span>· Kraren &nbsp;</span>
                                    <span>324,124,457</span>
                                    <span>($787,124,781)</span>
                                </div>
                                
                            </div><!--moneyData3 closed-->
                            
                            <div class="moneyData4">
                                <ul class="chartHead">
                                    <li><a href="#">도구<img src="img/btn_arrow.png"></a></li>
                                    <li><a href="#">KST<img src="img/btn_arrow.png"></a></li>
                                    <li><a href="#">30분<img src="img/btn_arrow.png"></a></li>
                                    <li><a href="#">캔들<img src="img/btn_arrow.png"></a></li>
                                    <li><a href="#">지표<img src="img/btn_arrow.png"></a></li>
                                    <li><a href="#">테마<img src="img/btn_arrow.png"></a></li>
                                    <li><a href="#">설정 초기화</a></li>
                                    <li><a href="#">전체</a></li>
                                </ul>
                                
                                <div class="chartBody"><?php include_once('./embed.chart.php'); ?><!--차트 사이즈 990*390--></div>
                            </div><!--moneyData4 closed-->
                        </div><!--moneyData closed-->
                    </article>

<style type="text/css">
	table.realtime-market {
		width: 100%;
		table-layout: fixed;
		border-spacing: 1px;
		border-collapse: separate;
		background-color: #333;
	}
	table.realtime-market > tbody > tr > td {
		background-color: #101010;
	}
	table.realtime-market > tbody > tr > td.price {
		text-align: center;
	}
	table.realtime-market > tbody > tr.sell > td.qty {
		padding: 8px;
		padding-right: 0;
		text-align: right;
	}
	table.realtime-market > tbody > tr.buy > td.qty {
		padding: 8px;
		padding-left: 0;
		text-align: left;
	}
	table.realtime-market > tbody > tr > td.qty > a {
		position: relative;
		line-height: 25px;
		height: 25px;
		display: block;
		text-decoration: none;
		color: #fff;
	}
	table.realtime-market > tbody > tr > td.qty > a > span {
		display: block;
		position: absolute;
		top: 0;
		bottom: 0;
	}
	table.realtime-market > tbody > tr.sell > td.qty > a > span {
		right: 0;
		background-color: rgba(0,0,125,0.25);
	}
	table.realtime-market > tbody > tr.buy > td.qty > a > span {
		left: 0;
		background-color: rgba(125,0,0,0.25);
	}
	table.realtime-market > tbody > tr > td.qty > a > em {
		display: block;
		font-style: normal;
		position: absolute;
	}
	table.realtime-market > tbody > tr.sell > td.qty > a > em {
		padding-right: 8px;
		text-align: right;
		right: 0;
	}
	table.realtime-market > tbody > tr.buy > td.qty > a > em {
		padding-left: 8px;
		text-align: left;
		left: 0;
	}
</style>

                    <article id="article3" alt="컨텐츠영역3">
                        <div class="moneyQuote" alt="호가">
                            
                            <div class="quoteHead clear">
                                <div>일반호가</div>
                                <div>누적호가</div>
                                <div>호가주문</div>
                            </div>
                            
                            <div class="quoteBody clear">

								<table class="realtime-market">
								<col width="45px" /><col /><col /><col /><col width="45px" />
								<tbody>
								</tbody>
								</table>
<?php
/*
                                <table class="normalQuote" style="">
                                    <tr class="quoteLeft">
                                        <td>&nbsp;</td>
                                        <td>
                                            <div style="background:red;width:100%;height:60%;line-height:auto;">
                                                <p>11.015</p>
                                            </div>
                                        </td>
                                        <td>78,987,000,000</td>
                                        <td>-1.57</td>
                                        <td rowspan="4" colspan="2">
                                            <div>거래량 01,021,143 BTC</div>
                                            <div>거래대금 245,664,000 백만원</div>
                                            <div>(최근 24시간)</div>
                                        </td>
                                    </tr>
                                    <tr class="quoteLeft">
                                        <td>&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr class="quoteLeft">
                                        <td>&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr class="quoteLeft">
                                        <td>&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr class="quoteLeft">
                                        <td>&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td rowspan="3" colspan="2">4</td>
                                    </tr>
                                    <tr class="quoteLeft">
                                        <td>&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr class="quoteLeft">
                                        <td>&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr class="quoteLeft">
                                        <td>&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td rowspan="3" colspan="2">4</td>
                                    </tr>
                                    <tr class="quoteLeft">
                                        <td>&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr class="quoteLeft">
                                        <td>&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <!--turn color-->
                                    <tr>
                                        <td colspan="2">
                                            <span>체결강도</span>
                                            <span>+18724.01%</span>
                                        </td>
                                        <td>1,015,786,187</td>
                                        <td>+148.17%</td>
                                        <td>
                                            <div style="background:red;width:50%;height:60%;line-height:auto;">
                                                <p>11.015</p>
                                            </div>
                                        </td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>체결가</td>
                                        <td>체결량</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>109,413,012</td>
                                        <td>10.789</td>
                                        <td rowspan="2">d</td>
                                        <td rowspan="2">d</td>
                                        <td rowspan="2">5</td>
                                        <td rowspan="2">6</td>
                                    </tr>
                                    <tr>
                                        <td>59,872,548</td>
                                        <td>88.777</td>
                                    </tr>
                                    <tr>
                                        <td>109,413,012</td>
                                        <td>10.789</td>
                                        <td rowspan="2">d</td>
                                        <td rowspan="2">d</td>
                                        <td rowspan="2">5</td>
                                        <td rowspan="2">6</td>
                                    </tr>
                                    <tr>
                                        <td>59,872,548</td>
                                        <td>88.777</td>
                                    </tr>
                                    <tr>
                                        <td>109,413,012</td>
                                        <td>10.789</td>
                                        <td rowspan="2">s</td>
                                        <td rowspan="2">s</td>
                                        <td rowspan="2">5</td>
                                        <td rowspan="2">6</td>
                                    </tr>
                                    <tr>
                                        <td>59,872,548</td>
                                        <td>88.777</td>
                                    </tr>
                                    <tr>
                                        <td>109,413,012</td>
                                        <td>10.789</td>
                                        <td rowspan="2">3</td>
                                        <td rowspan="2">4</td>
                                        <td rowspan="2">5</td>
                                        <td rowspan="2">6</td>
                                    </tr>
                                    <tr>
                                        <td>59,872,548</td>
                                        <td>88.777</td>
                                    </tr>
                                    <tr>
                                        <td>109,413,012</td>
                                        <td>10.789</td>
                                        <td rowspan="2">3</td>
                                        <td rowspan="2">4</td>
                                        <td rowspan="2">5</td>
                                        <td rowspan="2">6</td>
                                    </tr>
                                    <tr>
                                        <td>59,872,548</td>
                                        <td>88.777</td>
                                    </tr>
                                    <tr>
                                        <td>109,413,012</td>
                                        <td>10.789</td>
                                        <td rowspan="2">3</td>
                                        <td rowspan="2">4</td>
                                        <td rowspan="2">5</td>
                                        <td rowspan="2">6</td>
                                    </tr>
                                    <tr>
                                        <td>59,872,548</td>
                                        <td>88.777</td>
                                    </tr>
                                    <tr>
                                        <td>109,413,012</td>
                                        <td>10.789</td>
                                        <td rowspan="2">3</td>
                                        <td rowspan="2">4</td>
                                        <td rowspan="2">5</td>
                                        <td rowspan="2">6</td>
                                    </tr>
                                    <tr>
                                        <td>59,872,548</td>
                                        <td>88.777</td>
                                    </tr>
                                    <tr>
                                        <td>109,413,012</td>
                                        <td>10.789</td>
                                        <td rowspan="2">3</td>
                                        <td rowspan="2">4</td>
                                        <td rowspan="2">5</td>
                                        <td rowspan="2">6</td>
                                    </tr>
                                    <tr>
                                        <td>59,872,548</td>
                                        <td>88.777</td>
                                    </tr>
                                </table>
*/
?>
                                <table class="totalQuote" style="display:none;">
                                    <tr>
                                        <td> </td>
                                        <td><span>수량</span><span>(BTC)</span></td>
                                        <td><span>금액</span><span>(KRW)</span></td>
                                        <td><span>누적</span><span>(KRW)</span></td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <!-- turn color -->
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span>100,500,000</span><span>-100.18%</span></td>
                                        <td><div>222.555</div></td>
                                        <td>123,456,789</td>
                                        <td>123,123,456,789</td>
                                        <td> </td>
                                    </tr>
                                </table>
                                
                                <table class="orderQuote" style="display:none;">
                                    
                                    <tr>
                                        <td colspan="5">
                                            <span><input type="radio">가능</span>
                                            <span><input type="radio">금액</span>
                                            
                                            <span>10%</span>
                                            <span>25%</span>
                                            <span>50%</span>
                                            <span>100%</span>
                                            <span>직접입력</span>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>매도</td>
                                        <td>4.483</td>
                                        <td>999,157,787</td>
                                        <td>4.157</td>
                                        <td>매수</td>
                                    </tr>
                                    <tr>
                                        <td>매도</td>
                                        <td>4.483</td>
                                        <td>999,157,787</td>
                                        <td>4.157</td>
                                        <td>매수</td>
                                    </tr>
                                    <tr>
                                        <td>매도</td>
                                        <td>4.483</td>
                                        <td>999,157,787</td>
                                        <td>4.157</td>
                                        <td>매수</td>
                                    </tr>
                                    
                                </table>
                            </div>
                            
                            <div class="quoteFooter clear">
                                <div>&nbsp;</div>
                                <div>100.158&nbsp;</div>
                                <div>주문잔량합계(BTC)</div>
                                <div>&nbsp;048.907</div>
                                <div>&nbsp;</div>
                            </div>
                            
                        </div><!--moneyQuote closed-->


<script type="text/javascript">
	function get_realtime_market(){
		$.ajax({
			type: "POST",
			method: "POST",
			url: "./byphp/todo.php",
			data: {
				"exec": "get_realtime_market",
				"sx": "<?php echo $sx;?>",
				"tx": "<?php echo $tx;?>",
			},
		}).done(function(resp){
			$("table.realtime-market > tbody").html(resp);
			setTimeout(function(){get_realtime_market();},1000);
		});
	}
	function get_balance(){
		$.ajax({
			type: "POST",
			method: "POST",
			url: "./byphp/todo.php",
			data: {
				"exec": "get_balance",
				"focus": ['<?php echo $sx;?>','<?php echo $tx;?>'],
			},
			dataType: "script",
		});
		setTimeout(function(){get_balance();},1000);
	}
	function get_sum(tpx){
		if(tpx=="buy"){
			$("#buy").find("span.total_amount").html($("#buy").find('input[name="qty"]').val()*$("#buy").find('input[name="requestValue"]').val());
		}
		else if(tpx=="sell"){
			$("#sell").find("span.total_amount").html($("#sell").find('input[name="qty"]').val());
		}
	}
	$(function(){
		$("#buy").find('input[type="text"]').bind("keyup change",function(){
			get_sum("buy");
		});
		$("#sell").find('input[type="text"]').bind("keyup change",function(){
			get_sum("sell");
		});
		$("#buy").find("select").on("change",function(e){
			if(!$("#buy").find('input[name="requestValue"]').val()){
				alert("매수가격을 기재해주세요.");
				$("#buy").find('input[name="requestValue"]').focus();
			}
			else{
				$("#buy").find('input[name="qty"]').val(($("#balance<?php echo $sx;?>").html()/$("#buy").find('input[name="requestValue"]').val())*$(this).val());
			}
			$(this).find("option:eq(0)").prop("selected",true);
			get_sum("buy");
		});
		$("#sell").find("select").on("change",function(e){
			$("#sell").find('input[name="qty"]').val($("#balance<?php echo $tx;?>").html()*$(this).val());
			$(this).find("option:eq(0)").prop("selected",true);
			get_sum("sell");
		});
		$("form.deal").submit(function(e){
			e.preventDefault();
			$fbj=$(this);
			if(!$fbj.find('input[name="qty"]').val()){
				alert("수량을 올바로 기재해주세요.");
				$fbj.find('input[name="qty"]').val("").focus();
			}
			else if(!$fbj.find('input[name="requestValue"]').val()){
				alert("가격을 올바로 기재해주세요.");
				$fbj.find('input[name="requestValue"]').val("").focus();
			}
			else{
				$fbj.find('input[type="submit"]').attr("disabled",true);
				$.ajax({
					type: "POST",
					method: "POST",
					url: "./byphp/todo.php",
					data: $fbj.serialize(),
					dataType: "script",
				});
			}
		});
		get_balance();
		get_realtime_market();
	});
</script>


                        <div class="tradeChart" alt="매도매수">
                            <div class="moneyTrade clear">
                                <div class="tradeHead">
                                    <div>매수</div>
                                    <div>매도</div>
                                    <div>거래내역</div>
                                </div>
                                
                                <div class="tradeBody">



                                    <div class="buying tnum1">
										<form id="buy" class="deal">
                                        <div>
                                            <div>주문가능</div>
                                            <div class="possiblePrice">
                                                <span id="balance<?php echo $sx;?>"><?php echo $wallets[$sx]['balance'];?></span>
                                                <span><?php echo $sx;?></span>
                                            </div>
                                        </div>

                                        <div>
                                            <span>매수수량(<?php echo $tx;?>)</span>

                                            <input type="text" name="qty" placeholder="0" />
                                            <select>
                                                <option value="">가능</option>
                                                <option value="1">100%최대</option>
                                                <option value="0.5">50%</option>
                                                <option value="0.25">25%</option>
                                                <option value="0.1">10%</option>
                                            </select>
                                        </div>

                                        <div>
                                            <span>매수가격(<?php echo $sx;?>)</span>
                                            <input type="text" name="requestValue" placeholder="0" />
                                            <input type="button" class="minus" value="-">
                                            <input type="button" class="plus" value="+">
                                        </div>

                                        <div>
                                            <span>&nbsp;주문총액</span>
                                            <span>
                                                <span class="total_amount">0</span>
                                                <span><?php echo $sx;?></span>
                                                &nbsp;
                                            </span>
                                        </div>

                                        <div>
                                            · 최소주문금액 : 1000 KRW &nbsp;&nbsp;&nbsp;
                                            · 수수료(부가세 포함) : 0.05%
                                        </div>

										<?php
										if($mbsx['login']!==true) {
										?>
                                        <div>
                                            <a href="login.php" alt="로그인">
                                                <input type="button" class="trade_login" style="background: #959595" value="로그인">
                                            </a>
                                            <a href="register.php" alt="회원가입">
                                                <input type="button" class="trade_register" style="background: #f5b74c" value="회원가입">
                                            </a>
                                        </div>
										<?php
										}
										else {
										?>
                                        <div>
											<input type="reset" class="trade_login" style="background:#959595" value="초기화" />
											<input type="submit" class="trade_register" style="background:#f5b74c" value="매수" />
                                        </div>
										<?php
										}
										?>
										<input type="hidden" name="exec" value="deal" />
										<input type="hidden" name="type" value="buy" />
										<input type="hidden" name="source" value="<?php echo $sx;?>" />
										<input type="hidden" name="target" value="<?php echo $tx;?>" />
										</form>
                                    </div><!--buying closed-->



                                    <div class="sell tnum2">
										<form id="sell" class="deal">
                                        <div>
                                            <div>주문가능</div>
                                            <div class="possiblePrice">
                                                <span id="balance<?php echo $tx;?>"><?php echo $wallets[$tx]['balance'];?></span>
                                                <span><?php echo $tx;?></span>
                                            </div>
                                        </div>

                                        <div>
                                            <span>매도수량(<?php echo $tx;?>)</span>

                                            <input type="text" name="qty" placeholder="0" />
                                            <select>
                                                <option value="">가능</option>
                                                <option value="1">100%최대</option>
                                                <option value="0.5">50%</option>
                                                <option value="0.25">25%</option>
                                                <option value="0.1">10%</option>
                                            </select>
                                        </div>

                                        <div>
                                            <span>매도가격(<?php echo $sx;?>)</span>
                                            <input type="text" name="requestValue" placeholder="0" />
                                            <input type="button" class="minus" value="-">
                                            <input type="button" class="plus" value="+">
                                        </div>

                                        <div>
                                            <span>&nbsp;주문총액</span>
                                            <span>
                                                <span class="total_amount">0</span>
                                                <span><?php echo $tx;?></span>
                                                &nbsp;
                                            </span>
                                        </div>

                                        <div>
                                            · 최소주문금액 : 1000 KRW &nbsp;&nbsp;&nbsp;
                                            · 수수료(부가세 포함) : 0.05%
                                        </div>
										<?php
										if($mbsx['login']!==true) {
										?>
                                        <div>
                                            <a href="#" alt="로그인"><input type="button" class="trade_login" value="로그인"></a>
                                            <a href="#" alt="회원가입"><input type="button" class="trade_register" value="회원가입"></a>
                                            <!--로그인시 value 초기화/매수로 변경됨
                                                색상은 # #, 현재 미정-->
                                        </div>
										<?php
										}
										else {
										?>
                                        <div>
											<input type="reset" class="trade_login" style="background:#959595" value="초기화" />
											<input type="submit" class="trade_register" style="background:#f5b74c" value="매도" />
                                        </div>
										<?php
										}
										?>
										<input type="hidden" name="exec" value="deal" />
										<input type="hidden" name="type" value="sell" />
										<input type="hidden" name="source" value="<?php echo $tx;?>" />
										<input type="hidden" name="target" value="<?php echo $sx;?>" />
										</form>
                                    </div><!--sell closed-->

                                    <div class="tradeHistory tnum3">

<?php
//$resp=Jcurl('GET','https://api.allstarbit.com/public/transaction/'.$mbsx['email'].'/'.$mbsx['password'],false);
//echo 'https://api.allstarbit.com/public/transaction/'.$mbsx['email'].'/'.$mbsx['password'];
//$resx=json_decode($resp,true);
//echo '<pre>'.print_r($resx,true).'</pre>';
?>


                                        <table>
                                            <tr>
                                                <th colspan="5">
                                                    <input type="radio" id="trade_concluded" name="trade_conclude">
                                                    <label for="trade_concluded">체결</label>
                                                    <input type="radio" id="trade_nonConcluded" name="trade_conclude">
                                                    <label for="trade_nonConcluded">미체결</label>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>YYYY-MM-DD&nbsp;00:00:00</td>
                                                <td>비트코인(BTC)</td>
                                                <td>판매</td>
                                                <td>145,487,124,357</td>
                                                <td>7,979,000</td>
                                            </tr>
                                            <tr>
                                                <td>YYYY-MM-DD&nbsp;00:00:00</td>
                                                <td>이더리움(ETH)</td>
                                                <td>판매</td>
                                                <td>112,258</td>
                                                <td>2,740</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><!--tradeBody closed-->
                            </div>
                            <div class="miniChart clear">
                                <div class="mChartHead">
                                    <span>미니차트</span>
                                    <select>
                                        <option>1분</option>
                                        <option>3분</option>
                                        <option>5분</option>
                                        <option>10분</option>
                                        <option>15분</option>
                                        <option>30분</option>
                                        <option>1시간</option>
                                        <option>4시간</option>
                                        <option>1일</option>
                                        <option>1주</option>
                                        <option>1달</option>
                                    </select>
                                </div>
                                <div class="mChartBody"></div>
                            </div>
                        </div>
                    </article>

                    <article id="article4" alt="컨텐츠영역4">
                        <div class="moneyEtc" alt="화폐기타">
                            <div class="etcHead">
                                <div data-for="conclusion">체결</div>
                                <div data-for="dailyStandard">일별</div>
                                <div data-for="coinData">코인정보</div>
                            </div>
                            <div class="conclusion toggle">
                                <table>
                                    <tr>
                                        <td>체결시간</td>
                                        <td>체결가격(KRW)</td>
                                        <td>체결량(BTC)</td>
                                        <td>체결금액(KRW)</td>
                                    </tr>

                                    <tr class="tableWhite">
                                        <td><span>03.21</span><span>11:24</span></td>
                                        <td>999,999,999</td>
                                        <td>0.12345678</td>
                                        <td>999,999,999</td>
                                    </tr>

                                    <tr class="tableGray">
                                        <td><span>03.21</span><span>11:24</span></td>
                                        <td>999,999,999</td>
                                        <td>0.12345678</td>
                                        <td>999,999,999</td>
                                    </tr>
                                </table>
                            </div><!--conclusion closed-->
                            
                            <div class="dailyStandard toggle">
                                <table>
                                    <tr>
                                        <td>일자</td>
                                        <td>종가(KRW)</td>
                                        <td>전일대비</td>
                                        <td>거래량(BTC)</td>
                                    </tr>

                                    <tr class="tableWhite">
                                        <td>03.21</td>
                                        <td>999,999,999</td>
                                        <td>+0.12%</td>
                                        <td>888,999,999</td>
                                    </tr>

                                    <tr class="tableGray">
                                        <td>03.21</td>
                                        <td>999,999,999</td>
                                        <td>+0.12%</td>
                                        <td>888,999,999</td>
                                    </tr>
                                    <tr class="tableGray">
                                        <td>03.21</td>
                                        <td>999,999,999</td>
                                        <td>-0.12%</td>
                                        <td>888,999,999</td>
                                    </tr>

                                </table>
                            </div><!--daily standard closed-->
                            <div class="coinData toggle">
                                
                                <div class="coinDataLeft">
                                    <div>
                                        <span>
                                            <img src="img/BTC.png">
                                        </span>    
                                        <span>
                                            <p><b>비트코인</b>(Bitcoin)</p>
                                            <p>심볼 BTC</p>
                                        </span>    
                                    </div>
                                    
                                    <h3>개발자 정보</h3>
                                    <table>
                                        <tr>
                                            <th>· 법인(재단)명</th>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <th>· 법인소재지</th>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <th>· 설립일</th>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <th>· 대표인물</th>
                                            <td>나카모토 사토시(가명)</td>
                                        </tr>
                                        <tr>
                                            <th>· 법인(재단)명</th>
                                            <td> </td>
                                        </tr>
                                    </table>
                                </div>
                                
                                <div class="coinDataRight">
                                    <h3><!--코인명-->비트코인 개요</h3>
                                    <table>
                                        <tr>
                                            <th>· 최초발행</th>
                                            <td>2009년 1월</td>
                                        </tr>
                                        <tr>
                                            <th>· 시가총액</th>
                                            <td>162.2조원(18.03.21 기준)</td>
                                        </tr>
                                        <tr>
                                            <th>· 상장거래소</th>
                                            <td>103개(17.11.06 기준)</td>
                                        </tr>
                                        <tr>
                                            <th>· 블록 생성주기</th>
                                            <td>10분</td>
                                        </tr>
                                        <tr>
                                            <th>· 채굴 보상량</th>
                                            <td>현재 12.5 BTC (반감기 일정에 따라 감소예정)</td>
                                        </tr>
                                        <tr>
                                            <th>· 총 발행한도</th>
                                            <td>222,111,333</td>
                                        </tr>
                                        <tr>
                                            <th>· 합의 프로토콜</th>
                                            <td>PoW</td>
                                        </tr>
                                        <tr>
                                            <th>· 백서</th>
                                            <td>
                                                <a href="https://bitcoin.org/bitcoin.pdf">
                                                    https://bitcoin.org/bitcoin.pdf
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                                <div class="coinDataDetail">
                                    <h3>코인 소개</h3>
                                    <div>
                                        비트코인은 최초로 구현된 가상화폐입니다. 발행 및 유통을 관리하는 중앙권력이나 중간상인 없이, P2P 네트워크 기술을 이용하여 네트워크에 참여하는 사용자들이 주체적으로 화폐를 발행하고 이체내용을 공동으로 관리합니다. 이를 가능하게 한 블록체인 기술을 처음으로 코인에 도입한 것이 바로 비트코인입니다.

                                        비트코인을 사용하는 개인과 사업자의 수는 꾸준히 증가하고 있으며, 여기에는 식당, 아파트, 법률사무소, 온라인 서비스를 비롯한 소매상들이 포함됩니다. 비트코인은 새로운 사회 현상이지만 아주 빠르게 성장하고 있습니다. 이를 바탕으로 가치 증대는 물론, 매일 수백만 달러의 비트코인이 교환되고 있습니다. 

                                        비트코인은 가상화폐 시장에서 현재 유통시가총액과 코인의 가치가 가장 크고, 거래량 또한 안정적입니다. 이더리움이 빠르게 추격하고 있지만 아직은 가장 견고한 가상화폐라고 볼 수 있습니다. 
                                    </div>
                                    
                                    <h3>코인 특징</h3>
                                    <div>
                                        비트코인은 최초로 구현된 가상화폐입니다. 발행 및 유통을 관리하는 중앙권력이나 중간상인 없이, P2P 네트워크 기술을 이용하여 네트워크에 참여하는 사용자들이 주체적으로 화폐를 발행하고 이체내용을 공동으로 관리합니다. 이를 가능하게 한 블록체인 기술을 처음으로 코인에 도입한 것이 바로 비트코인입니다.

                                        비트코인을 사용하는 개인과 사업자의 수는 꾸준히 증가하고 있으며, 여기에는 식당, 아파트, 법률사무소, 온라인 서비스를 비롯한 소매상들이 포함됩니다. 비트코인은 새로운 사회 현상이지만 아주 빠르게 성장하고 있습니다. 이를 바탕으로 가치 증대는 물론, 매일 수백만 달러의 비트코인이 교환되고 있습니다. 

                                        비트코인은 가상화폐 시장에서 현재 유통시가총액과 코인의 가치가 가장 크고, 거래량 또한 안정적입니다. 이더리움이 빠르게 추격하고 있지만 아직은 가장 견고한 가상화폐라고 볼 수 있습니다. 
                                    </div>
                                    
                                    <h3>핵심 가치</h3>
                                    <div>
                                        비트코인은 최초로 구현된 가상화폐입니다. 발행 및 유통을 관리하는 중앙권력이나 중간상인 없이, P2P 네트워크 기술을 이용하여 네트워크에 참여하는 사용자들이 주체적으로 화폐를 발행하고 이체내용을 공동으로 관리합니다. 이를 가능하게 한 블록체인 기술을 처음으로 코인에 도입한 것이 바로 비트코인입니다.

                                        비트코인을 사용하는 개인과 사업자의 수는 꾸준히 증가하고 있으며, 여기에는 식당, 아파트, 법률사무소, 온라인 서비스를 비롯한 소매상들이 포함됩니다. 비트코인은 새로운 사회 현상이지만 아주 빠르게 성장하고 있습니다. 이를 바탕으로 가치 증대는 물론, 매일 수백만 달러의 비트코인이 교환되고 있습니다. 

                                        비트코인은 가상화폐 시장에서 현재 유통시가총액과 코인의 가치가 가장 크고, 거래량 또한 안정적입니다. 이더리움이 빠르게 추격하고 있지만 아직은 가장 견고한 가상화폐라고 볼 수 있습니다. 
                                    </div>
                                    
                                    <h3>관련 뉴스</h3>
                                    <div>
                                        <ul><!--5줄 출력-->
                                            <li>
                                                <a href="#"><b>· 비트코인 탄생 9주년...시총 2540억 달러로 성장 &nbsp;</b></a>
                                                <span>2018-1-4 | </span>
                                                <span>출처</span>
                                            </li>
                                            <li>
                                                <a href="#"><b>· 비트코인 탄생 9주년...시총 2540억 달러로 성장 &nbsp;</b></a>
                                                <span>2018-1-4 | </span>
                                                <span>출처</span>
                                            </li>                                            
                                            <li>
                                                <a href="#"><b>· 비트코인 탄생 9주년...시총 2540억 달러로 성장 &nbsp;</b></a>
                                                <span>2018-1-4 | </span>
                                                <span>출처</span>
                                            </li>                                            
                                            <li>
                                                <a href="#"><b>· 비트코인 탄생 9주년...시총 2540억 달러로 성장 &nbsp;</b></a>
                                                <span>2018-1-4 | </span>
                                                <span>출처</span>
                                            </li>                                            
                                            <li>
                                                <a href="#"><b>· 비트코인 탄생 9주년...시총 2540억 달러로 성장 &nbsp;</b></a>
                                                <span>2018-1-4 | </span>
                                                <span>출처</span>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div><!--coinData Right closed-->
                        
                        </div>
                    </article>
                </div>
            </section>
        </div>
        
        
<?php include "aside.php"; ?>
<?php include "footer.html"?>