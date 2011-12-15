<?php

class m111215_112746_VisitsTable extends CDbMigration
{
	public function up()
	{
		$this->execute("CREATE TABLE `visits` (
		  `user_id` int(11) NOT NULL,
		  `url` varchar(255) NOT NULL,
		  `ip` int(10) unsigned NOT NULL,
		  `user_agent` varchar(255) NOT NULL,
		  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  PRIMARY KEY (`user_id`)
		)");
	}

	public function down()
	{
		echo "m111215_112746_VisitsTable does not support migration down.\n";
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