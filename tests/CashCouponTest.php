<?php 
// namespace Omnipay\CashCoupon;

use Omnipay\Omnipay;
use Omnipay\Tests\GatewayTestCase;
use Omnipay\CashCoupon\Message\RedpackRequest;
use Omnipay\CashCoupon\Helper;
use Omnipay\CashCoupon\Message\RedpackResponse;



class CashCouponTest extends GatewayTestCase{
	protected $gateway;

	protected $options;

	public function setUp(){
		parent::setUp();
		$this->gateway = Omnipay::create('CashCoupon');
		$this->gateway->setAppId('123456789');
		$this->gateway->setApiKey('123456789');
		$this->gateway->setMchId('123456789');
		$this->gateway->setMchBillno('123456789101111213');
		$this->gateway->setSendName('多谷数据');
		$this->gateway->setReOpenid('asdqwdqdwqwdqdqwdqwd');
		$this->gateway->setAmount(100);
		$this->gateway->setNum(1);
		$this->gateway->setWishing('天天开心');
		$this->gateway->setActName('天天跑步');
		$this->gateway->setRemark('获得第N名');


		print_r($this->gateway->getData());
	}
	

}


$c  = new CashCouponTest();

$c->setUp();

