<?php

namespace classes\exchanges;

class Bitbay extends Exchanges{

	private $dataArray;

	public function __construct($exchangeNameIn,$fromCurrencyIn,$toCurrencyIn){
		parent::__construct($exchangeNameIn,$fromCurrencyIn,$toCurrencyIn);
		$this->url .= '/'.$this->toCurrency.$this->fromCurrency.'/orderbook.json';
		$dataJson = file_get_contents($this->url);
		$this->dataArray = json_decode($dataJson, true);
	}

	public function lastBidPrice(){
		if(isset($this->dataArray['bids'][0][0])){
			$lastBidPrise = $this->dataArray['bids'][0][0];
		}
		else{
			$lastBidPrise = null;
		}
		return $lastBidPrise;
	}

	public function lastAskPrice(){
		if(isset($this->dataArray['asks'][0][0])){
			$lastAskPrise = $this->dataArray['asks'][0][0];
		}
		else{
			$lastBidPrise = null;
		}
		return $lastAskPrise;
	}
}