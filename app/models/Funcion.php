<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Funcion extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $primaryKey = 'idfuncion';

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'funcion';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}