<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Util extends Model
{
  use SoftDeletes;

  protected $fillable = [ 'key', 'title', 'description', 'image', 'file'];




  public static function get($key){
    $result = Util::where('key', '=', $key)->orderBy('id', 'desc')->first();
    if (is_null($result)){
      $result = new Util();
    }
    return $result;
  }


  //keys

  //site public
  const KEY_ABOUT = 'about';
  const KEY_PHONE = 'phone';
  const KEY_ADDRESS = 'address';
  const KEY_EMAIL = 'email';
  const KEY_LINK1 = 'link1';
  const KEY_LINK2 = 'link2';
  const KEY_LINK3 = 'link3';
  const KEY_LINK4 = 'link4';


  //guidance
  const KEY_ACADEMIC_GUIDANCE = 'academic-guidance';
  const KEY_ACADEMIC_GUIDANCE_JOBS = 'academic-guidance-jobs';
  const KEY_ACADEMIC_GUIDANCE_CONSULT = 'academic-guidance-consult';
  const KEY_ACADEMIC_GUIDANCE_PURPOSE = 'academic-guidance-purpose';
  const KEY_ACADEMIC_GUIDANCE_CHANGE_FIELD = 'academic-guidance-change-field';

  //skills
  const KEY_SKILL = 'skill';
  const KEY_SKILL_TERM = 'skill-term';
  const KEY_SKILL_COURSES = 'skill-courses';
  const KEY_SKILL_SUGGEST = 'skill-suggest';

  //gathering
  const KEY_GATHERING = 'gathering';
  const KEY_GATHERING_INDUSTRY_INVITE = 'gathering-industry-invite';
  const KEY_GATHERING_INDUSTRY_VISIT = 'gathering-industry-visit';
  const KEY_GATHERING_WORKSHOP = 'gathering-workshop';

  //idea
  const KEY_IDEA = 'idea';
  const KEY_IDEA_SUPPROT = 'idea-support';
  const KEY_IDEA_STARTUP = 'idea-startup';

  //success
  const KEY_SUCCESS = 'success';
  const KEY_SUCCESS_GRADUATION = 'success-graduation';
  const KEY_SUCCESS_STARTUP = 'success-startup';
}
