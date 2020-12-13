CREATE KEYSPACE company WITH replication = {'class': 'SimpleStrategy', 'replication_factor': '3'};

USE company;

CREATE TYPE point (
    note VARCHAR,
    date TIMESTAMP
);

CREATE TABLE employees
(
    document        VARCHAR PRIMARY KEY,
    phone           VARCHAR,
    name            VARCHAR,
    gender          VARCHAR,
    email           VARCHAR,
    salary          DOUBLE,
    points_register LIST<FROZEN<point>>
);