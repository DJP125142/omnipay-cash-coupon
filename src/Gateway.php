<?php

namespace Omnipay\CashCoupon;

use Omnipay\Common\AbstractGateway;


class Gateway extends AbstractGateway
{
    public function getName(){
        return 'CashCoupon';
    }
    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->getParameter('app_id');
    }


    /**
     * @param mixed $appId
     */
    public function setAppId($appId)
    {
        $this->setParameter('app_id', $appId);
    }


    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->getParameter('api_key');
    }


    /**
     * @param mixed $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->setParameter('api_key', $apiKey);
    }


    /**
     * @return mixed
     */
    public function getMchId()
    {
        return $this->getParameter('mch_id');
    }


    /**
     * @param mixed $mchId
     */
    public function setMchId($mchId)
    {
        $this->setParameter('mch_id', $mchId);
    }

    //商户订单号 
    public function setMchBillno($billno){
        $this->setParameter('mch_billno',$billno);
    }

    public function getMchBillno(){
        return $this->getParameter('mch_billno');
    }

    //商户名称
    public function setSendName($send_name){
        $this->setParameter('send_name',$send_name);
    }

    public function getSendName(){
        return $this->getParameter('send_name');
    }

    //用户openid
    public function setReOpenid($openid){
        $this->setParameter('re_openid',$openid);
    }

    public function getReOpenid(){
        return $this->getParameter('re_openid');
    }

    /**
     * [setAmount 设置总金额,单位分]
     * @param [type] $number [description]
     */
    public function setAmount($number){
        $this->setParameter('total_amount',$number);
    }

    public function getAmount(){
        return $this->getParameter('total_amount');
    }

    public function setNum($number=1){
        $this->setParameter('total_num',$number);
    }

    public function getNum(){
        return $this->getParameter('total_num');
    }

    public function setWishing($wishing){
        $this->setParameter('wishing',$wishing);
    }

    public function getWishing(){
        return $this->getParameter('wishing');
    }

    public function setActName($name){
        $this->setParameter('act_name',$name);
    }

    public function getActName(){
        return $this->getParameter('act_name');
    }

    public function setRemark($remark){
        $this->setParameter('remark',$remark);
    }

    public function getRemark(){
        return $this->getParameter('remark');
    }


    //裂变红包
    public function setAmtType($type){
        $this->setParameter('amt_type',$type);
    }

    public function getAmtType(){
        return $this->getParameter('amt_type');
    }







    public function getData()
    {


        $data = array (
            'wxappid'      => $this->getAppId(),
            'mch_id'       => $this->getMchId(),
            'mch_billno'   => $this->getMchBillno(),
            'send_name'    => $this->getSendName(),
            're_openid'    => $this->getReOpenid(),
            'total_amount' => $this->getAmount(),
            'total_num'    => $this->getNum(),
            'wishing'      => $this->getWishing(),
            'client_ip'    => $_SERVER['HTTP_CLIENT_IP'] ? : ($_SERVER['REMOTE_ADDR'] ? : $_SERVER['HTTP_X_FORWARDED_FOR'] ? : '127.0.0.1'),
            'act_name'     => $this->getActName(),
            'remark'       => $this->getRemark(),
            'nonce_str'    => md5(uniqid()),
        );

        $data = array_filter($data);

        $data['sign'] = Helper::sign($data, $this->getApiKey());

        return $data;
    }








    /**
     * @return mixed
     */
    public function getCertPath()
    {
        return $this->getParameter('cert_path');
    }


    /**
     * @param mixed $certPath
     */
    public function setCertPath($certPath)
    {
        $this->setParameter('cert_path', $certPath);
    }


    /**
     * @return mixed
     */
    public function getKeyPath()
    {
        return $this->getParameter('key_path');
    }


    /**
     * @param mixed $keyPath
     */
    public function setKeyPath($keyPath)
    {
        $this->setParameter('key_path', $keyPath);
    }


}
