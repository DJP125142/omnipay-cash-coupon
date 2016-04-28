<?php 
namespace Omnipay\CashCoupon\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\ResponseInterface;

use Omnipay\CashCoupon\Helper;

class RedpackRequest extends BaseAbstractResponse{

	protected $endpoint = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack';

	

}