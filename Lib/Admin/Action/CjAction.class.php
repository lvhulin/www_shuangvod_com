<?php
namespace Admin\Action;
use Common\Action\BaseAction;
class CjAction extends BaseAction{
	public function show(){
		dump('预留功能');
	}
	// 添加编辑采集节点
    public function add(){
		dump('预留功能');
		exit();
		$rs = D("Cj");
		$cj_id = intval($_GET['id']);
		$cj_mod = trim($_GET['mod']);
		$where = array();
		if($cj_id){
			if(!$cj_mod){
				$where['cj_id'] = $cj_id;
				$where['cj_pid'] = 0;
				$array = $rs->where($where)->find();
				dump($array);			
			}else{
				$where['cj_pid'] = $cj_id;
				$where['cj_oid'] = array('gt',1);	
				$list = $rs->where($where)->select();
				if($list){
					dump($list);
				}else{
					$array['cj_mod'] = $cj_mod;
				}
			}
			$array['cj_tpltitle'] = '编辑';
		}else{
		    $array['cj_coding'] = 'gbk';
			$array['cj_savepic'] = 0;
			$array['cj_order'] = 0;
			$array['cj_pid'] = 0;
			$array['cj_oid'] = 1;
			$array['cj_mod'] = 'node';
			$array['cj_tpltitle'] = '添加';
		}
		$this->assign($array);
		$this->ppvod_play();
		$this->assign('listtree',F('_ppvod/listvod'));
		$this->display('./Public/system/cj_add.html');
    }
	// 添加采集节点数据第一步	
	public function insert() {
		$rs = D("Cj");
		if (!$rs->create()) {
			$this->error($rs->getError());
		}
		$cj_id = $rs->add();
		if(false !==  $cj_id){
			redirect('?s=Admin-Cj-Add-id-'.$cj_id.'-oid-2-mod-'.$_POST['cj_nextmod']);
		}else{
			$this->error('添加采集节点添加出错！');
		}
	}
	// 更新数据库信息
	public function update(){
		if(empty($_POST['collect_savepic'])){
			$_POST['collect_savepic'] = 0;
		}
		if(empty($_POST['collect_order'])){
			$_POST['collect_order'] = 0;
		}
		$rs = D("Collect");
		if($rs->create()){
			$id = intval($_POST['collect_id']);
			if(false !==  $rs->save()){
				//F('_collects/id_'.$id,NULL);
				//F('_collects/id_'.$id.'_rule',NULL);
				//$this->f_replace($_POST['collect_replace'],$id);
				$this->assign("jumpUrl",'?s=Admin-Collect-Caiji-ids-'.$id.'-tid-2');
				$this->success('采集规则更新成功,测试一下是否能正常采集！');
			}else{
				$this->error("没有更新任何数据！");
			}
		}else{
			$this->error($rs->getError());
		}
	}
	// 栏目分类转换
    public function change(){
		$change_content = trim(F('_collect/change'));
		$this->assign('change_content',$change_content);
        $this->display('./Public/system/cj_change.html');
    }
	// 栏目分类转换保存
    public function changeup(){
		F('_collect/change',trim($_POST["content"]));
		$array_rule = explode(chr(13),trim($_POST["content"]));
		foreach($array_rule as $key => $listvalue){
			$arrlist = explode('|',trim($listvalue));
			$array[$arrlist[0]] = intval($arrlist[1]);
		}
		F('_collect/change_array',$array);		
		$this->assign("jumpUrl",'?s=Admin-Cj-Change');
		$this->success('栏目转换规则编辑成功！');
	}

	protected static function gbk2utf8($list_str)
	{
		$charset = mb_detect_encoding($list_str,array('UTF-8','GBK','GB2312'));
		$charset = strtolower($charset);
		if('cp936' == $charset){
			$charset='GBK';
		}
		if("utf-8" != $charset){
			$str = iconv($charset,"UTF-8//IGNORE",$list_str);
		}
		return $str;
	}

	public function insertcj()
	{
		$domains = [
			'loldytt' => 'https://www.loldytt.com/',
			'mianbao' => 'https://www.mianbao99.com/',
		];
		$name = $_GET['name'];
		$url = $_GET['url'];
		$url = str_replace('_', '/', $url);
		$url = $domains[$name].$url.'/';
		$html = getfile($url);
		$data = self::$name($html);

		echo json_encode($data);die;
	}

	private static function loldytt($html)
	{
		$html = static::gbk2utf8($html);
		$urls = [];
		$names = [];
		$exp1 = '/<li\s+id="li1_(?:.*?)"><a\s+href="(.*?)"\s+(?:\n\r)?title="(?:.*?)"\s+target="_self">(.*?)<\/a><\/li>(?:\n\r)?/is';
		if(preg_match_all($exp1, $html, $match)) {
			$downUrl1 = '';
			$downName1 = '';
			if (isset($match[1]) && !empty($match[1])) {
				if (strpos($match[1][0], 'magnet') !== false) {
					$names[] = $downName1 = 'magnet';
				} else {
					$names[] = $downName1 = 'down';
				}
				foreach ($match[1] as $k => $v) {
					$name = isset($match[2][$k]) && !empty($match[2][$k]) ? $match[2][$k] : '高清'.$k;
					$downUrl1 .= $name.'$'.$v.PHP_EOL;
				}
			}
		} else {
			$downUrl1 = '';
		}

		$urls[] = $downUrl1;

		$exp2 = '/<li\s+id="li2_(?:.*?)"><a\s+href="(.*?)"\s+(?:\n\r)?title="(?:.*?)"\s+target="_self">(.*?)<\/a><\/li>(?:\n\r)?/is';
		if(preg_match_all($exp2, $html, $match)) {
			$downUrl2 = '';
			$downName2 = '';
			if (strpos($match[1][0], 'magnet') !== false) {
				$names[] = $downName2 = 'magnet';
			} else {
				$names[] = $downName2 = 'down';
			}
			if (isset($match[1]) && !empty($match[1])) {
				foreach ($match[1] as $k => $v) {
					$name = isset($match[2][$k]) && !empty($match[2][$k]) ? $match[2][$k] : '高清'.$k;
					$downUrl2 .= $name.'$'.$v.PHP_EOL;
				}
			}
		} else {
			$downUrl2 = '';
		}

		$conExp = '/<div\s+class="neirong">(.*?)<\/div>/is';
		if(preg_match($conExp, $html, $match)) {
			$content = $match[1];
		} else {
			$content = '';
		}

		$urls[] = $downUrl2;

		return  ['urls'=>$urls, 'names'=>$names, 'con'=>$content];//[implode('$$$', $urls), implode('$$$', $names)];
	}


	private static function mianbao($html)
	{
		//匹配名称
		if (preg_match('/<div\s+class="detail-title\s+fn-clear"><h2>(.*?)<\/h2>(?:.*?)<\/div>/', $html, $match)) {
			$name = isset($match[1]) ? trim($match[1]) : '';
		} else {
			$name = '';
		}

		//匹配图片
		if (preg_match('/<div\s+class="detail-pic\s+fn-left"><img\s+width="225"\s+height="300"\s+src="(.*?)" alt="(?:.*?)"><\/div>/is', $html, $match)) {
			$img = isset($match[1]) ? trim($match[1]) : '';
		} else {
			$img = '';
		}

		//匹配主演
		if (preg_match('/<dl><dt>主演：<\/dt><dd>(.*?)<\/dd><\/dl>/is', $html, $match)) {
			$actor = isset($match[1]) ? trim($match[1]) : '';
			if ($actor) {
				$actor = preg_replace('/<a\s+href="(?:.*?)" target="_blank">/', '', $actor);
				$actor = preg_replace('/<\/a>/', ',', trim($actor, '</a>'));
			} else {
				$actor = '';
			}
		} else {
			$actor = '';
		}

		//匹配导演
		if (preg_match('/<dl\s+class="fn-right"><dt>导演：<\/dt><dd>(.*?)<\/dd><\/dl>/is', $html, $match)) {
			$director = isset($match[1]) ? trim($match[1]) : '';
			if ($director) {
				$director = preg_replace('/<a\s+href="(?:.*?)" target="_blank">/', '', $director);
				$director = preg_replace('/<\/a>/', ',', trim($director, '</a>'));
			} else {
				$director = '';
			}
		} else {
			$director = '';
		}


		//匹配地区
		if (preg_match('/<dl\s+class="fn-right"><dt>地区：<\/dt><dd><span>(.*?)<\/span><\/dd><\/dl>/is', $html, $match)) {
			$area = isset($match[1]) ? trim($match[1]) : '';
		} else {
			$area = '';
		}

		//匹配年份
		if (preg_match('/<dl\s+class="fn-right"><dt>年份：<\/dt><dd><span>(.*?)<\/span><\/dd><\/dl>/is', $html, $match)) {
			$year = isset($match[1]) ? trim($match[1]) : '';
		} else {
			$year = '';
		}


		//匹配语言
		if (preg_match('/<dl\s+class="fn-left"><dt>语言：<\/dt><dd><span>(.*?)<\/span><\/dd><\/dl>/is', $html, $match)) {
			$language = isset($match[1]) ? trim($match[1]) : '';
		} else {
			$language = '';
		}

		//匹配状态
		if (preg_match('/<dl><dt>状态：<\/dt><dd><span\s+class="color">(.*?)<\/span><\/dd><\/dl>/is', $html, $match)) {
			$title = isset($match[1]) ? trim($match[1]) : '';
		} else {
			$title = '';
		}



		$cateName = '';
		$cidName = '';

		//匹配类型
		if (preg_match('/<dl\s+class="fn-left"><dt>类型：<\/dt><dd>(.*?)<\/dd><\/dl>/is', $html, $match)) {
			$type = isset($match[1]) ? trim($match[1]) : '';
			if ($type) {
				$type = preg_replace('/<a\s+href="(?:.*?)">/', '', $type);
				$type = explode('</a>', trim($type, '</a>'));
				$cateName = array_shift($type);
				$cidName = implode(',', $type);
			} else {
				$cateName = '';
				$cidName = '';
			}
		} else {
			$cateName = '';
		}

		//匹配介绍
		if (preg_match('/<div\s+class="detail-desc-cnt">(.*?)<\/div>/is', $html, $match)) {
			$content = isset($match[1]) ? trim($match[1]) : '';

			if (preg_match('/<span\s+style="(?:.*?)">(.*?)<\/span>/', $content, $match)) {
				$content = isset($match[1]) ? trim($match[1]) : '';
			}

		} else {
			$content = '';
		}


		$playFlag = '';
		$playName = '';
		$playUrl = '';
		$domain = 'https://www.mianbao99.com/';

		//匹配播放地址
		if (preg_match('/<p\s+class="play-list(?:.*?)?"><a\s+target="_blank"\s+href="(.*?)">(?:.*?)<\/a><\/p>/', $html, $match)) {
			$playUri = isset($match[1]) ? $match[1] : '';
			$playHtml = ff_file_get_contents($domain.$playUri);
			if (preg_match('/<script\s+language="javascript">(?:.*?)var\s+pp_serverurl="(.*?)"\;var\s+pp_servername="(.*?)"(?:.*?)var\s+pp_play="(.*?)"(?:.*?)<\/script>/is', $playHtml, $match)) {
				$playFlag = $match[1];
				$playName = $match[2];
				$playUrl = $match[3];
				$play = urldecode($playUrl);
				$play = str_replace('+++', PHP_EOL, $play);
				$play = str_replace('++', '$', $play);
			} else {
				$play = '';
			}
		} else {
			$play = '';
		}


		//匹配下载地址
		if (preg_match_all('/\<ul\s+class="download-group\s+fn-clear\s+downurl"><script\s+type="text\/javascript">(.*?)<\/script>\<\/ul\>/is', $html, $match)) {
			$downContent = isset($match[1]) ? $match[1] : '';
			$downUrl = '';
			foreach ($downContent as $down) {
				$down = preg_replace('/var\s+GvodUrls\d\s+=\s+"/is', '', $down);
				$downUrl .= preg_replace('/";echoDown(?:.*?);/is', '', $down) . '$$$';
			}
			$downUrl = trim($downUrl, '$$$');
			$downUrl = str_replace('###', PHP_EOL, $downUrl);
		} else {
			$downUrl = '';
		}



		$playFlag = explode('$$$', $playFlag);
		$play = explode('$$$', $play);

		foreach ($playFlag as $k => $v) {
			if (!in_array($v, ['down', 'xigua', 'm3u8', 'youku_new'])) {
				unset($play[$k], $playFlag[$k]);
			}
		}

		if (strpos($playFlag, 'youku_new') !== false) {
			$playFlag = str_replace('youku_new', 'youku', $playFlag);
		}

		return [
			'vod_name' => $name,
			'vod_pic' => $img,
			'vod_actor' => $actor,
			'vod_director' => $director,
			'down' => $downUrl,
			'vod_url' => $play,
			'vod_play' => $playFlag,
			'playName' => $playName,
			'vod_area' => $area,
			'vod_language' => $language,
			'vod_year' => $year,
			'cateName' => $cateName,
			'cidName' => $cidName,
			'vod_content' => $content,
			'vod_title' => $title,
		];
	}

	public function getPinyin()
	{
		$name = isset($_GET['name']) ? $_GET['name'] : '';
		$ret = ['data'=>''];


		if (!empty($name)) {
			$ret['data'] = ff_pinyin($name);
		}

		echo json_encode($ret);die;
	}
}
?>