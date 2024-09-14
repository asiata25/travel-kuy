<?php

namespace App\Enums;

// 'pending', 'processing', 'completed', 'declined'

enum TransactionStatusEnum: string
{
  case PENDING = 'pending';
  case PROCESSING = 'processing';
  case COMPLETED = 'completed';
  case DECLINED = 'declined';
}
