//remove this array
//$dogs = [
//    ['name' => 'Sparky', 'age' => 5],
//    ['name' => 'Joe', 'age' => 11]
//];

//make a new Faker object. Let's use French names for dogs, so we'll also initialize 
//with the FR data:
$faker = Faker\Factory::create('fr_FR');

//if we want to create the SAME seed generated data every time we run, instead of 
//making file, just use the Faker->seed() call:
$faker->seed(1234);

//now, make our data array:
for ($i=0; $i < 10; $i++) {
	$dog = array('name' => $faker->firstName, 'age' => rand(1, 12));
	$dogs[] = $dog;
} 


//commandline again
php artisan db:seed