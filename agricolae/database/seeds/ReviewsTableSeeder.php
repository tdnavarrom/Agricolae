<?php 

use Illuminate\Database\Seeder;
use App\Review;

class ReviewsTableSeeder extends Seeder {

    //Run the database seeds.
    public function run() {

        factory(Review::class,520)->create();

    }

}

?>