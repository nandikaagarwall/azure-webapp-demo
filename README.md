# Azure Security Lab — Secure Web App

**Live demo:** [https://my-sec-lab-app-deh6fneafacvf8gz.centralindia-01.azurewebsites.net](https://my-sec-lab-app-deh6fneafacvf8gz.centralindia-01.azurewebsites.net)
**Repo:** [https://github.com/nandikaagarwall/azure-webapp-demo](https://github.com/nandikaagarwall/azure-webapp-demo)

---

## Project overview

This is a beginner-to-intermediate cloud security lab built on Microsoft Azure App Service (Free tier). It demonstrates secure deployment patterns for a small web app, including:

* HTTPS (Azure default)
* Authentication (Azure AD identity provider)
* Custom application logging (local `logs/actions.log`)
* Basic monitoring and diagnostics

This project is intentionally implemented using only free-tier features so it can be reproduced without cost.

---

## Architecture

Simple architecture (see `docs/architecture.png` for diagram):

```
GitHub (main) -> Azure App Service (my-sec-lab-app)
                          ├─ /home/site/wwwroot (index.php + logs/)
                          ├─ Diagnostic settings -> (optional) Storage or Log Analytics
                          └─ (Optional) Key Vault for secrets
```

---

## Features implemented

* App deployed from GitHub (Deployment Center) — continuous deployment configured
* Authentication provider configured (Microsoft Identity) — unauthenticated users are redirected to sign-in
* Custom logging: `/home/site/wwwroot/logs/actions.log` (page loads, button clicks, login attempts)
* Live log inspection via SSH/Kudu (`cat logs/actions.log` / `tail -f logs/actions.log`)
* Defender for Cloud free-tier posture checked (0 recommendations)

---

## How to run / reproduce (short)

1. Fork this repo.
2. Create an Azure resource group and App Service plan (Free tier) and web app, for example:

```bash
# create resource group
az group create -n rg-sec-lab -l centralindia

# create app plan (Free)
az appservice plan create -g rg-sec-lab -n sec-lab-plan --sku F1 --is-linux

# create web app
az webapp create -g rg-sec-lab -p sec-lab-plan -n my-sec-lab-app --runtime "PHP|8.4"

# link GitHub repo (deployment)
az webapp deployment source config --name my-sec-lab-app --resource-group rg-sec-lab --repo-url "https://github.com/nandikaagarwall/azure-webapp-demo" --branch main
```

3. Use SSH/Kudu to view logs:

```bash
cd /home/site/wwwroot/logs
cat actions.log
tail -f actions.log
```

---

## What to screenshot (put images in `docs/screenshots/`)

1. App Service → Overview (`01_app_overview.png`) — shows app URL and status
2. Deployment Center (`02_deployment_center.png`) — shows GitHub repo connected
3. Authentication blade (`03_authentication.png`) — shows identity provider and redirect setting
4. Browser showing HTTPS + lock (`04_https_connected.png`)
5. `cat /home/site/wwwroot/logs/actions.log` output (`05_logs_file.png`)
6. `tail -f` showing live entries while interacting (`06_log_tail.png`)
7. `ls -l /home/site/wwwroot` showing `index.php` and `logs/` (`07_kudu_files.png`)
8. Defender for Cloud showing 0 recommendations (`08_defender_zero_recs.png`)
9. Diagnostic settings screenshot if configured (`09_diagnostic_settings.png`)
10. Demo app page screenshot (`10_demo_app_page.png`)

---

## Security notes & limitations

* This lab uses only free-tier resources. Advanced protections (Azure Firewall, full Defender standard, WAF) require paid plans.
* For production: use managed identities for all resource access, Key Vault for secrets, VNet integration, and Defender Standard.

---

## Demo & artifacts

* Short demo video: `docs/demo.mp4` (recommended 30–60s) — show app, login flow, and live logs
* Architecture diagram: `docs/architecture.png`

---

## Contact

Nandika Agarwall — [https://github.com/nandikaagarwall](https://github.com/nandikaagarwall) — [nandikaagarwall@example.com](mailto:nandikaagarwall@example.com)
