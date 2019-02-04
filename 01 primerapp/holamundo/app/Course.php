<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Course
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $teacher_id
 * @property int $category_id
 * @property int $level_id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property string|null $picture
 * @property string $status
 * @property int $previous_approved
 * @property int $previous_rejected
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course wherePreviousApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course wherePreviousRejected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereUpdatedAt($value)
 */
class Course extends Model
{
    const PUBLISHED=1;
    const PENDING=2;
    const REJECTED=3;
	
		public function pathAttachment () {
		return "/images/courses/" . $this->picture;
	}

	public function category(){
		   return $this->belongsTo(Category::class) //Un curso tiene pertenece a una categoria
		   ->select('id','name');
	   }

    public function goals () {
		return $this->hasMany(Goal::class)->select('id', 'course_id', 'goal');//un curso tiene muchas metas
    }
    public function requirements () {
		return $this->hasMany(Requirement::class)->select('id', 'course_id', 'requirement');//Uno curso tiene muchos requisitos
	}
	public function level(){
		return $this->belongsTo(Level::class)->select('id','name');// Un curso pertenece a un Nivel
	}
	public function reviews(){
		return $this->belongsTo(Review::class)->select('id','user_id','course_id','rating','comment','created_at'); // Un curso pertenece a una revisión
	}

	public function students(){
		return $this->belongsToMany(Student::class);//Un curso pertenece a muchos estudiantes 
	}
	public function teacher(){
		return $this->belongsTo(Teacher::class);//Un curso pertenece a un maestro.
	}
	public function getCustomRatingAttribute () {
		return $this->reviews->avg('rating');
	}

}

