<?php
require_once(__DIR__.'/../../v2/unstable/libChart/common.php');

$_current_unit='KRW-BTC';
//if($sx=='KRW'&&$tx) {
//	$_current_unit=$sx.'-'.$tx;
//}
$_current_times=30;
?>

<link type="text/css" rel="stylesheet" href="<?php echo $_dir_chartiq;?>/css/chartiq.css" />
<link type="text/css" rel="stylesheet" href="<?php echo $_dir_chartiq;?>/css/stx-chart.css" />
<style type="text/css">
	.chart-wrapper {
		max-width: 990px;
		margin: 0 auto;
		padding: 0;
		background-color: rgb(28,42,53);
		background-color: #000 !important;
	}
	.chartContainer {
		width: 100%;
		height: 365px;
		position: relative;
		background-color: transparent !important;
	}
	.crosshair-info{padding:5px;}
	.crosshair-info > dl{display:block;text-align:right;font-size:12px;margin:0;padding:0;}
	.crosshair-info > dl > dt{display:inline-block;font-weight:600;margin:0 5px 0 0;padding:0;}
	.crosshair-info > dl > dd{display:inline-block;margin:0 10px 0 0;padding:0;}


/* Volume underlay styles */
                .stx_volume_underlay_up {
                    opacity: .5;
                    border-left-color: transparent;
                }
                .stx_volume_underlay_down {
                    opacity: .5;
                    border-left-color: transparent;
                }
                .ciq-night .stx_volume_underlay_up {
                    border-left-color: transparent;
                }
                .ciq-night .stx_volume_underlay_down {
                    border-left-color: transparent;
                }

</style>

<!--// 차트 삽입용 코드 @@-->
<div class="chart-wrapper ciq-night">
	<div class="crosshair-info">
		<dl>
			<dt>일시:</dt><dd id="huDate"><span class="text-muted">N/A</span></dd>
			<dt>시가:</dt><dd id="huOpen"><span class="text-muted">N/A</span></dd>
			<dt>고가:</dt><dd id="huHigh"><span class="text-muted">N/A</span></dd>
			<dt>저가:</dt><dd id="huLow"><span class="text-muted">N/A</span></dd>
			<dt>종가:</dt><dd id="huClose"><span class="text-muted">N/A</span></dd>
			<dt>거래량:</dt><dd id="huVolume"><span class="text-muted">N/A</span></dd>
		</dl>
	</div>
	<div style="padding:0 12px;">
		<div class="chartContainer"></div>
	</div>
</div>
<!--@@ 차트 삽입용 코드 //-->

<!--[if IE 8]><script type="text/javascript">alert("This template is not compatible with IE8");</script><![endif]-->
<script type="text/javascript" src="<?php echo $_dir_chartiq;?>/js/chartiq.js?dummy=<?php echo time();?>"></script>
<script type="text/javascript">
	var doStreaming=false;
	var fixedPrevious=false;
	var initLastPeriodTime=false;
	var initLastClosePrice=false;
	var lastPeriodTime=false;
	var lastClosePrice=false;
	var myQuoteFeed={};
	function prependHeadsUpHR(){
		//var tick=Math.floor((CIQ.ChartEngine.crosshairX-this.left-this.micropixels)/this.layout.candleWidth);
		var tick=this.barFromPixel(this.cx);
		var prices=this.chart.xaxis[tick];
		$$("huOpen").innerHTML='<span class="text-muted">N/A</span>';
		$$("huClose").innerHTML='<span class="text-muted">N/A</span>';
		$$("huHigh").innerHTML='<span class="text-muted">N/A</span>';
		$$("huLow").innerHTML='<span class="text-muted">N/A</span>';
		$$("huDate").innerHTML='<span class="text-muted">N/A</span>';
		$$("huVolume").innerHTML='<span class="text-muted">N/A</span>';
		if(prices!=null){
			if(prices.data){
				$$("huOpen").innerHTML=CIQ.commas(this.formatPrice(prices.data.Open));
				$$("huClose").innerHTML=CIQ.commas(this.formatPrice(prices.data.Close));
				$$("huHigh").innerHTML=CIQ.commas(this.formatPrice(prices.data.High));
				$$("huLow").innerHTML=CIQ.commas(this.formatPrice(prices.data.Low));
				$$("huVolume").innerHTML=CIQ.condenseInt(prices.data.Volume);
				if(!CIQ.ChartEngine.hideDates()){
					var tickDate = prices.data.displayDate;
					if (!tickDate) tickDate = prices.data.DT;
					if (CIQ.ChartEngine.isDailyInterval(this.layout.interval)){
						$$("huDate").innerHTML=CIQ.mmddyyyy(CIQ.yyyymmddhhmm(tickDate));        
					} else {
						$$("huDate").innerHTML=CIQ.mmddhhmm(CIQ.yyyymmddhhmm(tickDate));                    
					}
				}
			}
		}
	}
	function do_streaming(){
		if(initLastClosePrice===false||initLastPeriodTime===false){
			if(stxx.chart.dataSet.length){
				initLastPeriodTime=lastPeriodTime=stxx.chart.dataSet[stxx.chart.dataSet.length-1].Date;
				initLastClosePrice=lastClosePrice=stxx.chart.dataSet[stxx.chart.dataSet.length-1].Close;
			}
			doStreaming=setTimeout(function(){do_streaming();},250);
		}
		else{
			CIQ.postAjax(
				"/v2/unstable/libChart/current_sync.php?ux=<?php echo $_current_unit;?>&tx=<?php echo $_current_times;?>&lastDate=&dummy=",
				null,
				function(status,response){
					if(status==200){
						tmpx=JSON.parse(response);
						for(nx=0; nx<tmpx.length; nx++){
							tmps=tmpx[nx];
							if(new Date(tmps.Date)>new Date(lastPeriodTime)){
								lastPeriodTime=tmps.Date;
								lastClosePrice=tmps.Close;
								var newData=[];
								newData[0]={};
								newData[0].Date=tmps.Date;
								newData[0].Open=tmps.Open;
								newData[0].High=tmps.High;
								newData[0].Low=tmps.Low;
								newData[0].Close=tmps.Close;
								newData[0].Volume=tmps.Volume;
								stxx.appendMasterData(newData);
								fixedPrevious=false;
							}
							else if(tmps.Date==lastPeriodTime){
								lastClosePrice=tmps.Close;
								stxx.updateChartData({
									"Date": tmps.Date,
									"Open": tmps.Open,
									"High": tmps.High,
									"Low": tmps.Low,
									"Close": tmps.Close,
									"Volume": tmps.Volume,
								},null,{fillGaps:true});
							}
							else if(fixedPrevious===false){
								fixedPrevious=true;
								stxx.updateChartData({
									"Date": tmps.Date,
									"Open": tmps.Open,
									"High": tmps.High,
									"Low": tmps.Low,
									"Close": tmps.Close,
									"Volume": tmps.Volume,
								},null,{fillGaps:true});
							}
						}
						doStreaming=setTimeout(function(){do_streaming();},1000);
					}
					else{
						doStreaming=setTimeout(function(){do_streaming();},250);
					}
				}
			);
		}
	}
	myQuoteFeed.url="/v2/unstable/libChart/init_sync.php";
	myQuoteFeed.fetchInitialData=function(symbol,startDate,endDate,params,cb){
		console.log("params1=",params);
		var query=this.url
			+"?ux=<?php echo $_current_unit;?>"
			+"&tx=<?php echo $_current_times;?>"
			+"&startDate="+CIQ.yyyymmddhhmm(startDate)
			+"&endDate="+CIQ.yyyymmddhhmm(endDate);
		CIQ.postAjax(
			query,
			null,
			function(status,response){
				if(status==200){
					cb({
						quotes: JSON.parse(response),
						moreAvailable: false
					});
				}
				else{
					cb({error:(response?response:status)});
				}
			}
		);
	};
	myQuoteFeed.fetchUpdateData=function(symbol,startDate,params,cb){
		return;
	}
	myQuoteFeed.fetchPaginationData=function(symbol,startDate,endDate,params,cb){
		return;
	}
	var stxx=new CIQ.ChartEngine({
		container: $$$(".chartContainer"),
	//	allowScroll: false,
	//	allowZoom: false,
		layout: {
			"chartType": "candle",
			"crosshair": true,
		//	"candleWidth": 5,
			"periodicity": 1,
			"timeUnit": "minute",
			"interval": <?php echo $_current_times;?>,
		},
		preferences: {
			"currentPriceLine": true,
		//	"whitespace": 100,
		},
		chart: {
			yAxis: {
				position: "right"
			},
		}
	});
	stxx.attachQuoteFeed(myQuoteFeed);
	stxx.newChart("<?php echo $_array_units[$_current_unit]['title'];?>",null,null,function(){
		CIQ.Studies.addStudy(stxx,"volume");
		CIQ.Studies.addStudy(stxx,"ma",{"Period":15,"Field":"Close","Type":"ma"},{"MA":"#ff0000"});
		CIQ.Studies.addStudy(stxx,"ma",{"Period":50,"Field":"Close","Type":"ma"},{"MA":"#00cc00"});
		do_streaming();
	});
	var helper=new CIQ.ThemeHelper({stx:stxx});
//	helper.settings.chart['Background'].color='rgb(0,0,0)';
//	helper.settings.chart['Grid Lines'].color='rgb(33,50,63)';
//	helper.settings.chart['Grid Dividers'].color='rgb(37,55,70)';
//	helper.settings.chart['Axis Text'].color='rgb(196,199,201)';
	helper.settings.chartTypes['Candle/Bar']['up'].color='rgb(210,79,69)';
	helper.settings.chartTypes['Candle/Bar']['up'].wick='rgb(201,201,201)';
	helper.settings.chartTypes['Candle/Bar']['up'].border='rgb(210,79,69)';
	helper.settings.chartTypes['Candle/Bar']['down'].color='rgb(18,97,196)';
	helper.settings.chartTypes['Candle/Bar']['down'].wick='rgb(201,201,201)';
	helper.settings.chartTypes['Candle/Bar']['down'].border='rgb(18,97,196)';
//	helper.settings.chartTypes['Line'].color='1px solid rgb(0,0,0)';
//	helper.settings.chartTypes['Mountain'].color='rgba(0,156,255,0.5)';
	helper.update();
	CIQ.ChartEngine.prototype.prepend("headsUpHR",prependHeadsUpHR);
</script>