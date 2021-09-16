<?php

use Illuminate\Database\Seeder;
use App\Post; 
use Faker\Generator as FakerPost; 

class PostsTableSeeder extends Seeder

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
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 public function run(FakerPost $fakerPost)
    {
        //

            // $table->text('titlePost', 500); 
//             $table->longText('textPost'); 
            // $table->text('etiquette', 255)->after('textPost'); 
            // $table->text('comment')->after('etiquette'); 
            // $table->text('image')->after('comment'); 
            // $table->boolean('read')->after('image'); 
            


        for ($i=0;  $i< 50; $i++ ) {

                $postObject = new Post(); 
                $postObject->titlePost = $fakerPost->sentence(5); 
                $postObject->textPost = $fakerPost->paragraph(5); 
                $postObject->etiquette = $fakerPost->words(1, true); 
                $postObject->comment = $fakerPost->sentence(3); 
                $postObject->image = $fakerPost->imageUrl(300, 200, 'posts', true);
                $postObject->read = $fakerPost->boolean();
                // $finalImageUrl = $this->getRedirectImage ('https://randomwordgenerator.com/img/picture-generator'); 
                // echo $finalImageUrl . "\n";
                // $postObject->image = $finalImageUrl; 
                $postObject->save(); 
        }    
    }
}