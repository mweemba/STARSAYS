<?php

require_once('slim.php');

// Get posted data
$images = Slim::getImages();

// No image found under the supplied input name
if ($images == false) {

    // inject your own auto crop or fallback script here
    echo '<p>Slim was not used to upload these images.</p>';

}
else {

    // Could be multiple slim croppers
    foreach ($images as $image) {

        $files = array();

        // save output data if set
        if (isset($image['output']['data'])) {

            // Save the file
            $name = $image['output']['name'];

            // We'll use the output crop data
            $data = $image['output']['data'];

            // If you want to store the file in another directory pass the directory name as the third parameter.
            // $file = Slim::saveFile($data, $name, 'my-directory/');

            // If you want to prevent Slim from adding a unique id to the file name add false as the fourth parameter.
            // $file = Slim::saveFile($data, $name, 'tmp/', false);
            $output = Slim::saveFile($data, $name,'images/');

            array_push($files, $output);
        }

        // save input data if set
        if (isset ($image['input']['data'])) {

            // Save the file
            $name = $image['input']['name'];

            // We'll use the output crop data
            $data = $image['input']['data'];

            // If you want to store the file in another directory pass the directory name as the third parameter.
            // $file = Slim::saveFile($data, $name, 'my-directory/');

            // If you want to prevent Slim from adding a unique id to the file name add false as the fourth parameter.
            // $file = Slim::saveFile($data, $name, 'tmp/', false);
            $input = Slim::saveFile($data, $name,'images/');

            array_push($files, $input);
			
        }

        $filenames = join(', ', array_map(function($file){ return ellipsis($file['name'], 100); }, $files));
        $images = array_map(function($file) { return '<img src="' . $file['path'] . '" alt=""/>'; }, $files);
		
		 
	
        }
        

    }
}

function ellipsis($str, $len = 50) {
    return strlen($str) > $len ? substr($str, 0, $len) . '...' : $str;
}