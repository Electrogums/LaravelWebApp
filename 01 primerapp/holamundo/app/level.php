<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\level
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\level query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\level whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\level whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\level whereUpdatedAt($value)
 */
class level extends Model
{
    public function courses () {
    	return $this->hasOne(Course::class);//Un nivel tiene un cursos.
    }
}
