-- Ativa TimescaleDB
CREATE EXTENSION IF NOT EXISTS timescaledb CASCADE;

-- Tabela genérica de telemetria
CREATE TABLE IF NOT EXISTS telemetry (
  time TIMESTAMPTZ NOT NULL DEFAULT NOW(),
  device_id VARCHAR(50) NOT NULL,
  field_name VARCHAR(100) NOT NULL,         -- ex: field1, field2
  field_value DOUBLE PRECISION NOT NULL,    -- valor numérico
  extra JSONB DEFAULT '{}'                  -- informações adicionais opcionais
);

-- Cria hypertable
SELECT create_hypertable('telemetry', 'time', if_not_exists => TRUE);
