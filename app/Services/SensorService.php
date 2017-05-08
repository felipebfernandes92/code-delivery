<?php

namespace CodeDelivery\Services;

class SensorService
{
    const statusTurnOff = 'Desligado';
    const statusWater = 'Com água';
    const statusNoWater = 'Sem água';

    public function getStatus()
    {
        $status = ['0' => self::statusTurnOff, '1' => self::statusWater, '2' => self::statusNoWater];

        return $status;
    }

    public function getStatusColors()
    {
        $status = array(
            '0' => array(
                'status' => self::statusTurnOff,
                'color' => '#000'
            ),
            '1' => array(
                'status' => self::statusWater,
                'color' => '#00C853'
            ),
            '2' => array(
                'status' => self::statusNoWater,
                'color' => '#DD2C00'
            )
        );

        return $status;
    }
}