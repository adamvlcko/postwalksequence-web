-- MariaDB ≥ 10.11, InnoDB, utf8mb4

SET NAMES utf8mb4 COLLATE utf8mb4_slovak_ci;
SET time_zone = '+00:00';

CREATE TABLE users (
    id             INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username       VARCHAR(32)  NOT NULL,
    password_hash  VARCHAR(255) NOT NULL,
    created_at     DATETIME(3)  NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
    PRIMARY KEY (id),
    UNIQUE KEY uq_users_username (username),
    CONSTRAINT ck_users_username CHECK (username REGEXP '^[a-z0-9._-]{3,32}$')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

CREATE TABLE walks (
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id     INT UNSIGNED NOT NULL,                          -- vlastník pochôdzky
    name        VARCHAR(100) NOT NULL,
    created_at  DATETIME(3)  NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
    PRIMARY KEY (id),
    KEY ix_walks_user_created (user_id, created_at),
    CONSTRAINT fk_walks_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    CONSTRAINT ck_walks_name CHECK (CHAR_LENGTH(TRIM(name)) > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

CREATE TABLE streets (
    id       INT UNSIGNED NOT NULL AUTO_INCREMENT,
    walk_id  INT UNSIGNED NOT NULL,
    name     VARCHAR(100) NOT NULL,
    PRIMARY KEY (id),
    KEY ix_streets_walk (walk_id),
    CONSTRAINT fk_streets_walk FOREIGN KEY (walk_id) REFERENCES walks (id) ON DELETE CASCADE,
    CONSTRAINT ck_streets_name CHECK (CHAR_LENGTH(TRIM(name)) > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;
