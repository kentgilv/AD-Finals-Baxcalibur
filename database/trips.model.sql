-- Click Run to execute SQL command
CREATE TABLE IF NOT EXISTS public."trips" (
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    destination VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    booking_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    price NUMERIC(10, 2) NOT NULL,
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);





-- Complete SQL Code

-- CREATE TABLE IF NOT EXISTS public."trips" (
--     id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
--     destination VARCHAR(100) NOT NULL,
--     description TEXT NOT NULL,
--     start_datetime TIMESTAMPTZ NOT NULL,
--     end_datetime TIMESTAMPTZ NOT NULL,
--     price NUMERIC(10, 2) NOT NULL CHECK (price >= 0),
--     created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
--     updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
--     CHECK(end_datetime > start_datetime)
-- );