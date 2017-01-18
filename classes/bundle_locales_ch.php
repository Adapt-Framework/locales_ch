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
                    },
                    "function(value){
                        return value.substr(0, 3) + ' ' + value.substr(3, 3) + ' ' + value.substr(6, 2) + ' ' + value.substr(8, 2);
                    }"
                );
                
                $this->sanitize->add_format('ch_date',
                    function($value){
                        return \adapt\date::convert_date('Y-m-d', 'd.m.Y', $value);
                    },
                    "function(value){
                        return adapt.date.convert_date('Y-m-d', 'd.m.Y', value);
                    }"
                );
                
                $this->sanitize->add_format('ch_time',
                    function($value){
                        return \adapt\date::convert_date('H:i:s', 'H:i', $value);
                    },
                    "function(value){
                        return adapt.date.convert_date('H:i:s', 'H:i', value);
                    }"
                );
                
                $this->sanitize->add_format('ch_datetime',
                    function($value){
                        return \adapt\date::convert_date('Y-m-d H:i:s', 'd.m.Y H:i', $value);
                    },
                    "function(value){
                        return adapt.date.convert_date('Y-m-d H:i:s', 'd.m.Y H:i', value);
                    }"
                );
                
                
                /* Add unformatters */
                $this->sanitize->add_unformat('ch_date',
                    function($value){
                        $value = preg_replace("/[^0-9]/", '', $value);
                        return \adapt\date::convert_date('dmY', 'Y-m-d', $value);
                    },
                    "function(value){
                        value = value.replace(/[^0-9]/g, '');
                        return adapt.date.convert_date('dmY', 'Y-m-d', value);
                    }"
                );
                
                $this->sanitize->add_unformat('ch_time',
                    function($value){
                        $value = preg_replace("/[^0-9]/", '', $value);
                        return \adapt\date::convert_date('Hi', 'H:i:s', $value);
                    },
                    "function(value){
                        value = value.replace(/[^0-9]/g, '');
                        return adapt.date.convert_date('Hi', 'H:i:s', value);
                    }"
                );
                
                $this->sanitize->add_unformat('ch_datetime',
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