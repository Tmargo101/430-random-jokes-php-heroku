<?php


	// Jokes array
	$jokes = [
		["q"=>"What do you call a very small valentine?","a"=>"A valen-tiny!"],
		["q"=>"What did the dog say when he rubbed his tail on the sandpaper?","a"=>"Ruff, Ruff!"],
		["q"=>"Why don't sharks like to eat clowns?","a"=>"Because they taste funny!"],
		["q"=>"What did the fish say when be bumped his head?","a"=>"Dam!"],
		["q"=>"How many programmers does it take to change a light bulb?","a"=>"None, that's a hardware problem"],
		["q"=>"Whats the object-oriented way to become wealthy?","a"=>"Inheritance!"],
		["q"=>"Why did the programmer quit his job?","a"=>"Because he didn't get arrays!"],
		["q"=>"Why are Assembly programmers always soaking wet?","a"=>"They work below C-level!"],
		["q"=>"What is the most used language in programming?","a"=>"Profanity!"],
		["q"=>"How did the programmer die in the shower?","a"=>"He read the shampoo bottle instructions: Lather. Rinse. Repeat."],
		["q"=>"How do you tell HTML from HTML5?","a"=>"Try it out in Internet Explorer.  Did it work?  No?  It's HTML5!"]
	];

	// Set default value for limit (if $_GET param is not passed)
	$limit = 0;

	// Set the limit to the $_GET param "limit"
	if (array_key_exists("limit", $_GET)) {
		$limit = $_GET["limit"];
		if ($limit > count($jokes)) {
			$limit = count($jokes);
		}
	}
	$numJokes = $limit;

	// create randomJokes array
	$randomJokes = [];

   // get a random element of the $jokes array
	if ($numJokes != 0) {
		$randomKeys = array_rand($jokes,$numJokes);
	}

	// Push all elements to the randomJokes array
	if ($numJokes > 1) {
		foreach ($randomKeys as $key) {
			array_push($randomJokes, $jokes[$key]);
		}
	} else if ($numJokes == 1) {
		array_push($randomJokes, $jokes[$randomKeys]);
	} else {
		array_push($randomJokes, "{}");
	}

	// encode an array as JSON
   $json = json_encode($randomJokes);


   // Send data back

   // Send HTTP headers
   // DO THIS **BEFORE** you `echo()` the content!
   header('content-type:application/json');      // tell the requestor that this is JSON
   header("Access-Control-Allow-Origin: *");     // turn on CORS
   header("X-this-330-service-is-kinda-lame: true");   // a custom header - by convention they begin with 'X'
   header("x-author-name: tom");

   //send content
   echo $json;


?>
