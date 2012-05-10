<?php

/**
 * clientCheck
 *
 * クライアント端末の判別をユーザーエージェントを基に行う
 *
 * @author kunikiya
 * @website http://kunikiya.jp/
 * @since PHP 5.3
 * @create 2012/5/10
 **/

class clientCheck
{
  private $clientCheck;

  public function __construct()
  {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    
    if(
      //mb_ereg('Mozilla', $userAgent) ||
      mb_ereg('DoCoMo', $userAgent) ||
      mb_ereg('KDDI', $userAgent) ||
      mb_ereg('SoftBank', $userAgent) ||
      mb_ereg('UP.Browser', $userAgent) ||
      mb_ereg('Vodafone', $userAgent) ||
      mb_ereg('J-PHONE', $userAgent)
    )
    {
      $this->clientCheck = 'mobile';
    }
    else if(
      mb_ereg('iPhone', $userAgent) ||
      mb_ereg('Android', $userAgent) ||
      mb_ereg('dream', $userAgent) ||
      mb_ereg('CUPCAKE', $userAgent) ||
      mb_ereg('blackberry9500', $userAgent) ||
      mb_ereg('blackberry9530', $userAgent) ||
      mb_ereg('blackberry9520', $userAgent) ||
      mb_ereg('blackberry9550', $userAgent) ||
      mb_ereg('blackberry9800', $userAgent) ||
      mb_ereg('webOS', $userAgent) ||
      mb_ereg('incognito', $userAgent) ||
      mb_ereg('webmate', $userAgent)
    )
    {
      $this->clientCheck = 'sp';
    }
    else if(
      mb_ereg('iPod', $userAgent)
    )
    {
      $this->clientCheck = 'tab';
    }
    else
    {
      $this->clientCheck = 'pc';
    }
    
    if(mb_ereg('DoCoMo', $userAgent))
    {
      $this->clientCarrier = 'docomo';
    }
    else if(mb_ereg('KDDI', $userAgent) || mb_ereg('UP.Browser', $userAgent))
    {
      $this->clientCarrier = 'kddi';
    }
    else if(
      mb_ereg('SoftBank', $userAgent) ||
      mb_ereg('Vodafone', $userAgent) ||
      mb_ereg('J-PHONE', $userAgent)
    )
    {
      $this->clientCarrier = 'softbank';
    }
  }
  
  public function isMobile()
  {
    if($this->clientCheck === 'mobile')
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
  public function isSp()
  {
    if($this->clientCheck === 'sp')
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
  public function isTab()
  {
    if($this->clientCheck === 'tab')
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
  public function isPc()
  {
    if($this->clientCheck === 'pc')
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
  public function isKddi()
  {
    if($this->clientCarrier === 'kddi')
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
  public function isDocomo()
  {
    if($this->clientCarrier === 'docomo')
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
  public function isSoftbank()
  {
    if($this->clientCarrier === 'softbank')
    {
      return true;
    }
    else
    {
      return false;
    }
  }
}