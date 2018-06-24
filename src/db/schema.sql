CREATE TABLE users(
  id SERIAL NOT NULL,
  username VARCHAR(30) UNIQUE NOT NULL,
  email VARCHAR(20) UNIQUE NOT NULL,
  password VARCHAR(20),
  photo TEXT,
  PRIMARY KEY (id)
);

CREATE TABLE restaurants(
  id SERIAL NOT NULL,
  name VARCHAR(50) NOT NULL,
  description TEXT,
  type VARCHAR(50),
  photo TEXT,
  location VARCHAR(40),
  map_cords VARCHAR(50),
  PRIMARY KEY (id)
);

CREATE TABLE reviews(
  id SERIAL NOT NULL,
  user_id INTEGER NOT NULL,
  restaurant_id INTEGER NOT NULL,
  taste_score REAL NOT NULL,
  service_score REAL NOT NULL,
  place_score REAL NOT NULL,
  vom_score REAL NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (restaurant_id) REFERENCES restaurants (id)
);

CREATE TABLE review_likes(
  id SERIAL NOT NULL,
  review_id INTEGER NOT NULL,
  user_id INTEGER NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (review_id) REFERENCES reviews (id),
  FOREIGN key (user_id) REFERENCES users (id)
);
