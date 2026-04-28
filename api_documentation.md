# setupQiz API Documentation

This documentation covers the available API endpoints for the setupQiz platform, specifically for Student management, authentication, and profile updates.

**Base URL**: `http://127.0.0.1:8001/api`

---

## 1. Authentication & Registration

### Register Student
Creates a new student account, initializes their profile, and credits a sign-up bonus.

*   **URL**: `/student/register`
*   **Method**: `POST`
*   **Request Body** (JSON):
    ```json
    {
      "name": "John Doe",
      "email": "john@example.com",
      "password": "password123",
      "password_confirmation": "password123"
    }
    ```
*   **Success Response** (201 Created):
    *   **Note**: Automatically initializes `wallet_balance` to `200.00` and creates a "Sign-up bonus" entry in the wallet history.
    ```json
    {
      "message": "Student registration successfully",
      "student": {
        "student_id": "2026-XXXXXX",
        "name": "John Doe",
        "email": "john@example.com",
        "wallet_balance": "200.00",
        "updated_at": "2026-04-28T...",
        "created_at": "2026-04-28T..."
      }
    }
    ```

### Login Student
Authenticates a student and returns a Bearer Token for protected routes.

*   **URL**: `/student/login`
*   **Method**: `POST`
*   **Request Body** (JSON):
    ```json
    {
      "email": "john@example.com",
      "password": "password123"
    }
    ```
*   **Success Response** (200 OK):
    ```json
    {
      "message": "Login successful",
      "access_token": "1|sanctum_token_string...",
      "token_type": "Bearer",
      "student": { ... }
    }
    ```

---

## 2. Student Profile Management

### Update Profile
Updates additional profile details. Requires authentication and a matching `student_id`.

*   **URL**: `/student/profile/update`
*   **Method**: `POST`
*   **Security**: Bearer Token (Sanctum)
*   **Headers**: `Authorization: Bearer <your_token>`
*   **Request Body** (JSON):
    *   *Note: `student_id` is required and must match the ID associated with the token.*
    ```json
    {
      "student_id": "2026-XXXXXX",
      "address": "123 Education Lane",
      "dob": "2000-05-20",
      "gender": "Male",
      "high_qlc": "M.Tech"
    }
    ```
*   **Success Response** (200 OK):
    ```json
    {
      "message": "Profile updated successfully",
      "profile": {
        "student_id": "2026-XXXXXX",
        "address": "123 Education Lane",
        "dob": "2000-05-20",
        "gender": "Male",
        "high_qlc": "M.Tech",
        ...
      }
    }
    ```
*   **Error Response** (403 Forbidden):
    ```json
    {
      "message": "Unauthorized. Student ID mismatch."
    }
    ```

---

## 3. Features & Logic

### Wallet System
*   **Initial Balance**: 200.00 (Credited on registration).
*   **Wallet History**: Every transaction (credit/debit) is logged in the `wallet_histories` table with the following data:
    *   `type`: (Credit/Debit)
    *   `amount`: The transaction amount.
    *   `updated_balance`: The balance after the transaction.
    *   `description`: Reason for the transaction.

---

## Error Codes
*   `401 Unauthorized`: Missing or invalid Bearer token.
*   `403 Forbidden`: Security check failed (e.g., Student ID mismatch).
*   `422 Unprocessable Entity`: Validation failed (e.g., email already taken, password too short).
