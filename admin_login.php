<?php
$error = isset($_GET['error']) && $_GET['error'] == 1;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin Login — Galgotias</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    :root{
      --bg1: #061226;
      --bg2: #0b2438;
      --glass: rgba(255,255,255,0.04);
      --glass-2: rgba(255,255,255,0.06);
      --accent: linear-gradient(90deg,#ff6b6b,#6b9dff);
      --accent-color: #ff7a7a;
      --muted: #9fb2c8;
      --radius: 16px;
    }

    *{box-sizing:border-box}
    body{
      margin:0;
      min-height:100vh;
      font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, Arial;
      background: radial-gradient(800px 300px at 10% 10%, rgba(107,157,255,0.06), transparent),
                  radial-gradient(700px 300px at 90% 80%, rgba(255,107,107,0.05), transparent),
                  linear-gradient(180deg,var(--bg1),var(--bg2));
      color: #eaf4ff;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:24px;
      -webkit-font-smoothing:antialiased;
    }

    
    .floaters{position:absolute;inset:0;pointer-events:none;z-index:0}
    .f{position:absolute;border-radius:50%;filter:blur(50px) opacity(.9);mix-blend-mode:screen}
    .f.f1{width:420px;height:420px;left:-120px;top:-140px;background:linear-gradient(120deg,#6b9dff44,#ff6b6b44);animation:floatA 14s infinite}
    .f.f2{width:260px;height:260px;right:-80px;top:40px;background:linear-gradient(220deg,#ff6b6b33,#ffd07a22);animation:floatB 12s infinite}
    @keyframes floatA{0%{transform:translateY(0)}50%{transform:translateY(-40px)}100%{transform:translateY(0)}}
    @keyframes floatB{0%{transform:translateY(0)}50%{transform:translateY(-30px)}100%{transform:translateY(0)}}

  
    .wrap{
      position:relative;
      z-index:2;
      width:100%;
      max-width:1100px;
      display:grid;
      grid-template-columns: 1fr 420px;
      gap:32px;
      align-items:center;
      padding:48px;
    }


    .hero{
      padding:36px;
      border-radius:20px;
      background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      border:1px solid rgba(255,255,255,0.04);
      backdrop-filter: blur(12px);
      box-shadow: 0 24px 80px rgba(2,6,23,0.7);
      transform-style:preserve-3d;
    }

    .brand{
      display:flex;
      gap:16px;
      align-items:center;
      margin-bottom:18px;
    }

    .logo{
      width:64px;height:64px;border-radius:14px;
      background:linear-gradient(135deg,#6b9dff,#ff6b6b);
      display:flex;align-items:center;justify-content:center;font-weight:800;color:#071226;font-size:26px;
      box-shadow: 0 10px 30px rgba(107,157,255,0.08), inset 0 -6px 12px rgba(255,255,255,0.06);
    }

    .brand h1{
      font-size:20px;margin:0;color:#f8fbff;
    }
    .brand p{margin:0;color:var(--muted);font-size:13px}

    .hero h2{font-size:30px;margin:18px 0 8px 0}
    .hero p.lead{color:var(--muted);margin-bottom:18px;line-height:1.5}

    .features{display:flex;gap:12px;flex-wrap:wrap}
    .feat{background:rgba(255,255,255,0.02);padding:10px 12px;border-radius:10px;font-size:13px;color:var(--muted)}

  
    .login-card{
      padding:28px;
      border-radius:18px;
      background: linear-gradient(180deg, rgba(255,255,255,0.025), rgba(255,255,255,0.015));
      border: 1px solid rgba(255,255,255,0.04);
      backdrop-filter: blur(14px);
      box-shadow: 0 30px 90px rgba(2,6,23,0.7);
      transform: translateZ(40px);
    }

    .login-card h3{margin:0 0 12px 0;font-size:20px;color:#eaf6ff}
    .login-card p{margin:0 0 18px 0;color:var(--muted);font-size:13px}

    form {display:flex;flex-direction:column;gap:12px}
    input[type="text"], input[type="password"]{
      padding:12px 14px;border-radius:12px;border:1px solid rgba(255,255,255,0.06);
      background: rgba(255,255,255,0.02);color:#eaf6ff;outline:none;
      transition: box-shadow .18s, transform .12s;
    }
    input:focus{box-shadow: 0 8px 30px rgba(107,157,255,0.06);transform:translateY(-2px)}

    .btn{
      display:inline-block;padding:12px 16px;border-radius:12px;border:0;font-weight:700;
      background: linear-gradient(90deg,#ff6b6b,#6b9dff);color:#071226;cursor:pointer;
      box-shadow: 0 10px 30px rgba(107,157,255,0.08);
      transition: transform .16s ease;
    }
    .btn:hover{transform:translateY(-4px) scale(1.01)}

    .small{font-size:13px;color:var(--muted)}
    .link{color:#bfe1ff;text-decoration:none;font-weight:600}

    .error {
      background: rgba(255,60,60,0.12);
      border: 1px solid rgba(255,60,60,0.18);
      color: #ffcfcf;
      padding:10px 12px;
      border-radius:10px;
      margin-bottom:10px;
      font-size:14px;
    }

    @media (max-width:980px){
      .wrap{grid-template-columns: 1fr; padding:24px}
      .login-card{order:-1}
      body{padding:18px}
    }
  </style>
</head>
<body>

  <div class="floaters" aria-hidden="true">
    <span class="f f1"></span>
    <span class="f f2"></span>
  </div>

  <div class="wrap">
    <div class="hero">
      <div class="brand">
        <div class="logo">G</div>
        <div>
          <h1>Galgotias University</h1>
          <p>Admin Portal — Secure access</p>
        </div>
      </div>

      <h2>Welcome back, Administrator</h2>
      <p class="lead">Manage applications, students and reports from a modern, secure dashboard.</p>

      <div class="features">
        <div class="feat">🔒 Secure Login</div>
        <div class="feat">📊 Dashboard</div>
        <div class="feat">👤 Manage Students</div>
        <div class="feat">⬇️ Export Data</div>
      </div>
    </div>

  
    <div class="login-card" role="region" aria-label="Admin login">
      <h3>Sign in to admin</h3>
      <p>Enter your admin username and password.</p>

      <?php if ($error): ?>
        <div class="error">Invalid credentials — please try again.</div>
      <?php endif; ?>

      <form action="login_check.php" method="post" autocomplete="off" novalidate>
        <input type="text" name="username" placeholder="Username" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <div style="display:flex;gap:10px;align-items:center;justify-content:space-between;margin-top:8px">
          <button class="btn" type="submit" name="login">Sign in</button>
          <a class="small link" href="index.php">Back to site</a>
        </div>
      </form>
      
      <br><strong>Example</strong></br>
      <br><p3>Username-Admin</p>
      <p3>Passeord-Admin123</p>
    </div>
  </div>

</body>
</html>
