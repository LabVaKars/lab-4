<?php

    class MessageEnum {
        private static $messages; 

        public function __construct(){
            $this::$messages = array(
                // specific
                "ERR_EMAIL_FORMAT" => "Nepieējams e-pasta formāts",
                "ERR_EMAIL_EXIST" => "Tāds e-pasts ir jau reģistrēts",
                "ERR_NICKNAME_EXIST" => "Lietotājs ar tadu lietotajvārdu jau eksistē",
                "ERR_PASSW_MATCH" => "Paroles nesakrīt",
                // common
                "ERR_NUM_LET_ONLY" => "Tikai ciari un burti var būt izmantoti",
                "ERR_TEXT_NOT_EMPTY" => "Šis lauks nevār būt tukšs",
                "ERR_TEXT_LENGTH_GT" => "Lauka minimālais garums jābut vairāk par %u simboliem",
                "ERR_TEXT_LENGTH_GTE" => "Lauka minimālais garums jābut %u simboli vai vairāk",
                "ERR_TEXT_LENGTH_LT" => "Lauka maksimalais garums jābut mazāk par %u simboliem",
                "ERR_TEXT_LENGTH_LTE" => "Lauka maksimalais garums jābut %u simboli vai mazāk",
                "ERR_NUM_LT" => "Šim laukam jābut mazakām par %u",
                "ERR_NUM_GT" => "Šim laukam jābut lielakām par %u",
                "ERR_NUM_LTE" => "Šim laukam jābut mazakām vai vienādam ar %u",
                "ERR_NUM_GTE" => "Šim laukam jābut lielākam vai vienādam ar %u",
                "ERR_NO_FILE" => "Fails nebija izvelēts",
                "ERR_DATE_GT" => "Šim datumam jābut lielakām par %s",
                "ERR_DATE_GTE" => "Šim datumam jābut lielakām vai vienadam ar %s",
                "ERR_DATE_LT" => "Šim datumam jābut mazakām par %s",
                "ERR_DATE_LTE" => "Šim datumam jābut mazakām vai vienadam ar %s",
                "ERR_TIME_GT" => "Šim laikam jābut lielakām par %s",
                "ERR_TIME_GTE" => "Šim laikam jābut lielakām vai vienadam ar %s",
                "ERR_TIME_LT" => "Šim laikam jābut mazakām par %s",
                "ERR_TIME_LTE" => "Šim laikam jābut mazakām vai vienadam ar %s",
            );
        }

        function getMessageByCode($code){
            return ($this::$messages[$code] != null)
                ? $this::$messages[$code]
                : "";
        }
    }

?>