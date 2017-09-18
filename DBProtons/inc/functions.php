<?php

/**
 * @package DBProtons
 * Descreption :
 *              This File Content On Function Used to lose in library DBProtons
 * @version 1.0.0
 * @author Ayman Alaiwah
 */


/**
 * Function strpos_array used for search in string useing array
 * in work string
 */
function strpos_array($haystack, $needles, $offset = 0) {
   if (is_array($needles)) {
       foreach ($needles as $needle) {
           $pos = strpos_array($haystack, $needle);
           if ($pos !== false) {
               $GLOBALS['needle'] = $needle;
               return $pos;
           }
       }
       return false;
   } else {
       return strpos($haystack, $needles, $offset);
   }
}
