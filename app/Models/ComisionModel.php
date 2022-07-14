<?php namespace App\Models;

use CodeIgniter\Model;

class ComisionModel extends Model
{
	protected $table      = 'comision';
	protected $primaryKey = 'id';

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'nombre', 'descripcion'
	];

}
