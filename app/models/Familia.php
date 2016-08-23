<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Familia extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $primaryKey = 'idfamilia';

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'familia';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}