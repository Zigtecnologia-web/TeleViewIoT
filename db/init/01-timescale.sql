-- executado automaticamente pelo entrypoint do postgres na primeira inicialização
CREATE EXTENSION IF NOT EXISTS timescaledb CASCADE;

-- cria tabela exemplo (você vai criar seu schema real depois)
CREATE TABLE IF NOT EXISTS data (
  time TIMESTAMPTZ NOT NULL,
  component_id INT NOT NULL,
  content_value DOUBLE PRECISION
);

SELECT create_hypertable('data', 'time', if_not_exists => TRUE);
