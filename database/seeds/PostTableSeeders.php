<?php

use Illuminate\Database\Seeder;
use App\Post; 
use Faker\Generator as FakerPost; 

class PostTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FakerPost $fakerPost)
    {
        //

            // $table->string('idUsers', 255); 
            // $table->text('avatarUsers'); 
            // $table->text('titlePost', 500); 
            // $table->text('textPost'); 
            // $table->text('image')->after('textPost'); 
            // $table->boolean('read')->after('image'); 
        
        for ($i=0;  $i< 50; $i++ ) {

                $postObject = new Post(); 
                $postObject->idUsers = $fakerPost->numberBetween(1, 100);
                $postObject->avatarUsers = $fakerPost->imageUrl(100, 100, 'avatar', true);
                $postObject->titlePost = $fakerPost->sentence(5); 
                $postObject->textPost = $fakerPost->paragraph(5); 
                $postObject->image = $fakerPost->imageUrl(250, 250, 'imageObject', true); 
                $postObject->read = $fakerPost->boolean();
                $postObject->save(); 
        }    

    }
}