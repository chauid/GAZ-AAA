<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserTags
 *
 * @property int $id AUTO_INCREMENT
 * @property string $tagName 태그명
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTags whereTagname($value)
 * @mixin \Eloquent
 */
class UserTags extends Model
{
  protected $table = 'usertags';
  protected $primaryKey = 'id';
}