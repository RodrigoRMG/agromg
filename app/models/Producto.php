<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Producto extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $primaryKey = 'idproducto';

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'producto';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}