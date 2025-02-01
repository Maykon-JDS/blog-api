CREATE TABLE users (
    id INT PRIMARY KEY,
    username VARCHAR(255),
    password VARCHAR(255),
    email VARCHAR(255),
    created_at TIMESTAMP,
    update_at TIMESTAMP,
    UNIQUE (username, email)
);

CREATE TABLE api_tokens (
    id INT PRIMARY KEY,
    fk_users_id INT,
    token_type VARCHAR(255),
    token_value VARCHAR(255),
    revoked BOOLEAN,
    expiration_date TIMESTAMP,
    description VARCHAR(255),
    created_at TIMESTAMP,
    update_at TIMESTAMP,
    FOREIGN KEY (fk_users_id) REFERENCES users (id) ON DELETE CASCADE
);

CREATE TABLE failed_logins (
    id INT PRIMARY KEY,
    fk_users_id INT,
    username VARCHAR(255),
    user_agent VARCHAR(255),
    reason VARCHAR(255),
    ip_address VARCHAR(45),
    geo_location VARCHAR(255),
    attempt_time TIMESTAMP,
    update_at TIMESTAMP,
    created_at TIMESTAMP,
    FOREIGN KEY (fk_users_id) REFERENCES users (id) ON DELETE SET NULL
);