<?php 
/*
Common:
(.*)				0 or more of anything
(.+)				1 or more of anything
(\d+)				number
([a-z]+)		lowercase letter
([a-zA-Z]+)	uppercase or lowercase letters
([0-9a-zA-Z]+)	alpha numeric letters


+			1 or more of preceding
*			0 or more of preceding
{32} 	match 32 of the preceding

*/
$config['/candy/bar'] = '/main/index';
$config['/candy/bar/(.*)'] = '/main/route2me/$1';
$config['/candy/bar/(.*)/(.*)'] = '/main/route2me/$1';
