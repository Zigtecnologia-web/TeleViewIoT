-- Ativa TimescaleDB
CREATE EXTENSION IF NOT EXISTS timescaledb CASCADE;

-- Tabela genérica de telemetria
CREATE TABLE IF NOT EXISTS telemetry (
  id SERIAL NOT NULL,
  time TIMESTAMPTZ NOT NULL DEFAULT NOW(),
  device_id VARCHAR(50) NOT NULL,
  key_name VARCHAR(100) NOT NULL,
  key_value DOUBLE PRECISION NOT NULL,
  extra JSONB DEFAULT '{}',
  PRIMARY KEY (id, time)
);

-- Cria hypertable
SELECT create_hypertable('telemetry', 'time', if_not_exists => TRUE);
