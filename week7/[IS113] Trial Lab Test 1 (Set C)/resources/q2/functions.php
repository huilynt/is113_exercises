<?php
// functions
/**
 * @param int $month_num  The required month.  An integer between 1 to 12 inclusive.
 * @return string 3-characters name of the month.  
 * $month_num 1 is 'JAN', and so on.
 */
function getMonthName($month_num)
{
   $names = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

   // YOUR CODE GOES HERE
   // Make use of $names to get the name of the required month.
   return $names[$month_num - 1];
   /* 
      If you don't know how to do this function, 
      use the following line of code so that you can continue with the subsequent parts.
      Otherwise, you can comment it out. 
   */
   // return 'NAN';
}

/**
 * @param string $luck_str 
 *    String depicting the monthly luck.  
 * 
 *    This string has the following format:
 *       '<luck>[optional:x<number of months>], ..., <luck>'
 *    <luck> can be GOOD, NORMAL or BAD
 *    If followed by x<number of months>, this <luck> will persist for the the specified number of months.
 *    Otherwise, this <luck> is for one month.
 *    The string always end with <luck> which means means this is the luck until end of year.
 *    
 *    E.g. 'GOODx2,BAD,GOODx3,NORMAL' means 
 *       GOOD for 2 months (Jan, Feb), BAD for 1 month (Mar), GOOD for 3 months (Apr, May, Jun) and NORMAL till end of year (Jul to Dec).
 */
function luckStringToDict($luck_str)
{
   // YOUR CODE GOES HERE
   $luck_arr = explode(', ', $luck_str);
   $result = [];
   $num_months = 1;
   foreach ($luck_arr as $luck_part) {
      $part_arr = explode('x', $luck_part);

      if (count($part_arr) > 1) {
         $luck = $part_arr[0];
         $months = (int) $part_arr[1];
         for ($i = 0; $i < $months; $i++) {
            if (array_key_exists($luck, $result)) {
               $temp = $result[$luck];
               $temp[] = getMonthName($num_months);
               $result[$luck] = $temp;
            } else {
               $result[$luck] = [getMonthName($num_months)];
            }
            $num_months++;
         }
      } else {
         $luck = $part_arr[0];
         if (array_key_exists($luck, $result)) {
            $temp = $result[$luck];
            $temp[] = getMonthName($num_months);
            $result[$luck] = $temp;
         } else {
            $result[$luck] = [getMonthName($num_months)];
         }
      }
   }

   if ($num_months !== 12) {
      $luck = end($luck_arr);

      $num_months++;
      for ($i = $num_months; $i <= 12; $i++) {
         if (array_key_exists($luck, $result)) {
            $temp = $result[$luck];
            $temp[] = getMonthName($i);
            $result[$luck] = $temp;
         } else {
            $result[$luck] = [getMonthName($i)];
         }
      }
   }

   return $result;
   /* 
      If you don't know how to do this function, 
      use the following line of code so that you can continue with the subsequent parts.
      Otherwise, you can comment it out. 
   */
   // return ['GODD' => ['JAN'], 'NORMAL' => ['FEB'], 'BAD' => ['MAR'],];
}
