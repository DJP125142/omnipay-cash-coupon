<?php 
namespace Omnipay\CashCoupon\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\ResponseInterface;

use Omnipay\CashCoupon\Helper;

class RedpackRequest extends BaseAbstractResponse{

	protected $endpoint = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack';

	
	public function getData()
	{

	    $this->validate('app_id', 'mch_id', 'mch_billno','re_openid');

	    $data = array (
			'wxappid'      => $this->getAppId(),
			'mch_id'       => $this->getMchId(),
			'mch_billno'   => $this->getMchBillno(),
			'send_name'    => $this->getSendName(),
			're_openid'    => $this->getReOpenid(),
			'total_amount' => $this->getAmount(),
			'total_num'    => $this->getNum(),
			'wishing'      => $this->getWishing(),
			'client_ip'    => $_SERVER['HTTP_CLIENT_IP'] ? : ($_SERVER['REMOTE_ADDR'] ? : $_SERVER['HTTP_X_FORWARDED_FOR']),
			'act_name'     => $this->getActName(),
			'remark'       => $this->getRemark(),
			'nonce_str'    => md5(uniqid()),
	    );

	    $data = array_filter($data);

	    $data['sign'] = Helper::sign($data, $this->getApiKey());

	    return $data;
	}

}