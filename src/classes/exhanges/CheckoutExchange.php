<?php

namespace classes\exchanges;

use classes\exchanges\{Bitbay,Binance};

class CheckoutExchange{

    protected $exchangeName;
    protected $fromCurrency;
    protected $toCurrency;

    public function __construct($exchangeNameIn,$fromCurrencyIn,$toCurrencyIn){
        $this->exchangeName = $exchangeNameIn;
        $this->fromCurrency = $fromCurrencyIn;
        $this->toCurrency = $toCurrencyIn;
    }

    public function exchangeSelection(){
        switch ($this->exchangeName){
            case 'bitbay':
                $exchange = new Bitbay($this->exchangeName,$this->fromCurrency,$this->toCurrency);
                $bidPrice = $exchange->lastBidPrice();
                $askPrice = $exchange->lastAskPrice();
                break;
            case 'binance':
                $exchange = new Binance($this->exchangeName,$this->fromCurrency,$this->toCurrency);
                $bidPrice = $exchange->lastBidPrice();
                $askPrice = $exchange->lastAskPrice();
                break;
            default:
                return false;
        }
        if($exchange){
            $singleApiRowArray = [
                "exchange" => $this->exchangeName,
                "pair" => $this->fromCurrency."/".$this->toCurrency,
                "ask" => floatval($askPrice),
                "bid" => floatval($bidPrice),
            ];
            return $singleApiRowArray;
        }
        else{
            return false;
        }
    }
}