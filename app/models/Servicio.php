<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Servicio extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $primaryKey = 'idservicio';

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'servicio';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}