<?php

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i < 4; $i++)
		{
			User::create(
                array(
                    'id_rol_fk' =>$faker->numberBetween($min = 1, $max = 4),
                    'name' => $faker->firstName,
                    'lastname' => $faker->lastName,
                    'nickname'=>$faker->firstName.".".$faker->randomElement($array = array ('administrador','supervisor','contador', 'diseñador')),
                    'phone' => $faker->phoneNumber,
                    'email'=> $faker->email,
                    'job'=> $faker->randomElement($array = array ('administrador','supervisor','contador', 'diseñador')),
                    'password'=> Hash::make("tequila123")
                    )
            );
		}
	}

}