-- Uncomment this when creating and setting up the database
-- Then recomment it afterwards

-- CREATE TYPE user_role AS ENUM ('admin', 'user');


-- Click Run to execute SQL command
CREATE TABLE IF NOT EXISTS public."users" (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE CHECK (char_length(username) >= 3),
    password VARCHAR(255) NOT NULL CHECK (char_length(password) >= 5),
    role user_role NOT NULL DEFAULT 'user',
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);





-- Complete SQL Code

-- CREATE TYPE user_role AS ENUM ('admin', 'user');

-- CREATE TABLE IF NOT EXISTS public."users" (
--     id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
--     username VARCHAR(50) NOT NULL UNIQUE CHECK (char_length(username) >= 3),
--     first_name VARCHAR(100) NOT NULL,
--     last_name VARCHAR(100) NOT NULL,
--     password VARCHAR(255) NOT NULL CHECK (char_length(password) >= 8),
--     role user_role NOT NULL DEFAULT 'user',
--     created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
--     updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
-- );