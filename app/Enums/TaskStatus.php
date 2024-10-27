<?php
namespace App\Enums;

enum TaskStatus: int
{
  case 未着手 = 1;
  case 着手中 = 2;
  case 完了 = 3;

  // https://www.php.net/manual/ja/language.enumerations.examples.php
  public function label(): string
  {
      return match($this) {
          static::未着手 => '未着手',
          static::着手中 => '着手中',
          static::完了 => '完了',
      };
  }
  
  // CSSのクラスを返却する
  public function  cssClass(): string
  {
    return match($this) {
      self::未着手 => 'label-danger',
      self::着手中 => 'label-info',
    };
  }
}
