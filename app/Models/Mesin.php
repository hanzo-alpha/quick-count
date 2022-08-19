<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  /**
 * @mixin IdeHelperMesin
 */
  class Mesin extends Model
  {
    /**
     * @var string
     */
    public $table = 'mesin';

    /**
     * @var string
     */
    public $primaryKey = 'ID_msn';

    /**
     * @var string
     */
    protected $data = '';
  }
