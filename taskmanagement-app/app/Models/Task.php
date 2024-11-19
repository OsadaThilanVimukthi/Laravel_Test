<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey='id';
    protected $fillable = [
     'user_id', // Add your specific columns here
     'title',
     'description',
     'due_date',
     'priority',
     'is_completed',
     'is_paid',
      // etc.
 ];
 
    use HasFactory;
}
