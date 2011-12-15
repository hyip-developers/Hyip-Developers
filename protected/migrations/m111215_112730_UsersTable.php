<?php

class m111215_112730_UsersTable extends CDbMigration
{
	public function up()
	{
		$this->execute("CREATE TABLE `users` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `realname` varchar(255) NOT NULL,
		  `username` varchar(20) NOT NULL,
		  `password` varchar(32) NOT NULL,
		  `security_code` varchar(20) NOT NULL,
		  `email` varchar(100) NOT NULL,
		  `birthdate` date NOT NULL,
		  `security_question` tinyint(2) unsigned NOT NULL,
		  `security_question_custom` varchar(255) DEFAULT NULL,
		  `security_answer` varchar(255) NOT NULL,
		  `ecurrency` enum('LR','PM') NOT NULL DEFAULT 'LR',
		  `ecurrency_purse` varchar(15) NOT NULL,
		  `language` char(2) NOT NULL DEFAULT 'en',
		  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
		  PRIMARY KEY (`id`)
		)");
	}

	public function down()
	{
		echo "m111215_112730_UsersTable does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}