<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 
	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
         * 
         */
    
        public function authenticate() {
            $user = TbUser::model()->find('username=?',array($this->username));
            
            if($user === null){
                $this->errorCode =  self::ERROR_USERNAME_INVALID;
            }else if(!$user->validatePassword($this->password)){
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            }else {
                $this->id_user = $user->uID;
                $this->username = $user->username;
                $this->type_user = $user->user_types_id;
                $this->fullname_user = $user->fullname;
                $this->errorCode = self::ERROR_NONE;
            }
            
            return $this->errorCode == self::ERROR_NONE;
        }
        
        public function getId() {
            return $this->id_user;
        }
        
        public function getName() {
            return $this->fullname_user;
        }
}