-- Click Run to execute SQL command
CREATE TABLE IF NOT EXISTS public."payments" (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    booking_id UUID NOT NULL REFERENCES bookings(id) ON DELETE CASCADE,
    amount NUMERIC(10, 2) NOT NULL CHECK (amount > 0),
    payment_date TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    payment_method VARCHAR(50) NOT NULL DEFAULT 'Online Bank',
    created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);





-- Sample SQL Code

-- CREATE TABLE IF NOT EXISTS public."payments" (
--     id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
--     booking_id UUID NOT NULL REFERENCES bookings(id) ON DELETE CASCADE,
--     amount NUMERIC(10, 2) NOT NULL CHECK(amount >0),
--     payment_date TIMESTAMPTZ NOT NULL DEFAULT NOW(),
--     payment_method VARCHAR(50) NOT NULL DEFAULT 'Online Bank',
--     created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
-- );
