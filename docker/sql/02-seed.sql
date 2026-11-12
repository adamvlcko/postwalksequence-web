-- ukážkové dáta pre prvé spustenie
-- Oba účty majú heslo: Posta2026!   (bcrypt, PASSWORD_DEFAULT)

SET NAMES utf8mb4 COLLATE utf8mb4_slovak_ci;
SET time_zone = '+00:00';

INSERT INTO users (id, username, password_hash) VALUES
    (1, 'novak', '$2y$10$gV96gIu4PUqzenDdrl3nBuLVRXbgXWx/6I08mlVu5Rw8FkLnk4RBe'),
    (2, 'kovac', '$2y$10$gV96gIu4PUqzenDdrl3nBuLVRXbgXWx/6I08mlVu5Rw8FkLnk4RBe');

INSERT INTO walks (id, user_id, name, created_at) VALUES
    (1, 1, 'Rajón 2 – 013 24 Strečno', '2026-07-19 08:00:00.000'),
    (2, 2, 'Rajón 1 – 013 24 Strečno', '2026-07-20 08:00:00.000'),
    (3, 1, 'Rajón 6 – 013 24 Strečno', '2026-08-02 08:00:00.000');   -- nie je v ukážkovom súbore → zanikne iba pri REPLACE_ALL

INSERT INTO streets (id, walk_id, name) VALUES
    (1, 1, 'Mládeže'), (2, 1, 'Sokolská'), (3, 1, 'Pod hradom'),
    (4, 2, 'Ovocná'),
    (5, 3, 'Lesná');
