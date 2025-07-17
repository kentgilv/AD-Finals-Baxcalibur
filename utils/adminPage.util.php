<?php
declare(strict_types=1);

class AdminPage
{
    /**
     * Fetch all users from the database and format them for the admin dashboard.
     *
     * @param PDO $pdo
     * @param string $search Optional search string to filter users.
     * @param string $sortOrder 'asc' or 'desc' to sort A-Z or Z-A
     * @return array List of users with name, booked, and payment placeholders
     */
    public static function displayUsers(PDO $pdo, string $search = '', string $sortOrder = 'asc'): array
    {
        try {
            $allowedSort = in_array(strtolower($sortOrder), ['asc', 'desc']) ? strtoupper($sortOrder) : 'ASC';

            $query = "
                SELECT id, username, first_name, last_name, role
                FROM public.\"users\"
            ";

            $params = [];

            if (!empty($search)) {
                $query .= "
                    WHERE
                        LOWER(username) LIKE :search OR
                        LOWER(first_name) LIKE :search OR
                        LOWER(last_name) LIKE :search OR
                        LOWER(first_name || ' ' || last_name) LIKE :search
                ";
                $params['search'] = '%' . strtolower($search) . '%';
            }

            $query .= " ORDER BY last_name $allowedSort, first_name $allowedSort";

            $stmt = $pdo->prepare($query);
            $stmt->execute($params);

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $users = [];

            foreach ($rows as $row) {
                $fullName = trim($row['first_name'] . ' ' . $row['last_name']);

                $users[] = [
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'name' => $fullName,
                    'booked' => 'N/A',
                    'payment' => 'N/A'
                ];
            }

            return $users;

        } catch (PDOException $e) {
            error_log('[AdminPage::displayUsers] PDOException: ' . $e->getMessage());
            return [];
        }
    }
}