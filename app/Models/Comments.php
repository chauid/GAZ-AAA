<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Comments
 *
 * @property int $id AUTO_INCREMENT
 * @property string $coinName 댓글 작성 코인
 * @property string $nickName 댓글 작성자 별명
 * @property string|null $comment 댓글 내용
 * @property \Illuminate\Support\Carbon $created_at 댓글 작성 시각
 * @property \Illuminate\Support\Carbon $updated_at 댓글 수정 시각
 * @method static \Illuminate\Database\Eloquent\Builder|Comments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereCoinname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comments whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comments extends Model
{
  protected $table = 'comments';
  protected $primaryKey = 'id';
}