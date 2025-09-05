<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PortfolioController extends Controller
{
    /**
     * Display the main portfolio page
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $data = [
            'name' => 'Mark Alexis Macarilay',
            'title' => 'Software Developer',
            'location' => 'San Jose, Delfin Albano, Isabela, 3326',
            'cv_link' => 'https://drive.google.com/drive/folders/1reTp-P6h2GI43ZHnZSI1aLo_eXLjE8cE?usp=drive_link',
            'social_links' => [
                'facebook' => 'https://www.facebook.com/sphinx0224',
                'instagram' => 'https://www.instagram.com/kraken022400?igsh=bDR5Ynpib2kwMno0',
                'github' => 'https://github.com/DarkZone24/Portfolio'
            ],
            'services' => [
                [
                    'icon' => 'fa-bars',
                    'title' => 'System Implementation',
                    'description' => 'Conducting onsite implementation for new system that...',
                    'link' => route('portfolio.web')
                ],
                [
                    'icon' => 'fa-user',
                    'title' => 'Remote Session and Client\'s Desire',
                    'description' => 'Assisting client\'s concern regarding system and also create client\'s desire like...',
                    'link' => route('portfolio.design')
                ]
            ],
            'skills' => [
                [
                    'icon' => 'fa-phone',
                    'title' => 'Technical Support',
                    'description' => 'Support client through remote session regarding concerns in our system. Making client\'s satisfaction on our system that they needed to and grant their request.'
                ],
                [
                    'icon' => 'fa-database',
                    'title' => 'SQL DATABASE',
                    'description' => 'Creating customized report and migrate data through database scripting requested by clients.'
                ]
            ]
        ];

        return view('portfolio.index', compact('data'));
    }

    /**
     * Display the about page
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('portfolio.about');
    }

    /**
     * Display the services page
     *
     * @return \Illuminate\View\View
     */
    public function services()
    {
        return view('portfolio.services');
    }

    /**
     * Display the skills page
     *
     * @return \Illuminate\View\View
     */
    public function skills()
    {
        return view('portfolio.skills');
    }

    /**
     * Display the contact page
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('portfolio.contact');
    }

    /**
     * Handle contact form submission
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // Here you can add logic to handle the contact form
        // For example: send email, save to database, etc.
        
        // Example: Save to database (you would need to create a Contact model)
        // Contact::create($request->all());
        
        // Example: Send email
        // Mail::to('your-email@example.com')->send(new ContactFormMail($request->all()));

        return redirect()->back()->with('success', 'Thank you for your message! I will get back to you soon.');
    }

    /**
     * Download CV
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function downloadCV()
    {
        $cvUrl = 'https://drive.google.com/drive/folders/1reTp-P6h2GI43ZHnZSI1aLo_eXLjE8cE?usp=drive_link';
        return redirect($cvUrl);
    }
}