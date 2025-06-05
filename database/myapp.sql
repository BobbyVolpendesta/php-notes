-- Rebuilds the 'users' and 'notes' tables in SQLite

CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE
);

CREATE TABLE notes (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  body TEXT NOT NULL,
  user_id INTEGER NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert data

INSERT INTO users (id, name, email) VALUES
(3, 'Jeff', 'jeff@example.com'),
(4, 'Kim', 'kim@example.com');

INSERT INTO notes (id, body, user_id) VALUES
(5, 'Jeffery''s Greatest Hits', 3),
(6, 'Judy and Jimmy I Like it When You Sleep, for You Are So Beautiful yet So Unaware of It', 4),
(8, 'The Meaning of Life', 4),
(9, 'Tortellini Alfredo', 3),
(10, 'I am getting better at PHP', 3);
