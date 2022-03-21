<?php
/* php implementation of QuickSort Algrithom
This Function handles sorting part of quick sort start and 
end points to first and last element of an array respectively */

function swapArray(array &$arr, $i, $j) 
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

function partition(array &$arr, $start, $end) 
{
    //pivot (Element to be place at right position)
    $pivot = $arr[$end];

    // Index of smaller element and indicates the 
    // right position of pivot found so far
    $i = ($start - 1);

    for ($j = $start; $j <= $end - 1; $j++) {
        // If current element is smaller than the pivot
        if($arr[$j] < $pivot) 
        {
            $i++;
            swapArray($arr, $i, $j);
        }
    }
    swapArray($arr, $i + 1, $end);
    return ($i + 1);

}
function quickSort(array &$arr, $start, $end)
{
    if($start < $end) {
        /* pi is partitioning index, arr[pi] is now
           at right place */
        $pi = partition($arr, $start, $end);
        quickSort($arr, $start, $pi - 1); // Before pi
        quickSort($arr, $pi + 1, $end); // After pi
    }
}

$nums = array(5,3,8,6,2,7);
echo implode(",",$nums)." @unsorted<br>";
quickSort($nums,0,count($nums)-1);
echo implode(",",$nums)." @sorted<br>";
?>