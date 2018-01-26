<?php
namespace Home\Action;
use Common\Action\HomeAction;
class VodAction extends HomeAction{
    // 影视搜索
    public function search(){
		//获取地址栏参数
		$Url = ff_param_url();
		//$JumpUrl传递分页及跳转参数
		$JumpUrl = ff_param_jump($Url);
		$JumpUrl['p'] = '{!page!}';
		C('jumpurl',UU('Home-vod/search',$JumpUrl,true,false));	
		C('currentpage',$Url['page']);
		//变量赋值
		$search = $this->Lable_Search($Url,'vod');
		$this->assign($search);
		$this->display($search['search_skin']);
    }			
    // 影视列表页
    public function show(){
		$Url = ff_param_url();
		$JumpUrl = ff_param_jump($Url);
		$JumpUrl['p'] = '{!page!}';	
		C('jumpurl',UU('Home-vod/show',$JumpUrl,true,false));
		C('currentpage',$Url['page']);
		$List = list_search(F('_ppvod/list'),'list_id='.$Url['id']);
		$channel = $this->Lable_Vod_List($Url,$List[0]);
		$this->assign($channel);
		$this->display($channel['list_skin']);
    }
    // 多分类筛选
    public function type(){

		$special = ['mcid', 'area', 'lz'];

		$listMap = [
			'mcid' => [
				'qingchun' => [
					'uri' => 'qingchun',
					'id' => '11',
					'name' => '青春'
				],
				'kehuan' => [
					'uri' => 'kehuan',
					'id' => '65',
					'name' => '科幻',
				],
			],
			'area' => [
				'meiguo' => [
					'uri' => 'meiguo',
					'id' => '美国',
					'name' => '美国',
				],
				'yingguo'=>[
					'uri' => 'yingguo',
					'id' => '英国',
					'name' => '英国',
				],
				'jianada' => [
					'uri' => 'jianada',
					'id' => '加拿大',
					'name'=>'加拿大'
				],
			],
			'lz' => [
				'lz'=>[
					'id' => 1,
					'name' => '连载中',
				],
				'bjz'=> [
					'id' => 2,
					'name' => '本季完结',
				],
				'end'=>[
					'id' => 0,
					'name' => '完结',
				],
				'yg'=> [
					'id' => 3,
					'name' => '预告',
				],
			],
			'year' => [
				'2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009'
			],
			'diantai' => [
				'CW', 'AMC', 'HBO', 'StarZ', 'CBS', 'ABC', 'NBC', 'FOX', 'TNT', 'ShowTime', 'LifeTime', 'FX', 'Netflix'
				,'Cinemax', 'Sky', 'E4', 'BBC', 'FXX', 'Disney'
			],
		];



		//获取参数
		$uri = $_SERVER['REQUEST_URI'];
		$uri = trim($uri, '/');
		$uri = trim(str_replace('vod-type-id-18', '', $uri), '-');
		//获取页数
		$arrTemp = strrpos($uri, '/') !== false ? explode('/', $uri) : [$uri, 1];
		$page = !empty($arrTemp[1]) && is_numeric($arrTemp[1]) ? $arrTemp[1] : 1;
		$uri = $arrTemp[0];
		$where = 'cid:18;limit:10;page:'.$page;


		$currArr = [];
		$currMcid = '';
		$currArea = [];
		$currTv = [];
		$currYear = [];
		$currLz = [];
		//拆分组合参数
		if (!empty($uri)) {
			$arrUri = explode('-', $uri);
			//生成查询条件
			foreach ($arrUri as $k => $uri) {
				foreach ($listMap as $cond => $map) {
					if (in_array($cond, $special)) {
						if (in_array($uri, array_keys($map))) {
							$where .= ';'.$cond.':'.$map[$uri]['id'];
							$currArr[] = $uri;
						}
					} else {
						if (in_array($uri, $map)) {
							$where .= ';'.$cond.':'.$uri;
							$currArr[] = $uri;
						}
					}
				}
			}
		}

		$temp1 = $currArr;
		//生成类型链接
		foreach ($listMap['mcid'] as $k => $mcat) {
			if (in_array($k, $temp1)) {
				unset($temp1[array_search($k, $temp1)]);
			}
		}
		$currMcid = !empty($temp1) ? '-'.implode('-', $temp1) : '';

		$temp2 = $currArr;
		//生成地区链接
		foreach ($listMap['area'] as $k => $area) {
			if (in_array($k, $temp2)) {
				unset($temp2[array_search($k, $temp2)]);
			}
		}
		$currArea = !empty($temp2) ? '-'.implode('-', $temp2) : '';;

		$temp3 = $currArr;
		//生成年份链接
		foreach ($listMap['year'] as $k => $year) {
			if (in_array($year, $temp3)) {
				unset($temp3[array_search($year, $temp3)]);
			}
		}
		$currYear = implode('-', $temp3);

		$temp4 = $currArr;
		//生成连载链接
		foreach ($listMap['lz'] as $k => $lz) {
			if (in_array($k, $temp4)) {
				unset($temp4[array_search($k, $temp4)]);
			}
		}
		$currLz = implode('-', $temp4);

		//echo '<pre>';var_dump($currMcid, $currArea, $currYear, $currLz);die;

		$Url = ff_param_url();
		$JumpUrl = ff_param_jump($Url);
		$JumpUrl['p'] = '{!page!}';	
		C('jumpurl',UU('Home-vod/type',$JumpUrl,true,false));
		C('currentpage',$Url['page']);
		$List = list_search(F('_ppvod/list'),'list_id='.$Url['id']);
		$channel = $this->Lable_Vod_List($Url,$List[0]);

		//var_dump($channel);die;

		$typeVodList = ff_mysql_vod($where);
		$this->assign(['mciduri'=>$currMcid]);
		$this->assign(['areauri'=>$currArea]);
		$this->assign(['currUri'=>$currArr]);
		$this->assign(['listMap'=>$listMap]);
		$this->assign($channel);
		$this->display($channel['list_skin']);
    }	
	// 影片内容页
    public function read(){
		$array_detail = $this->get_cache_detail( intval($_GET['id']) );
		$player = C('play_player');
		$vod_play = explode('$$$', $array_detail['read']['vod_play']);
		$vod_url = explode('$$$', $array_detail['read']['vod_url']);
		$arrPlay = $arrUrl = [];
		foreach ($vod_play as $k => $v) {
			if (!in_array($v, ['down', 'bt', 'magnet'])) {
				$arrPlay[] = $v;
				$vod_url[$k] = str_replace('$', '++', $vod_url[$k]);
				$arrUrl[] = str_replace(PHP_EOL, '+++', $vod_url[$k]);
				$arrServer[] = $player[$v][1];
			}
		}

		$array_detail['read']['vod_play'] = implode('$$$', $arrPlay);
		$array_detail['read']['vod_url'] = urlencode(implode('$$$', $arrUrl));
		$array_detail['read']['vod_server'] = implode('$$$', $arrServer);


		if($array_detail){
			$this->assign($array_detail['show']);
			$this->assign($array_detail['read']);
			$this->display($array_detail['read']['vod_skin_detail']);
		}else{
			$this->assign("jumpUrl",C('site_path'));
			$this->error('此影片已经删除，请选择观看其它节目！');
		}
    }
	// 影片播放页
    public function play(){
		$array_detail = $this->get_cache_detail( intval($_GET['id']) );
		if($array_detail){
			$array_detail['read'] = $this->Lable_Vod_Play($array_detail['read'],array('id'=>intval($_GET['id']), 'sid'=>intval($_GET['sid']), 'pid'=>intval($_GET['pid'])));
			$this->assign($array_detail['show']);
			$this->assign($array_detail['read']);
			$this->display($array_detail['read']['vod_skin_play']);
		}else{
			$this->assign("jumpUrl",C('site_path'));
			$this->error('此影片已经删除，请选择观看其它节目！');
		}
    }
	// 从数据库获取数据
	private function get_cache_detail($vod_id){
		if(!$vod_id){ return false; }
		//优先读取缓存数据
		if(C('data_cache_vod')){
			$array_detail = S('data_cache_vod_'.$vod_id);
			if($array_detail){
				return $array_detail;
			}
		}
		//未中缓存则从数据库读取
		$where = array();
		$where['vod_id'] = $vod_id;
		$where['vod_cid'] = array('gt',0);
		$where['vod_status'] = array('eq',1);
		$rs = D("Vod");
		$array = $rs->where($where)->relation('Tag')->find();
		if($array){
			//解析标签
			$array_detail = $this->Lable_Vod_Read($array);
			if( C('data_cache_vod') ){
				S('data_cache_vod_'.$vod_id, $array_detail, intval(C('data_cache_vod')));
			}
			return $array_detail;
		}
		return false;
	}
}
?>