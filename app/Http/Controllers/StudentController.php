<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentProfile;
use App\Models\WalletHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'wallet_balance' => 200,
        ]);

        StudentProfile::create([
            'student_id' => $student->student_id,
            'name' => $student->name,
            'mail' => $student->email,
        ]);

        WalletHistory::create([
            'student_id' => $student->student_id,
            'type' => 'Credit',
            'amount' => 200,
            'updated_balance' => 200,
            'description' => 'Sign-up bonus',
        ]);

        return response()->json([
            'message' => 'Student registration successfully',
            'student' => $student
        ], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $student = Student::where('email', $request->email)->first();

        // Check if student exists and password is correct
        if (!$student || !Hash::check($request->password, $student->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Create token
        $token = $student->createToken('student_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'student' => $student
        ]);
    }

    public function updateProfile(Request $request)
    {
        $student = $request->user();

        $request->validate([
            'student_id' => 'required|string',
            'address' => 'nullable|string',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string',
            'high_qlc' => 'nullable|string',
        ]);

        // Check if passed student_id matches the authenticated student's ID
        if ($request->student_id !== $student->student_id) {
            return response()->json([
                'message' => 'Unauthorized. Student ID mismatch.'
            ], 403);
        }

        $profile = StudentProfile::where('student_id', $student->student_id)->first();
        
        if ($profile) {
            $profile->update($request->only(['address', 'dob', 'gender', 'high_qlc']));
        }

        return response()->json([
            'message' => 'Profile updated successfully',
            'profile' => $profile
        ]);
    }
}
