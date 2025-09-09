<?php

// app/Http/Controllers/HireMeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\HireMeInquiry;
use App\Models\HireInquiry;

class HireMeController extends Controller
{
    /**
     * Show the hire me form
     */
    public function index()
    {
        return view('hire-me.index');
    }

    /**
     * Handle the hire me form submission
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:255',
            'contact' => 'required|string|min:10|max:20',
            'message' => 'required|string|min:10|max:1000'
        ], [
            'name.required' => 'Please enter your full name',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name cannot exceed 100 characters',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'contact.required' => 'Please enter your contact number',
            'contact.min' => 'Contact number must be at least 10 digits',
            'contact.max' => 'Contact number cannot exceed 20 characters',
            'message.required' => 'Please enter your message',
            'message.min' => 'Message must be at least 10 characters',
            'message.max' => 'Message cannot exceed 1000 characters'
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Save to database (optional)
            $inquiry = HireInquiry::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'status' => 'pending'
            ]);

            // Send email notification
            Mail::to(config('mail.admin_email', 'your-email@example.com'))
                ->send(new HireMeInquiry($inquiry));

            // Send auto-reply to client (optional)
            Mail::to($request->email)
                ->send(new \App\Mail\HireMeAutoReply($inquiry));

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thank you! Your message has been sent successfully. I\'ll get back to you soon!'
                ], 200);
            }

            return redirect()->back()
                ->with('success', 'Thank you! Your message has been sent successfully. I\'ll get back to you soon!');

        } catch (\Exception $e) {
            \Log::error('Hire Me Form Error: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, there was an error sending your message. Please try again later.'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Sorry, there was an error sending your message. Please try again later.')
                ->withInput();
        }
    }

    /**
     * Show all hire inquiries (admin only)
     */
    public function admin()
    {
        $inquiries = HireInquiry::latest()->paginate(20);
        return view('admin.hire-inquiries', compact('inquiries'));
    }

    /**
     * Update inquiry status
     */
    public function updateStatus(Request $request, $id)
    {
        $inquiry = HireInquiry::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,contacted,completed,rejected'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $inquiry->update([
            'status' => $request->status
        ]);

        return redirect()->back()
            ->with('success', 'Inquiry status updated successfully!');
    }
}

