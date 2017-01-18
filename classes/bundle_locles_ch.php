<?php

namespace adapt\locales\ch{
    
    /* Prevent Direct Access */
    defined('ADAPT_STARTED') or die;
    
    class bundle_locales_ch extends \adapt\bundle{
        
        public function __construct($data){
            parent::__construct('locales_ch', $data);
        }
        
        public function boot(){
            if (parent::boot()){
                
                /* Add the validators */
                $this->sanitize->add_validator('ch_phone', "^(\+41|0)\d{9,9}$");
                $this->sanitize->add_validator('ch_phone_mobile', "^(\+41|0)7[5-9]\d{7,7}$");
                $this->sanitize->add_validator('ch_postcode', "^\d{4,4}$");
                
                /* Add formatters */
                $this->sanitize->add_format(
                    'ch_phone', 
                    function($value){
                        return substr($value, 0, 3) . ' ' . substr($value, 3, 3) . ' ' . substr($value, 6, 2) . ' ' . substr($value, 8, 2);
                    }.
                    "function(value){
                        
                    }"
                );
                
                $this->sanitize->add_format('uk_phone', function($value){
                    if (preg_match("/011\d{8,8}/", $value)){
                        //(011x) xxx xxxx
                        return substr($value, 0, 4) . ' ' . substr($value, 4, 3) . ' ' . substr($value, 7);
                    }elseif (preg_match("/01\d1\d{7,7}/", $value)){
                        //(01x1) xxx xxxx
                        return substr($value, 0, 4) . ' ' . substr($value, 4, 3) . ' ' . substr($value, 7);
                    }elseif (preg_match("/016977\d{4,4}/", $value)){
                        //(016977) xxxx
                        return substr($value, 0, 6) . ' ' . substr($value, 6);
                    }elseif (preg_match("/01\d{8,9}/", $value)){
                        //(01xxx) xxx xxx(x)
                        return substr($value, 0, 5) . ' ' . substr($value, 5, 3) . ' ' . substr($value, 8);
                    }elseif (preg_match("/02\d{9,9}/", $value)){
                        //(02x) xxxx xxxx
                        return substr($value, 0, 3) . ' ' . substr($value, 3, 4) . ' ' . substr($value, 7);
                    }elseif (preg_match("/03\d{9,9}/", $value)){
                        //(03xx) xxx xxxx
                        return substr($value, 0, 4) . ' ' . substr($value, 4, 3) . ' ' . substr($value, 7);
                    }elseif (preg_match("/05[1-9]\d{8,8}/", $value)){
                        //(05x) xxxx xxxx
                        return substr($value, 0, 3) . ' ' . substr($value, 3, 4) . ' ' . substr($value, 7);
                    }elseif (preg_match("/070\d{8,8}/", $value)){
                        //(070) xxxx xxxx
                        return substr($value, 0, 3) . ' ' . substr($value, 3, 4) . ' ' . substr($value, 7);
                    }elseif (preg_match("/07624\d{6,6}/", $value)){
                        //(07624) xxxxxx
                        return substr($value, 0, 5) . ' ' . substr($value, 5);
                    }elseif (preg_match("/076\d{8,8}/", $value)){
                        //(076) xxxx xxxx
                        return substr($value, 0, 3) . ' ' . substr($value, 3, 4) . ' ' . substr($value, 7);
                    }elseif (preg_match("/07\d{9,9}/", $value)){
                        //(07xxx) xxx xxx
                        return substr($value, 0, 5) . ' ' . substr($value, 5, 3) . ' ' . substr($value, 8);
                    }elseif (preg_match("/0(5|8)\d{8,9}/", $value)){
                        //(0[58]xx) xxx xxxx
                        return substr($value, 0, 4) . ' ' . substr($value, 4, 3) . ' ' . substr($value, 7);
                    }elseif (preg_match("/09\d{9,9}/", $value)){
                        //(09xx) xxx xxxx
                        return substr($value, 0, 4) . ' ' . substr($value, 4, 3) . ' ' . substr($value, 7);
                    }
                    
                    return $value;
                    
                }, "function(value){
                    if (value.match(new RegExp('^011[0-9]{8,8}\$'))){
                        return value.substr(0,4) + ' ' + value.substr(4,3) + ' ' + value.substr(7);
                    }
                    if (value.match(new RegExp('^01[0-9]1[0-9]{7,7}\$'))){
                        return value.substr(0,4) + ' ' + value.substr(4,3) + ' ' + value.substr(7);
                    }
                    if (value.match(new RegExp('^016977[0-9]{4,4}\$'))){
                        return value.substr(0,6) + ' ' + value.substr(4,6);
                    }
                    if (value.match(new RegExp('^01[0-9]{8,9}\$'))){
                        return value.substr(0,5) + ' ' + value.substr(5,3) + ' ' + value.substr(8);
                    }
                    if (value.match(new RegExp('^02[0-9]{9,9}\$'))){
                        return value.substr(0,3) + ' ' + value.substr(3,4) + ' ' + value.substr(7);
                    }
                    if (value.match(new RegExp('^03[0-9]{9,9}\$'))){
                        return value.substr(0,4) + ' ' + value.substr(4,3) + ' ' + value.substr(7);
                    }
                    if (value.match(new RegExp('^05[1-9][0-9]{8,8}\$'))){
                        return value.substr(0,3) + ' ' + value.substr(3,4) + ' ' + value.substr(7);
                    }
                    if (value.match(new RegExp('^070[0-9]{8,8}\$'))){
                        return value.substr(0,3) + ' ' + value.substr(3,4) + ' ' + value.substr(7);
                    }
                    if (value.match(new RegExp('^07624[0-9]{6,6}\$'))){
                        return value.substr(0,5) + ' ' + value.substr(5);
                    }
                    if (value.match(new RegExp('^076[0-9]{8,8}\$'))){
                        return value.substr(0,3) + ' ' + value.substr(3,4) + ' ' + value.substr(7);
                    }
                    if (value.match(new RegExp('^07[0-9]{9,9}\$'))){
                        return value.substr(0,5) + ' ' + value.substr(5,3) + ' ' + value.substr(8);
                    }
                    if (value.match(new RegExp('^0(5|8)[0-9]{8,9}\$'))){
                        return value.substr(0,4) + ' ' + value.substr(4,3) + ' ' + value.substr(7);
                    }
                    if (value.match(new RegExp('^09[0-9]{9,9}\$'))){
                        return value.substr(0,4) + ' ' + value.substr(4,3) + ' ' + value.substr(7);
                    }
                    
                    return value;
                }");
                
                $this->sanitize->add_format('uk_postcode',
                    function($value){
                        return strtoupper(substr($value, 0, strlen($value) - 3) . " " . substr($value, strlen($value) - 3));
                    }, "function(value){
                        value = value.toUpperCase();
                        return value.substr(0, value.length - 3) + ' ' + value.substr(value.length - 1);
                    }"
                );
                
                $this->sanitize->add_format('uk_date',
                    function($value){
                        return \adapt\date::convert_date('Y-m-d', 'd/m/Y', $value);
                    },
                    "function(value){
                        return adapt.date.convert_date('Y-m-d', 'd/m/Y', value);
                    }"
                );
                
                $this->sanitize->add_format('uk_time',
                    function($value){
                        return \adapt\date::convert_date('H:i:s', 'H:i', $value);
                    },
                    "function(value){
                        return adapt.date.convert_date('H:i:s', 'H:i', value);
                    }"
                );
                
                $this->sanitize->add_format('uk_datetime',
                    function($value){
                        return \adapt\date::convert_date('Y-m-d H:i:s', 'd/m/Y H:i', $value);
                    },
                    "function(value){
                        return adapt.date.convert_date('Y-m-d H:i:s', 'd/m/Y H:i', value);
                    }"
                );
                
                
                /* Add unformatters */
                $this->sanitize->add_unformat('uk_postcode',
                    function($value){
                        return strtoupper(preg_replace("/[^A-Za-z0-9]/", "", $value));
                    }, "function(value){
                        value = value.replace(/[^A-Za-z0-9]/, '');
                        return value.toUpperCase();
                    }"
                );
                
                $this->sanitize->add_unformat('uk_date',
                    function($value){
                        $value = preg_replace("/[^0-9]/", '', $value);
                        return \adapt\date::convert_date('dmY', 'Y-m-d', $value);
                    },
                    "function(value){
                        value = value.replace(/[^0-9]/g, '');
                        return adapt.date.convert_date('dmY', 'Y-m-d', value);
                    }"
                );
                
                $this->sanitize->add_unformat('uk_time',
                    function($value){
                        $value = preg_replace("/[^0-9]/", '', $value);
                        return \adapt\date::convert_date('Hi', 'H:i:s', $value);
                    },
                    "function(value){
                        value = value.replace(/[^0-9]/g, '');
                        return adapt.date.convert_date('Hi', 'H:i:s', value);
                    }"
                );
                
                $this->sanitize->add_unformat('uk_datetime',
                    function($value){
                        $value = preg_replace("/[^0-9]/", '', $value);
                        return \adapt\date::convert_date('dmYHi', 'Y-m-d H:i:s', $value);
                    },
                    "function(value){
                        value = value.replace(/[^0-9]/g, '');
                        return adapt.date.convert_date('dmYHi', 'Y-m-d H:i:s', value);
                    }"
                );

                
                return true;
            }
            
            return false;
        }
        
    }
    
    
}

?>