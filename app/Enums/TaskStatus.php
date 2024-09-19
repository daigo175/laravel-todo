<?php
namespace App\Enums;

enum TaskStatus: int
{
  case 未着手 = 1;
  case 着手中 = 2;
  case 完了 = 3;

  // CSSのクラスを返却する
  public function  cssClass(): string
  {
    return match($this) {
      self::未着手 => 'label-danger',
      self::着手中 => 'label-info',
    };
  }
}
