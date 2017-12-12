<?php
/**
 * Created by PhpStorm.
 * User: ilakronberg
 * Date: 12.12.2017
 * Time: 22:21
 */

/* test_2 */
function conversion($list)
{
    return (is_array($list[key($list)])) ?
        convertToFlatView($list) : convertToTreeView($list);
}

function convertToTreeView($list)
{
    $result = array();
    foreach ($list as $key => $value) {
        $keys = explode('.', $key);
        $branch = createBranch($keys, $value);
        $result = array_merge_recursive($result, $branch);
    }
    return $result;
}

function createBranch($list, $value)
{
    if ($list) {
        $key = array_shift($list);
        return array(
            $key => createBranch($list, $value)
        );
    }
    return $value;
}
$input = [
    'parent.child.field' => 1,
    'parent.child.field2' => 2,
    'parent2.child.name' => 'test',
    'parent2.child2.name' => 'test',
    'parent2.child2.position' => 10,
    'parent3.child3.position' => 10,
];
$result = conversion($input);
var_dump($result);
$reverse_result = conversion($result);
var_dump($reverse_result);
/* test_2 */