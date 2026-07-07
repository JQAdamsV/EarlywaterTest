<?php
/**
 * Index Controller
 * Handles the home page and public content
 */

namespace app;

use \Flight as Flight;
use \app\Bean;

class Index extends BaseControls\Control {
    
    /**
     * Home page
     */
    public function index() {
        // First-run setup takes precedence over the landing page.
        if (!Install::isInstalled()) { Flight::redirect('/install'); return; }

        // Public Headwaters Union landing page — the site home page.
        // Rendered without the Tiknix header/footer layout so visitors see a
        // clean, standalone page. The Earlywater page still lives at
        // 'index/landing'; the old coming-soon page at 'index/coming-soon'.
        $error = '';
        foreach ($this->getFlashMessages() as $msg) {
            if (($msg['type'] ?? '') === 'error') { $error = $msg['message']; }
        }

        $this->render('index/headwaters', [
            'title'      => 'Headwaters Union',
            'subscribed' => (bool)$this->getParam('subscribed'),
            'error'      => $error
        ], false);
    }

    /**
     * Process the "Coming Soon" lead capture form.
     * Saves the visitor's name + email as a `lead`, then returns to the
     * landing page with a thank-you message. Public endpoint (covered by the
     * index::* permission).
     */
    public function dolead() {
        // Validate CSRF
        if (!$this->validateCSRF()) {
            return;
        }

        // The landing form uses a single "Name" field. Accept that, and fall
        // back to the older first_name/last_name pair for compatibility.
        $fullName = trim($this->sanitize($this->getParam('name')));
        if ($fullName !== '') {
            $parts     = preg_split('/\s+/', $fullName, 2);
            $firstName = $parts[0];
            $lastName  = $parts[1] ?? '';
        } else {
            $firstName = trim($this->sanitize($this->getParam('first_name')));
            $lastName  = trim($this->sanitize($this->getParam('last_name')));
        }
        $email = trim($this->sanitize($this->getParam('email'), 'email'));

        // Basic validation: a name and a valid email are required.
        if ($firstName === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->flash('error', 'Please enter your name and a valid email address.');
            Flight::redirect('/');
            return;
        }

        try {
            $lead = Bean::dispense('lead');
            $lead->firstName = $firstName;
            $lead->lastName  = $lastName;
            $lead->email     = $email;
            $lead->createdAt = date('Y-m-d H:i:s');
            Bean::store($lead);
        } catch (\Throwable $e) {
            Flight::get('log')->error('Lead capture error: ' . $e->getMessage());
            $this->flash('error', 'Sorry, something went wrong. Please try again.');
            Flight::redirect('/');
            return;
        }

        // Back to the landing page in its "thank you" state
        Flight::redirect('/?subscribed=1');
    }
    
    /**
     * Headwaters Union landing page.
     * Standalone page (no Tiknix layout) with the logo centered in the hero
     * and a simple Name/Email contact form. Public (covered by index::*).
     */
    public function headwaters() {
        // Headwaters is now the home page; keep this URL working by
        // redirecting to the canonical root.
        Flight::redirect('/');
    }

    /**
     * Process the Headwaters Union contact form.
     * Saves the visitor's name + email as a `lead` (viewable at /lead/admin),
     * then returns to the home page in its thank-you state. Public.
     */
    public function doheadwaters() {
        if (!$this->validateCSRF()) {
            return;
        }

        $fullName = trim($this->sanitize($this->getParam('name')));
        $parts     = $fullName !== '' ? preg_split('/\s+/', $fullName, 2) : [''];
        $firstName = $parts[0];
        $lastName  = $parts[1] ?? '';
        $email     = trim($this->sanitize($this->getParam('email'), 'email'));

        // A name and a valid email are required.
        if ($firstName === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->flash('error', 'Please enter your name and a valid email address.');
            Flight::redirect('/');
            return;
        }

        try {
            $lead = Bean::dispense('lead');
            $lead->firstName = $firstName;
            $lead->lastName  = $lastName;
            $lead->email     = $email;
            $lead->createdAt = date('Y-m-d H:i:s');
            Bean::store($lead);
        } catch (\Throwable $e) {
            Flight::get('log')->error('Headwaters lead capture error: ' . $e->getMessage());
            $this->flash('error', 'Sorry, something went wrong. Please try again.');
            Flight::redirect('/');
            return;
        }

        Flight::redirect('/?subscribed=1');
    }

    /**
     * About page
     */
    public function about() {
        $this->render('index/about', [
            'title' => 'About Us'
        ]);
    }
    
    /**
     * Contact page
     */
    public function contact() {
        $this->render('index/contact', [
            'title' => 'Contact Us'
        ]);
    }
    
    /**
     * Process contact form
     */
    public function docontact() {
        // Validate CSRF
        if (!$this->validateCSRF()) {
            return;
        }
        
        $name = $this->sanitize($this->getParam('name'));
        $email = $this->sanitize($this->getParam('email'), 'email');
        $subject = $this->sanitize($this->getParam('subject'));
        $message = $this->sanitize($this->getParam('message'));
        
        // Validate input
        if (empty($name) || empty($email) || empty($message)) {
            $this->flash('error', 'Please fill in all required fields');
            Flight::redirect('/contact');
            return;
        }
        
        // TODO: Send email or save to database
        
        $this->flash('success', 'Thank you for your message. We will get back to you soon!');
        Flight::redirect('/contact');
    }
    
    /**
     * Privacy policy
     */
    public function privacy() {
        $this->render('index/privacy', [
            'title' => 'Privacy Policy'
        ]);
    }
    
    /**
     * Terms of service
     */
    public function terms() {
        $this->render('index/terms', [
            'title' => 'Terms of Service'
        ]);
    }
}