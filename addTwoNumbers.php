# https://leetcode.com/problems/add-two-numbers/
<?php
class ListNode {
   public $val = 0;
   public $next = null;
   function __construct($val = 0, $next = null) {
       $this->val = $val;
       $this->next = $next;
   }
}

/**
 * @param ListNode $l1
 * @param ListNode $l2
 * @return ListNode
 */
function addTwoNumbers($l1, $l2) {
    $nums1 = '';
    $nums2 = '';
    $keepLooping = true;
    $x = 0;
    while($keepLooping){
        if($x != 0){
            if(isset($l1->val)){
                $nums1 .= '_'.$l1->val;
            }
            if(isset($l2->val)){
                $nums2 .= '_'.$l2->val;
            }
        }else{
            if(isset($l1->val)){
                $nums1 .= $l1->val;
            }
            if(isset($l2->val)){
                $nums2 .= $l2->val;
            }
        }

        if(empty($l1->next) && empty($l2->next)){ $keepLooping = false; }

        if(isset($l1->next) || empty($l1->next)){
            $l1 = $l1->next;
        }
        if(isset($l2->next) || empty($l2->next)){
            $l2 = $l2->next;
        }
        $x++;
    }

    $nums1 = explode('_', $nums1);
    $nums2 = explode('_', $nums2);
    $nums1 = array_reverse($nums1);
    $nums2 = array_reverse($nums2);
    $nums1 = implode($nums1, '');
    $nums2 = implode($nums2, '');

    $result = shell_exec('echo "'.$nums1.'+'.$nums2.'"|bc');
    preg_match_all('/[0-9]+/', $result, $preg);
    $result = '';
    foreach($preg[0] as $m){
        $result .= $m;
    }

    $result = str_split($result);
    $result = array_reverse($result);


    $subResult = new ListNode();
    $eval = '$subResult';                
    for($x = 0; $x < count($result); $x++){
        if($x != 0){
            $eval .= '->next';
            $ev = $eval;
            $ev .= '= new ListNode('.(int)$result[$x].');';
            eval($ev);
        }else{
            $subResult->val = (int)$result[$x];
            $subResult = $subResult;
        }
    }
    return $subResult;
}
