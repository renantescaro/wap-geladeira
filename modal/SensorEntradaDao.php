<?php

class SensorEntradaDao{

    public static function selecionarPorSensorNome(string $sensorNome){

        $sql = 'SELECT se.* FROM sensorEntrada AS se 
                INNER JOIN sensor AS s
                ON s.id = se.sensorId 
                WHERE s.nome=:SENSOR_NOME';

        return Banco::selecionar($sql, [':SENSOR_NOME'=>$sensorNome], 'SensorEntrada');
    }

    public static function inserir(SensorEntrada $sensorEntrada){

        $sql = 'INSERT INTO sensorEntrada
                    (valor, dataHora, sensorId)
                VALUES(:VALOR_SENSOR,:DATA_HORA,:SENSOR_ID)';
        
        $parametros = [':VALOR_SENSOR'=>$sensorEntrada->valor,
                       ':DATA_HORA'=>$sensorEntrada->dataHora,
                       ':SENSOR_ID'=>$sensorEntrada->sensorId];

        return Banco::executar($sql, $parametros);
    }

    public static function apagarTudo(){

        $sql = 'DELETE FROM sensorEntrada';

        return Banco::executar($sql);
    }
}
