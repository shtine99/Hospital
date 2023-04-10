<?php

namespace App\Models;


class Doctor extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function departmant()
    {
        return $this->belongsTo(Departmant::class);
    }
}
