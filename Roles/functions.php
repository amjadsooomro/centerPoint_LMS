<?php

require_once __DIR__ . '/../Database/connect.php';

class Examination {
    private mysqli $conn;

    // Constructor to initialize the connection
    public function __construct() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);  // Enable error reporting
        $this->conn = (new Database())->getConnection();  // Establish a database connection
    }

    /**
     * Insert a new examination record.
     * Returns the auto-increment ID on success, or false on failure.
     */
    public function create( 
    string $subject,
    string $semester,
    string $instructor,
    string $lab,
    string $date_time,
    string $time_slot,
    string $message,
    ?string $attachment = null,  // Optional
    ?string $link_share = null,  // Optional
    int $status = 1              // Default to active
): int|false {
    $stmt = $this->conn->prepare("
        INSERT INTO examination
          (subject, semester, instructor, lab, date_time, time_slot,
           message, attachment, link_share, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if ($stmt === false) return false;

    $stmt->bind_param(
        'sssssssssi',
        $subject, $semester, $instructor, $lab, $date_time, $time_slot,
        $message, $attachment, $link_share, $status
    );

    $stmt->execute();
    $insertId = $this->conn->insert_id;
    $stmt->close();

    return (int)$insertId;
}

    /**
     * Update an existing examination record.
     */
   public function update(
    int $id,
    string $subject,
    string $semester,
    string $instructor,
    string $lab,
    string $date_time,
    string $time_slot,
    string $message,
    ?string $link_share = null
): bool {
    $stmt = $this->conn->prepare("
        UPDATE examination SET
          subject = ?, semester = ?, instructor = ?, lab = ?,
          date_time = ?, time_slot = ?, message = ?, link_share = ?
        WHERE id = ?
    ");

    if ($stmt === false) {
        error_log("❌ Prepare failed: " . $this->conn->error);
        return false;
    }

    if (!$stmt->bind_param('ssssssssi', $subject, $semester, $instructor, $lab, $date_time, $time_slot, $message, $link_share, $id)) {
        error_log("❌ Bind failed: " . $stmt->error);
        return false;
    }

    if (!$stmt->execute()) {
        error_log("❌ Execute failed: " . $stmt->error);
        return false;
    }

    $stmt->close();
    return true;
}

    /**
     * Delete a specific examination record.
     */
    public function delete(int $id): bool {
        // SQL query to delete a record by its ID
        $stmt = $this->conn->prepare("DELETE FROM examination WHERE id = ?");
        
        // Bind the parameter to the prepared statement
        $stmt->bind_param('i', $id);
        
        // Execute the query
        $stmt->execute();
        
        // Close the prepared statement
        $stmt->close();
        
        // Return true if deletion was successful
        return true;
    }

    /**
     * Toggle the visibility status of a record.
     * If status is 1, set it to 0; if status is 0, set it to 1.
     */
    public function toggleStatus(int $id, int $newStatus): bool {
        // SQL query to update the status of the record
        $stmt = $this->conn->prepare("UPDATE examination SET status = ? WHERE id = ?");
        
        // Bind the parameters to the prepared statement
        $stmt->bind_param('ii', $newStatus, $id);
        
        // Execute the query
        $stmt->execute();
        
        // Close the prepared statement
        $stmt->close();
        
        // Return true if status was updated
        return true;
    }

    /**
     * Fetch all examination records.
     */
    public function fetchAll(): array {
        // SQL query to fetch all records ordered by creation date
        $res = $this->conn->query("
            SELECT id, subject, semester, instructor, lab,
                   date_time, time_slot, message, attachment, link_share, status, created_at
            FROM examination
            ORDER BY created_at DESC
        ");
        
        // Return all records as an associative array
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Fetch a single examination record by its ID.
     */
    public function fetchOne(int $id): ?array {
        // SQL query to fetch a specific record by its ID
        $stmt = $this->conn->prepare("
            SELECT * FROM examination WHERE id = ?
        ");
        
        // Bind the parameter to the prepared statement
        $stmt->bind_param('i', $id);
        
        // Execute the query
        $stmt->execute();
        
        // Get the result and fetch the record as an associative array
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        
        // Close the prepared statement
        $stmt->close();
        
        // Return the fetched record or null if not found
        return $row ?: null;
    }
}
?>