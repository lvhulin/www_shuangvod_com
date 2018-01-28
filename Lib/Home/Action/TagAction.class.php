<?php
namespace Home\Action;
use Common\Action\HomeAction;
class TagAction extends HomeAction{
    public function vod(){
		$this->tagall('vod');
		$this->display('pp_vodtag');
    }
    public function news(){
		$this->tagall('news');
		$this->display('pp_newstag');
    }
	public function tagall($sidname = 'vod'){
		//通过地址栏参数支持筛选条件,$JumpUrl传递分页及跳转参数
		$Url = ff_param_url();
		$JumpUrl = ff_param_jump($Url);
		$JumpUrl['p'] = '{!page!}';
		C('jumpurl',UU('Home-tag/'.$sidname,$JumpUrl,true,false));	
		C('currentpage',$Url['page']);
		//变量赋值
		$tag_list = $this->Lable_Tags($Url);
		$this->assign($tag_list);	
	}
	public function actor()
	{
		$Url = ff_param_url();
		if (empty($Url['actor'])) {
			header('HTTP/1.1 404 Not Found');
			header("status: 404 Not Found");
			exit('404');
		}
		$page = $Url['page'];
		$types = trim($Url['wd']);
		C('currentpage', $page);
		switch ($types) {
			case 'dianying':
				$type = '1';
				$listName = '电影';
				break;
			case 'dianshiju':
				$type = '2';
				$listName = '电视剧';
				break;
			case 'dongman':
				$type = '3';
				$listName = '动漫';
				break;
			case 'zongyi':
				$type = '4';
				$listName = '综艺';
				break;
			default:
				$type = '1';
				$listName = '电影';
				break;
		}
		C('jumpurl', '/actor/'.$types.'/'.$Url['actor'].'/{!page!}');
		$where['actors_pinyin'] = array('eq',$Url['actor']);
		$data = $rs = M('Actors')->where($where)->limit(10)->page(($page-1))->select();
		if (!empty($data)) {
			$actorName = $data[0]['actors_name'];
		} else {
			$actorName = '404';
		}
		$this->assign(['actorName'=>$actorName, 'listid'=>$type, 'listName'=>$listName,'page'=>$page]);

		$this->display('pp_actor');
	}

	public function vodtype()
	{
		$Url = ff_param_url();
		if (empty($Url['wd']) || empty($Url['area'])) {
			header('HTTP/1.1 404 Not Found');
			header("status: 404 Not Found");
			exit('404');
		}
		$page = $Url['page'];
		$types = trim($Url['wd']);
		$mcid = trim($Url['mcid']);
		$list = F('_ppvod/list');
		$lists = list_search($list, ['list_dir'=>$types]);
		$listid = $lists[0]['list_id'];
		$listpid = $lists[0]['list_pid'];
		if ($listid==3 || $listid==4) {
			$listpid = $listid;
		}
		$listname = $lists[0]['list_name'];
		$mcat = F('_ppvod/mcat');
		$mcatArr = list_search($mcat, ['list_id'=>$listpid]);
		$mcats = list_search($mcatArr[0]['son'], ['m_py'=>$Url['area']]);
		$mcatid = $mcats[0]['m_cid'];
		$mcatname = $mcats[0]['m_name'];

		C('currentpage', $page);
		C('jumpurl', '/VodType/'.$types.'/'.$Url['area'].'/{!page!}');

		$this->assign(['listid'=>$listid, 'listName'=>$listname,'page'=>$page, 'mcid'=>$mcatid, 'mname'=>$mcatname]);

		$this->display('pp_mcat');
	}
}
?>