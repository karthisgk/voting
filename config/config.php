<?php
/***BASE PATH****/
define('LIBS','libs/'); //define library path
define('BASE_PATH','http://vote.karthisgk.be/'); //define base path
define('ADMIN_BASE_PATH','http://vote.karthisgk.be/admin/');

//define('BASE_PATH','http://www.yessgames.com/'); //define base path
//define('ADMIN_BASE_PATH','http://www.yessgames.com/admin/');

/****DATABASE *****/
//type of database(like:mysqli,sqlite,etc..) total 12 database and all type of database is connet using pdo
define('DB_TYPE','mysql'); //DB_TYPE is type of database is only use in PDO Method(MVC)
define('DB_HOST','localhost');
define('DB_NAME','votting');
define('DB_USER','root');
define('DB_PASS','y5kj3XdKjOII');

/*
define('DB_TYPE','mysql'); //DB_TYPE is type of database is only use in PDO Method(MVC)
define('DB_HOST','localhost');
define('DB_NAME','fabsysin_yesgame');
define('DB_USER','fabsysin_renga');
define('DB_PASS','technologies123');
*/

/*****PASSWORD******/
define('HASH_PASSWORD_KEY','502bcd72d5ba908b906cbafa9fd1df5b'); #@dm!n
define('HASH_USERNAME','21232f297a57a5a743894a0e4a801fc3'); #admin
