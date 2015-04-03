<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModalServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$prefix = 'App\Repositories\\';
		$bindings = [
			'Lesson\LessonInterface'              	=> 'Lesson\Lesson',
			'Tag\TagInterface'            			=> 'Tag\Tag',
			'School\SchoolInterface'				=> 'School\School',
			'Tutor\TutorInterface'					=> 'Tutor\Tutor',
			'Role\RoleInterface'					=> 'Role\Role',
			'Comment\CommentInterface'				=> 'Comment\Comment',
			'Rating\RatingInterface'				=> 'Rating\Rating',
			'Student\StudentInterface'				=> 'Student\Student',
			'Coupon\CouponInterface'				=> 'Coupon\Coupon',
			'Article\ArticleInterface'				=> 'Article\Article',
			'Tutor\EducationInterface'				=> 'Tutor\Education',
			'Tutor\JobInterface'					=> 'Tutor\Job',
			'Subject\SubjectInterface'				=> 'Subject\Subject',
		];

		foreach ($bindings as $interface => $repository)
		{
			$this->app->bind($prefix . $interface, $prefix . $repository);
		}

		$this->app->bind('Illuminate\Auth\UserInterface', $prefix . 'User\User');
	}

}
