<?php
require('config.php');
require('db_singleton_oop.php');
require('family_class.php');

$bob = $config['db'];
$dsn = $bob['dsn'];
$username = $bob['username'];
$password = $bob['password'];
$options = $bob['options'];

$families = Family_db::get_families($dsn, $username, $password, $options);

foreach($families as $family) :
	
	echo $family->get_family_id(); ?>
	
</br>

<?php	
	echo $family->get_science_name();
?>

</br>

<?php
	echo $family->get_common_name();
?>
</br>
	
<?php
endforeach;

$genera = Genera_db::get_genera($dsn, $username, $password, $options);

foreach($genera as $genus) :
	
	echo $genus->get_genus_id() . '</br>';
	echo $genus->get_science_name() . '</br>';
	echo $genus->get_common_name() . '</br>';

endforeach;

?>