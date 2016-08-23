<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Noticia extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $primaryKey = 'idnoticia';

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'noticia';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}