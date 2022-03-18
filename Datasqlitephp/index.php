<?php
#functions file
include_once ('functions.php');

connect_to_db();
create_tables();
add_option('name','Kamran');
add_option('family','Boriae');
echo '<pre>';
print_r(get_option('name', '1'));
echo '</pre>';
update_option('family', 'kazemie');
echo '<pre>';
print_r(get_option('family', '2'));
echo '</pre>';
delete_option('name');
echo 'DELETED SUCCESSFULLY';