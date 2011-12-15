<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
	private $_id;

	public function authenticate() {
		$user = User::model()->findByAttributes(array('username' => $this->username,
													  'password' => md5($this->password)));

		if ($user === null) {
			$this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
		}
		else {
			$this->errorCode = self::ERROR_NONE;
			$this->_id= $user->id;
		}

		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}