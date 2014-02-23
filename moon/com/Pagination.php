<?php

namespace moon\com;

class Pagination {
	private $curPage, $numPerpage, $totalRecord, $pageUrl;
	private $totalPage;
	
	/**
	 * @param int $curPage 当前页
	 * @param int $numPerPage 每页显示记录数
	 * @param int $totalRecord 总记录数
	 * @param string 分页基本url
	 *
	 * @return boolean 返回true
	 */
	public function __construct($curPage, $numPerPage, $totalRecord, $pageUrl) {
		$this->curPage = $curPage;
		$this->numPerpage = $numPerPage;
		$this->totalRecord = $totalRecord;
		$this->pageUrl = $pageUrl;
		
		$this->totalPage = ceil($this->totalRecord/$this->numPerpage);
		return TRUE;
	}
	
	/**
	 * 生成分页链接
	 */
	public function as_html() {
		$html = array();
		array_push($html, "<ul>");
		
		$startPage = $this->curPage - 5;
		$startPage = $startPage > 0?$startPage:0;
		
		$endPage = $this->curPage + 5;
		$endPage = $endPage > $this->totalPage?$this->totalPage:$endPage;
		
		for ($i = $startPage; $i <= $endPage; $i ++) {
			if ($i == $this->curPage) {
				array_push($html, "<a href='{$this->pageUrl}{$i}' class='active'>{$i}</a>");
			} else {
				array_push($html, "<a href='{$this->pageUrl}{$i}'>{$i}</a>");
			}
		}
		
		array_push($html, "</ul>");
		
		return implode('', $html);
	}
}

?>