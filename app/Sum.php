<?php
/**
 * User: Serhii T.
 * Date: 7/3/18
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sum extends Model
{
    /**
     * @var string
     */
    protected $table = 'sum';

    public $timestamps = false;

    /**
     * @return mixed
     */
    public function getSum(): int
    {
        return $this->value;
    }

    /**
     * @param int $sum
     */
    public function setSum(int $sum)
    {
        $this->value = $sum;
    }
}
