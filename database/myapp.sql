-- Rebuilds the 'users' and 'notes' tables in MySQL

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE notes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  body TEXT NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

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
