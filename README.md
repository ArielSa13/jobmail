# 📬 JobMailer — Automated Job Application Sender via Gmail API

JobMailer is a Laravel web application that helps users manage job application templates, automatically send emails with CV attachments through their own Gmail account using Google OAuth, and track application history in a single dashboard.

This project demonstrates real-world integration of:

* Google OAuth 2.0
* Gmail API (send email on behalf of user)
* Multi-user token management
* File upload & attachment handling
* Application activity history
* Clean UI with TailwindCSS
* Deployment on VPS (aaPanel, Cloudflare, SSL)

---

## 🚀 Main Features

### ✅ Gmail OAuth Integration

Users securely connect their own Gmail account via Google OAuth. Emails are sent directly from the user's Gmail — not from the server.

### ✅ Template Management

Create, edit, and delete job application templates with CV attachment.

### ✅ Smart Attachment Handling

The original CV file name is preserved when sending emails.

### ✅ Send Job Applications

Send personalized emails using template variables like:

```
{{company}}
```

### ✅ Application History Tracking

Track:

* Company name
* Position applied
* Company location
* Date applied

### ✅ Gmail Connect / Disconnect

Users can disconnect and reconnect with a different Gmail account at any time.

### ✅ Responsive UI

Built with TailwindCSS for a clean and modern interface.

---

## 🛠️ Tech Stack

* Laravel 12
* TailwindCSS
* Google Gmail API
* OAuth 2.0
* MySQL
* VPS Deployment via aaPanel
* Cloudflare DNS & SSL

---

## 🧠 How It Works

1. User logs in
2. Connects Gmail via OAuth
3. Creates job application template
4. Sends application email with CV
5. System logs the application history automatically

---

## 🔐 Google OAuth Scope Used

```
https://www.googleapis.com/auth/gmail.send
```

> The application **does not read or store user emails**.
> It only sends emails that are initiated by the user.

---

## ⚙️ Installation Guide

```bash
git clone https://github.com/yourusername/jobmailer.git
cd jobmailer
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
```

### Configure Google OAuth

1. Create OAuth credentials in Google Cloud Console
2. Download `google-credentials.json`
3. Place it inside:

```
storage/app/
```

4. Set redirect URI in Google Console:

```
http://localhost:8000/google/callback
```

---

## ▶️ Run Locally

```bash
php artisan serve
```

---

## 🌍 Live Demo

[https://jobmail.arielsa.site](https://jobmail.arielsa.site)

---

## 📄 Privacy & Terms

* Privacy Policy: `/privacy`
* Terms of Service: `/terms`

---

## 👨‍💻 Author

**Muhamad Ariel Saputra**
Laravel Backend Developer
