CREATE TABLE shoppinglist_users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE shopping_list (
    id SERIAL REFERENCES shoppinglist_users(id),
    item VARCHAR(255) NOT NULL,
    complete BOOLEAN NOT NULL DEFAULT FALSE
);
