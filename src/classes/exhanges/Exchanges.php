<?php

namespace classes\exchanges;

use classes\database\Database;

abstract class Exchanges{

	protected $dbConnect;
	protected $exchangeName;
	protected $fromCurrency;
	protected $toCurrency;
	protected $url;

	public function __construct($exchangeNameIn,$fromCurrencyIn,$toCurrencyIn){
		$this->dbConnect = new Database();
		$this->exchangeName = $exchangeNameIn;
		$this->fromCurrency = $fromCurrencyIn;
		$this->toCurrency = $toCurrencyIn;
		
		$queryContent = "SELECT url_address FROM exchanges WHERE e_name='$this->exchangeName'";
		$response = $this->dbConnect->dbQuery($queryContent);
 		$result = $response->fetch();
 		$this->url = $result['url_address'];
	}

	abstract public function lastBidPrice();

	abstract public function lastAskPrice();
}