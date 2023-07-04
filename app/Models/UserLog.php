<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserLog
 *
 * @property int $id AUTO_INCREMENT
 * @property string $userID 사용자ID
 * @property string $action 로그인/로그아웃
 * @property string $ip 접속 IP
 * @property string $agent 접속 agent
 * @property string $language 사용 언어
 * @property string $connectionTime 접속 시각
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereConnectiontime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereUserid($value)
 * @mixin \Eloquent
 */
class UserLog extends Model
{
  protected $table = 'UserLog';
  protected $primaryKey = 'id';
}