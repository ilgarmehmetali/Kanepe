<?php

namespace App;

use View;
class Paginator
{
	private $paginationStart = -1;
	private $paginationEnd = -1;
	private $currentPage = -1;
	private $baseLink = -1;
	private $simple = false;

	public function __construct($baseLink, $count, $itemPerPage, $currentPage, $simple = false){
		$this->baseLink = $baseLink;
		$this->currentPage = $currentPage;
		if($count <= 0){
			return;
		}

		$lastPage = ceil($count/$itemPerPage);

		if($simple === true){
			$this->simple = true;
			$this->paginationStart = $currentPage - 1;
			$this->paginationEnd = $currentPage + 1;
			if( $this->paginationStart < 1 ){
				$this->paginationStart = -1;
			}
			if( $this->paginationEnd > $lastPage ){
				$this->paginationEnd = -1;
			}
			return;
		}

		$this->paginationStart = $currentPage - 5;
		if( $this->paginationStart < 1 ){
			$this->paginationStart = 1;
		}
		$this->paginationEnd = $currentPage + 10 - ( $currentPage - $this->paginationStart );
		if( $this->paginationEnd > $lastPage ){
			$this->paginationEnd = $lastPage;
			$this->paginationStart -= abs(5 - ( $lastPage - $currentPage));
			if( $this->paginationStart < 1 ){
				$this->paginationStart = 1;
			}
		}
	}

	public function render(){
		if($this->simple){
			$view = View::make('common.simplePagination', [
				'baseLink' => $this->baseLink,
				'paginationStart' => $this->paginationStart,
				'paginationEnd' => $this->paginationEnd
			]);
			return $view->render();
		} else {
			$view = View::make('common.pagination', [
				'baseLink' => $this->baseLink,
				'paginationStart' => $this->paginationStart,
				'paginationEnd' => $this->paginationEnd,
				'paginationCurrent' => $this->currentPage
			]);
			return $view->render();
		}
	}
}
