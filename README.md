<div align="center">

<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIdZ5QHsaZ3GRnCvn-oq8pH_CVe56woKXYPQ&s" width="90" alt="MediQure Logo" />

# 🏥 MediQure

**Your intelligent, all-in-one healthcare companion.**

[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-06B6D4?logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![Groq AI](https://img.shields.io/badge/Groq-LLaMA_3.3_70B-F55036?logo=meta&logoColor=white)](https://groq.com)
[![Docker](https://img.shields.io/badge/Docker-Ready-2496ED?logo=docker&logoColor=white)](https://docker.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

[Report Bug](https://github.com/Ankit-CSE-01/MediQure/issues) · [Request Feature](https://github.com/Ankit-CSE-01/MediQure/issues)

</div>

---

## 📖 About MediQure

**MediQure** is a modern healthcare web application that puts medical guidance in the palm of your hand. It combines an AI-powered diagnostic chatbot, a real-time hospital locator with route navigation, and a comprehensive first aid reference guide — all wrapped in a beautiful, responsive interface built with Tailwind CSS.

---

## ✨ Features

| Feature | Description |
|---|---|
| 🤖 **AI Medical Assistant (Dr. Medi)** | Chat with an AI doctor powered by Meta's LLaMA 3.3 70B via Groq. Get instant symptom triage guidance. |
| 🏥 **Hospital Locator** | Find nearby hospitals in real time using GPS + OpenStreetMap. Get turn-by-turn directions via OSRM routing. |
| 🩹 **First Aid Guide** | A comprehensive, categorized reference guide for common medical emergencies. |
| 📧 **Feedback System** | Submit feedback via a PHP-powered email form using PHPMailer. |
| 🌙 **Modern Dark UI** | Glassmorphic dark-mode interface with Emerald & Sapphire color palette and Inter font. |

---

## 🛠️ Tech Stack

**Frontend**
- HTML5, Tailwind CSS, Vanilla JavaScript
- Leaflet.js (interactive maps)
- Font Awesome icons, Google Fonts (Inter)

**Backend**
- PHP 8.2 (Apache)
- Groq Cloud API — LLaMA 3.3 70B for AI responses
- PHPMailer for feedback emails

**Deployment**
- Docker + Apache (Render, Railway, or any Docker host)
- OpenStreetMap + OSRM for free map & routing

---

## 🚀 Getting Started

### Prerequisites
- PHP 8.2+
- A free [Groq API Key](https://console.groq.com/)

### Local Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/Ankit-CSE-01/MediQure.git
   cd MediQure
   ```

2. **Add your Groq API Key**

   Open `hos/config.php` and replace the key:
   ```php
   define('GROQ_API_KEY', 'your_groq_api_key_here');
   ```

3. **Start the PHP development server**
   ```bash
   php -S localhost:8000
   ```

4. **Open in your browser**
   ```
   http://localhost:8000
   ```

---

## 🐳 Deploy with Docker (Render)

This project includes a ready-to-use `Dockerfile`.

1. Push this repo to your GitHub account
2. Go to [render.com](https://render.com) → **New + → Web Service**
3. Connect your `MediQure` repository
4. Render auto-detects the `Dockerfile` — click **Deploy Web Service**
5. Your app goes live at `https://mediqure.onrender.com` 🎉

---

## 📁 Project Structure

```
MediQure/
│
├── hos/
│   ├── index.html           # Main homepage
│   ├── ai-diagnostic.html   # AI Chat interface (Dr. Medi)
│   ├── hospitals.php        # Hospital locator with map
│   ├── firstaid.html        # First Aid Guide
│   ├── api.php              # Secure Groq API proxy
│   └── config.php           # API key configuration
│
├── Php_Send_Mail/
│   ├── feedback.php         # Feedback form handler
│   └── PHPMailer-master/    # PHPMailer library
│
├── about.html               # About MediQure page
├── index.php                # Root redirect
├── Dockerfile               # Docker deployment config
└── README.md
```

---

## 🔐 Security

- The Groq API key is **never exposed to the browser**. All AI requests go through the secure `hos/api.php` backend proxy via cURL.
- For production: move the API key to environment variables in your hosting dashboard.

---

## 🤝 Contributing

Contributions are welcome!

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 👨‍💻 Author

**Ankit** — [@Ankit-CSE-01](https://github.com/Ankit-CSE-01)

---

<div align="center">
Made with ❤️ for better healthcare access
</div>