CREATE TABLE users(
  id SERIAL NOT NULL,
  username VARCHAR(100) UNIQUE NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(200) NOT NULL,
  photo TEXT,
  PRIMARY KEY (id)
);

CREATE TABLE restaurants(
  id SERIAL NOT NULL,
  name VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  type VARCHAR(100),
  photo TEXT NOT NULL,
  location VARCHAR(100) NOT NULL,
  sponsored BOOLEAN DEFAULT(false),
  site_link TEXT,
  created_by INTEGER NOT NULL,
  created_at TEXT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (created_by) REFERENCES users (id)
);

CREATE TABLE reviews(
  id SERIAL NOT NULL,
  user_id INTEGER NOT NULL,
  restaurant_id INTEGER NOT NULL,
  description TEXT NOT NULL,
  taste_score REAL NOT NULL,
  service_score REAL NOT NULL,
  place_score REAL NOT NULL,
  vom_score REAL NOT NULL,
  created_at TEXT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (restaurant_id) REFERENCES restaurants (id)
);
