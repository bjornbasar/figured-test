<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Entries extends Eloquent
{
	//
	protected $connection = 'mongodb';
	protected $collection = 'entries';

	// protected $primaryKey = 'entries_id';

	protected $fillable = ['title', 'entry'];
}