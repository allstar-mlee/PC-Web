<?php
require_once(__DIR__.'/common.php');

if(strtolower($_SERVER['REQUEST_METHOD'])=='post') {
	if(isset($_POST['exec'])) {
		if($_POST['exec']=='get_realtime_market') {
			$resp=Jcurl('GET','https://api.allstarbit.com/public/public/'.$_POST['sx'].'/'.$_POST['tx'],false);
			$resx=json_decode($resp,true);
			krsort($resx['sell']);
			krsort($resx['buy']);
			$qtymax=0;
			foreach($resx as $tpx=>$rows) {
				foreach($rows as $key=>$val) {
					$qtyx=$val?$val/$key:0;
					if($qtymax<$qtyx)	$qtymax=$qtyx;
				}
			}
			$nx=0;
			foreach($resx['buy'] as $key=>$row) {
				$qty=$row?$row/$key:0;
				$ptg=round(($qty/$qtymax)*100,2);
				echo '<tr class="buy">';
				if(!$nx) {
					echo '<td colspan="2" rowspan="'.sizeof($resx['buy']).'"></td>';
				}
				echo '<td class="price">'.$key.'</td>';
				echo '<td class="qty">';
					echo '<a href="#">';
						echo '<span class="bar" style="width:'.$ptg.'%;"></span>';
						echo '<em>'.$qty.'</em>';
					echo '</a>';
				echo '</td>';
				echo '<td></td>';
				echo '</tr>';
				$nx++;
			}
			$nx=0;
			foreach($resx['sell'] as $key=>$row) {
				$qty=$row?$row/$key:0;
				$ptg=round(($qty/$qtymax)*100,2);
				echo '<tr class="sell">';
				echo '<td></td>';
				echo '<td class="qty">';
					echo '<a href="#">';
						echo '<span class="bar" style="width:'.$ptg.'%;"></span>';
						echo '<em>'.$qty.'</em>';
					echo '</a>';
				echo '</td>';
				echo '<td class="price">'.$key.'</td>';
				if(!$nx) {
					echo '<td colspan="2" rowspan="'.sizeof($resx['sell']).'"></td>';
				}
				echo '</tr>';
				$nx++;
			}
		}
		elseif($_POST['exec']=='get_balance') {
			$wallets=array();
			$resp=Jcurl('GET','https://api.allstarbit.com/public/wallet/'.$mbsx['email'].'/'.$mbsx['password'],false);
			$resx=json_decode($resp,true);
			for($i=0; $i<sizeof($resx['data']); $i++) {
				if(!array_key_exists($resx['data'][$i]['issue'],$wallets)) {
					$wallets[$resx['data'][$i]['issue']]=$resx['data'][$i];
				}
			}
			foreach($wallets as $key=>$row) {
				if(in_array($key,$_POST['focus'])) {
					echo '$("#balance'.$key.'").html("'.($row['balance']-$row['readOnly']).'");';
				}
			}
		//	echo '$(".possiblePrice").effect("highlight");';
		}
		elseif($_POST['exec']=='deal') {
			if($_POST['type']=='buy') {
				$_sourceVolume=$_POST['qty']*$_POST['requestValue'];
				$_targetVolume=$_POST['qty'];
			}
			elseif($_POST['type']=='sell') {
				$_sourceVolume=$_POST['qty'];
				$_targetVolume=$_POST['qty']*$_POST['requestValue'];
			}
			$param=json_encode(array(
				'source'=>$_POST['source'],
				'target'=>$_POST['target'],
				'sourceVolume'=>$_sourceVolume,
				'targetVolume'=>$_targetVolume,
				'requestValue'=>$_POST['requestValue'],
			));
			$resp=Jcurl('POST','https://api.allstarbit.com/public/transaction/'.$mbsx['email'].'/'.$mbsx['password'],$param);
			if($resp=='1') {
				echo 'alert("거래가 접수되었습니다.");';
				echo '$("#'.$_POST['type'].'").find(\'input[type="submit"]\').attr("disabled",false);';
				echo '$("#'.$_POST['type'].'").each(function(){';
					echo 'this.reset();';
				echo '});';
			}
			else {
				echo 'alert("[#'.$resp.'] 오류입니다.");';
			}
		//	echo 'alert("'.addslashes($resp).'");';
		//	echo '';
		}
		elseif($_POST['exec']=='get-market-prices') {
			if(in_array($_POST['issue'],array('KRW','BTC','ETH','USDT'))) {
				$resp=Jcurl('GET','http://api.allstarbit.com/public/info/'.$_POST['issue'],false);
				$resx=json_decode($resp,true);
				//	+:#d60000
				//	-:#9292ff
				echo '<table class="sideTable1 side-market-prices">';
				echo '<thead>';
				echo '<tr>';
				echo '<th> </th>';
				echo '<th>한글명 <img src="img/horizental_arrow.png"></th>';
				echo '<th>현재가 <img src="img/btn_index.png"></th>';
				echo '<th>전일대비 <img src="img/btn_index.png"></th>';
				echo '<th>거래대금 <img src="img/btn_index.png"></th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				if(isset($resx['data'])&&is_array($resx['data'])) {
					for($i=0; $i<sizeof($resx['data']); $i++) {
						$isx=$resx['data'][$i];
						echo '<tr data-source="'.$_POST['issue'].'" data-target="'.$isx['issue'].'">';
						echo '<td class="favorite"><img src="img/favorite.png" /></td>';
						echo '<td>';
							echo '<p>';
								echo array_key_exists(strtoupper($isx['issue']),$_global_wallet_names)?$_global_wallet_names[strtoupper($isx['issue'])]['ko']:strtoupper($isx['issue']);
							echo '</p>';
							echo '<p>'.$isx['issue'].'/'.$_POST['issue'].'</p>';
						echo '</td>';
						echo '<td style="text-align:right;padding-right:5px;">'.$isx['latestTradeValue'].'</td>';
						echo '<td style="text-align:right;padding-right:5px;">'.$isx['diff'].'</td>';
						echo '<td style="text-align:right;padding-right:5px;">'.$isx['latestTradeVolume'].'</td>';
						echo '</tr>';
					}
				}
				echo '</tbody>';
				echo '</table>';
			}
			else {
				$resp=Jcurl('GET','https://api.allstarbit.com/public/wallet/'.$mbsx['email'].'/'.$mbsx['password'],false);
				$resx=json_decode($resp,true);
				$wallets=array();
				for($i=0; $i<sizeof($resx['data']); $i++) {
					$wx=$resx['data'][$i];
					if($wx['issue']!='KRW') {
						$wallets[]=$wx;
					}
				}
			//	echo '<pre style="color:#fff;">'.print_r($wallets,true).'</pre>';
				echo '<table class="sideTable2 side-market-prices">';
				echo '<thead>';
				echo '<tr>';
				echo '<th> </th>';
				echo '<th>코인명 <img src="img/btn_index.png"></th>';
				echo '<th>보유(평가금) <img src="img/btn_index.png"></th>';
				echo '<th>매수평균가 <img src="img/btn_index.png"></th>';
				echo '<th>수익금 <img src="img/btn_index.png"></th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				for($i=0; $i<sizeof($wallets); $i++) {
					$wx=$wallets[$i];
					if($wx['balance']>0) {
						echo '<tr>';
						echo '<td class="favorite"><img src="img/favorite.png" /></td>';
						echo '<td>';
							echo '<p>';
								echo array_key_exists(strtoupper($wx['issue']),$_global_wallet_names)?$_global_wallet_names[strtoupper($wx['issue'])]['ko']:strtoupper($wx['issue']);
							echo '</p>';
							echo '<p>'.$wx['issue'].'</p>';
						echo '</td>';
						echo '<td style="text-align:right;padding-right:5px;">'.$wx['balance'].'</td>';
						echo '<td style="text-align:right;padding-right:5px;"></td>';
						echo '<td style="text-align:right;padding-right:5px;"></td>';
						echo '</tr>';
					}
				}
				echo '</tbody>';
				echo '</table>';
			}
		}
		elseif($_POST['exec']=='sendmail-verify') {
			$param=json_encode(array(
				'email'=>$_POST['email'],
			));
			$resp=Jcurl('PUT','https://api.allstarbit.com/public/user/sendSignUpEmail',$param);
			echo '가입인증메일재전송 요청이 접수되었습니다.';
		}
		elseif($_POST['exec']=='verify-email') {
			$param=json_encode(array(
				'email'=>$_POST['email'],
				'password'=>$_SESSION['tempkey'],
				'rpc'=>$_POST['rpc'],
			));
			$resp=Jcurl('PUT','https://api.allstarbit.com/public/user/receiveSignUpEmail',$param);
			$resx=json_decode($resp,true);
			if(json_last_error()==JSON_ERROR_NONE) {
				if(isset($resx['result'])) {
					$errmsg=false;
					switch($resx['result']) {
						case "2001":
							echo 'alert("이메일 인증을 완료하셨습니다. 로그인 후 이용해주시기 바랍니다.");';
							echo 'self.location.replace("./login.php");';
							break;
						case "2002":
							$errmsg='인증실패';
							break;
						default:
							$errmsg='기타 오류!';
							break;
					}
					if($errmsg!==false) {
						echo 'alert("'.$errmsg.'");';
						echo '$("#verify").find(\'input[type="submit"]\').attr("disabled",false);';
					}
				}
				else {
					echo 'alert("서버 응답 형식 오류!");';
					echo '$("#verify").find(\'input[type="submit"]\').attr("disabled",false);';
				}
			}
			else {
				echo 'alert("서버 응답 오류!");';
				echo '$("#verify").find(\'input[type="submit"]\').attr("disabled",false);';
			}
		}
		elseif($_POST['exec']=='signin') {
			$resp=Jcurl('GET','https://api.allstarbit.com/public/user/'.$_POST['email'].'/'.pj_code($_POST['password']),false);
			$resx=json_decode($resp,true);
			if(json_last_error()==JSON_ERROR_NONE) {
				if(isset($resx['data'])) {
					if(
						is_array($resx['data'])
						&&
						(isset($resx['data']['email'])&&$resx['data']['email']==$_POST['email'])
						&&
						(isset($resx['data']['password'])&&$resx['data']['password']==pj_code($_POST['password']))
					) {
						$_SESSION['identifier']=json_encode(array(
							'email'=>$resx['data']['email'],
							'token'=>$resx['data']['password'],
						));
						echo 'alert("로그인되었습니다.");';
						echo 'self.location.replace("./index.php");';
					}
					elseif($resx['data']=='506') {
						echo 'alert("인증실패!");';
						echo '$("#login").find(\'input[type="submit"]\').attr("disabled",false);';
					}
					else {
						echo 'alert("기타 오류!");';
						echo '$("#login").find(\'input[type="submit"]\').attr("disabled",false);';
					}
				}
				else {
					echo 'alert("서버 응답 형식 오류!");';
					echo '$("#login").find(\'input[type="submit"]\').attr("disabled",false);';
				}
			}
			else {
				echo 'alert("서버 응답 오류!");';
				echo '$("#login").find(\'input[type="submit"]\').attr("disabled",false);';
			}
		}
		elseif($_POST['exec']=='signup') {
			$param=json_encode(array(
				'email'=>$_POST['email'],
				'password'=>pj_code($_POST['password']),
				'passwordConfirm'=>pj_code($_POST['passwordConfirm']),
			));
			$resp=Jcurl('POST','https://api.allstarbit.com/public/user',$param);
			$resx=json_decode($resp,true);
			if(json_last_error()==JSON_ERROR_NONE) {
				if(isset($resx['result'])) {
					$errmsg=false;
					switch($resx['result']) {
						case "1":
							$_SESSION['tempkey']=pj_code($_POST['password']);
							echo '$("#verify").find(\'input[name="email"]\').val("'.$_POST['email'].'");';
							echo '$("#verify").find(\'input[name="rpc"]\').focus();';
							echo '$("#registerPopup").show();';
							break;
						case "102":
							$errmsg='패스워드 길이가 10자 이하';
							break;
						case "103":
							$errmsg='패스워드와 패스워드 확인이 일치하지 않음';
							break;
						case "104":
						case "105":
							$errmsg='SQL Injection 시도';
							break;
						case "106":
							$errmsg='유효한 이메일 주소가 아님';
							break;
						case "107":
							$errmsg='이미 가입한 이메일';
							break;
						case "108":
							$errmsg='서버점검 중';
							break;
						default:
							$errmsg='기타 오류!';
							break;
					}
					if($errmsg!==false) {
						echo 'alert("'.$errmsg.'");';
						echo '$("#register").find(\'input[type="submit"]\').attr("disabled",false);';
					}
				}
				else {
					echo 'alert("서버 응답 형식 오류!");';
					echo '$("#register").find(\'input[type="submit"]\').attr("disabled",false);';
				}
			}
			else {
				echo 'alert("서버 응답 오류!");';
				echo '$("#register").find(\'input[type="submit"]\').attr("disabled",false);';
			}
		}
		elseif($_POST['exec']=='input') {
			$resp=Jcurl('PUT','https://api.allstarbit.com/public/wallet/'.$mbsx['email'].'/'.$mbsx['password'].'/'.$_POST['issue'].'/'.$_POST['amount'],false);
			if($resp=='1') {
				echo 'alert("입금신청이 정상적으로 접수되었습니다.");';
				echo 'self.location.replace("./wallet.php");';
			}
			else {
				echo 'alert("오류입니다.");';
				echo '$("#input").find(\'input[type="submit"]\').attr("disabled",false);';
			}
		}
		elseif($_POST['exec']=='output') {
			$resp=Jcurl('DELETE','https://api.allstarbit.com/public/wallet/'.$mbsx['email'].'/'.$mbsx['password'].'/'.$_POST['issue'].'/'.$_POST['amount'],false);
			if($resp=='0') {
				echo 'alert("실패, 존재하지 않는 이메일입니다.");';
				echo '$("#input").find(\'input[type="submit"]\').attr("disabled",false);';
			}
			elseif($resp=='2') {
				echo 'alert("잔액부족으로 인해 신청이 중단되었습니다.");';
				echo '$("#input").find(\'input[type="submit"]\').attr("disabled",false);';
			}
			elseif($resp=='1'||$resp==='') {
				echo 'alert("출금신청이 정상적으로 접수되었습니다.");';
				echo 'self.location.replace("./wallet.php");';
			}
			else {
				echo 'alert("기타 오류입니다.");';
				echo '$("#input").find(\'input[type="submit"]\').attr("disabled",false);';
			}
			echo '$("#input").find(\'input[type="submit"]\').attr("disabled",false);';
		}
		exit;
	}
}

?>