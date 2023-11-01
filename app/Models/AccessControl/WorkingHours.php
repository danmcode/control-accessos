<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class WorkingHours extends Model
{
    use HasFactory;

    protected $fillable = [
        "time_in",
        "time_out",
        "created_by",
        "updated_by"
    ];

    public static function validateWorkingHours(array $workingHours)
    {
        $isValidWorkingHours = Validator::make($workingHours, [
            'time_in' => [
                'required',
                'date_format:H:i', // Asegura que el formato sea HH:mm
                function ($attribute, $value, $fail) {
                    // Verifica si la hora es 00:00 y la marca como inválida
                    if ($value === '00:00') {
                        $fail('La hora de ingreso no puede ser 00:00');
                    }
                },
            ],

            'time_out' => [
                'required',
                'date_format:H:i', // Asegura que el formato sea HH:mm
                function ($attribute, $value, $fail) {
                    // Verifica si la hora es 00:00 y la marca como inválida
                    if ($value === '00:00') {
                        $fail('La hora de ingreso no puede ser 00:00');
                    }
                },
            ],
            
        ]);

        $isValidWorkingHours->after(function ($validator) use ($workingHours) {
            $horaIngreso = \DateTime::createFromFormat('H:i', $workingHours['time_in']);
            $horaSalida = \DateTime::createFromFormat('H:i', $workingHours['time_out']);
    
            if ($horaIngreso >= $horaSalida) {
                $validator->errors()->add('time_in', 'La hora de ingreso debe ser menor que la hora de salida.');
            }
        });

        return $isValidWorkingHours;
    }

    public static function getWorkingHours(){
        
        $workingHours = WorkingHours::get();
        
        if(sizeof($workingHours) == 0){
            $model = new WorkingHours([
                'time_in' => "00:00", 
                'time_out' => "00:00"
            ]);
            $workingHours = $model;
        }else{
            $workingHours = $workingHours[0];
        }

        return $workingHours;
    }
}