 <style type="text/css">
	table.side-market-prices > tbody > tr > td{cursor:pointer;}
	table.side-market-prices > tbody > tr.hover > td{background-color:rgba(255,255,255,.15);}
 </style> 
 <script type="text/javascript">
 	function get_market_prices(ix){
		$("#market-prices").html('<p>시세 정보를 불러오는 중입니다.</p>');
		$.ajax({
			type: "POST",
			method: "POST",
			url: "./byphp/todo.php",
			data: {
				"exec": "get-market-prices",
				"issue": ix,
			},
		}).done(function(resp){
			$("#market-prices").html(resp);
			$("table.side-market-prices > tbody > tr")
				.on("mouseenter",function(e){
					$(this).addClass("hover");
				})
				.on("mouseleave",function(e){
					$(this).removeClass("hover");
				})
				.on("click",function(e){
					e.preventDefault();
					if($(this).attr("data-source")&&$(this).attr("data-target")){
						self.location.href="./index.php?source="+$(this).attr("data-source")+"&target="+$(this).attr("data-target");
					}
				});
		});
	}
	$(function(){
		$(".coinTitle li").off("click");
		$(".coinTitle li").each(function(idx){
			$(this).on("click",function(e){
				$(this).css({
					"box-shadow": "inset 0px -4px 0px #f5b74c",
					"font-weight": "bold",
					"color": "#f5b74c",
				});
				$(".coinTitle li").not($(this)).css({
					"box-shadow": "0px 0px 0px #000",
					"font-weight": "100",
					"color": "#fff",
				});
				get_market_prices($(this).attr("data-category-issue"));
			});
		});
		get_market_prices("KRW");
	});
 </script>



	  <aside>
            <div id="aside" alt="사이드영역">
                
                <div class="coinSearch">
                    <div>
                        <form action="#" method="get">
                        <input type="search" placeholder="코인명/심볼검색">
                        <button type="submit"><img src="img/search.png"></button>
                        </form>
                    </div>
                    <div>
                        <span class="favorite">
                            <img src="img/favorite.png">
                            <span>관심코인</span>
                        </span>
                    </div>
                </div><!--coinSearch (line1) closed-->
                <ul class="coinTitle">
                    <li data-category-issue="KRW" style="font-weight:bold;color:#f5b74c;">원화거래</li>
                    <li data-category-issue="BTC">BTC</li>
                    <li data-category-issue="ETH">ETH</li>
                    <li data-category-issue="USDT">USDT</li>
                    <li data-category-issue="ASSETS">보유코인</li>
                </ul>
                <div id="market-prices" class="sideScroll">
                </div>
            </div><!--#aside closed-->
        </aside>