<?php namespace App\Models;

use CodeIgniter\Model;

class CapacitacionModel extends Model
{
	protected $table      = 'tipo_capacitacion';
	protected $primaryKey = 'id';

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'nombre', 'sector'
	];

}
