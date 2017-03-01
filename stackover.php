<?php
$people = array(
    array('name' => 'Johnny', 'year' => 1989, 'job' => 'prof'),
    array('name' => 'Timmy' , 'year' => 1989, 'job' => 'std'),
    array('name' => 'Bobby' , 'year' => 1988),
    array('name' => 'Sam'   , 'year' => 1983),
    array('name' => 'Tammy' , 'year' => 1985),
    array('name' => 'Danny' , 'year' => 1983),
    array('name' => 'Joe'   , 'year' => 1989, 'job' => 'prof'),
);

function filter($item) {
    return substr($item['name'], -1) === 'y' && $item['year'] == 1989;
}

$filteredPeople = array_filter($people, 'filter');

print_r($filteredPeople);
?>