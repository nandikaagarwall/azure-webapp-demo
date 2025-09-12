# Azure Web App Security Lab 🚀

This project demonstrates how to deploy, secure, and monitor a simple web application using **Microsoft Azure Free Tier**.  
It includes authentication, HTTPS/TLS, logging, monitoring, and security baselines — making it a great **portfolio-ready project**.

---

## 🌐 Live Demo

🔗 [Visit the Web App](https://my-sec-lab-app-deh6fneafacvf8gz.centralindia-01.azurewebsites.net)

---

## 🏗️ Architecture

The high-level architecture of this project:

![Architecture](docs/architecture.png)

---

## 📸 Screenshots

### 1. App Service Overview  
App Service overview — shows running app and Azure app URL.
![App Overview](docs/01_app_overview.png.jpg)

### 2. Deployment Center  
GitHub integration (Deployment Center) — CI/CD configured.
![Deployment Center](docs/02_deployment_center..jpg)

### 3. Authentication Setup  
Authentication configured with Microsoft Identity provider in Azure App Service
![Authentication](docs/03_authentication.jpg)

### 4. HTTPS Enforced  
HTTPS enforced — Azure provides TLS for azurewebsites.net.
![HTTPS Connected](docs/04_https_connected.jpg)

### 5. Log Tail Streaming  
Live log tail — log entries appear in real time
![Log Tail](docs/06_log_tail.jpg)

### 6. File Access via Kudu  
Deployed files (index.php + logs folder) inside wwwroot
![Kudu Files](docs/07_kudu_files.jpg)

### 7. Microsoft Defender – Zero Recommendations  
Azure Defender for Cloud free tier shows 0 security recommendations for this app, indicating that basic best practices (HTTPS, Authentication, secure deployment) are already applied.
![Defender Recommendations](docs/08_defender_zero_recs.jpg)

### 8. Live Demo Web App Page  
Live app UI — interactive controls for simulating events.
![Demo App](docs/10_demo_app_page.jpg)

---

## 📊 Features Implemented

- ✅ Azure Web App Deployment (Free Tier)  
- ✅ GitHub Repository CI/CD Deployment  
- ✅ Authentication via Microsoft Identity Platform  
- ✅ HTTPS/TLS Enabled  
- ✅ Logging & Monitoring (log stream + custom logs)  
- ✅ Azure Security Center (Defender for Cloud baseline check)  

---

## 📂 Repository Structure
azure-webapp-demo/
│── docs/ # Architecture diagram + screenshots
│── index.html / php # Web app files
│── README.md # Project documentation


---

## 🧑‍💻 Author

👤 Nandika Agarwal  
📧 www.linkedin.com/in/nandikaagarwal

---

