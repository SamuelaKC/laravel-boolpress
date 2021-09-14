<?php

use Illuminate\Database\Seeder;
use App\Post; 
use Faker\Generator as FakerPost; 

class PostTableSeeders extends Seeder
{

// protected function getRedirectImage($url)
// {
//         $ch = curl_init($url);
//         curl_setopt($ch, CURLOPT_NOBODY, 1);
//         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // follow redirects
//         curl_setopt($ch, CURLOPT_AUTOREFERER, 1); // set referer on redirect
//         curl_exec($ch);
//         $target = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
//         curl_close($ch);

//         if ($target)
//             return $target;

//         return false;
// }
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
                // $finalImageUrl = $this->getRedirectImage ('https://randomwordgenerator.com/img/picture-generator'); 
                // echo $finalImageUrl . "\n";
                // $postObject->image = $finalImageUrl; 
                $postObject->image = $fakerPost->imageUrl(250, 250, 'imageObject', true); 
                $postObject->price = $fakerPost->randomFloat(2, 10, 10000);
                $postObject->read = $fakerPost->boolean();
                $postObject->save(); 
        }    

    }
}