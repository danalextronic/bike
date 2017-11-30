<?php
require 'aws-autoloader.php';

$bucket="bikenight-csv-dev";
$accessKey="AKIAJCKYP7GM7WWE6YTA";
$privteKey="Jwo0V3IVlnsdMvFt/2hxBwylXfO7cdG7+aESb4QS";


$key = $filename;
$pathToFile = $filename;
/*echo $pathToFile;
echo $key;*/

//use Aws\S3\S3Client;

 $s3 = new Aws\S3\S3Client([
		'version'     => 'latest',
		'region'      => 'us-east-1',
		'credentials' => [
				'key'    => $accessKey,
				'secret' => $privteKey
		],
 		'scheme' => 'http'
]);

$res = $s3->putObject(array(
    'Bucket'     => $bucket,
    'Key'        => $key,
    'SourceFile' => $pathToFile
));

//echo $result;

