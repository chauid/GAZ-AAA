<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property string $userID 사용자ID
 * @property string $password 사용자 비밀번호
 * @property string $userName 사용자 이름
 * @property string $nickName 사용자 별명
 * @property string $phone 전화번호
 * @property string $birth 생년월일
 * @property int|null $asset 자산
 * @property int|null $profit 총 수익
 * @property int|null $loss 총 손실
 * @property int $userTagId 유저 태그ID
 * @property string $created_at 회원가입일
 * @property string $updated_at 회원정보 변경일
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAsset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsertagid($value)
 * @mixin \Eloquent
 */
class Users extends Authenticatable
{
  protected $table = 'users';
  protected $primaryKey = 'userID';

  public $timestamps = false;

  protected $fillable = [
    'userID',
    'password',
    'userName',
    'nickName',
    'phone',
    'birth',
    'asset',
    'profit',
    'loss',
    'userTag',
    'created_at',
    'updated_at'
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'userID' => 'string',
    'password' => 'encrypted',
    'userName' => 'string',
    'nickName' => 'string',
    'phone' => 'string',
    'birth' => 'datetime',
    'asset' => 'number',
    'profit' => 'number',
    'loss' => 'number',
    'userTag' => 'string',
    'created_at' => 'timestamp',
    'updated_at' => 'timestamp',
  ];
}