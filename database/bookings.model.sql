-- Uncomment these when creating and setting up the database
-- Then recomment these afterwards

-- CREATE TYPE payment_status_values AS ENUM ('To be Paid', 'Paid', 'Cancelled');
-- CREATE TYPE booking_status_values AS ENUM ('Pending', 'Booked', 'Cancelled');

-- Click Run to execute SQL command
CREATE TABLE IF NOT EXISTS public."bookings" (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    trip_id INTEGER NOT NULL REFERENCES trips(id) ON DELETE CASCADE,
    payment_status payment_status_values NOT NULL DEFAULT 'To be Paid',
    booking_status booking_status_values NOT NULL DEFAULT 'Pending',
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    UNIQUE (user_id, trip_id)
);





-- Complete SQL Code

-- CREATE TYPE payment_status_values AS ENUM ('To be Paid', 'Paid', 'Cancelled');
-- CREATE TYPE booking_status_values AS ENUM ('Pending', 'Booked', 'Cancelled');

-- CREATE TABLE IF NOT EXISTS public."bookings" (
--     id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
--     user_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
--     trip_id UUID NOT NULL REFERENCES trips(id) ON DELETE CASCADE,
--     payment_status payment_status_values NOT NULL DEFAULT 'To be Paid',
--     booking_status booking_status_values NOT NULL DEFAULT 'Pending',
--     created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
--     updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
--     UNIQUE (user_id, trip_id)
-- );
