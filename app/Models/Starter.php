<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;

class Starter extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $casts = [
        'status' => Status::class,
    ];

    public function save(array $options = array())
    {
        if( ! $this->user_id)
        {
            $this->user_id = Auth::user()->id;
            $this->created_by = Auth::user()->name;
        }
        // if ($this->status !== "Completed")
        // {
        //     $this->status = 'Pending';
        // }
        
        $this->user_id = Auth::user()->id;
        $this->updated_by = Auth::user()->name;
        $this->fullname = $this->lastname.", ".$this->firstname;
        parent::save($options);
    }


    public function staffType()
    {
        return $this->belongsTo(StaffType::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
