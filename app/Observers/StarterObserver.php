<?php

namespace App\Observers;

use App\Models\Starter;
use App\Models\Employee;

class StarterObserver
{
    /**
     * Handle the Starter "created" event.
     */
    public function created(Starter $starter): void
    {
        //
    }

    /**
     * Handle the Starter "updated" event.
     */
    public function updated(Starter $starter)
    {
        // dd($starter->status->value);
        //Create Employee record is status is Completed
        if ( $starter->status->value === 'Completed')
        {
            // dd($starter);

            $found = Employee::where('username', $starter->username)->orWhere('email', $starter->email)->get();
            // dd($found);
            if ( count($found) == 0)
            {
                return Employee::updateOrCreate([
                    'firstname'  => $starter->firstname,
                    'lastname' => $starter->lastname,
                    'username' => $starter->username,
                    'position' => $starter->position,
                    'email' => $starter->email,
                    'fullname' => $starter->fullname,
                    'department_id' => $starter->department_id,   
              ]);
            }

          
          
        }

    }

    /**
     * Handle the Starter "deleted" event.
     */
    public function deleted(Starter $starter): void
    {
        //
    }

    /**
     * Handle the Starter "restored" event.
     */
    public function restored(Starter $starter): void
    {
        //
    }

    /**
     * Handle the Starter "force deleted" event.
     */
    public function forceDeleted(Starter $starter): void
    {
        //
    }
}
